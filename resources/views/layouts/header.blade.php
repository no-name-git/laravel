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
            <nav class="flex gap-4 nav">
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
                    <a href="{{ route('user.profile', Auth::user()->id) }}">{{Auth::user()->name}}</a>
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