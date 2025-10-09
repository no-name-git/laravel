@extends('layouts.header', ['titlePage' => "Главная страница"])
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">All Posts</h1>

    <ul class="flex gap-3">
        @foreach ($categoris as $categor)
            <li><a href="{{ route('categori', $categor->id) }}">{{$categor->name}}</a></li>
        @endforeach
    </ul>

    
    <div class="flex mt-5 gap-6 justify-between flex-wrap">
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
                <p class="text-gray-700">{{$post->categori->name}}</p>

                <div class="mt-4 flex gap-2">
                    @can('create', App\Models\Post::class)                        
                        <a href="{{ route('edit', $post->id) }}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</a>
                        <form action="{{ route('destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')                            
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                        </form>
                    @endcan
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