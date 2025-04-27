@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Edit Leave Request</h1>

    <form action="{{ route('leave-requests.update', $leaveRequest) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="Pending" {{ $leaveRequest->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $leaveRequest->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ $leaveRequest->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
    </form>
</div>
@endsection
