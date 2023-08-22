@extends('layouts.app')
@section('content')
    <x-add-tweet></x-add-tweet>
    <!-- Tweet start -->
    @foreach ($tweets as $tweet)
        <x-tweet :tweet="$tweet"></x-tweet>
    @endforeach
    <!-- Tweet end -->
@endsection


@section('follow')
    <div class="flex flex-shrink-0">

        @if ($users)
            @foreach ($users as $user)
                <div class="flex-1 ">
                    <div class="flex items-center">
                        <div>
                            <img class="inline-block h-10 w-auto rounded-full ml-4 mt-2"
                                src="{{ $user->getProfileUrlAttribute() }}" alt="" />
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
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href="" class=" float-right">
                                @if (auth()->user()->isFollowing($user) ||
                                        auth()->user()->isPending($user))
                                    <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-transparent hover:bg-red-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full"
                                            type="submit">
                                            {{ auth()->user()->isPending($user)? 'pending': 'Unfollow' }}
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('users.follow', $user) }}" method="POST">
                                        @csrf
                                        <button
                                            class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded-full"
                                            type="submit">
                                            Follow
                                        </button>
                                    </form>
                                @endif
                            </a>
                        </div>
                    </div>
            @endforeach
        @endif
    </div>

@endsection
