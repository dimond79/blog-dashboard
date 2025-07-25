<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('post.writepost',compact('categories'));
    }

    public function create(Request $request){
        try{
            $data = $request->validate([
                'title'=>'required|string',
                'body'=>'required',
                'categories' => 'required|array',
                'image' => 'nullable|image|max:2048'
            ]);
            //Auto generate slug
            $data['slug'] = Str::slug($request->title);

            $data['user_id'] = $request->user()->id;

            if($request->hasFile('image')){
                $file = $request->file('image');

                $filename = time() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('public/posts', $filename);

                $data['image'] = 'posts/' .$filename;

            }

            $post = Post::create($data);
            // dd($post->toArray());

            $post->categories()->attach($data['categories']);

           return redirect()->route('post.list')->with('success', 'Post created successfully.');
        }catch(\Exception $e){
            return response()->json(["error"=>$e->getMessage()]);
        }
    }
    public function list(){
        $userId = Auth::id();
        $posts = Post::where('user_id',$userId)->get();
        // dd($post->toArray());
        return view('post.listpost',compact('posts'));

    }

    public function show($slug){
        $post = Post::with('categories')->where('slug', $slug)->firstOrFail();
        // dd($post->categories->toArray());
        // $categories = $post->categories;
        return view('frontend.blog.post',compact('post'));

    }

    public function edit(){
        $post = Auth::user()->post;
        return view('post.editpost');
    }


}
