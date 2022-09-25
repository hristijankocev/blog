<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::with(['category', 'author'])
                ->latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(3)
                ->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post->load(['category', 'author', 'comments'])]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:\App\Models\Category,id'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:255'],
            'excerpt' => ['required', 'min:2', 'max:255']
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        return redirect(route('post', $post->id));
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }
}
