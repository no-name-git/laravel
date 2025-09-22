@extends('layouts.header', ['titlePage' => "Главная страница"])
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">All Posts</h1>

    {{-- надо красиво оформить --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="flex gap-6 justify-between flex-wrap">
        <!-- Пример одного поста -->
        @foreach ($posts as $post)
            <div class="max-w-[500px] bg-white shadow rounded p-4">
                <img  src="
                @if($post->image)
                    {{ asset('storage/' . $post->image) }}
                @else
                    {{ asset('images/defolt.png') }}
                @endif
                ">
                <a href="{{route('show' , $post->id)}}" class="text-xl font-semibold text-indigo-600">{{$post->title}}</a>
                <p class="text-gray-600 text-sm mb-2">{{$post->author->name}} — {{$post->created_at}}</p>
                <p class="text-gray-700">{{$post->deskr}}</p>
                <div class="mt-4 flex gap-2">
                    {{-- <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</button>
                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button> --}}
                </div>
            </div>
        @endforeach        

        <!-- Добавь столько постов, сколько хочешь -->
    </div>

    <div class="mt-6 flex justify-between">
        {{ $posts->links() }}
    </div>
</div>
@endsection