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

// Route::get('/cinema', [PostsController::class, 'cinema']);
// Route::get('/theater', [PostsController::class, 'theater']);
// Route::get('/music', [PostsController::class, 'music']);
// Route::get('/youtube', [PostsController::class, 'youtube']);
// Route::get('/books', [PostsController::class, 'books']);
// Route::get('/podcasts', [PostsController::class, 'podcasts']);
// Route::get('/blog', [PostsController::class, 'blog']);

Route::get('/{category}', [PostsController::class, 'category'])->name('posts');

Route::get('/post/{post}', [PostsController::class, 'post'])->name('post');
Route::any('/search', [PostsController::class, 'search'])->name('search');   

Route::get('/', [HomeController::class, 'index'])->name('home');


/* Administration Routes */
Route::any('/admin/posts', [AdminController::class, 'posts'])->name('posts.all')->middleware('auth', 'active');
Route::any('/admin/posts/{category}', [AdminController::class, 'postsByCategory'])->name('posts.category')->middleware('auth', 'active');
Route::any('/admin/new_post', [AdminController::class, 'new_post'])->name('post.new')->middleware('auth', 'active');
Route::any('/admin/edit_post/{post}', [AdminController::class, 'edit_post'])->name('post.edit')->middleware('auth', 'active');
Route::any('/admin/delete_post/{post}', [AdminController::class, 'delete_post'])->name('post.delete')->middleware('auth', 'active');
Route::any('/admin/categories', [AdminController::class, 'categories'])->name('categories')->middleware('auth', 'active');
Route::any('/admin/new_category', [AdminController::class, 'new_category'])->name('category.new')->middleware('auth', 'active');
Route::any('/admin/edit_category/{category}', [AdminController::class, 'edit_category'])->name('category.edit')->middleware('auth', 'active');
Route::any('/admin/delete_category/{category}', [AdminController::class, 'delete_category'])->name('category.delete')->middleware('auth', 'active');
Route::any('/admin/users', [AdminController::class, 'users'])->name('users')->middleware('auth', 'active');
Route::any('/admin/edit_user/{user}', [AdminController::class, 'edit_user'])->name('user.edit')->middleware('auth', 'active');
Route::any('/admin/delete_user/{user}', [AdminController::class, 'delete_user'])->name('user.delete')->middleware('auth', 'active');

Auth::routes();



