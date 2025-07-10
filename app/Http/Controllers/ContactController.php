<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Recaptcha;

class ContactController extends Controller
{
    public function form(Request $request){
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'string|nullable',
            'message' => 'nullable',
            'g-recaptcha-response' => [new Recaptcha()]
        ]);

        return response()->json([
            "success" => "You are human"
        ]);
    }
}
