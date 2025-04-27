<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Assign permissions to the roles
        $adminRole = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',  // Add the guard name here
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'guard_name' => 'web',  // Add the guard name here
        ]);

        // Assign permissions to Admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign only some permissions to User
        $userRole->givePermissionTo([
            Permission::where('name', 'view profile')->first(),
            Permission::where('name', 'create leave_request')->first(),
            Permission::where('name', 'view leave_requests')->first(),
        ]);
    }
}
