<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\Post\PostController::class, 'index'])->name('home')->middleware('auth');

Route::get('/my-posts', [App\Http\Controllers\Post\PostController::class, 'showMyPosts'])->name('post.show');
Route::get('/create-post', [App\Http\Controllers\Post\PostController::class, 'create'])->name('post.create');
Route::post('/store-post', [App\Http\Controllers\Post\PostController::class, 'store'])->name('post.store');

Route::get('/edit-post/{id}', [App\Http\Controllers\Post\PostController::class, 'edit'])->name('post.edit');
Route::post('/update-post/{id}', [App\Http\Controllers\Post\PostController::class, 'update'])->name('post.update');
Route::any('/delete-post/{id}', [App\Http\Controllers\Post\PostController::class, 'delete'])->name('post.delete');
