<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

</head>
<h1 class="mb-4 text-xl font-semibold">Users</h1>
<div class="my-8 space-y-4">
    @forelse ($users as $user)
        <div class="flex items-center space-x-4">
            <img src="{{ $user->getProfileUrlAttribute() }}" alt="{{ $user->name }}'s profile" class="w-20 h-20 rounded-full">
            <div>
                <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
                <form action="{{ route('approve.follow', $user) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-full">
                        Accept
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p>No users found.</p>
    @endforelse
</div>

</body>
</html>
