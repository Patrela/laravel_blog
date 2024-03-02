<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //PVR invoke seeder
        $this->call(UserSeeder::class);

        //PVR delete folder before execute
        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');
        Storage::deleteDirectory('articles');
        Storage::makeDirectory('articles');



        //PVR creates 10 model examplesusing databases\factories
        User::factory(10)->create();
        Category::factory(8)->create();
        Article::factory(8)->create();
        Comment::factory(8)->create();


    }
}
