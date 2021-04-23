<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

Route::get('/cinema', [PostsController::class, 'cinema']);
Route::get('/theater', [PostsController::class, 'theater']);
Route::get('/music', [PostsController::class, 'music']);
Route::get('/youtube', [PostsController::class, 'youtube']);
Route::get('/books', [PostsController::class, 'books']);
Route::get('/podcasts', [PostsController::class, 'podcasts']);
Route::any('/search', [PostsController::class, 'search'])->name('search');   

Route::get('/post/{post}', [AdminController::class, 'post'])->name('post')->middleware('auth', 'active');
Route::any('/posts', [AdminController::class, 'posts'])->name('posts')->middleware('auth', 'active');
Route::any('/new_post', [AdminController::class, 'new_post'])->name('post.new')->middleware('auth', 'active');
Route::any('/new_category', [AdminController::class, 'new_category'])->name('category.new')->middleware('auth', 'active');
Route::any('/edit_post/{post}', [AdminController::class, 'edit_post'])->name('post.edit')->middleware('auth', 'active');
Route::any('/delete_post/{post}', [AdminController::class, 'delete_post'])->name('post.delete')->middleware('auth', 'active');
Route::any('/users', [AdminController::class, 'users'])->name('users')->middleware('auth', 'active');

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();



