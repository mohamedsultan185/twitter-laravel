@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Update Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">

        </div>
        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        @error('image' )

        @enderror
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
