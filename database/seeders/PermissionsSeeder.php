<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Define the permissions based on routes
        $permissions = [
            // Dashboard Permission (if needed, e.g. access to dashboard)
            ['name' => 'access_dashboard'],

            // Profile permissions
            ['name' => 'view profile'],
            ['name' => 'edit profile'],
            ['name' => 'delete profile'],

            // Leave request permissions
            ['name' => 'create leave_request'],
            ['name' => 'edit leave_request'],
            ['name' => 'view leave_requests'],
            ['name' => 'delete leave_request'],

            // Role permissions
            ['name' => 'create role'],
            ['name' => 'edit role'],
            ['name' => 'delete role'],
            ['name' => 'view roles'],

            // Permission permissions
            ['name' => 'create permission'],
            ['name' => 'edit permission'],
            ['name' => 'delete permission'],
            ['name' => 'view permissions'],

            // User permissions
            ['name' => 'view users'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],
            ['name' => 'create user'],

            // Leave type permissions
            ['name' => 'create leave_type'],
            ['name' => 'edit leave_type'],
            ['name' => 'delete leave_type'],
            ['name' => 'view leave_types'],
        ];


        // Insert permissions into the database
        foreach ($permissions as $permission) {
            $permission['guard_name'] = 'web';
            Permission::create($permission);
        }
    }
}
