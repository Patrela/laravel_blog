<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    //Run the database seeds.
    //PVR EXE: php artisan migrate:fresh --seed

    public function run(): void
    {
        User::create([
            'full_name' => "Tu",
            'email' => "tu@correo.com",
            'password' => Hash::make("Tu123456"),
            'remember_token' => "Tu123456",
        ]);
    }

}
