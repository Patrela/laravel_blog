<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * first: create the factory, next the seeder, use the factory() inside seeder, and call here the seeder
     */
    public function run(): void
    {
        //Show image in public folders
        //1- command: php artisan storage:link  | for create a shortcut to storage in public folder
        //2- .env: FILESYSTEM_DISK=public
        //3- config\filesystems.php: 'default' => env('FILESYSTEM_DISK', 'public'),
        //4- here: create and delete the directories in public/storage

        Storage::deleteDirectory('articles');
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('profiles');
        Storage::makeDirectory('articles');
        Storage::makeDirectory('categories');
        Storage::makeDirectory('profiles');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(3)->create();
        Article::factory(5)->create();
        Comment::factory(12)->create();

        //Profile::factory(4)->create(); // are included in users
    }
}
