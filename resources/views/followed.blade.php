@foreach ($following as $follower)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $follower->name }}</h5>
        </div>
    </div>
@endforeach
