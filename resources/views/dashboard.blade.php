@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Leave Requests Card -->
                <div class="bg-gray-100 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <h3 class="text-lg font-semibold">Total Leave Requests</h3>
                        <p class="text-2xl font-bold">{{ $totalLeaveRequests }}</p>
                    </div>
                </div>

                <!-- Approved Leaves Card -->
                <div class="bg-green-100 dark:bg-green-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <h3 class="text-lg font-semibold">Approved Leaves</h3>
                        <p class="text-2xl font-bold">{{ $approvedLeaves }}</p>
                    </div>
                </div>

                <!-- Pending Leaves Card -->
                <div class="bg-yellow-100 dark:bg-yellow-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <h3 class="text-lg font-semibold">Pending Leaves</h3>
                        <p class="text-2xl font-bold">{{ $pendingLeaves }}</p>
                    </div>
                </div>

                <!-- Rejected Leaves Card -->
                <div class="bg-red-100 dark:bg-red-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        <h3 class="text-lg font-semibold">Rejected Leaves</h3>
                        <p class="text-2xl font-bold">{{ $rejectedLeaves }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
