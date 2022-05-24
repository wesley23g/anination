<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    /**
     * Stores the post after validating the attributes and setting the body as required
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }
}
