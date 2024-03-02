<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
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
        // create permissions
        Permission::create(['name' => 'view a post']);
        Permission::create(['name' => 'view all posts']);
        Permission::create(['name' => 'create a post']);
        Permission::create(['name' => 'update a post']);
        Permission::create(['name' => 'delete a post']);
        Permission::create(['name' => 'restore posts']);
        Permission::create(['name' => 'force delete posts']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'cashier']);
        $role1->givePermissionTo('view a post');
        $role1->givePermissionTo('view all posts');
        $role1->givePermissionTo('update a post');

        $role2 = Role::create(['name' => 'manager']);
        $role2->givePermissionTo('update a post');
        $role2->givePermissionTo('view a post');
        $role2->givePermissionTo('view all posts');
        $role2->givePermissionTo('delete a post');

        $role3 = Role::create(['name' => 'owner']);
        $role3->givePermissionTo(Permission::all());

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'owner',
            'username' => 'owner',
            'email' => 'owner@example.com',
            // password= // password
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'manager',
            'username' => 'manager',
            'email' => 'manager@example.com',
            // password // password
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'cashier',
            'username' => 'cashier',
            'email' => 'cashier@example.com',
            // password // password
        ]);
        $user->assignRole($role1);
    }
}
