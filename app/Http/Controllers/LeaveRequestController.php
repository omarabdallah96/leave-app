<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class LeaveRequestController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of leave requests.
     */
    public function index()
    {
        $this->authorize('view leave_requests', LeaveRequest::class);
        $leaveRequests = LeaveRequest::with('user')->latest()->get();

        return view('leave_requests.index', compact('leaveRequests'));
    }

    /**
     * Show the form for creating a new leave request.
     */
    public function create()
    {
        $this->authorize('create leave_request', LeaveRequest::class);
        $leaveTypes = LeaveType::all();
        return view('leave_requests.create', compact('leaveTypes'));
    }

    /**
     * Store a newly created leave request in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create leave_request', LeaveRequest::class);
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date'    => 'required|date|after_or_equal:today',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'reason'        => 'nullable|string|max:1000',
        ]);

        LeaveRequest::create([
            'user_id'       => Auth::id(),
            'leave_type_id' => $request->leave_type_id,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'reason'        => $request->reason,
            'status'        => 'Pending',
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully.');
    }


    /**
     * Show the form for editing the specified leave request.
     */
    public function edit(LeaveRequest $leaveRequest)
    {
        $this->authorize('edit leave_request', $leaveRequest);
        return view('leave_requests.edit', compact('leaveRequest'));
    }

    /**
     * Update the specified leave request in storage.
     */
    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $this->authorize('edit leave_request', $leaveRequest);
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $leaveRequest->update([
            'status' => $request->status,
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
    }

    /**
     * Remove the specified leave request from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        $this->authorize('delete leave_request', $leaveRequest);
        $leaveRequest->delete();

        return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
    }
}
