@extends('layouts.header', ['titlePage' => $id->title])
@section('content')

@if (session('success'))
    <p>{{session('success')}}</p>    
@endif

<div class="bg-white shadow rounded p-6">
    <h1 class="text-3xl font-bold mb-4">{{$id->title}}</h1>
    <p class="text-gray-600 text-sm mb-4">{{$id->author->name}} — {{$id->created_at}}</p>
    <div class="text-gray-800 leading-relaxed mb-6">
        {{$id->deskr}}
    </div>

    <div class="flex gap-4">
        <a href="{{route('edit' , $id->id)}}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</a>
        <form method="post" action="{{route('destroy' , $id->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
        </form>    
            
    </div>
</div>
@endsection
