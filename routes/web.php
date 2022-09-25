<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:id}', [PostController::class, 'show'])->name('post');

Route::get('admin/posts/create', [PostController::class, 'create'])
    ->middleware('admin');

Route::post('admin/posts/create', [PostController::class, 'store'])
    ->middleware('admin');

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
