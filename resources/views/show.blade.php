@extends('layouts.header', ['titlePage' => "заголовок поста"])
@section('content')


<div class="bg-white shadow rounded p-6">
    <h1 class="text-3xl font-bold mb-4">Post Title 1</h1>
    <p class="text-gray-600 text-sm mb-4">by Admin — 11.09.2025 16:00</p>
    <div class="text-gray-800 leading-relaxed mb-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, nisi vel consectetur.
    </div>

    <div class="flex gap-4">
        <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</button>
        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
    </div>
</div>
@endsection
