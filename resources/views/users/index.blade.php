@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">User Management</h1>

        <a href="{{ route('users.create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-blue-700 dark:hover:bg-blue-500 transition">
            + Create User
        </a>

        <div class="overflow-x-auto bg-white dark:bg-gray-900 shadow-md rounded-lg">
            <table class="table-auto w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">#</th>
                        <th class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">Name</th>
                        <th class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">Email</th>
                        <th class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">Role</th>
                        <th class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">{{ $user->id }}</td>
                            <td class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">{{ $user->name }}</td>
                            <td class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">{{ $user->email }}</td>
                            <td class="py-4 px-6 border-b border-gray-200 dark:border-gray-700">
                                {{ $user->roles->pluck('name')->implode(', ') ?? 'No Role' }}
                            </td>
                            <td class="py-4 px-6 border-b border-gray-200 dark:border-gray-700 space-x-4">
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="text-yellow-500 hover:text-yellow-400 font-semibold transition">Edit</a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-400 font-semibold transition"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
