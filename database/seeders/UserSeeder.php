<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create explicit users and generate profiles for each
        $testUser = User::create([
            'name' => 'Test User',
            'full_name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make("Test123456"),
            'remember_token' => 'Test123456',
        ])->assignRole('Author');

        Profile::factory()->create([
            'user_id' => $testUser->id,
        ]);

        $adminUser = User::create([
            'name' => 'Adm',
            'full_name' => 'Administrator',
            'email' => 'adm@correo.com',
            'password' => Hash::make("Adm123456"),
            'remember_token' => 'Adm123456',
        ])->assignRole('Administrator');

        Profile::factory()->create([
            'user_id' => $adminUser->id,
        ]);

        // Create 4 additional random users and generate profiles for each
        User::factory(4)->create()->each(function ($user) {
            Profile::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
