<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view leave_types', LeaveType::class);
        $leaveTypes = LeaveType::all();
        return view('leave-types.index', compact('leaveTypes'));
    }

    public function create()
    {
        $this->authorize('create leave_type', LeaveType::class);
        return view('leave-types.create');
    }

    public function store(Request $request)
    {
        // Authorize the user to create a leave type


        $this->authorize('create leave_type', LeaveType::class);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LeaveType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('leave-types.index');
    }

    public function edit(LeaveType $leaveType)
    {
        // Authorize the user to edit the leave type
        $this->authorize('edit leave_type', LeaveType::class);
        return view('leave-types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        // Authorize the user to update the leave type
        $this->authorize('edit leave_type', LeaveType::class);
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $leaveType->update([
            'name' => $request->name,
        ]);

        return redirect()->route('leave-types.index');
    }

    public function destroy(LeaveType $leaveType)
    {
        // Authorize the user to delete the leave type
        $this->authorize('delete leave_type', LeaveType::class);
        $leaveType->delete();
        return redirect()->route('leave-types.index');
    }
}
