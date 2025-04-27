@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <div class="bg-white shadow rounded-lg p-8">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Edit Role</h2>

        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm p-3 focus:border-blue-500 focus:ring focus:ring-blue-200"
                    placeholder="Enter role name" required>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-semibold mb-4">Assign Permissions</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                class="text-blue-600 focus:ring-blue-500 rounded"
                                @if(in_array($permission->id, $rolePermissions)) checked @endif>
                            <span class="text-gray-700">{{ ucwords(str_replace('-', ' ', $permission->name)) }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('roles.index') }}" class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-4 hover:bg-gray-300">Cancel</a>
                <button type="submit" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">Update Role</button>
            </div>
        </form>
    </div>
</div>
@endsection
