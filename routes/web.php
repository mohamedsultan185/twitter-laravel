<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NotificationController;


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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//master
Route::get('/', [TweetController::class, 'index'])->name('tweets.index')->middleware('auth');
// Route::get('/createTweet', [TweetController::class, 'create'])->name('tweets.create');
//tweet
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store')->middleware('auth');
Route::get('/tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show')->middleware('auth');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy')->middleware('auth');


// profile
 Route::get('/profile', [UserController::class, 'show'])->name('profile.show')->middleware('auth');
 Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
 Route::post('/profile/update', [UserController::class,'update'])->name('profile.update')->middleware('auth');

//follow, unfollow
 Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow')->middleware('auth');
 Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');

 // like
 Route::post('/tweets/{tweet}/like', [TweetController::class, 'toggleLike'])->name('tweets.toggleLike')->middleware('auth');

 //retweet
 Route::post('/tweets/{tweet}/retweet', [TweetController::class, 'toggleRetweet']) ->name('tweets.toggleRetweet')->middleware('auth');
 Route::post('/tweets/{tweet}/reply', [TweetController::class, 'reply'])->name('tweets.reply')->middleware('auth');
//  Route::post('/tweets/{tweet}/reply', [TweetController::class, 'reply'])->name('tweets.reply')->middleware('auth');

// allUsers
Route::get('allUsers', [UserController::class,'allUsers'])->name('all.users')->middleware('auth');
//followed
Route::get('followed', [UserController::class,'followed'])->name('followed')->middleware('auth');
Route::get('followers', [UserController::class,'followers'])->name('followers')->middleware('auth');

// request
Route::post('/approve-follow/{user}', [UserController::class, 'approveFollowRequest'])->name('approve.follow')->middleware('auth');
Route::get('/approve-follow-request', [UserController::class, 'showFollowRequestApproval'])->name('approve.followRequest')->middleware('auth');

//userLike
Route::get('/profile/userLike', [UserController::class, 'userLike'])->name('user.like')->middleware('auth');
//user/Retweet
Route::get('/profile/replays', [UserController::class, 'userReplay'])->name('user.replays')->middleware('auth');

// Route::get('/profile/userLike', [UserController::class, 'userRetweet'])->name('user.retweet')->middleware('auth');
//Display Hashtag
Route::get('/hashtags/{hashtag}', 'HashtagController@show')->name('hashtags.show');

Route::get('/hashtage',function () {
return view('hashtag');

});

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
