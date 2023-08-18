    @include('includes.header')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ Auth::user()->getProfileUrlAttribute() }}" class="card-img-top" alt="Profile Picture">
                    <div class="card-body">
                        <h5 class="card-title">{{Auth::user()->name }}</h5>
                        <p class="card-text">
                            Username: {{ Auth::user()->username }}<br>
                            Email :{{ Auth::user()->email }}
                        </p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Update Profile</a>
                        <a class="btn btn-primary" href="{{ route('tweets.index') }}">Home</a>
                    </div>
                </div>
                <h1>All Users</h1>
                @if ($users)
                    @foreach ($users as $user)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <x-follow :user="$user"/>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>Profile</h1>
                        <i class="fas fa-magic"></i>
                        <form action="{{ route('tweets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="What's happening?"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary image-button"><i
                                            class="far fa-image"></i></button>
                                    <input type="file" class="d-none" id="imageInput" name="image"
                                        accept="image/*">
                                </div>
                                <button class="btn btn-primary" type="submit">Tweet</button>
                                </a>
                            </div>
                        </form>


                    </div>

                </div>
                <br>

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('tweets.index') }}">Home</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.like')}}">Likes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Retweets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('followed')}}">Followed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('followers')}}">Followers</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <br><br>

                @foreach ($tweets->sortByDesc('created_at') as $tweet)
                    <div class="tweets">
                        <div class="user-pics">
                            <img src="{{ $tweet->user->profile_url }}" alt="{{ $tweet->user->name }}" width="50"
                                height="50">
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
                                    <img src="{{ asset('tweet_images/' . $tweet->image) }}" alt="Tweet Image"
                                        width="600" height="800">
                                @endif
                            </div>


                            <div class="content-icons">
                                <form action="{{ route('tweets.toggleLike', $tweet) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="like-button">
                                        @if (auth()->user()->likedTweets->contains($tweet->id))
                                            <i
                                                class="fas fa-heart red"></i>{{ auth()->user()->likedTweets->contains($tweet->id) }}
                                        @else
                                            <i
                                                class="far fa-heart"></i>{{ auth()->user()->likedTweets->contains($tweet->id) }}
                                        @endif
                                    </button>
                                </form>
                                <form action="{{ route('tweets.toggleRetweet', $tweet) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="retweet-button">
                                        @if (auth()->user()->retweetedTweets->contains($tweet->id))
                                            <i class="fas fa-retweet green"></i>{{ $tweet->retweets->count() }}
                                        @else
                                            <i class="fas fa-retweet green"></i>{{ $tweet->retweets->count() }}
                                        @endif
                                    </button>
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
            @include('includes.script');
