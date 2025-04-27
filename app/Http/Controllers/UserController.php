<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Display a listing of the users
    public function __construct()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }
    }
    public function index()
    {
        $users = User::with('roles')->get(); // Use 'roles' relation from Spatie
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $roles = Role::all(); // Get all roles
        return view('users.create', compact('roles'));
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6', // Validate password confirmation
            'role' => 'required|exists:roles,name', // Validate role name
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role); // Assign role by name

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles
        return view('users.edit', compact('user', 'roles'));
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id', // Validate role ID existence
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Only update password if it's provided
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']); // Validate password confirmation
            $user->password = bcrypt($request->password); // Hash new password
        }

        $user->save();

        // Ensure the correct role is assigned by name, not ID
        $role = Role::find($request->role_id); // Get the role by ID
        if ($role) {
            $user->syncRoles([$role->name]); // Sync role by name
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
