@extends('layouts.app')

@section('content')
<div class="max-w-full mx-auto sm:px-6 lg:px-8 py-10 mt-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Leave Types Management</h2>
        <a href="{{ route('leave-types.create') }}"
           class="inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 dark:hover:bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm transition">
            + Add Leave Type
        </a>
    </div>

    <div class="overflow-x-auto">
        <div class="min-w-full bg-white dark:bg-gray-900 shadow-md rounded-lg overflow-hidden h-full">
            <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700 h-full">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Leave Type Name
                        </th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-200 text-sm">
                    @forelse ($leaveTypes as $index => $leaveType)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold">{{ $leaveType->name }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center space-x-3">
                                    <a href="{{ route('leave-types.edit', $leaveType) }}"
                                       class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-semibold rounded-md transition">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('leave-types.destroy', $leaveType) }}" onsubmit="return confirm('Are you sure you want to delete this leave type?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-md transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                No leave types found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
