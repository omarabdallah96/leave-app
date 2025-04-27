@extends('layouts.app')

@section('title', 'Create Permission')

@section('content')
    <div class="max-w-3xl mx-auto py-8">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-6 text-center">Create Permission</h2>

        <form action="{{ route('permissions.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            @csrf

            <!-- Permission Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Permission Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-4 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Enter permission name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('permissions.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    Save Permission
                </button>
            </div>
        </form>
    </div>
@endsection
