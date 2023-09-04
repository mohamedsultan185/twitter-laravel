<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tweet;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class CustomDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $hashtags = Hashtag::withCount('tweets')->orderBy('tweets_count', 'desc')->inRandomOrder()->limit(5)->get();
        view()->share('hashtags', $hashtags);


    }

}
