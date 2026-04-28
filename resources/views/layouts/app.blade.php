<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <nav class="bg-blue-700 p-4 text-white shadow-lg mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-xl">My Portfolio</a>
            <div class="space-x-4">
                <a href="{{ route('profile.index') }}" class="hover:underline">Profile</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center p-10 text-gray-500 text-sm">
        &copy; {{ date('Y') }} Hambali Fitrianto. All Rights Reserved.
    </footer>
</body>

</html>