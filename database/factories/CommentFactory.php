<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->realText(255),
            'user_id' => User::inRandomOrder()->first()->id, // $this->faker->numberBetween(3,6),
            'article_id' => Article::inRandomOrder()->first()->id,  //  $this->faker->numberBetween(6,8),
        ];
    }
}
