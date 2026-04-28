<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nama ?? 'Hambali Fitrianto' }} | Portfolio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#050505',
                        accent: '#3b82f6',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #050505;
        }

        .glass-nav {
            background: rgba(5, 5, 5, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card-gradient {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .hero-glow {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 600px;
            background: radial-gradient(circle at 50% 0%, rgba(59, 130, 246, 0.15) 0%, rgba(5, 5, 5, 0) 70%);
            z-index: -1;
        }
    </style>
</head>

<body class="text-gray-300 antialiased">

    <div class="hero-glow"></div>

    <nav class="fixed top-0 w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="text-xl font-bold tracking-tighter text-white">
                {{ strtoupper(explode(' ', $profile->nama ?? 'HAMBALI')[0]) }}<span class="text-accent">.</span>
            </div>

            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="#about" class="hover:text-white transition">Tentang</a>
                <a href="#projects" class="hover:text-white transition">Project</a>
                <a href="mailto:{{ $profile->email ?? '' }}" class="bg-white text-black px-5 py-2 rounded-full font-bold hover:bg-gray-200 transition">
                    Kontak
                </a>
            </div>

            <div class="md:hidden text-white">
                <i class="fas fa-bars text-xl"></i>
            </div>
        </div>
    </nav>

    <section id="about" class="min-h-screen flex flex-col items-center justify-center pt-20 px-6">
        <div class="flex flex-col items-center text-center">
            <div class="mb-8 px-4 py-1.5 rounded-full border border-blue-500/20 bg-blue-500/5 text-blue-400 text-[10px] font-bold uppercase tracking-[0.2em]">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse mr-2"></span>
                Web Developer & IT Programmer
            </div>

            @if($profile && $profile->foto)
            <div class="mb-10 relative">
                <div class="absolute inset-0 bg-blue-500 blur-2xl opacity-20 rounded-full"></div>
                <img src="{{ asset('storage/profile/' . $profile->foto) }}"
                    class="relative w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-2 border-white/10 p-1">
            </div>
            @endif

            <h1 class="text-4xl md:text-7xl font-extrabold text-white leading-tight tracking-tight max-w-4xl">
                {{ $profile->headline ?? 'Building scalable systems with code.' }}
            </h1>

            <p class="mt-8 text-gray-400 text-base md:text-lg max-w-2xl leading-relaxed">
                {{ $profile->deskripsi_singkat ?? 'Saya seorang developer yang fokus pada efisiensi dan integrasi sistem.' }}
            </p>

            <div class="mt-12 flex flex-wrap justify-center gap-4">
                @if($profile && $profile->cv_file)
                <a href="{{ asset('storage/cv/' . $profile->cv_file) }}" target="_blank"
                    class="flex items-center gap-3 bg-white/5 border border-white/10 px-6 py-3 rounded-xl hover:bg-white/10 transition group">
                    <span class="text-sm font-bold text-white">Unduh CV</span>
                    <i class="fas fa-file-pdf text-red-400 group-hover:scale-110 transition"></i>
                </a>
                @endif

                <div class="flex items-center gap-4 ml-0 md:ml-4">
                    <a href="{{ $profile->github_url ?? '#' }}" class="text-gray-500 hover:text-white transition text-xl"><i class="fab fa-github"></i></a>
                    <a href="{{ $profile->linkedin_url ?? '#' }}" class="text-gray-500 hover:text-white transition text-xl"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="max-w-7xl mx-auto px-6 py-32">
        <div class="mb-16">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-4 text-center md:text-left">Portofolio</h2>
            <h3 class="text-3xl md:text-5xl font-bold text-white text-center md:text-left tracking-tight">Project Pilihan.</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card-gradient p-8 rounded-3xl hover:border-blue-500/30 transition-all duration-500 group">
                <div class="flex justify-between items-start mb-6">
                    <div class="p-3 rounded-2xl bg-blue-500/10 text-accent">
                        <i class="fas fa-code text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-right -rotate-45 text-gray-600 group-hover:text-white transition"></i>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">E-Voting System</h4>
                <p class="text-sm text-gray-500 leading-relaxed mb-6">Sistem pemungutan suara berbasis web menggunakan Laravel untuk keamanan dan real-time monitoring.</p>
                <div class="flex gap-2">
                    <span class="text-[10px] font-bold px-2 py-1 bg-white/5 rounded text-gray-400">Laravel</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-white/5 rounded text-gray-400">MySQL</span>
                </div>
            </div>

            <div class="card-gradient p-8 rounded-3xl hover:border-blue-500/30 transition-all duration-500 group">
                <div class="flex justify-between items-start mb-6">
                    <div class="p-3 rounded-2xl bg-blue-500/10 text-accent">
                        <i class="fas fa-database text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-right -rotate-45 text-gray-600 group-hover:text-white transition"></i>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">SAP Monitor</h4>
                <p class="text-sm text-gray-500 leading-relaxed mb-6">Monitoring produksi secara real-time yang terintegrasi langsung dengan API SAP enterprise.</p>
                <div class="flex gap-2">
                    <span class="text-[10px] font-bold px-2 py-1 bg-white/5 rounded text-gray-400">Python</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-white/5 rounded text-gray-400">RFC</span>
                </div>
            </div>
        </div>
    </section>

    <footer class="border-t border-white/5 py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.5em] text-gray-600 mb-4 italic">Crafted by</p>
            <h2 class="text-2xl font-bold text-white tracking-tighter">{{ strtoupper($profile->nama ?? 'Hambali Fitrianto') }}</h2>
            <div class="mt-8 text-gray-600 text-[10px] tracking-widest uppercase">
                &copy; {{ date('Y') }} All Rights Reserved
            </div>
        </div>
    </footer>

</body>

</html>