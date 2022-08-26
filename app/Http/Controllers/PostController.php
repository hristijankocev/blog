<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::with(['category', 'author']);

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            'posts' => Post::with(['category', 'author'])->filter(request(['search']))->get()->sortByDesc('created_at'),
            'categories' => Category::all(),
            'currentCategory' => null
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post->load(['category', 'author'])]);
    }
}
