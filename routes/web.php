<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blog.index');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Post Routes 

Route::group(['middleware'=>['auth']],function(){
Route::get('dashboard',[App\http\Controllers\backend\PostController::class,'dashboard'])->name('dashboard');
Route::get('create/post',[App\http\Controllers\backend\PostController::class,'createPost'])->name('create.post');
Route::post('create/post',[App\http\Controllers\backend\PostController::class,'storePost'])->name('store.post');
Route::get('edit/post/{id}',[App\http\Controllers\backend\PostController::class,'editPost'])->name('edit.post');
Route::post('update/post/{id}',[App\http\Controllers\backend\PostController::class,'updatePost'])->name('update.post');
Route::get('delete/post/{id}',[App\http\Controllers\backend\PostController::class,'deletePost'])->name('delete.post');

});


Route::get('all/post',[App\http\Controllers\backend\PostController::class,'allPost'])->name('all.post');

//single Post
Route::get('single/post/{id}',[App\http\Controllers\backend\PostController::class,'singlePost'])->name('single.post');


//Facebook Login
Route::get('login/facebook',[App\http\Controllers\SocialController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[App\http\Controllers\SocialController::class,'handleFacebookCallback']);


//Github Login
Route::get('login/github',[App\http\Controllers\SocialController::class,'redirectToGithub'])->name('login.github');
Route::get('login/github/callback',[App\http\Controllers\SocialController::class,'handleGithubCallback']);

//Google Login
Route::get('login/google',[App\http\Controllers\SocialController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[App\http\Controllers\SocialController::class,'handleGoogleCallback']);
