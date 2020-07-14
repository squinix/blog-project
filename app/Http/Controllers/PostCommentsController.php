<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostComment;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $comment = new PostComment();

        $comment = PostComment::create($this->validateRequest());

        return redirect('blog/' . $post->id)->with('message', 'Thanks for your edit.');
    }

    public function edit(PostComment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(PostComment $comment)
    {
        $comment->update($this->validateRequest());

        return redirect('posts/' . $comment->post->id)->with('message', 'Thanks for your edit.');
    }

    public function destroy(PostComment $comment)
    {
        $comment->delete();

        return redirect('posts/' . $comment->post->id)->with('message', 'Thanks for your edit.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'post_id' => 'required',
            'title' => 'required|min:3',
            'email' => 'required',
            'visible' => 'required',
            'content' => 'required|min:3'
        ]);
    }
}
