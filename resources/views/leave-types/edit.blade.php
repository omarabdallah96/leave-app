@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Edit Leave Type</h2>
        <a href="{{ route('leave-types.index') }}"
           class="inline-flex items-center px-5 py-2 bg-gray-600 hover:bg-gray-700 dark:hover:bg-gray-500 text-white text-sm font-medium rounded-lg shadow-sm transition">
            Back to Leave Types
        </a>
    </div>

    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900 shadow-md rounded-lg overflow-hidden">
        <form action="{{ route('leave-types.update', $leaveType) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="px-6 py-8 space-y-6">
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Leave Type Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $leaveType->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-200" required>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('leave-types.index') }}" class="inline-flex items-center px-5 py-2 bg-gray-600 hover:bg-gray-700 dark:hover:bg-gray-500 text-white text-sm font-medium rounded-lg shadow-sm transition">
                        Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 dark:hover:bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm transition">
                        Update Leave Type
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
