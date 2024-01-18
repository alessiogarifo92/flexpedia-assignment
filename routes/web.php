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

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home')->middleware('auth');

Route::get('/my-posts', [App\Http\Controllers\PostController::class, 'showMyPosts'])->name('show.my.posts');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'create'])->name('create.post');
Route::post('/store-post', [App\Http\Controllers\PostController::class, 'store'])->name('store.posts');
