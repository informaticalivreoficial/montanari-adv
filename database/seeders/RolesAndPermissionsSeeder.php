<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        $admin      = Role::firstOrCreate(['name' => 'admin',      'guard_name' => 'web']);
        $manager    = Role::firstOrCreate(['name' => 'manager',    'guard_name' => 'web']);
        $client     = Role::firstOrCreate(['name' => 'client',     'guard_name' => 'web']);

        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view config',
            'edit config',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $all = Permission::all();

        $superAdmin->syncPermissions($all);

        $admin->syncPermissions([
            'view users',
            'create users',
            'edit users',
            'view roles',
            'view config',
            'edit config',
        ]);

        $manager->syncPermissions([
            'view users',
            'view config',
        ]);
    }
}
