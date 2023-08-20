@extends('layouts.app')

@section('tweets')
<hr class="border-blue-800 border-4">

<!-- Tweet start -->
@foreach ($tweets as $tweet)
    <div class="flex flex-shrink-0 p-4 pb-0">
        <a href="#" class="flex-shrink-0 group block">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-10 w-10 rounded-full"
                        src="{{ $tweet->user->profile_url }}" alt="{{ $tweet->user->name }}">
                </div>
                <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-white">
                        {{ $tweet->user->name }}
                        <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                            {{ '@' . $tweet->user->username }} . {{ $tweet->created_at->format('d M') }}
                        </span>
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="pl-16">
        <p class="text-base width-auto font-medium text-white flex-shrink">
            {{ $tweet->content }}
        </p>

        <div class="md:flex-shrink pr-6 pt-3">
            @if ($tweet->image)
            <img src="{{ asset('tweet_images/' . $tweet->image) }}" alt="Tweet Image"
                width="600" height="800">
        @endif
        </div>

        <div class="flex">
            <div class="w-full">

                <div class="flex items-center">
                    <!-- Like Button -->
                    <div class="flex-1 text-center">
                        <form action="{{ route('tweets.toggleLike', $tweet) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                @if (auth()->user()->likedTweets->contains($tweet->id))
                                    <svg class="text-center h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                @else
                                    <svg class="text-center h-6 w-6" fill="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="red" viewBox="0 0 24 24">
                                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                @endif
                            </button>
                        </form>
                    </div>

                    <!-- Retweet Button -->
                    <div class="flex-1 text-center py-2 m-2">
                        <form action="{{ route('tweets.toggleRetweet', $tweet) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                                <svg class="h-6 w-6 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                                {{ $tweet->retweets->count() }}
                            </button>
                        </form>
                    </div>
                   <!-- Reply Button and Form -->
<div class="flex-1 text-center py-2 m-2">
    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <div class="flex items-center">
            <button type="submit" class="w-12 group text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                <svg class="h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </button>
            <textarea name="content" class="ml-2 rounded-lg border-gray-300 border p-2" placeholder="Write a comment"></textarea>
            <input type="hidden" name="parent_tweet_id" value="{{ $tweet->id }}">
        </div>
    </form>
</div>


                    <!-- More Options Button -->
                    {{-- <div class="flex-1 text-center py-2 m-2">
                        <a href="#" class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                        </a>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
    <hr class="border-gray-600">
@endforeach
<!-- Tweet end -->
</div>
@endsection
