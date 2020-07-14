<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\PostComment;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = new Post;

        if ($request->has('categories')) {
            $posts = $posts->whereHas('categories', function($query) use($request) {
                $query->where('category_id', '=', $request['categories']);
            })->with('categories');
        }

        if ($request->has('tags')) {
            $posts = $posts->whereHas('tags', function($query) use($request) {
                $query->where('tag_id', '=', $request['tags']);
            })->with('tags');
        }

        if ($request->has('sort')) {
            $posts = $posts->orderBy('updated_at', $request['sort']);
        }

        $posts = $posts->paginate(5)->appends([
            'categories' => $request['categories'],
            'tags' => $request['tags'],
            'sort' => $request['sort'],
        ]);
        
        $tags = Tag::all();
        $categories = Category::all();

        return view('blog.index', compact('posts', 'tags', 'categories'));
    }

    public function show(Post $post)
    {
        $posts = Post::orderBy('updated_at', 'desc')->limit(3)->get();
        $tags = Tag::orderBy('updated_at', 'desc')->limit(6)->get();
        $categories = Category::all();

        return view('blog.show', compact('post', 'posts', 'tags', 'categories'));
    }
}
