@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Create Leave Request</h1>

        <form action="{{ route('leave-requests.store') }}" method="POST"
            class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf

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

            <!-- Leave Type Dropdown -->
            <div class="mb-4">
                <label for="leave_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    <option value="">Select Leave Type</option>
                    @foreach ($leaveTypes as $leaveType)
                        <option value="{{ $leaveType->id }}" {{ old('leave_type_id') == $leaveType->id ? 'selected' : '' }}>
                            {{ $leaveType->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                <input type="date" name="start_date" id="start_date"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    value="{{ old('start_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                <input type="date" name="end_date" id="end_date"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    value="{{ old('end_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason</label>
                <textarea name="reason" id="reason" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('reason') }}</textarea>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Submit
            </button>
        </form>
    </div>
@endsection
