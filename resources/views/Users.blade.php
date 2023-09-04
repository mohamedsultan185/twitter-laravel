@extends('layouts.app')

@section('content')
@if ($users)
<h2 class="text-4xl font-semibold dark:text-white">All User</h2>
<div class="flex space-y-4 flex-col">
    @foreach ($users as $user)

     <x-follow :user="$user"/>

    @endforeach
</div>
@endif

@endsection


@section('follow')

    @if ($users)
        @foreach ($users as $user)
            <x-follow :user="$user" />
        @endforeach
    @endif
@endsection

