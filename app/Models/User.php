<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'image',
        'phone',
        'birthday'

    ];
    protected $dates = ['deleted_at'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // public function retweets()
    // {
    //     return $this->hasMany(Retweet::class);
    // }

    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','followed_id','follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class,'follows','follower_id','followed_id');
    }


    public function isFollowing(User $user)
    {
        return $this->following()->where('accepted', true)->where('followed_id', $user->id)->exists();
    }
    public function isPending(User $user)
    {
        return $this->following()->where('accepted', false)->where('followed_id', $user->id)->exists();
    }
    public function FollowRequest(User $otherUser)
     {
         return $this->followers()->where('follower_id', $otherUser->id)->where('accepted', false);

     }

    function getAvatarUrlAttribute()
    {
        return $this->image ? asset('tweet_images/'. $this->image) : asset('img/sultan.jpg');
    }
    function getProfileUrlAttribute()
    {
        return $this->image ? asset('profile_images/'. $this->image) : asset('img/sultan.jpg');
    }
    public function likedTweets(){
        return $this->belongsToMany(Tweet::class, 'likes')->withTimestamps();
    }

    public function hasRetweeted(Tweet $tweet)
{
    return $this->retweets->contains('tweet_id', $tweet->id);
}

public function retweets()
{
    return $this->hasMany(Retweet::class);
}
public function retweetedTweets()
{
    return $this->belongsToMany(Tweet::class, 'retweets', 'user_id', 'tweet_id');
}



}
