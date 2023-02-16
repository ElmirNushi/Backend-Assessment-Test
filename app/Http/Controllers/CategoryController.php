<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('categories.show', compact('user'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'max:12|min:2|required'
        ]);

        $category['user_id'] = auth()->id();

        Category::create($category);

        return redirect(route('category.show'));
    }

    public function edit(Category $category)
    {
        if (auth()->user()->id === $category->user_id) {
            return view('categories.edit', compact('category'));
        } else {
            abort(404);
        }
    }

    public function update(Category $category, Request $request)
    {
        if (auth()->user()->id === $category->user_id) {
            $categoryAttributes = $request->validate([
                'name' => 'max:12|min:2|required'
            ]);

            $category->update($categoryAttributes);

            return redirect(route('category.show'));
        } else {
            abort(404);
        }
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->id === $category->user_id) {
            $category->delete();

            return redirect(route('category.show'));
        } else {
            abort(404);
        }
    }
}
