@props(['user', 'tmp'])
@if (auth()->user()->isFollowing($user) || auth()->user()->isPending($user))
<form action="{{ route('users.unfollow', $user) }}" method="POST">
    @csrf

    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
       {{auth()->user()->isPending($user) ? 'pending' : 'Unfollow'}}

    </button>
</form>


@else
<form action="{{ route('users.follow', $user) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-sm btn-primary">Follow</button>
</form>
@endif
