<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $tasksView = Permission::firstOrCreate(['name' => 'tasks.view']);
        $tasksManage = Permission::firstOrCreate(['name' => 'tasks.manage']);
        $usersRead = Permission::firstOrCreate(['name' => 'users.read']);

        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);
        $userRole = Role::firstOrCreate(['name' => 'Usuario']);

        $adminRole->syncPermissions([$tasksView, $tasksManage, $usersRead]);
        $editorRole->syncPermissions([$tasksView, $tasksManage]);
        $userRole->syncPermissions([$tasksView]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $editor = User::firstOrCreate(
            ['email' => 'editor@example.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password'),
            ]
        );

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Usuario',
                'password' => Hash::make('password'),
            ]
        );

        $admin->syncRoles([$adminRole]);
        $editor->syncRoles([$editorRole]);
        $user->syncRoles([$userRole]);
    }
}
