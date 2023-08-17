@props(['user'])
<div class="col-md-4 mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <form action="{{ route('approve.follow', $user) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Accept</button>
            </form>


        </div>
    </div>
</div>
