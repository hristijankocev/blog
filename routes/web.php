<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:id}', [PostController::class, 'show'])->name('post');

Route::get('posts/category/{category:slug}', fn(Category $category) => view('posts', [
    'posts' => $category->posts->load(['category', 'author']),
    'categories' => Category::all(),
    'currentCategory' => $category
]))->name('category');

Route::get('posts/author/{author:username}', fn(User $author) => view('posts', [
    'posts' => $author->posts->load(['category', 'author']),
    'categories' => Category::all(),
    'currentCategory' => null
]))->name('author');
