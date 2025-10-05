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
        if($request->hasFile('image_comment')){
            $path = $request->file('image_comment')->store('comments', 'public');
            $date['image_comment'] = $path;
        }
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
