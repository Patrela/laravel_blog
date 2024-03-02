<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    //Run the database seeds.
    //PVR EXE: php artisan migrate:fresh --seed
    /* List of applications to add.
    */
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'article-list',
        'article-create',
        'article-edit',
        'article-delete',
        'category-list',
        'category-create',
        'category-edit',
        'category-delete',
        'comment-list',
        'comment-create',
        'comment-edit',
        'comment-delete',
    ];
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'full_name' => 'admin',
            'email' => 'admin@correo.com',
            'password' => Hash::make('Ad123456'),
            'remember_token' => "Ad123456",
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $user1 = User::create([
            'full_name' => "Tu",
            'email' => "tu@correo.com",
            'password' => Hash::make("Tu123456"),
            'remember_token' => "Tu123456",
        ]);
        $user1->assignRole([$role->id]);
    }

}
