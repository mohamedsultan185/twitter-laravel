    <div class="">
        <!--middle wall-->

        <div class="flex">
            <div class="flex-1 m-2">
                <h2 class="px-4 py-2 text-xl font-semibold text-white">Home</h2>
            </div>
            <div class="flex-1 px-4 py-2 m-2">
                <a href=""
                    class=" text-2xl font-medium rounded-full text-white hover:bg-blue-800 hover:text-blue-300 float-right">
                    <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <g>
                            <path
                                d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z">
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>

        <hr class="border-gray-600">
        <!-- middle create tweet -->
        <div class="flex">
            <div class="m-2 w-10 py-1">

                <img class="inline-block h-10 w-10 rounded-full" src="{{ Auth::user()->profile_url }}"
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
                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
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
