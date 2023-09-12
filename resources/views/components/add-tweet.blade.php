<div class="">
    <!--middle wall-->
    <div class="flex justify-between">
        <div class="flex m-2.5">
            <div>

                <h2 class="px-4 py-2 text-xl font-semibold text-white">Home</h2>
            </div>
        </div>
        <div class="flex m-2.5">

            <div class="flex m-2 bg-gray-800">
                <button id="states-button" data-dropdown-toggle="dropdown-states"
                    class=" bg-gray-800 flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                    type="button">

                    <span class="font-bold text-white">langouges</span>
                </button>
                <div id="dropdown-states"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
                        <li>
                            <button type="button"
                                class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">

                                <a href="{{ route('changeLang', 'en') }}" class="inline-flex items-center">
                                    <span class="fi fi-us fis"></span>

                                    English
                                </a>
                            </button>
                        </li>
                        <li>
                            <button type="button"
                                class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="{{ route('changeLang', 'ar') }}" class="inline-flex items-center">
                                    <span class="fi fi-eg fis"></span>Arabice
                                </a>
                            </button>
                        </li>


                    </ul>
                </div>

            </div>

        </div>
    </div>

    <hr class="border-gray-600">
    <!-- middle create tweet -->
    <div class="flex">
        <div class="m-2 w-10 py-1">

            <img class="inline-block h-10 w-10 rounded-full"
                src="{{ asset('profile_images/' .Auth::user()->photos()->where('type', 'profile')->value('image_path')) }}"
                alt="{{ Auth::user()->name }}">
        </div>
        <div class="flex-1 px-2 pt-2 mt-2">
            <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea class="bg-transparent text-gray-400 font-medium text-lg w-full" name="content" rows="2" cols="50"
                    placeholder="What's happening?"></textarea>
                @error('content')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
        </div>
    </div>
    <!-- middle create tweet below icons -->
    <div class="flex">
        <div class="w-10"></div>
        <div class="w-64 px-2">
            <div class="flex items-center">
                <!-- Upload Image -->
                <div class="flex-1 text-center px-1 py-1 m-2">
                    <label for="imageInput" class="mt-1 group flex items-center text-blue-400 ...">
                        <input type="file" class="hidden" id="imageInput" name="images[]" accept="image/*" multiple>
                        @error('images')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </label>
                </div>

            </div>
        </div>
        <div class="flex-1">
            <button
                class="bg-blue-400 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right">
                Tweet
            </button>
            </form>
        </div>
    </div>
</div>
