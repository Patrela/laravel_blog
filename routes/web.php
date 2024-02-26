<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

//PVR Auth::routes() VA AL FINAL
//Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
