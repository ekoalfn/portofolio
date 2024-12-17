<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $permissions = [
        
            ['id' => 1, 'name' => 'users-list',],
            ['id' => 2, 'name' => 'users-create',],
            ['id' => 3, 'name' => 'users-edit',],
            ['id' => 4, 'name' => 'users-delete',],
            ['id' => 5, 'name' => 'users-view',],

            ['id' => 6, 'name' => 'roles-list',],
            ['id' => 7, 'name' => 'roles-create',],
            ['id' => 8, 'name' => 'roles-edit',],
            ['id' => 9, 'name' => 'roles-delete',],
            ['id' => 10, 'name' => 'roles-view',],

            ['id' => 11, 'name' => 'permission-list',],

            ['id' => 12, 'name' => 'manage-device-data-list',],
            ['id' => 13, 'name' => 'manage-device-data-create',],
            ['id' => 14, 'name' => 'manage-device-data-edit',],
            ['id' => 15, 'name' => 'manage-device-data-delete',],
            ['id' => 16, 'name' => 'manage-device-data-view',],

            ['id' => 17, 'name' => 'manage-device-list',],
            ['id' => 21, 'name' => 'manage-device-view',],

            ['id' => 22, 'name' => 'manage-log-list',],
            ['id' => 26, 'name' => 'manage-log-view',],

            ['id' => 27, 'name' => 'setting-general',],
            ['id' => 28, 'name' => 'setting-config',],

            ['id' => 29, 'name' => 'permission-view',],

            ['id' => 30, 'name' => 'roles-show',],

            ['id' => 31, 'name' => 'users-change-password',],
            ['id' => 32, 'name' => 'users-set-active',],
        ];

    

        foreach ($permissions as $item) {
            Permission::create($item);
        }

        $user_permissions = [11];

        $user->syncPermissions($user_permissions);
        $admin->syncPermissions(Permission::all());
    }
}
