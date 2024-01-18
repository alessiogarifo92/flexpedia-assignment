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
    return view('auth.login');
});

Auth::routes();


//use group to merge all the routes with the same prefix
Route::group(["prefix" => "posts", "middleware" => "auth"], function () {
    
    //route to home with all posts from other users
    Route::get('/home', [App\Http\Controllers\Post\PostController::class, 'index'])->name('home');

    //show my post list only
    Route::get('/my-posts', [App\Http\Controllers\Post\PostController::class, 'showMyPosts'])->name('post.show');

    //routes to point the creation post form and to store new one
    Route::get('/create-post', [App\Http\Controllers\Post\PostController::class, 'create'])->name('post.create');
    Route::post('/store-post', [App\Http\Controllers\Post\PostController::class, 'store'])->name('post.store');

    //routes to edit and update post selected record
    Route::get('/edit-post/{id}', [App\Http\Controllers\Post\PostController::class, 'edit'])->name('post.edit');
    Route::post('/update-post/{id}', [App\Http\Controllers\Post\PostController::class, 'update'])->name('post.update');

    //route to delete a record
    Route::any('/delete-post/{id}', [App\Http\Controllers\Post\PostController::class, 'destroy'])->name('post.delete');
});