@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="">All Users</h1>
        @if ($users)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($users as $user)
                    @if ($user->id !== auth()->user()->id)
                        <div class="mb-4">
                            <div class="bg- shadow-md rounded-md p-4">
                                <h5 class="text-lg font-semibold">{{ $user->name }}</h5>
                                <x-follow :user="$user" />
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
