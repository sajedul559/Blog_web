<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use File;

use Auth;

class PostController extends Controller
{
    //

    public function allPost()
    {
        return view('user.post.all');
    }

    public function singlePost($id)
    {
       $post = Post::find($id);
       return view('user.post.single',compact('post'));
    }

    public function dashboard()
    {   
        $user = Auth::user();
        
        $posts = Post::where('user_id',$user->id)->get();  

        $message = "No Post yet !"  ;
        //return $posts;  
        return view('user.dashboard',compact('posts','message'));

    }
    public function createPost()
    {
        return view('user.post.create');
    }
   
    public function storePost (Request $request)
    {
        $user = Auth::user();

       $post = new Post();
       $post->title = $request->title;
       $post->user_id = $user->id;
       if($request->file('photo')){  
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $name = time().'.'.$extension;
           $path = "images/posts";
           $file->move($path, $name);
           $post->photo = $name;
       }
       $post->description = $request->description;
       $post->save();
       return redirect()->route('dashboard')->with('success','Post added success');
    }
    public function editPost($id)
    {
        $post = Post::find($id);
        return view('user.post.edit',compact('post'));
    }

    public function updatePost (Request $request, $id)
    {
        $user = Auth::user();

       $post = Post::find($id);
       $post->title = $request->title;
       $post->user_id = $user->id;
       if($request->file('photo')){
           if(File::exists('images/posts/'.$post->photo)){
               File::delete('images/posts/'.$post->photo);
           }
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $name = time().'.'.$extension;
           $path = "images/posts";
           $file->move($path, $name);
           $post->photo = $name;
       }
       $post->description = $request->description;
       $post->save();
       return redirect()->route('dashboard')->with('success','Post update success');
    }
    public function deletePost($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->route('dashboard')->with('success','Post deleted success');
    }
}
