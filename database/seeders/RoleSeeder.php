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
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'Administrator',
            'guard_name' => 'web',
        ]);
        $author = Role::create([
            'name' => 'Author',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'admin.index',
            'description' => 'Dashboard view of the admin',
        ])->syncRoles([$admin, $author]);

        Permission::create([
            'name' => 'categories.index',
            'description' => 'Categories list',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'categories.create',
            'description' => 'Categories creation',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'categories.edit',
            'description' => 'Categories updates',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'categories.destroy',
            'description' => 'Categories deletion',
        ])->assignRole($admin);

        Permission::create([
            'name' => 'articles.index',
            'description' => 'Articles list',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'articles.create',
            'description' => 'Articles creation',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'articles.edit',
            'description' => 'Articles updates',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'articles.destroy',
            'description' => 'Articles deletion',
        ])->syncRoles([$admin, $author]);

        Permission::create([
            'name' => 'comments.index',
            'description' => 'Comments list',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'comments.create',
            'description' => 'Comments creation',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'comments.destroy',
            'description' => 'Comments deletion',
        ])->syncRoles([$admin, $author]);

        Permission::create([
            'name' => 'roles.index',
            'description' => 'roles list',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'roles.create',
            'description' => 'roles creation',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'roles.edit',
            'description' => 'roles updates',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'roles.destroy',
            'description' => 'roles deletion',
        ])->assignRole($admin);
    }
}
