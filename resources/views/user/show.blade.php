@extends('layouts.header', ['titlePage' => "Главная страница"])
@section('content')
<div class="mt-5 max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <div class="flex items-center p-4">
        <img class="w-20 h-20 rounded-full border-2 border-gray-300" src="
        @if($user->avatar != '')
            {{asset('storage/' . $user->avatar)}}
        @else
            {{asset('images/avatar/defolt.png')}}
        @endif
        " alt="Avatar">
        <div class="ml-4">
            {{-- @dd($user) --}}
            <h2 class="text-xl font-semibold text-gray-800">{{$user->user->last_name . " " . $user->user->first_name}}</h2>
            <p class="text-gray-600">Город: <span class="font-medium">{{$user->city}}</span></p>
            <p class="text-gray-600">Хобби: <span class="font-medium">{{$user->hobbi}}</span></p>
            <p class="text-gray-600">Постов: <span class="font-medium">{{$user->user->posts()->count()}}</span></p>
        </div>
    </div>
    {{-- <div class="border-t border-gray-200">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">О себе</h3>
            <p class="text-gray-600 mt-2">Краткая информация о пользователе или его интересах. Здесь можете рассказать о себе, своих увлечениях и целях.</p>
        </div>
    </div> --}}
    
</div>
<a href="{{route('user.edit', $user->id)}}">Edit profile</a>
@endsection