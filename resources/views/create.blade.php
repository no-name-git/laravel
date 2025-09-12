@extends('layouts.header', ['titlePage' => "Создание поста"])
@section('content')

<div>
    <h1 class="text-2xl font-bold mb-6">Create / Edit Post</h1>

    <form class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" placeholder="Enter post title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div>
            <label class="block mb-1 font-medium">Content</label>
            <textarea rows="5" placeholder="Enter post content" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Author</label>
            <input type="text" placeholder="Admin" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
    </form>
</div>
@endsection
