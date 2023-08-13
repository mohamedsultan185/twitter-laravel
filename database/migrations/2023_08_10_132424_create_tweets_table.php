<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('retweet_id')->nullable();
            $table->unsignedBigInteger('reply_to_tweet_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('retweet_id')->references('id')->on('tweets');
            $table->foreign('reply_to_tweet_id')->references('id')->on('tweets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
};
