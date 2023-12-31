@props(['hashtags'])
 @foreach ($hashtags as $hashtag)
<div class="flex">
            <div class="flex-1">
                <p class="px-4 ml-2 mt-3 w-48 text-xs text-gray-400"></p>
                <h2 class="px-4 ml-2 w-48 font-bold text-white"> <a href="{{ route('hashtags.show', ['hashtag' => $hashtag->name]) }}">
    #{{ $hashtag->name }}</a>
        </h2>
                <p class="px-4 ml-2 mb-3 w-48 text-xs text-gray-400">({{ $hashtag->tweets_count }})
                    @lang("Tweets")</p>

            </div>

            <div class="flex-1 px-4 py-2 m-2">
                <a href=""
                    class=" text-2xl rounded-full text-gray-400 hover:bg-blue-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
            </div>

        </div>
    @endforeach
