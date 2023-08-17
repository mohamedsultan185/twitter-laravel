@include('includes.header')
 {{-- @dd($follower->) --}}
<div class="container mt-5">
    <h1>Approve Follow Request</h1>
    <p>You have a follow request from {{ $follower->name }}.</p>
    <form action="{{ route('approve.follow', $follower) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Approve</button>
    </form>
</div>

@include('includes.script')
