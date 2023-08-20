<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>
<body class="bg-white dark:bg-gray-900 text-black dark:text-white">

<div class="container mx-auto">
    <h1 class="text-2xl font-semibold font-bold mb-4">Update Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium">Name</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-4">
            <label for="username" class="block font-medium">Username</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="username" name="username" value="{{ $user->username }}">
        </div>
        <div class="mb-4">
            <label for="phone" class="block font-medium">Phone</label>
            <input type="text" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="phone" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="mb-4">
            <label for="birthday" class="block font-medium">Birthday</label>
            <input type="date" class="border rounded-md px-3 py-2 w-full dark:bg-gray-800 dark:text-white" id="birthday" name="birthday" value="{{ $user->birthday }}">
        </div>
        <div class="mb-4">
            <label for="image" class="block font-medium">Profile Image</label>
            <input type="file" class="py-2 dark:bg-gray-800 dark:text-white" id="image" name="image">
        </div>
        @error('image')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md dark:bg-blue-800">Update Profile</button>
    </form>
</div>
</body>
</html>
