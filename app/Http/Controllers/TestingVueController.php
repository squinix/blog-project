<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Post;
use Illuminate\Http\Request;

class TestingVueController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return json_encode($category);
    }

    public function show(Request $request)
    {
        //$posts = Post::with('categories')->get();
        /* $posts = Post::with(['categories' => function($query) {
            $query->where('id', '=', 1);
        }])->get(); */
        $posts = Post::whereHas('categories', function($query) use($request) {
            $query->where('category_id', '=', $request['id']);
        })->orderBy('updated_at', 'desc')->with('categories')->limit(8)->get();
        return json_encode($posts);
    }
}
