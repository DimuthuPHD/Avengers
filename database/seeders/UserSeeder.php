<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Role::truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_roles')->truncate();
        Permission::truncate();


        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create Permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'buses.index']);
        Permission::create(['name' => 'buses.store']);
        Permission::create(['name' => 'buses.create']);
        Permission::create(['name' => 'buses.update']);
        Permission::create(['name' => 'buses.destroy']);
        Permission::create(['name' => 'buses.edit']);
        Permission::create(['name' => 'verification.send']);
        Permission::create(['name' => 'route.index']);
        Permission::create(['name' => 'route.store']);
        Permission::create(['name' => 'route.create']);
        Permission::create(['name' => 'route.update']);
        Permission::create(['name' => 'route.destroy']);
        Permission::create(['name' => 'route.edit']);
        Permission::create(['name' => 'shedules.index']);
        Permission::create(['name' => 'shedules.store']);
        Permission::create(['name' => 'shedules.create']);
        Permission::create(['name' => 'shedules.update']);
        Permission::create(['name' => 'shedules.destroy']);
        Permission::create(['name' => 'shedules.edit']);


        // Create Permission and assign to roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager'])->syncPermissions([
            'buses.index',
            'route.index',
            'shedules.index',
        ]);

        Role::create(['name' => 'editor'])->syncPermissions([
            'dashboard',
            'buses.index',
            'buses.store',
            'buses.create',
            'buses.update',
            'buses.edit',
            'route.index',
            'route.store',
            'route.create',
            'route.update',
            'route.edit',
            'shedules.index',
            'shedules.store',
            'shedules.create',
            'shedules.update',
            'shedules.edit',
        ]);

        // Create users and assign roles
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => bcrypt('secret'),
        ])->assignRole('editor');

        User::create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password' => bcrypt('secret'),
        ])->assignRole('manager');


        Schema::enableForeignKeyConstraints();
    }
}
