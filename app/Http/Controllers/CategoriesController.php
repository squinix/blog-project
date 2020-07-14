<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('viewAny', Category::class);

        $category = new Category();
        $categories = Category::all();

        return view('categories.create', compact('category', 'categories'));
    }

    public function store()
    {
        $this->authorize('viewAny', Category::class);

        $category = Category::create($this->validateRequest());

        return redirect('categories');
    }

    public function show(Category $category)
    {
        $this->authorize('viewAny', Category::class);

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::all();
        
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Category $category)
    {
        $this->authorize('viewAny', Category::class);

        $category->update($this->validateRequest());

        return redirect('categories/' . $category->id)->with('message', 'Thanks for your edit.');
    }

    public function destroy(Category $category)
    {
        $this->authorize('viewAny', Category::class);
        
        $category->delete();
        $category->posts()->detach();

        return redirect('/categories');
    }

    private function validateRequest()
    {
        return request()->validate([
            'parent_id' => '',
            'title' => 'required|min:3',
            'meta_title' => 'required|min:3',
            'content' => 'required|min:3'
        ]);
    }
}
