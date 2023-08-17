<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;


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
    return view('welcome');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [TweetController::class, 'index'])->name('tweets.index');
// Route::get('/createTweet', [TweetController::class, 'create'])->name('tweets.create');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');


// profile
 Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
 Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
 Route::post('/profile/update', [UserController::class,'update'])->name('profile.update');

//follow, unfollow
 Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');
 Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('users.unfollow');

 // like route
 Route::post('/tweets/{tweet}/like', [TweetController::class, 'toggleLike'])->name('tweets.toggleLike');

 //retweet
 Route::post('/tweets/{tweet}/retweet', [TweetController::class, 'toggleRetweet']) ->name('tweets.toggleRetweet');
 Route::post('/tweets/{tweet}/reply', [TweetController::class, 'reply'])->name('tweets.reply');
 Route::post('/tweets/{tweet}/reply', 'TweetController@reply')->name('tweets.reply');

// allUsers
Route::get('allUsers', [UserController::class,'allUsers'])->name('all.users');
//followed
Route::get('followed', [UserController::class,'followed'])->name('followed');
Route::get('followers', [UserController::class,'followers'])->name('followers');
// request
Route::post('/approve-follow/{user}', [UserController::class, 'approveFollowRequest'])->name('approve.follow');
Route::get('/approve-follow-request', [UserController::class, 'showFollowRequestApproval'])->name('approve.followRequest');
