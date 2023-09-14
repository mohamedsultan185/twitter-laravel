<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Quote Tweeter</title>
</head>

<body class="bg-gray-800">
    <div class="h-screen flex items-center justify-center">
      <form action="{{ route('tweets.quote', $tweet->id) }}" method="POST" enctype="multipart/form-data" class="bg-black shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 w-3/5">
    @csrf
    <div class="mb-4 relative">
        <div class="flex items-center">
            <img src="{{ $tweet->user->profile_url }}" alt="User Image" class="h-12 w-12 rounded-full" />
            <span class="px-3 py-2 text-white">{{ $tweet->user->name }}</span>
        </div>
        <br>
        <textarea name="quote_content" id="quote_content" class="appearance-none bg-black border focus:outline-none focus:shadow-outline leading-tight px-3 py-2 rounded shadow text-gray-700 text-white w-full" placeholder="Add a comment..."></textarea>
        @error('quote_content')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div class="flex-1 text-center px-1 py-1 m-2">
            <label for="imageInput" class="mt-1 group flex items-center text-blue-400 ...">
                <input type="file" id="imageInput" name="images[]" accept="image/*" multiple class="hidden">
                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </label>
        </div>
    </div>

    <div class="mb-6 w-1/2">
        <div class="appearance-none bg-black border focus:outline-none focus:shadow-outline leading-tight px-2 py-1 rounded shadow text-gray-700 text-white w-full">
            <div class="flex items-center">
                <img src="{{ $tweet->user->profile_url }}" alt="User Image" class="h-12 w-12 rounded-full" />
                <span class="px-3 py-2">{{ $tweet->user->name }}</span>
            </div>
            <div class="appearance-none bg-black focus:outline-none focus:shadow-outline leading-tight px-3 py-2 rounded shadow text-gray-700 text-white pl-16 w-full">
                  {!! preg_replace('/#(\w+)/', '', $tweet->content) !!}
        @foreach ($tweet->hashtags as $hashtag)
            <a class="text-blue-300" href="{{ route('hashtags.show', ['hashtag' => $hashtag->name]) }}">
                #{{ $hashtag->name }}
            </a>
        @endforeach
            </div>
             <div class="grid grid-cols-2 gap-4 h-100 w-100">
        @foreach ($tweet->photos as $photo)
            <div class="grid grid-cols-2 gap-4 h-100 w-100">
                <img class="inline-block " src="{{ asset('storage/tweet_images/' . $photo->image_path) }}"
                    alt="{{ $tweet->user->name }}">
            </div>
        @endforeach

    </div>

        </div>
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Repost</button>
    </div>
</form>

    </div>

</body>

</html>
