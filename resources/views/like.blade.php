<h1>User like</h1>
<h1>Liked Tweets by {{ $user->name }}</h1>
    @foreach ($tweets as $tweet)
        <div class="tweet">
            <p>{{ $tweet->content }}</p>
        </div>
    @endforeach
