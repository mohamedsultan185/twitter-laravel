@props(['tweet'])
<div class="flex flex-shrink-0 p-4 pb-0">

    <a href="#" class="flex-shrink-0 group block">
        <div class="flex items-center">
            <div>
                <img class="inline-block h-10 w-10 rounded-full" src="{{ $tweet->user->profile_url }}"
                    alt="{{ $tweet->user->name }}">
            </div>
            <div class="ml-3">
                <p class="text-base leading-6 font-medium text-white">
                    {{ $tweet->user->name }}
                    <span
                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        {{ '@' . $tweet->user->username }}
                    </span>
                    @if ($tweet->reply_to_tweet_id != null)
                        <p
                            class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                            {{ '@' . 'replayto' . $tweet->user->username }}
                        </p>
                    @endif
                    <span
                        class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">{{ $tweet->created_at->format('d M') }}</span>
            </div>
        </div>
    </a>
</div>

<div class="mx-10">
    <p class="text-base width-auto font-medium text-white flex-shrink">
        {!! preg_replace('/#(\w+)/', '', $tweet->content) !!}
        @foreach ($tweet->hashtags as $hashtag)
            <a class="text-blue-300" href="{{ route('hashtags.show', ['hashtag' => $hashtag->name]) }}">
                #{{ $hashtag->name }}
            </a>
        @endforeach
    </p>


    <div class="gap-4 grid h-100 w-100">
        @foreach ($tweet->photos as $photo)
            <div class="grid grid-cols-2 gap-4 h-100 w-100">
                <img class="inline-block " src="{{ asset('storage/tweet_images/' . $photo->image_path) }}"
                    alt="{{ $tweet->user->name }}">
            </div>
        @endforeach
        <br>
        @if ($tweet->quote_to_tweet_id != null)

            <div class="mb-6 ">
                <div
                    class="appearance-none bg-black border focus:outline-none focus:shadow-outline leading-tight px-2 py-1 rounded shadow text-gray-700 text-white w-full">
                    <div class="flex items-center">
                        <img src="{{ $tweet->user->profile_url }}" alt="User Image" class="h-12 w-12 rounded-full" />
                        <span class="px-3 py-2">{{ $tweet->user->name }}</span>
                    </div>
                    <div
                        class="appearance-none bg-black focus:outline-none focus:shadow-outline leading-tight px-3 py-2 rounded shadow text-gray-700 text-white pl-16 w-full">
                        {!! preg_replace('/#(\w+)/', '', $tweet->quotedTweet->content) !!}
                        @foreach ($tweet->hashtags as $hashtag)
                            <a class="text-blue-300"
                                href="{{ route('hashtags.show', ['hashtag' => $hashtag->name]) }}">
                                #{{ $hashtag->quotedTweet->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="gap-4 grid h-100 w-100">
                        @foreach ($tweet->quotedTweet->photos as $photo)
                            <div class="gap-4 grid grid-cols-2 h-100 m-2 w-100">
                                <img class="inline-block "
                                    src="{{ asset('storage/tweet_images/' . $photo->image_path) }}"
                                    alt="{{ $tweet->user->name }}">
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        @endif
    </div>

    <div class="flex items-center py-4">
        <div
            class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                class="flex items-center text-blue-500 hover:text-blue-700 focus:outline-none">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                    <g>
                        <path
                            d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                        </path>
                    </g>
                </svg>

            </button>

            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add Replay
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="defaultModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">@lang('Close modal')</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <p class="text-base leading-relaxed text-gray-800 dark:text-gray-400">
                            </p>
                            <!-- Comment textarea -->
                            <form action="{{ route('tweets.reply', $tweet->id) }}" method="POST">
                                @csrf
                                <textarea id="commentTextarea"
                                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-blue-300"
                                    placeholder="Add your comment... "name="reply_content"></textarea>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="defaultModal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                @lang('Replay')</button> </form>

                            <button data-modal-hide="defaultModal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">

            <button type="submit" class="flex retweet-button" data-tweet-id="{{ $tweet->id }}"
                style="color:{{ auth()->user()->retweets->contains($tweet->id)? 'green': 'white' }}"
                date-retweeted="{{ auth()->user()->retweets->contains($tweet->id)? 'true': 'false' }}">


                <svg viewBox="0 0 24 24" fill="currentColor" stroke-linecap="currentColor" class="w-5 h-5 mr-2">
                    <g>
                        <path
                            d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                        </path>
                    </g>
                </svg>
            </button>

            <span class="retweet-count">{{ $tweet->retweets->count() }}</span>
        </div> --}}

        <div class="flex-1 flex items-center text-white text-xs  transition duration-350 ease-in-out">

            <button data-modal-target="#popup-modal{{$tweet->id}}" data-modal-toggle="popup-modal" data-tweet-id="{{ $tweet->id }}"
                style="color:{{ auth()->user()->retweets->contains($tweet->id)? 'green': 'white' }}"
                date-retweeted="{{ auth()->user()->retweets->contains($tweet->id)? 'true': 'false' }}"
                class=" retweet-button block text-white  flex focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="submit">
                {{-- @dump($tweet->id) --}}

                <svg viewBox="0 0 24 24" fill="currentColor" stroke-linecap="currentColor" class="w-5 h-5 mr-2">
                    <g>
                        <path
                            d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                        </path>
                    </g>
                </svg>
                <span class="retweet-count">{{ $tweet->retweets->count() }}</span>

            </button>
            {{-- @dump($tweet->id) --}}

            <div id="popup-modal{{$tweet->id}}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="flex items-center justify-center max-h-full md:h-96 relative w-full">
                    <div class="relative bg-black rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">

                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">


                            {{-- retweet --}}

                            <button data-modal-hide="#popup-modal{{$tweet->id}}" data-tweet-id="{{ $tweet->id }}"
                style="color:{{ auth()->user()->retweets->contains($tweet->id)? 'green': 'white' }}"
                date-retweeted="{{ auth()->user()->retweets->contains($tweet->id)? 'true': 'false' }}"type="submit"
                                class=" retweet-button text-white inline-flex items-center px-5 py-2.5 text-center mr-2">
                                <svg viewBox="0 0 24 24" fill="currentColor" stroke-linecap="currentColor"
                                    class="w-5 h-5 mr-2">
                                    <g>
                                        <path
                                            d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                        </path>
                                    </g>
                                </svg>
                                <span class="text-2xl ">retweet</span>
                            </button>

                            {{-- Quote --}}
                            <a href="{{ route('tweets.toggleQuote', $tweet->id) }}"data-tweet-id="{{ $tweet->id }}"
                style="color:{{ auth()->user()->retweets->contains($tweet->id)? 'green': 'white' }}"
                date-retweeted="{{ auth()->user()->retweets->contains($tweet->id)? 'true': 'false' }}">
                                <div data-modal-hide="popup-modal" type="button"
                                class="text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                <svg viewBox="0 0 24 24" fill="currentColor" stroke-linecap="currentColor"
                                        class="w-5 h-5 mr-2">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path opacity="0.15" d="M4 20H8L18 10L14 6L4 16V20Z" fill="#000000">
                                            </path>
                                            <path d="M12 20H20.5M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        </g>
                                    </svg>

                                    {{-- @dump($tweet->id) --}}
                                    <span class="text-2xl ">Quote</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>



        </div>


        {{-- <a href="{{route('tweets.toggleQuote')}}">sdfagasdgadf
</a> --}}

        <div
            class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
            <button class="flex like-button" data-tweet-id="{{ $tweet->id }}"
                style="color: {{ auth()->user()->likedTweets->contains($tweet->id)? 'red': 'white' }}"
                data-liked="{{ auth()->user()->likedTweets->contains($tweet->id)? 'true': 'false' }}">

                <svg viewBox="0 0 24 24" fill="currentColor" stroke-linecap="currentColor" class="w-5 h-5 mr-2">
                    <g>
                        <path
                            d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">

                        </path>

                    </g>
                </svg>

            </button>
            <span class="like-count">{{ $tweet->likes->count() }}</span>
        </div>
        <hr class="border-gray-600">

        <div
            class="flex-1 flex items-center text-white text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                <g>
                    <path
                        d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z">
                    </path>
                    <path
                        d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z">
                    </path>
                </g>
            </svg>
        </div>
    </div>
    <hr class="border-gray-600">
</div>
