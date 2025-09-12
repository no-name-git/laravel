@extends('layouts.header', ['titlePage' => "Главная страница"])
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">All Posts</h1>

    <div class="space-y-4">
        <!-- Пример одного поста -->
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded p-4">
                <h2 class="text-xl font-semibold text-indigo-600">{{$post->title}}</h2>
                <p class="text-gray-600 text-sm mb-2">{{$post->author->name}} — {{$post->created_at}}</p>
                <p class="text-gray-700">{{$post->deskr}}</p>
                <div class="mt-4 flex gap-2">
                    <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</button>
                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                </div>
            </div>
        @endforeach        

        <!-- Добавь столько постов, сколько хочешь -->
    </div>

    <div class="mt-6 flex justify-between">
        <button class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Previous</button>
        <button class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Next</button>
    </div>
</div>
@endsection