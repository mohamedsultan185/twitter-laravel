<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

    class Tweet extends Model
    {
        use HasFactory;
        use SoftDeletes;
        protected $fillable = [ 'content', 'image','retweet_id', 'reply_to_tweet_id','user_id'];
        protected $dates = ['deleted_at'];
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function retweet()
        {
            return $this->belongsTo(Tweet::class, 'retweet_id');
        }

        public function replies()
        {
            return $this->hasMany(Tweet::class, 'reply_to_tweet_id');
        }
        public function likes() {
            return $this->belongsTo(User::class,'likes')->withTimestamps();

        }
        public function retweets()
        {
            return $this->hasMany(Retweet::class);
        }


        public function originalTweet()
        {
            return $this->belongsTo(Tweet::class, 'reply_to_tweet_id');
        }

        

    }
