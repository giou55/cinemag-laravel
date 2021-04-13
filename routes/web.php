<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;


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

Route::get('/posts', [PostsController::class, 'posts'])->name('posts');

Route::any('/new_post', [PostsController::class, 'new_post'])->name('post.new')->middleware('auth');

Route::any('/new_category', [PostsController::class, 'new_category'])->name('category.new')->middleware('auth');

Route::get('/post/{post}', [PostsController::class, 'post'])->name('post');

Route::any('/edit_post/{post}', [PostsController::class, 'edit_post'])->name('post.edit')->middleware('auth');

Route::any('/delete_post/{post}', [PostsController::class, 'delete_post'])->name('post.delete')->middleware('auth');

Route::any('/search', [PostsController::class, 'search'])->name('search');   

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

