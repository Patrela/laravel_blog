<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title= $this->faker->unique()->word(10);
        return [
            'name' => $title,
            'slug' => Str::slug($title), //fake()->slug(),
            'image' => 'categories/' . $this->faker->image('public/storage/categories',640, 480, null,false),
            'is_featured' => $this->faker->boolean(), //fake()->boolean(),
            'status' => $this->faker->boolean(),
        ];
    }
}
