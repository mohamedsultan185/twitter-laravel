@extends('layouts.app')
@section('content')
<br>
    <h1 class="text-2xl font-semibold font-bold mb-4 dark:text-white">User Requset</h1>
    <div class="flex space-y-4 flex-col">
        @foreach ($users as $user)
            <x-accepted :user="$user" />

        @endforeach
    </div>
@endsection

@section('hashtag')
    @foreach ($hashtags as $hashtag)
        <div class="flex">
            <div class="flex-1">
                <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400"></p>
                <h2 class="px-4 ml-2 w-48 font-bold text-white"> <a href="{{ route('hashtags.show', ['hashtag' => $hashtag->name]) }}">
    #{{ $hashtag->name }}</a>
        </h2>
                <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">({{ $hashtag->tweets_count }})
                    Tweets</p>

            </div>


            <div class="flex-1 px-4 py-2 m-2">
                <a href=""
                    class=" text-2xl rounded-full text-gray-400 hover:bg-blue-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>

        </div>
        <br><br>

    @endforeach

    <hr class="border-gray-600">
@endsection


@section('follow')

    @if ($userss)
        @foreach ($userss as $user)
            <x-follow :user="$user" />
        @endforeach
    @endif
@endsection


