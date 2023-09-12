<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



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
        'birthday',
        'fcm_token',


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
        return $this->belongsToMany(Tweet::class, 'likes', 'user_id', 'tweet_id');
    }

    public function retweets()
    {
        return $this->belongsToMany(Tweet::class, 'retweets', 'user_id', 'tweet_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
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

    public function getAvatarUrlAttribute()
    {
        return $this->image ? asset('tweet_images/' . $this->image) : asset('img/sultan.jpg');
    }



    public function getProfileUrlAttribute()
    {
        if ($this->image) {
            $profilePhoto = $this->photos()->where('type', 'profile')->first();

            if ($profilePhoto) {
                return asset('profile_images/' . $profilePhoto->image_path);
            }
        }

        // If there is no profile photo, return a default image URL
        return asset('img/sultan.jpg');
    }

    public function likedTweets()
    {
        return $this->belongsToMany(Tweet::class, 'likes')->withTimestamps();
    }

    public function retweetedTweets()
    {
        return $this->belongsToMany(Tweet::class, 'retweets')->withTimestamps();
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

}
