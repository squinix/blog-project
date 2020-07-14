<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Post::class);
        
        $posts = Post::with('user')->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('viewAny', Post::class);

        $post = new Post();
        $user = Auth::user();
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('post', 'user', 'categories', 'tags'));
    }

    public function store()
    {
        $this->authorize('viewAny', Post::class);

        $post = Post::create($this->validateRequest());

        $this->storeImage($post);

        $categories = request()->input('categories');
        $post->categories()->sync($categories);

        $tags = request()->input('tags');
        $post->tags()->sync($tags);

        return redirect('posts');
    }

    public function show(Post $post)
    {
        $this->authorize('viewAny', Post::class);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $user = Auth::user();
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'user', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $post->update($this->validateRequest());

        $this->storeImage($post);

        $categories = request()->input('categories');
        $post->categories()->sync($categories);

        $tags = request()->input('tags');
        $post->tags()->sync($tags);

        return redirect('posts/' . $post->id)->with('message', 'Thanks for your edit.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();
        $post->categories()->detach();
        $post->tags()->detach();
        $post->postComments()->delete();

        return redirect('/posts');
    }

    private function validateRequest()
    {
        // Není potřeba Purifier (asi) tinymce sám ošetřuje nepovolené znaky, změnit, pokud by byl potřeba přidat iframe např s youtube videem. Možná nebude fungovat až skonří free trial
        Purifier::clean(request()->get('content'));
        return request()->validate([
            'user_id' => 'required',
            'title' => 'required|min:3',
            'meta_title' => 'required',
            'visible' => 'required',
            'content' => '',
            'thumbnail' => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($post)
    {
        if (request()->has('thumbnail')) {
            $post->update([
                'thumbnail' => request()->thumbnail->store('uploads', 'public'),
            ]);
            
            $image = Image::make(public_path('storage/' . $post->thumbnail))->fit(275, 275);
            $image->save();
        }
    }
}
