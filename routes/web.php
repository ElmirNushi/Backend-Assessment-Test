<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');
    Route::get('/post/index/{post:title}', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/show', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post:title}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/edit/{post:title}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{post:title}', [PostController::class, 'destroy'])->name('post.destroy');


    Route::get('/category/show', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category:name}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{category:name}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{category:name}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';
