@extends('layouts.header', ['titlePage' => $post->title])
@section('content')

<div class="bg-white shadow rounded p-6">
    <img src="
    @if($post->image)
        {{ asset('storage/' . $post->image) }}
    @else
        {{ asset('images/defolt.png') }}
    @endif
    ">
    <h1 class="text-3xl font-bold mb-4">{{$post->title}}</h1>
    <p class="text-gray-600 text-sm mb-4">Author: {{$post->author->name}} — {{$post->created_at}}</p>
    <div class="text-gray-800 leading-relaxed mb-6">
        {{$post->deskr}}
    </div>

    <div class="flex gap-4">
        @can('update', $post)
            <a href="{{route('edit' , $post->id)}}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</a>
        @endcan
        @can('delete', $post)
            
        <form method="post" action="{{route('destroy' , $post->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
        </form>    
        @endcan
            
    </div>
    <div>
    </div>
    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <div class="flex gap-4 mt-4">
            <div>
                {{-- тут надо будет переделать как разберусь с авторизацией ларавел  --}}
                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-[48px] h-[48px] rounded-full">
            </div>
            <div class="flex flex-col">
                <h3>{{$comment->user->name . " " . $comment->user->profile->first_name}}</h3>
                <p>{{$comment->text_comment}}</p>
                @if ($comment->image_comment)
                    <img src="{{ asset('storage/' . $comment->image_comment) }}"
                    alt="{{$comment->text_comment}}"  class="max-w-[150px]">
                @endif
                <p>{{$comment->created_at}}</p>
            </div>
        </div>

    @endforeach

    <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data" class="flex mt-6">
        @csrf
        <input type="file" name="image_comment">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <textarea name="text_comment" id="" cols="100" rows="1"></textarea>
        <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">to send</button>
    </form>
</div>
@endsection
