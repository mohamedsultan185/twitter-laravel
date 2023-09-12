<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['content', 'image', 'retweet_id', 'reply_to_tweet_id', 'user_id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies()
    {
        return $this->hasMany(Tweet::class, 'reply_to_tweet_id');
    }
    public function likes()
    {
        // dd($this);
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function retweets()
    {
        // dd($this);
        return $this->belongsToMany(User::class, 'retweets')->withTimestamps();
    }

    public function originalTweet()
    {
        return $this->belongsTo(Tweet::class, 'reply_to_tweet_id');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    function hashtags() {
        return $this->belongsToMany(Hashtag::class);
    }
    


}
