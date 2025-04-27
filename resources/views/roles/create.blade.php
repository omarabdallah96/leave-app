@extends('layouts.app')

@section('title', 'Create Role')

@section('content')
    <div class="max-w-5xl mx-auto py-12 px-6">
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-10">
            <h2 class="text-4xl font-extrabold mb-10 text-gray-800 dark:text-gray-100 text-center">Create New Role</h2>

            <form method="POST" action="{{ route('roles.store') }}" class="space-y-8">
                @csrf

                <!-- Role Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Role Name</label>
                    <input type="text" name="name" id="name" autocomplete="off"
                        class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror dark:border-gray-600 rounded-lg shadow-sm p-4 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white"
                        placeholder="Enter role name" value="{{ old('name') }}" required>

                    @error('name')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Permissions -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">Assign Permissions</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    @if(in_array($permission->id, old('permissions', []))) checked @endif>
                                <span
                                    class="ml-3 text-gray-700 dark:text-gray-200 capitalize">{{ str_replace('-', ' ', $permission->name) }}</span>
                            </div>
                        @endforeach
                    </div>

                    @error('permissions')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4 mt-8 p-4">
                    <a href="{{ route('roles.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                        Save Role
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
