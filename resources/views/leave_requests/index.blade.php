@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
            {{-- if user is asdmin show this --}}
            {{-- else show this --}}
            @if (!auth()->user()->hasRole('Admin'))
                My Leave Requests
            @else
                Leave Requests
            @endif
        </h1>

        @can('create leave_request')
            <a href="{{ route('leave-requests.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md mb-4 inline-block hover:bg-blue-700 transition-all duration-200">
                Create Leave Request
            </a>
        @endcan

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <table class="table-auto w-full text-sm text-left text-gray-700 dark:text-gray-200">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b">#</th>
                        <th class="py-3 px-4 border-b">Employee</th>
                        <th class="py-3 px-4 border-b">Start Date</th>
                        <th class="py-3 px-4 border-b">End Date</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaveRequests as $leave)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-3 px-4 border-b">{{ $leave->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $leave->user->name }}</td>
                            <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($leave->start_date)->format('M d, Y') }}
                            </td>
                            <td class="py-3 px-4 border-b">{{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                            </td>
                            <td class="py-3 px-4 border-b">
                                <span
                                    class="px-2 py-1 rounded-md
                                    @if ($leave->status == 'Approved') bg-green-100 text-green-800
                                    @elseif($leave->status == 'Pending') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ $leave->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b">
                                @can('edit leave_request')
                                    <a href="{{ route('leave-requests.edit', $leave) }}"
                                        class="text-yellow-500 hover:text-yellow-700 font-semibold">Edit</a>
                                @endcan

                                @can('delete leave_request')
                                    <form action="{{ route('leave-requests.destroy', $leave) }}" method="POST"
                                        class="inline-block ml-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
