@extends('layouts.app')

@section('content')
    <hr class="border-b border-gray-400 my-8">
    <x-addTweet></x-addTweets>
        <!-- Tweet start -->
        @foreach ($tweets as $tweet)
            <x-tweet :tweet="$tweet"></x-tweet>
        @endforeach
        <!-- Tweet end -->
        </div>
    @endsection


    @section('follow')
        <div class="flex flex-shrink-0">

            @if ($users)
                @foreach ($users as $user)
                    <div class="flex-1 ">
                        <div class="flex items-center w-48">
                            <div>
                                <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2"
                                    src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png"
                                    alt="" />
                            </div>
                            <div class="ml-3 mt-3">
                                <p class="text-base leading-6 font-medium text-white">
                                    {{ $user->name }}
                                </p>
                                <p
                                    class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                    {{ $user->username }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href="" class=" float-right">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full">
                                    Follow
                                </button>
                            </a>
                        </div>
                @endforeach
            @endif

        @endsection
