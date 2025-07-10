<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::with(['user','categories'])->orderBy('created_at','desc')->paginate(4);
        // dd($posts); debug bar

        // $dateString = $posts['created_at'];
        // dd($dateString);
        // $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $dateString);
        // echo $datetime->format('F d, Y');

        return view('frontend.blog.index',compact('posts'));
    }

    public function contact(){
        return view('frontend.blog.contact');
    }
}
