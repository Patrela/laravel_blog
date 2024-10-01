<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title= $this->faker->unique()->realText(55);
        return [
            'title' => $title, //fake()->unique()->title(55),
            'slug' => null, //'slug' => Str::slug($title), //fake()->slug(),
            'introduction' => $this->faker->realText(255),
            'image' => 'articles/' . $this->faker->image('public/storage/articles',640, 480, null,false) ,//fake()->image(),
            'body' =>$this->faker->text(2000), // fake()->body(2000),
            'status' => $this->faker->boolean(), //fake()->boolean(),
            'user_id' => User::inRandomOrder()->first()->id,// User::find( random_int(1,User::count() )),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
