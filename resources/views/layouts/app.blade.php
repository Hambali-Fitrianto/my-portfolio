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
            background-color: #050505;
            color: #d1d5db;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .sidebar {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* State Sidebar Tertutup */
        .sidebar-closed {
            transform: translateX(-100%);
            margin-left: -16rem;
        }

        .nav-link {
            transition: all 0.3s;
            border-radius: 0.75rem;
            color: #9ca3af;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .card-admin {
            background: #0f0f0f;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 1.5rem;
        }

        /* Smooth transition untuk main content */
        main {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body class="flex min-h-screen">

    <aside id="sidebar" class="sidebar w-64 flex-shrink-0 flex flex-col h-screen sticky top-0 z-50">
        <div class="p-6">
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-600/20">
                        <i class="fas fa-cube text-xl"></i>
                    </div>
                    <span class="font-black text-xl text-white tracking-tighter uppercase">Admin<span class="text-blue-500">.</span></span>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="space-y-2">
                <p class="px-4 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-600 mb-4">Menu Utama</p>
                <a href="{{ route('profile.index') }}" class="nav-link flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <i class="fas fa-user-circle w-5"></i>
                    <span class="text-sm font-semibold">Manajemen Profil</span>
                </a>
                <a href="#" class="nav-link flex items-center gap-3 px-4 py-3 opacity-50 cursor-not-allowed italic">
                    <i class="fas fa-briefcase w-5"></i>
                    <span class="text-sm font-semibold text-xs">Soon: Experience</span>
                </a>
                <a href="#" class="nav-link flex items-center gap-3 px-4 py-3 opacity-50 cursor-not-allowed italic">
                    <i class="fas fa-project-diagram w-5"></i>
                    <span class="text-sm font-semibold text-xs">Soon: Projects</span>
                </a>
            </nav>
        </div>

        <div class="mt-auto p-6 border-t border-white/5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-500/10 rounded-xl transition font-semibold text-sm">
                    <i class="fas fa-sign-out-alt w-5"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <main id="main-content" class="flex-1 h-screen overflow-y-auto bg-[#050505] relative">
        <header class="p-6 flex justify-between items-center sticky top-0 bg-[#050505]/80 backdrop-blur-md z-40 border-b border-white/5">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="p-2 bg-white/5 rounded-lg text-white hover:bg-white/10 transition">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="hidden md:block text-gray-400 text-sm">
                    Dashboard / <span class="text-white">@yield('title')</span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold text-white leading-none">Hambali Fitrianto </p>
                    <p class="text-[10px] text-gray-500 mt-1">IT Operator </p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-600/20 flex items-center justify-center text-blue-500 border border-blue-500/20 font-bold">
                    H
                </div>
            </div>
        </header>

        <div class="p-8 pt-6">
            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-closed');
        }
    </script>
</body>

</html>