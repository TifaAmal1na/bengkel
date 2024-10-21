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

        <!-- Name field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password field (optional) -->
        <div class="form-group">
            <label for="password">New Password (optional)</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
