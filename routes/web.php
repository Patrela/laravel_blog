<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main.index');
Route::get('/all', [App\Http\Controllers\HomeController::class, 'all'])->name('home.all');


Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/',[App\Http\Controllers\AdminController::class , 'index'])
    ->middleware('can:admin.index')
        ->name('admin.index');

    Route::resource('articles', 'ArticleController')
        ->except('show')
        ->names('articles');

    Route::resource('categories', 'CategoryController')
        ->except(['show','articlesByCategory'])
        ->names('categories');

    Route::resource('comments', 'CommentController')
        ->only(['index','destroy'])
        ->names('comments');

    Route::resource('users', 'UserController')
        ->except(['show','create','store'])
        ->names('users');

    Route::resource('roles', 'RoleController')
        ->except('show')
        ->names('roles');
});
/*
Route::resource() is equivalent to select path and displays all Controller methods as endpoints, with root name = names
Route::prefix('/articles')->controller(App\Http\Controllers\ArticleController::class)->middleware('auth')->group(function () {
    Route::get('/','index')->name('articles.index');
    Route::get('/create','create')->name('articles.create');
    Route::post('/','store')->name('articles.store');
    Route::get('/{article}/edit','edit')->name('articles.edit'); //Route::get('/{slug}/edit','edit')->name('articles.edit');
    Route::put('/{article}','update')->name('articles.update'); //Route::put('/{slug}','update')->name('articles.update');
    Route::get('/{article}','show')->name('articles.show'); //Route::get('/{slug}','show')->name('articles.show');
    Route::delete('/{article}','destroy')->name('articles.destroy'); //Route::delete('/{slug}','destroy')->name('articles.destroy');
});
*/


Route::resource('profiles', App\Http\Controllers\ProfileController::class)
    ->only(['edit','update','show'])
    ->names('profiles');

Route::get('/articles/{article}',[App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

Route::get('/categories/detail/{category}',[App\Http\Controllers\CategoryController::class, 'articlesByCategory'])->name('categories.articlesByCategory');

Route::post('/comments',[App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::get('store_link', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});
Auth::routes();

