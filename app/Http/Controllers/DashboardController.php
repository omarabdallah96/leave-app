<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $isAdmin = Auth::user()->hasRole('Admin');
        $leaveRequests = $isAdmin ? LeaveRequest::query() : Auth::user()->leaveRequests();

        $totalLeaveRequests = $leaveRequests->count();
        $approvedLeaves = $leaveRequests->where('status', 'approved')->count();
        $pendingLeaves = $leaveRequests->where('status', 'pending')->count();
        $rejectedLeaves = $leaveRequests->where('status', 'rejected')->count();

        return view('dashboard', compact('totalLeaveRequests', 'approvedLeaves', 'pendingLeaves', 'rejectedLeaves'));
    }
}
