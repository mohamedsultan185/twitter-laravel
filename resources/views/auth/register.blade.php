<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>
<body class="bg-black">
    <div class="container ">
        <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-md">
                <div class="bg-white p-8 shadow-md rounded-lg">
                    <div class="text-xl font-semibold mb-6">{{ __('Register') }}</div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <label for="name" class="col-span-1 text-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white col-span-1 form-input @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="username" class="col-span-1 text-right">{{ __('Username') }}</label>
                            <input id="username" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('username') border-red-500 @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="email" class="col-span-1 text-right">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="password" class="col-span-1 text-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="password-confirm" class="col-span-1 text-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="phone" class="col-span-1 text-right">{{ __('Phone Number') }}</label>
                            <input id="phone" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('phone') border-red-500 @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="birthday" class="col-span-1 text-right">{{ __('Birthday') }}</label>
                            <input id="birthday" type="date" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('birthday') border-red-500 @enderror" name="birthday" value="{{ old('birthday') }}" required>
                            @error('birthday')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
