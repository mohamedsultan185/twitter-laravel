@include('includes.header')
<div class="container mt-5">
    <h1 class="mb-4"> Users</h1>
    @if ($users)
        <div class="row">
            @foreach ($users as $user)
                @if ($user->id !== auth()->user()->id)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <x-follow :user="$user"/>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@include('includes.script')
