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
        Schema::table('tweets', function (Blueprint $table) {
             $table->dropForeign(['user_id']);
            $table->dropForeign(['retweet_id']);
            $table->dropForeign(['reply_to_tweet_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->change();
            $table->foreign('retweet_id')->references('id')->on('tweets')->onDelete('cascade')->change();
            $table->foreign('reply_to_tweet_id')->references('id')->on('tweets')->onDelete('cascade')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            // $table->dropForeign(['user_id']);
            // $table->dropForeign(['retweet_id']);
            // $table->dropForeign(['reply_to_tweet_id']);

        });
    }
};
