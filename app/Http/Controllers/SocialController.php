<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback($value='')
    {
        $google_user = Socialite::driver('google')->user();
        // dd($google_user);
      
        
         $user = User::where("google_id",$google_user->id)->first();
         if(!empty($user)){
             Auth::login($user);
             return redirect('/');
         }
         else{
           $user =  user::create([
                 "name"=> $google_user->name,
                 "google_id"=> $google_user->id,
                 "email"=> $google_user->email,
                 "avatar"=>$google_user->avatar,
             ]);
             Auth::login($user);
             return redirect('/');


         }
    }
    
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();

      // return Socialite::driver('facebook')->stateless()->user();

    }

    public function handleFacebookCallback($value='')
    {
        $fb_user = Socialite::driver('facebook')->stateless()->user();
      
        
         $user = User::where("facebook_id",$fb_user->id)->first();
         if(!empty($user)){
             Auth::login($user);
             return redirect('/');
         }
         else{
           $user =  user::create([
                 "name"=> $fb_user->name,
                 "facebook_id"=> $fb_user->id,
                 "email"=> $fb_user->email,
             ]);
             Auth::login($user);
             return redirect('/');


         }
    }
     //Github Login
     public function redirectToGithub()
     {
         return Socialite::driver('github')->redirect();
     }
 
     //Github callback
 
     public function  handleGithubCallback()
     {
         $user = Socialite::driver('github')->user();
        
         
         $this->_registerOrLoginUser($user);
       
       //return home after login
       return redirect('/');
     }
     public function _registerOrLoginUser($data)
     {
        $user = User::where('email',$data->email)->first();
        if(!$user)
        {
           $user = new User();

            $user->name = $data->nickname;
            $user->email = $data->email;
            $user->github_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();

        }
        Auth::login($user);
     }

}
