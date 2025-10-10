<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titlePage}}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{route('index')}}" class="text-xl font-bold text-indigo-600">What i know?</a>
            
            <div class="flex items-center">
                <form class="flex w-full max-w-sm bg-white rounded border shadow-md">
                    <input
                        type="text"
                        placeholder="Поиск..."
                        class="flex-1 px-4 py-2 text-gray-700 border-none rounded-l focus:outline-none"
                    />
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r"
                    >
                        Найти
                    </button>
                </form>
            </div>
            
            <nav class="flex gap-4 nav items-center">
                <a href="{{route('index')}}" class="text-sm text-gray-600 hover:underline">Posts</a>
                @auth
                    <a href="{{route('create')}}" class="text-sm text-gray-600 hover:underline">Create post</a>
                    <a href="{{ route('users.index') }}" class="text-sm text-gray-600 hover:underline">Users</a>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">log in</a>
                    <a href="{{route('register')}}" class="px-3 py-1 bg-pink-600 text-white rounded hover:bg-pink-700">register</a>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Logout</button>
                    </form>
                @endauth
                @auth
                    <a class="flex flex-col items-center" href="{{ route('user.show', Auth::user()->id) }}">
                        <img src="
                            @if(Auth::user()->profile->avatar)
                                {{asset('storage/' . Auth::user()->profile->avatar)}}
                            @else
                                {{asset('images/avatar/defolt.png')}}
                            @endif
                        " 
                        class="w-10 h-10 rounded-full border-2 border-gray-300" alt="avatar">    
                            {{Auth::user()->last_name}}
                    </a>
                @endauth
                {{-- <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">Logout</a> --}}
            </nav>
        </div>
    </header>

    @if (session('success'))
        <div class="mt-[20px] max-w-5xl mx-auto mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
            {{session('success')}}    
        </div>
    @endif

    <div class="mt-[20px] max-w-5xl mx-auto">
        @yield('content')
    </div>



    <!-- Main -->
    <main class="max-w-5xl mx-auto px-4 py-6">

        

        <!-- Page content will go here -->
        <section id="content"></section>

    </main>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>