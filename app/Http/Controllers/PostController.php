<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function show(PostController $postController)
    {
        return view('show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function edit(PostController $postController)
    {
        return view('create');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostController $postController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostController $postController)
    {
        //
    }
}
