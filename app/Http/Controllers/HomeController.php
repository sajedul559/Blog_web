<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $posts = Post::all();
    //   return  $posts->user->name;
     
    //    $message = "No Post Yet !";
    //     return view('blog.index',compact('posts','message'));
    // }

    public function index()
{
   
    $posts = Post::latest('created_at')->limit(9)->get();
   return view('blog.index',compact('posts'));
}
}
