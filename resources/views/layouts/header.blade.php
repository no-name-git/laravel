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
                <a href="{{route('create')}}" class="text-sm text-gray-600 hover:underline">Create post</a>
                <a href="" class="text-sm text-gray-600 hover:underline">Users</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:underline">Logout</a>
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