<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'User']);

        // Create permissions
        $permissions = ['file-create', 'file-view', 'file-edit', 'file-delete'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to Admin role
        $adminRole = Role::findByName('Admin');
        $adminRole->givePermissionTo(Permission::all());
    }
}
