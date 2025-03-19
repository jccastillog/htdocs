<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        Permission::create(['name' => 'create providers']);
        Permission::create(['name' => 'update providers']);
        Permission::create(['name' => 'destroy providers']);
        Permission::create(['name' => 'show providers']);
        Permission::create(['name' => 'list providers']);

        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'update services']);
        Permission::create(['name' => 'destroy services']);
        Permission::create(['name' => 'show services']);
        Permission::create(['name' => 'list services']);


        // Crear roles y asignar permisos
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'create providers',
            'update providers',
            'destroy providers',
            'show providers',
            'list providers',
            'create services',
            'update services',
            'destroy services',
            'show services',
            'list services',
        ]);

        $providerRole = Role::create(['name' => 'provider']);
        $providerRole->givePermissionTo([
            'update providers',
            'show providers',
            'create services',
            'update services',
            'destroy services',
            'show services',
            'list services',
        ]);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'show providers',
            'show services',
            'list services',
        ]);
    }
}
