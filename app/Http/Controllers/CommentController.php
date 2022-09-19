<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => ['required', 'min:2', 'max:255'],
            'post_id' => ['required', 'exists:App\Models\Post,id']
        ]);

        $validated['user_id'] = Auth::id();
        $validated['body'] = $validated['comment'];

        Comment::create($validated);

        return back()->with('success', 'Comment posted.');
    }
}
