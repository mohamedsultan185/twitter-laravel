@include('includes.header')
@include('includes.bar')

@include('includes.addTweet')

@foreach ($tweets as $tweet)
    <div class="tweets">
        <div class="user-pics">
            <img src="{{ $tweet->user->profile_url }}" alt="{{ $tweet->user->name }}" width="50" height="50">
        </div>
        <div class="user-content-box">
            <div class="user-names">
                <h1 class="full-name">{{ $tweet->user->name }}</h1>
                <p class="user-name">{{ '@' . $tweet->user->username }}</p>
                <p class="time">{{ $tweet->created_at->diffForHumans() }}</p>
            </div>

            <div class="user-content">
                <p>{{ $tweet->content }}</p>
                @if ($tweet->image)
                    <img src="{{ asset('tweet_images/' . $tweet->image) }}" alt="Tweet Image" width="600" height="800">
                @endif
            </div>

            <div class="content-icons">
                <form action="{{ route('tweets.toggleLike', $tweet) }}" method="POST">
                    @csrf
                    <button type="submit" class="like-button">
                        @if (auth()->user()->likedTweets->contains($tweet->id))
                            <i class="fas fa-heart red"></i>
                        @else
                            <i class="far fa-heart"></i>
                        @endif
                    </button>
                </form>
                <form action="{{ route('tweets.toggleRetweet', $tweet) }}" method="POST">
                    @csrf
                    <button type="submit" class="retweet-button">
                        @if (auth()->user()->retweetedTweets->contains($tweet->id))
                            <i class="fas fa-retweet green"></i> {{ $tweet->retweets->count() }}
                        @else
                            <i class="fas fa-retweet green"></i> {{ $tweet->retweets->count() }}
                        @endif
                    </button>
                </form>

                <!-- Reply button for this tweet -->
                <form action="{{ route('tweets.reply', $tweet) }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @foreach ($tweet->replies as $reply)
                        <div class="reply">
                            <p>{{ $reply->content }}</p>
                        </div>
                    @endforeach

                    <!-- Reply form (hidden by default) -->
                    <div class="reply-form" id="reply-form-{{ $tweet->id }}">
                        <form action="{{ route('tweets.reply', $tweet) }}" method="POST">
                            @csrf
                            <textarea name="reply_content" class="form-control" placeholder="Your reply"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Reply</button>
                        </form>
                    </div>
                @endforeach

<div class="pagnation">
    <a href="#">Load more</a>
</div>

</div>

@include('includes.rightBar')
@include('includes.script')
