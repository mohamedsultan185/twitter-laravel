<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    @vite('/node_modules/flag-icons/css/flag-icons.min.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>

    <div class="bg-gray-800 ">
        <hr class="border-gray-600">


        <div class="flex">

            <div class="w-2/5 text-white h-12 pl-32 py-4 h-auto">
                <!--left menu-->
                <svg viewBox="0 0 24 24" class="h-12 w-12 text-white" fill="currentColor">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>
                <br>

                <x-nav-item :route="route('tweets.index')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('HOME')
                </x-nav-item>


                <x-nav-item :route="route('profile.show')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Profile')

                </x-nav-item>



                <x-nav-item :route="route('approve.followRequest')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 3.464V1.1m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C17 15.4 17 16 16.462 16H3.538C3 16 3 15.4 3 14.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 10 3.464ZM4 3 3 2M2 7H1m15-4 1-1m1 5h1M6.54 16a3.48 3.48 0 0 0 6.92 0H6.54Z">
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Follow Request')
                </x-nav-item>

                <x-nav-item :route="route('approve.followRequest')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Explore')
                </x-nav-item> <!-- Button to trigger the modal -->
                <button id="openModalButton" class="rounded-full hover:bg-blue-800 hover:text-blue-300"
                    data-modal-target="staticModal" data-modal-toggle="staticModal" type="button">
                    <a
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-blue-800 hover:text-blue-300">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 3.464V1.1m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C17 15.4 17 16 16.462 16H3.538C3 16 3 15.4 3 14.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 10 3.464ZM4 3 3 2M2 7H1m15-4 1-1m1 5h1M6.54 16a3.48 3.48 0 0 0 6.92 0H6.54Z">
                            </g>
                        </svg>
                    @lang('Notification')

                    </a>
                </button>

                <!-- Main modal -->
                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Notification</h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="staticModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <!-- SVG path for a close icon -->
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="bg-[#050708] p-6 space-y-6">
                                <div id="notifications-content">
                                    <!-- Notification content will be inserted here using JavaScript -->
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="staticModal" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    accept
                                </button>
                                <button data-modal-hide="staticModal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




                <x-nav-item :route="route('approve.followRequest')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Massages')

                </x-nav-item>

                <x-nav-item :route="route('approve.followRequest')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Book Marks')

                </x-nav-item>

                <x-nav-item :route="route('approve.followRequest')">
                    <x-slot name="icon">
                        <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </g>
                        </svg>
                    </x-slot>
                    @lang('Lists')

                </x-nav-item>
                <a href="">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-blue-800 hover:text-blue-300">
                        @csrf
                        <x-nav-item :route="route('logout')">
                            <x-slot name="icon">
                                <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <g>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                                    </g>
                                </svg>
                                <button type="submit">
                                 @lang('Logout')


                                </button>

                            </x-slot>
                        </x-nav-item>
                    </form>

                    <x-nav-item :route="route('approve.followRequest')">
                        <x-slot name="icon">
                            <svg class="mr-4 h-6 w-6 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <g>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </g>
                            </svg>
                        </x-slot>
                    @lang('More')

                    </x-nav-item>

                    <a href="{{ route('tweets.index') }}">
                        <button
                            class="bg-blue-400 w-48 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                            @lang("Tweet")
                        </button></a>

                    <div class="flex-shrink-0 flex hover:bg-blue-00 rounded-full p-4 mt-12 mr-2">
                        <a href="#" class="flex-shrink-0 group block">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ asset('profile_images/' .Auth::user()->photos()->where('type', 'profile')->value('image_path')) }}"
                                        alt="{{ Auth::user()->name }}">
                                </div>
                                <div class="ml-3">
                                    <a href="{{ route('profile.show') }}">
                                        <p class="text-base leading-6 font-medium text-white">
                                            {{ Auth::user()->name }}
                                        </p>
                                        <p
                                            class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                            {{ '@' . Auth::user()->username }}

                                        </p>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>


            </div>
            <div class="w-3/5 border border-gray-600 h-auto  border-t-0">
                @yield('content')
            </div>
            <div class="w-2/5 h-12">
                <!--right menu-->

                <div class="relative text-gray-300 w-80 p-5 pb-0 mr-16">
                    <button type="submit" class="absolute ml-4 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                            y="0px" viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                            height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>

                    <input type="search" name="search" placeholder="Search Twitter"
                        class="bg-blue-800 h-10 px-10 pr-5 w-full rounded-full text-sm focus:outline-none bg-purple-white shadow rounded border-0">

                </div>



                <!--second-trending tweet section-->
                <div class="max-w-sm rounded-lg shadow-md overflow-hidden mx-auto my-7">

                    <div class="flex">
                        <div class="flex-1 m-2">
                            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">@lang("Egyption trends")</h2>
                        </div>
                        <div class="flex-1 px-4 py-2 m-2">
                            <a href=""
                                class=" text-2xl rounded-full text-white hover:bg-blue-800 hover:text-blue-300 float-right">
                                <svg class="m-2 h-6 w-6" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>



                    <!--first trending tweet-->
                    @yield('hashtag')
                    <x-hashtag :hashtags="$hashtags" />



                    <!--second trending tweet-->


                    <!--show more-->

                    <div class="flex">
                        <a href="{{ route('all.users') }}">
                            <div class="flex-1 p-4">
                                <h2 class="px-4 ml-2 w-48 font-bold text-blue-400">@lang("Show more")</h2>
                            </div>
                        </a>
                    </div>

                </div>


                <!--third-people suggetion to follow section-->

                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg m-4 mr-20">
                    <div class="flex">
                        <div class="flex-1 m-2">
                            <h2 class="px-4 py-2 text-xl w-48 font-semibold text-white">@lang("Who to follow")</h2>
                        </div>
                    </div>



                    <hr class="border-gray-600">


                    <!--first person who to follow-->


                    @yield('follow')
                    <hr class="border-gray-600">



                    <!--show more-->

                    <div class="flex">
                        <a href="{{ route('all.users') }}">
                            <div class="flex-1 p-4">
                                <h2 class="px-4 ml-2 w-48 font-bold text-blue-400"><a href="">@lang("Show more")</a>
                                </h2>
                            </div>
                        </a>
                    </div>

                </div>


            </div>

        </div>
        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br>
        <br><br>
        <br>




    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script>
        $(document).ready(function() {

            $('#openModalButton').click(function() {
                console.log('Button clicked.');

                $.ajax({
                    url: '{{ route('notifications.index') }}',
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var notifications = response.notifications;
                        var notificationsContent = $('#notifications-content');

                        notificationsContent.empty();

                        if (notifications.length === 0) {
                            console.log(
                                'No notifications found.'
                            ); // Add a log statement for no notifications.
                            notificationsContent.html('<p>No notifications</p>');
                        } else {
                            console.log(
                                notifications
                            ); // Add a log statement for displaying notifications.
                            $.each(notifications, function(index, notifications) {
                                if (notifications.data.type == 'tweet') {
                                    var notificationHtml =
                                        '<div class="notification">' +
                                        '<p> ' + notifications.data.message +
                                        notifications.data.tweet_content + '</p>' +
                                        '<br>'

                                    '</div>';
                                    notificationsContent.append(notificationHtml);
                                }
                                if (notifications.data.type == 'like') {
                                    var notificationHtml =
                                        '<div class="notification">' +
                                        '<p> ' + notifications.data.user_name + ' ' +
                                        notifications.data.message + '</p>' +
                                        '<br>'

                                    '</div>';
                                    notificationsContent.append(notificationHtml);
                                }
                                if (notifications.data.type == 'retweet') {
                                    var notificationHtml =
                                        '<div class="notification">' +
                                        '<p> ' + notifications.data.user_name + '' +
                                        notifications.data.message + '</p>' +
                                        '<br>'

                                    '</div>';
                                    notificationsContent.append(notificationHtml);
                                }
                            });
                        }

                        $('#staticModal').modal('show');
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });

        function openModal() {
            const modal = document.getElementById("defaultModal");
            modal.classList.remove("hidden");
            modal.setAttribute("aria-hidden", "false");
            modal.style.overflowY = "auto";
            document.body.classList.add("modal-open");
        }

        function closeModal() {
            const modal = document.getElementById("defaultModal");
            modal.classList.add("hidden");
            modal.setAttribute("aria-hidden", "true");
            modal.style.overflowY = "hidden";
            document.body.classList.remove("modal-open");
        }

        const openButton = document.querySelector("[data-modal-toggle='defaultModal']");
        openButton.addEventListener("click", openModal);

        const closeButton = document.querySelector("[data-modal-hide='defaultModal']");
        closeButton.addEventListener("click", closeModal);


        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCA95ibEvzR3H1I2_Kob3eyAR9-YTirvaA",
            authDomain: "twitter-ff353.firebaseapp.com",
            projectId: "twitter-ff353",
            storageBucket: "twitter-ff353.appspot.com",
            messagingSenderId: "773375455379",
            appId: "1:773375455379:web:a37c083c1ff35e17ac9d66",
            measurementId: "G-TR36B87D1Y"

        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging.requestPermission().then(function() {
                return messaging.getToken()
            }).then(function(token) {

                // TODO TO AJAX

                axios.post("{{ route('fcmToken') }}", {
                    _method: "POST",
                    token
                }).then(({
                    data
                }) => {
                    console.log(data)
                }).catch(({
                    response: {
                        data
                    }
                }) => {
                    console.error(data)
                })

            }).catch(function(err) {
                console.log(`Token Error :: ${err}`);
                console.log('sdfsdfs');
            });
        }

        initFirebaseMessagingRegistration();

        messaging.onMessage(function(payload) {
            new Notification(payload.notification.title, {

                body: payload.notification.body,
                icon: payload.notification.icon,
            })
        });
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });

        //like
       $(document).ready(function() {
    $('.like-button').on('click', function(e) {
        e.preventDefault();
        const tweetId = $(this).data('tweet-id');
        const isLiked = $(this).data('liked') == true;
        const button = $(this);

        $.ajax({
            url: `/tweets/${tweetId}/like`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                if (isLiked) {
                    button.css('color', 'white');
                } else {
                    button.css('color', 'red');
                }
                button.parent().find('.like-count').text(response.likeCount);

                button.data('liked', !isLiked);
            },
            error: function(error) {
                console.error(error);
            },
        });
    });
});

//retweet
 $(document).ready(function() {
    $('.retweet-button').on('click', function(e) {
        e.preventDefault();
        const tweetId = $(this).data('tweet-id');
        const isretweeted= $(this).data('retweeted') == true;
        const button = $(this);

        $.ajax({
            url: `/tweets/${tweetId}/retweet`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
            console.log(isretweeted);
                if (isretweeted) {
                    button.css('color', 'white');
                } else {
                    button.css('color', 'green');
                }
                button.parent().find('.retweet-count').text(response.retweetCount);

                button.data('retweet', !isretweeted);
            },
            error: function(error) {
                console.error(error);
            },
        });
    });
});

    </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function openModal(modalId) {
            $(modalId).removeClass('hidden');
        }

        $('[data-modal-toggle]').on('click', function () {
            var modalTarget = $(this).data('modal-target');
            openModal(modalTarget);
        });

        $('[data-modal-hide]').on('click', function () {
            var modalTarget = $(this).data('modal-hide');
            $(modalTarget).addClass('hidden');
        });
    });
</script>
</body>

</html>
