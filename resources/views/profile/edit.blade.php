<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Edit Profile</h1>

    <!-- Success Message -->
    @if (session('status') === 'profile-updated')
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded-md">
            Profile updated successfully.
        </div>
    @endif

    <!-- Profile Update Form -->
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" id="name" name="name" class="w-full p-3 rounded-md" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" name="email" class="w-full p-3 rounded-md" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">Update Profile</button>
    </form>
</div>
@endsection
