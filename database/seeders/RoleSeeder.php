<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // permissions list
        $permissions = ['add products',
                        'edit products',
                        'delete products',
                        'unpublish products',
                    ];

        //Create permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // create roles and assign created permissions

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'staffUser']);
        $role->givePermissionTo(['edit products', 'add products', 'unpublish products']);

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo(['add products']);
    }
}
