@include('includes.header')
<div class="container mt-5">
    <h1 class="mb-4"> Users</h1>
{{-- @dd($users) --}}
    @if ($users)
        <div class="row">
            @foreach ($users as $user)

            <x-accepted :user="$user"/>
            @endforeach
        </div>
    @endif
</div>
@include('includes.script')
