<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the User and assign the 'User' role
        $user = User::factory()->create([
            'name' => "User",
            'email' => "user@user.com",
            'password' => bcrypt('User512#'),
        ]);
        $user->assignRole('User');  // Assign 'User' role

        // Create the Admin and assign the 'Admin' role
        $admin = User::factory()->create([
            'name' => "Omar",
            'email' => "admin@admin.com",
            'password' => bcrypt('Admin512#'),
        ]);
        $admin->assignRole('Admin');  // Assign 'Admin' role
    }
}
