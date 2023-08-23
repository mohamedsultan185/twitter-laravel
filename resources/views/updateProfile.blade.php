@extends('layouts.app')
@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-semibold font-bold mb-4">Update Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium dark:text-white">Name</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-4">
            <label for="username" class="block font-medium dark:text-white">Username</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="username" name="username" value="{{ $user->username }}">
        </div>
         <div class="mb-4">
            <label for="password" class="block font-medium dark:text-white">Password</label>
            <input type="password" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="password" name="password">
        </div>
        <div class="mb-4">
            <label for="confarm-password" class="block font-medium dark:text-white">Confarm Password</label>
            <input type="password" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="cofarmpassword" name="confarmpassword" >
        </div>
        <div class="mb-4">
            <label for="phone" class="block font-medium dark:text-white">Phone</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="phone" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="mb-4">
            <label for="birthday" class="block font-medium dark:text-white">Birthday</label>
            <input type="date" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="birthday" name="birthday" value="{{ $user->birthday }}">
        </div>
        
        <div class="w-64 px-2">
                <div class="flex items-center">
                    <!-- Upload Image -->
                    <div class="flex-1 text-center px-1 py-1 m-2">
                        <label for="imageInput" class="mt-1 group flex items-center text-blue-400 px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300 cursor-pointer">
                            <input type="file" class="hidden" id="imageInput" name="image" accept="image/*">
                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </label>
                    </div>

                </div>
            </div>
        @error('image')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md dark:bg-blue-800">Update Profile</button>
    </form>
</div>
<br><br><br><br>
@endsection
