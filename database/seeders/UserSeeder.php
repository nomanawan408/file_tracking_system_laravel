<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'superadmin@app.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'), // Use a secure password in production
            ]
        );
        $admin->assignRole('Admin');

        // Manager User
        $manager = User::firstOrCreate(
            ['email' => 'manager@app.com'],
            [
                'name' => 'Manager User',
                'password' => bcrypt('password'), // Use a secure password in production
            ]
        );
        $manager->assignRole('Manager');

        // General User
        $user = User::firstOrCreate(
            ['email' => 'user@app.com'],
            [
                'name' => 'General User',
                'password' => bcrypt('password'), // Use a secure password in production
            ]
        );
        $user->assignRole('User');
    }
}