<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $date = $request->validated();
        // dd($date);
        Post::create($date);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function show(Post $id)
    {
        return view('show', compact('id'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    // public function edit(UpdatePostRequest $request, Post $id)
    public function edit(Post $id) 
    {
        return view('edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $id)
    {
        $date = $request->validated();
        $id->update($date);
        return redirect()->route('show' , $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $id->delete();
        return redirect()->route('index');
    }
}
