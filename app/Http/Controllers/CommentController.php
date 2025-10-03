<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request)
    {
        $date = $request->validated();
        Comment::create($date);
        return redirect()->route('show', ['id' => $date['post_id']]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments();
        dd($comments);
        return view('show', compact('comments'));
    }
}
