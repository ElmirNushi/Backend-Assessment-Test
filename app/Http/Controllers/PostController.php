<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category']))
                ->paginate(10)->withQueryString(),
        ]);
    }

    public function index(Post $post)
    {
        return view('posts.index', compact('post'));
    }

    public function show()
    {
        return view('posts.show', [
            'user' => auth()->user(),
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'min:2|max:26|required',
            'excerpt' => 'min:2|max:128|required',
            'body' => 'min:2|max:1000|required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'image|required',
        ]);

        $post['user_id'] = auth()->id();

        $post['image'] = request()->file('image')->store('images');

        Post::create($post);

        return redirect(route('post.show'));
    }

    public function edit(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $categories = Category::all();

            return view('posts.edit', compact('post', 'categories'));
        } else {
            abort(404);
        }
    }

    public function update(Post $post, Request $request)
    {
        if (auth()->user()->id === $post->user_id) {
            $postAttributes = $request->validate([
                'title' => 'min:2|max:26|required',
                'excerpt' => 'min:2|max:32|required',
                'body' => 'min:2|max:1000|required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
                'image' => 'image',
            ]);

            if (isset($postAttributes['image'])) {
                $postAttributes['image'] = request()->file('image')->store('images');
            }

            $post->update($postAttributes);

            return redirect(route('post.show'));
        } else {
            abort(404);
        }
    }

    public function destroy(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();

            return back();
        } else {
            abort(404);
        }
    }
}
