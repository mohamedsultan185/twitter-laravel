<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $currentUser = Auth::user();
        $users = User::where('id', '!=', $currentUser->id)->inRandomOrder()->limit(5)->get();
        $tweets = $currentUser->tweets()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('currentUser', 'users', 'tweets'));
    }


    public function edit()
    {
        $user = auth()->user();
        return view('updateProfile', compact('user'));
    }
    public function update(Request $request)
    {
        $profile = Auth::user();

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            if ($profile->image) {
                $oldImagePath = public_path('profile_images/' . $profile->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $data['image'] = $imageName;
        }

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $profile->update($data);

        return redirect()->route('profile.show', $profile)->with('success', 'Profile updated successfully.');
    }


    public function allUsers()
    {
        $currentUser = Auth::user();
        $users = User::where('id', '!=', $currentUser->id)->get();
        return view('Users', compact('users'));
    }

    public function followed()
    {
        $currentUser = Auth::user();
        $users = $currentUser->following()->where('accepted', true)->get();
        return view('Users', compact('users'));
    }
    public function followers()
    {
        $currentUser = Auth::user();
        $users = $currentUser->followers()->where('accepted', true)->get();
        return view('Users', compact('users'));
    }

    public function approveFollowRequest(User $user)
    {
        auth()->user()->followers()->where('follower_id', $user->id)->where('accepted', 0)->update(['accepted' => 1]);

        return redirect()->back();
    }

    public function showFollowRequestApproval()
    {
        $users = auth()->user()->followers()->where('accepted', false)->get();
        return view('requests', compact('users'));
    }

    public function userLike()
    {

        $users = User::where('id', '!=', auth()->user()->id)->get();
        $tweets = auth()->user()->likes()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('users', 'tweets'));
    }
    public function userRetweet()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $tweets = auth()->user()->retweets()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('users', 'tweets'));
    }
    public function userReplay()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $tweets = auth()->user()->tweets()->where('reply_to_tweet_id', '!=', Null)->orderBy('created_at', 'desc')->get();
        return view('profile', compact('users', 'tweets'));
    }
}
