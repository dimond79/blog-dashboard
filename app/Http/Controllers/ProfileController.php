<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function create(Request $request){
        // dd($request->toArray());
        try{
            $user = Auth::user();

            if ($user->profile) {
                return response()->json(['error' => 'Profile already exist'], 409);
            }

            $data = $request->validate([
                'bio'=>'required|string',
                'link'=>'nullable|string',
                'avatar'=>'nullable|image|max:2048',
            ]);

            $data['user_id'] = $request->user()->id;
            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                //optional, renaming the file for unique
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $path = $file->storeAs('public/avatars',$filename);
                $path = $file->storeAs('avatars', $filename, 'public');
                // dd($path);
                $data['avatar'] = 'avatars/' .$filename;
            }

            Profile::create($data);

            // return response()->json(['message'=>'Profile created succesfully']);
            return redirect()->route('profile.show');

        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);

        }
    }

    public function show(){
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.show-user-profile',compact('profile','user'));
        // dd($user->profile->toArray() );

        // $uid = User::where()all();
        // dd($uid->toArray());
        // $uid = User::find(1);
        // $uid->profile;
        // dd($uid->profile->toArray());
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function delete(Request $request){
        // dd($request->toArray());
        $profile = Profile::where('user_id',$request->user_id)->firstOrFail()->delete();
        return redirect()->route('profile.show');
    }
}
