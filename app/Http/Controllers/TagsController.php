<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $this->authorize('viewAny', Tag::class);

        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $this->authorize('viewAny', Tag::class);

        $tag = new tag();

        return view('tags.create', compact('tag'));
    }

    public function store()
    {
        $this->authorize('viewAny', Tag::class);

        $tag = Tag::create($this->validateRequest());

        return redirect('tags');
    }

    public function show(Tag $tag)
    {
        $this->authorize('viewAny', Tag::class);

        return view('tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $this->authorize('viewAny', Tag::class);

        return view('tags.edit', compact('tag'));
    }

    public function update(Tag $tag)
    {
        $this->authorize('viewAny', Tag::class);

        $tag->update($this->validateRequest());

        return redirect('tags/' . $tag->id)->with('message', 'Thanks for your edit.');
    }

    public function destroy(Tag $tag)
    {
        $this->authorize('viewAny', Tag::class);
        
        $tag->delete();
        $tag->posts()->detach();

        return redirect('/tags');
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'meta_title' => 'required|min:3',
            'content' => 'required|min:3'
        ]);
    }
}
