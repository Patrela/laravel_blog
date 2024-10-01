<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        $name = strtolower(trim(fake()->firstName()));
        //$user = User::inRandomOrder()->first();
        return [
            //'user_id' => $user->id,
            'photo' => 'profiles/' . $this->faker->image('public/storage/profiles', 640, 480, null, false),
            'profession' => $this->faker->word(60),
            'about' => $this->faker->realText(255),
            'twitter' => 'https://x.com/' . $name,
            'facebook' => 'https://www.facebook.com/' . $name,
            'linkedin' => 'https://www.linkedin.com/' . $name,
        ];
    }
}
