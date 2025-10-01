@extends('layouts.header', ['titlePage' => "Все пользователи"])
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6">All Users</h1>

    <div class="flex gap-6 justify-between flex-wrap">

    @foreach ($users as $user)
    @if ($user->profile)
        <div class="w-full flex">
            <div class="">
                <img src="
                    @if($user->avatar)
                        {{ asset('storage/' . $post->image) }}
                    @else
                        {{ asset('images/user/defolt.png') }}
                    @endif
                " class="w-[40px]" alt="Avatar">
            </div>
            <div class="ml-3">
                <p>{{ $user->name }}  {{ $user->profile->first_name }}</p>
                <p>{{ $user->profile->city }}</p>
            </div>

        </div>
    @else
        <p>Профиль не найден для пользователя {{ $user->name }}</p>
    @endif
@endforeach



        <!-- Пример одного поста -->
        {{-- @foreach ($users as $user)
            <div class="max-w-[500px] bg-white shadow rounded p-4">
                <img  src="
                @if($user->image)
                    {{ asset('storage/' . $user->image) }}
                @else
                    {{ asset('images/defolt.png') }}
                @endif
                ">
                <a href="{{route('show' , $user->id)}}" class="text-xl font-semibold text-indigo-600">{{$user->title}}</a>
                <p class="text-gray-600 text-sm mb-2">{{$user->author->name}} — {{$user->created_at}}</p>
                <p class="text-gray-700">{{$user->deskr}}</p>
                <div class="mt-4 flex gap-2">
                    @can('create', App\Models\Post::class)                        
                        <a href="{{ route('edit', $user->id) }}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</a>
                        <form action="{{ route('destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')                            
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach         --}}

        <!-- Добавь столько постов, сколько хочешь -->
    </div>

    <div class="mt-6 flex justify-between">
        {{-- {{ $users->links() }} --}}
    </div>
</div>
@endsection