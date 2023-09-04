@extends('layouts.app')
@section('content')
    <x-add-tweet></x-add-tweet>
    <!-- Tweet start -->
    @foreach ($tweets as $tweet)
        <x-tweet :tweet="$tweet"></x-tweet>
    @endforeach
    <!-- Tweet end -->
@endsection

@section('hashtag')


        <x-hashtag :hashtags="$hashtags"/>

    <hr class="border-gray-600">
@endsection


@section('follow')
    @if ($users)
        @foreach ($users as $user)
            <x-follow :user="$user" />
        @endforeach
    @endif
@endsection
