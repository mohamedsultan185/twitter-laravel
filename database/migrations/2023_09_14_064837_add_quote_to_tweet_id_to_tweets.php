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
            $table->unsignedBigInteger('quote_to_tweet_id')->nullable();
            $table->foreign('quote_to_tweet_id')->references('id')->on('tweets');


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
            $table->unsignedBigInteger('quote_to_tweet_id')->nullable();
            $table->foreign('quote_to_tweet_id')->references('id')->on('tweets');

        });
    }
};
