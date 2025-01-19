<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            'file-create',    // Create new files
            'file-view',      // View file details
            'file-edit',      // Edit file information
            'file-delete',    // Delete files
            'task-assign',    // Assign tasks related to file handling
            'task-manage',    // Manage tasks related to file handling
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $roles = [
            'Admin' => ['file-create', 'file-view', 'file-edit', 'file-delete', 'task-assign', 'task-manage'],
            'Manager' => ['file-view', 'task-assign', 'task-manage'],
            'User' => ['file-view'],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}