<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::with(['category', 'author'])
                ->filter(request(['search', 'category', 'author']))
                ->paginate(3)
                ->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post->load(['category', 'author'])]);
    }
}
