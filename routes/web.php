<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WooProductController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//PVR define todas las rutas estandar de un controler
Route::resource('articles', ArticleController::class)
                ->names('articles');
//PVR si hay rutas no incluidas, se llaman antes de resource
Route::get('/categories/{category}/detail', [CategoryController::class , 'detail'])->name('categories.detail');
Route::resource('categories', CategoryController::class)
                ->except('show')
                ->names('categories');
//PVR sólo algunas rutas: only
Route::resource('comments', CommentController::class)
                ->only('index','destroy')
                ->names('comments');
//PVR route aparte por nopertenecer al administrador
Route::get('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/woo/products', [WooProductController::class, 'index'])->name('products.index');



//PVR Auth::routes() VA AL FINAL
//Auth::routes();
/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

//PVR Auth agregar permisos y roles
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
/* --------------------------------
* ejemplo de roles y permisos
Route::middleware(['role_or_permission:Admin|article-edit'])->group(function () {
    // Rutas que requieren el rol de "Admin" o el permiso de "article-edit"
    Route::get('/admin-dashboard', 'AdminController@index');
    Route::get('/edit-article', 'ArticleController@edit');
});

Route::middleware(['role_or_permission:User|article-create|comment-create'])->group(function () {
    // Rutas que requieren el rol de "User" o los permisos de "article-create" o "comment-create"
    Route::get('/user-dashboard', 'UserController@index');
    Route::get('/create-article', 'ArticleController@create');
});
// --------------------------------
//ejemplo de roles
Route::middleware(['role:Admin'])->group(function () {
    // Rutas que requieren el rol de "Admin"
    Route::get('/admin-dashboard', 'AdminController@index');
});

Route::middleware(['role:User|Editor'])->group(function () {
    // Rutas que requieren el rol de "User" o "Editor"
    Route::get('/user-dashboard', 'UserController@index');
});

*/

require __DIR__.'/auth.php';
