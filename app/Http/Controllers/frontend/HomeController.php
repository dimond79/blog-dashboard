<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::with(['user','categories'])->get();
        // dd($posts);
        return view('frontend.blog.index',compact('posts'));
    }

    public function contact(){
        return view('frontend.blog.contact');
    }
}
