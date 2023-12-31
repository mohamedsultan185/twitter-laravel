<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use App\Models\Hashtag;
use App\Services\FCMService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LikeNotification;
use App\Notifications\RetweetNotification;
use App\Notifications\NewTweetNotification;
use Illuminate\Support\Facades\Notification;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $followedUsersIds = $currentUser->following->pluck('id');
        $followedUsersIds[] = $currentUser->id;
        $users = User::where('id', '!=', $currentUser->id)->inRandomOrder()->limit(5)->get();
        $tweets = Tweet::whereIn('user_id', $followedUsersIds)->orderBy('created_at', 'desc')->get();
        return view('master', compact('tweets', 'users',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createTweet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:280',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'images.*.max' => 'Please upload images with a maximum size of 2MB.',
        ]);


        $user = auth()->user();

        $tweetData = [
            'user_id' => $user->id,
            'content' => $request->input('content'),
        ];
        $tweet = Tweet::create($tweetData);

        $followers = $tweet->user->followers;
        foreach ($followers as $follower) {
            $notificationData = [
                'title' => 'New Tweet Notification',
                'body' => "New tweet from {$user->name}: {$tweet->content}",
                'tweet_id' => $tweet->id,
            ];

            $follower->notify(new NewTweetNotification($tweet, $notificationData));

            FCMService::send(
                $follower->fcm_token,
                $notificationData
            );
        }

        preg_match_all('/#(\w+)/', $request->input('content'), $matches);
        $hashtags = $matches[1];
        foreach ($hashtags as $hashtagName) {
            $hashtag = Hashtag::firstOrCreate(['name' => $hashtagName]);
            $tweet->hashtags()->attach($hashtag);
        }


        if ($request->hasFile('images')) {
            $images = $request->file('images');
            if (count($images) > 4) {
                return redirect()->back()->withErrors(['images' => 'Please upload a maximum of 4 images.']);
            }
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/tweet_images'), $imageName);
                $tweet->photos()->create([
                    'image_path' => $imageName,
                ]);
            }
        }

        return redirect()->route('tweets.index')->with('success', 'Tweet created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        // TODO
        return redirect()->route('tweets.index')->with('success', 'Tweet created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect()->route('tweets.index')->with('success', 'Tweet deleted successfully');
    }
    public function toggleLike(Tweet $tweet)
    {
        $user = auth()->user();
        $postOwner = $tweet->user; // The user who owns the post
        $user->likedTweets()->toggle($tweet->id);
        Notification::send($postOwner, new LikeNotification($tweet));
        if (auth()->user()->likedTweets->contains($tweet->id)) {
            FCMService::send(
                $postOwner->fcm_token,
                [
                    "title" => "$user->name liked your tweet",
                ]
            );
        }

        $likeCount = $tweet->likes->count();


        return response()->json(['likeCount' => $likeCount]);
    }

    public function toggleRetweet(Tweet $tweet)
    {
        $user = auth()->user();
        $user->retweetedTweets()->toggle($tweet->id);
        $postOwner = $tweet->user;

        Notification::send($postOwner, new RetweetNotification($tweet));
        if (auth()->user()->retweets->contains($tweet->id)) {
            FCMService::send(
                $postOwner->fcm_token,
                [
                    "title" => "$user->name retweet your tweet",
                ]
            );
        }
        $retweetCount = $tweet->retweets->count();
        return response()->json(['retweetCount' => $retweetCount]);
    }
    // Quote toggle
    public function toggleQuote($id)
    {
        $tweet = Tweet::findOrFail($id);
        $user = $tweet->user();

        return view('Quote', compact('tweet', 'user'));
    }

    public function quote(Tweet $tweet, Request $request)
{
    $validatedData = $request->validate([
        'quote_content' => 'required|max:255',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'images.*.max' => 'Please upload images with a maximum size of 2MB.',
    ]);

    $newQuote = new Tweet();
    $newQuote->content = $validatedData['quote_content'];
    $newQuote->user_id = auth()->user()->id;
    $newQuote->quote_to_tweet_id = $tweet->id;
    $newQuote->save();

    if ($request->hasFile('images')) {
        $images = $request->file('images');
        if (count($images) > 4) {
            return redirect()->back()->withErrors(['images' => 'Please upload a maximum of 4 images.']);
        }
        foreach ($images as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/tweet_images'), $imageName);
            $newQuote->photos()->create([
                'image_path' => $imageName,
            ]);
        }
    }

return redirect()->route('tweets.index');
}



    public function reply(Tweet $tweet, Request $request)
    {
        $validatedData = $request->validate([
            'reply_content' => 'required|max:255',
        ]);

        $newReply = new Tweet();
        $newReply->content = $validatedData['reply_content'];
        $newReply->user_id = auth()->user()->id;
        $newReply->reply_to_tweet_id = $tweet->id;
        $newReply->save();


        return back()->with('success', 'Reply posted successfully.');
    }
    public function showReplies(Tweet $tweet)
    {
        return view('show_replies', ['tweet' => $tweet]);
    }
}
