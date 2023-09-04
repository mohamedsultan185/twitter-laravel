<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>
<body class="bg-white">
    <div class="container ">
        <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-md">
                <div class="bg-black p-8 shadow-md rounded-lg">
                     <svg viewBox="0 0 24 24" class=" h-12 w-12 text-white" fill="currentColor">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>
                    <div class="text-white text-2xl font-semibold mb-6">{{ __('Register') }}</div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <label for="name" class="col-span-1 text-right dark:text-white">{{ __('Name') }}</label>
                            <input id="name" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white col-span-1 form-input @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                            @error('name')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="username" class="col-span-1 text-right dark:text-white">{{ __('Username') }}</label>
                            <input id="username" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white  @error('username') border-red-500 @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="email" class="col-span-1 text-right dark:text-white">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white  @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="password" class="col-span-1 text-right dark:text-white">{{ __('Password') }}</label>
                            <input id="password" type="password" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white  @error('password') border-red-500 @enderror" name="password" value="required " autocomplete="new-password">
                            @error('password')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="password-confirm" class="col-span-1 text-right dark:text-white">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="border rounded-md px-2 py-1 dark:bg-gray-800 dark:text-white " name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="phone" class="col-span-1 text-right dark:text-white">{{ __('Phone Number') }}</label>
                            <input id="phone" type="text" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('phone') border-red-500 @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
                                <p class="col-span-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label for="birthday" class="col-span-1 text-right dark:text-white">{{ __('Birthday') }}</label>
                            <input id="birthday" type="date" class="border rounded-md px-2 py-1 w-full dark:bg-gray-800 dark:text-white @error('birthday') border-red-500  @enderror" name="birthday" value="{{ old('birthday') }}" required>
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
