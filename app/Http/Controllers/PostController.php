<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $posts = Post::orderBy($sort, $order)->paginate(6);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        return view('create', compact('user_id'));
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
        if($request->hasFile('image')){
            $path = $request->file('image')->store('posts', 'public');
            $date['image'] = $path;
        }
        // dd($date);
        Post::create($date);
        return redirect()->route('index')->with('success', 'Post is create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('show', compact('post'));
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
        $this->authorize('update', $id);
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
        if($request->hasFile('image')){
            $path = $request->file('image')->store('posts', 'public');
            $date['image'] = $path;
        }
        $id->update($date);
        return redirect()->route('show' , $id->id)->with('success', 'Update post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostController  $postController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $this->authorize('delete', $id);
        $id->delete();
        return redirect()->route('index')->with('success', 'Post is delete!');
    }
}
