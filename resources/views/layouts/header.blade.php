<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titlePage}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">Admin Blog</h1>
            <nav class="flex gap-4">
                <a href="#" class="text-sm text-indigo-600 hover:underline">Dashboard</a>
                <a href="#" class="text-sm text-gray-600 hover:underline">Posts</a>
                <a href="#" class="text-sm text-gray-600 hover:underline">Users</a>
                <a href="#" class="text-sm text-gray-600 hover:underline">Logout</a>
            </nav>
        </div>
    </header>



    <div class="max-w-5xl mx-auto">
        @yield('content')
    </div>



    <!-- Main -->
    <main class="max-w-5xl mx-auto px-4 py-6">

        <!-- Success message -->
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
            Action completed successfully!
        </div>

        <!-- Page content will go here -->
        <section id="content"></section>

    </main>
</body>
</html>