@extends('layouts.app')
@section('content')
<br>
    <h1 class="text-2xl font-semibold font-bold mb-4 dark:text-white">User Requset</h1>
    <div class="flex space-y-4 flex-col">
        @foreach ($users as $user)
            <x-accepted :user="$user" />
        @endforeach
    </div>
<br>
@endsection
