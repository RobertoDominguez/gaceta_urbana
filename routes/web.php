<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/',[BlogController::class,'blog'])->name('blog');
Route::get('/about',[BlogController::class,'about'])->name('about');
Route::get('/posts/{cover}',[BlogController::class,'post'])->name('posts');

Route::get('/login',[UserController::class,'getLogin'])->name('admin.get_login');
Route::post('/login',[UserController::class,'login'])->name('admin.login');
Route::post('/logout',[UserController::class,'logout'])->name('admin.logout');

Route::prefix('administrador')->middleware(['auth:web'])->group(function () {
    Route::get('/covers',[CoverController::class,'index'])->name('admin.cover.index');
    Route::get('/covers/create',[CoverController::class,'create'])->name('admin.cover.create');
    Route::post('/covers/create',[CoverController::class,'store'])->name('admin.cover.store');
    Route::get('/covers/edit/{cover}',[CoverController::class,'edit'])->name('admin.cover.edit');
    Route::post('/covers/edit/{cover}',[CoverController::class,'update'])->name('admin.cover.update');
    Route::post('/covers/destroy/{cover}',[CoverController::class,'destroy'])->name('admin.cover.destroy');


    Route::get('/posts/{cover}',[PostController::class,'index'])->name('admin.post.index');
    Route::get('/posts/create/{cover}',[PostController::class,'create'])->name('admin.post.create');
    Route::post('/posts/create/{cover}',[PostController::class,'store'])->name('admin.post.store');
    Route::get('/posts/edit/{post}',[PostController::class,'edit'])->name('admin.post.edit');
    Route::post('/posts/edit/{post}',[PostController::class,'update'])->name('admin.post.update');
    Route::post('/posts/destroy/{post}',[PostController::class,'destroy'])->name('admin.post.destroy');
});

