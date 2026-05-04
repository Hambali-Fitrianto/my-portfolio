<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0a0a0a;
            color: #d1d5db;
        }

        .glass-nav {
            background: rgba(17, 17, 17, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card-admin {
            background: #111;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <nav class="glass-nav sticky top-0 z-50 p-4 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="bg-blue-600 p-2 rounded-lg text-white">
                    <i class="fas fa-user-shield"></i>
                </span>
                <a href="{{ route('home') }}" class="font-bold text-xl text-white tracking-tighter">ADMIN<span class="text-blue-500">.</span></a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('profile.index') }}" class="text-sm font-medium hover:text-white transition">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm bg-red-500/10 text-red-500 px-4 py-2 rounded-full hover:bg-red-500 hover:text-white transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 pb-20">
        @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-500 p-4 rounded-xl mb-6 flex items-center gap-3">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif
        @yield('content')
    </div>
</body>

</html>