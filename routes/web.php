<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:id}', [PostController::class, 'show'])->name('post');

Route::get('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

Route::post('/comments', [CommentController::class, 'store'])
    ->middleware('auth');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe']);

// Admin
Route::get('admin/posts', [AdminPostController::class, 'index'])
    ->middleware('admin')
    ->name('post.admin.index');

Route::get('admin/posts/create', [AdminPostController::class, 'create'])
    ->middleware('admin')
    ->name('post.create');
Route::post('admin/posts/create', [AdminPostController::class, 'store'])
    ->middleware('admin');

Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])
    ->middleware('admin')
    ->name('post.edit');
Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])
    ->middleware('admin');

Route::delete('/admin/posts/{post:id}', [AdminPostController::class, 'destroy'])
    ->middleware('admin');

Route::patch('/admin/posts/{post:id}/status', [AdminPostController::class, 'status'])
    ->middleware('admin');



