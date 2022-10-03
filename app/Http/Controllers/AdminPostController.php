<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:\App\Models\Category,id'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:65000'],
            'excerpt' => ['required', 'min:2', 'max:65000'],
            'thumbnail' => ['required', 'image', 'max:5000']
        ]);

        $thumbnail = $request->file('thumbnail');

        $validated['thumbnail'] = $thumbnail->store('thumbnails');
        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        return redirect(route('post', $post->id));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'post_id' => ['required', 'exists:\App\Models\Post,id'],
            'category_id' => ['required', 'exists:\App\Models\Category,id'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:65000'],
            'excerpt' => ['required', 'min:2', 'max:65000'],
            'thumbnail' => ['image', 'max:5000']
        ]);

        $post = Post::find($validated['post_id']);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            $validated['thumbnail'] = $thumbnail->store('thumbnails');

            // If the post already had a thumbnail, delete the old one from the storage
            if ($post->thumbnail) {
                Storage::delete($post->thumbnail);
            }
        }

        $post->update($validated);

        return redirect(route('post.admin.index'))->with(['success' => 'Post updated successfully.']);
    }


    /**
     * Changes the status of the post to published or drafted
     */
    public function status(Post $post)
    {
        if ($post->published_at !== null) {
            $post->published_at = null;
        } else {
            $post->published_at = Carbon::now();
        }

        $post->save();

        return redirect(route('post.admin.index'))->with(['success' => 'Post status changed.']);
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail && Storage::exists($post->thumbnail)) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        return back()->with(['success' => 'Post deleted.']);
    }
}
