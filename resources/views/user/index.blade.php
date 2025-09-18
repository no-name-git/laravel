@extends('layouts.header', ['titlePage' => "Все пользователи"])
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">All Users</h1>
@dd($users)
    <div class="space-y-4">
        <!-- Пример одного поста -->
        @foreach ($users as $user)
            <div class="bg-white shadow rounded p-4">
                <a href="" class="text-xl font-semibold text-indigo-600">{{$user->name}}</a>
                <p class="text-gray-600 text-sm mb-2">{{$user->email}} — {{$user->created_at}}</p>
                <div class="mt-4 flex gap-2">
                    {{-- <button class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</button>
                    <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button> --}}
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