<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
