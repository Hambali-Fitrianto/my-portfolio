<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nama ?? 'Hambali Fitrianto' }} | Portofolio</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        darkBg: '#050505',
                        lightBg: '#f8fafc',
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
            transition: background-color 0.3s, color 0.3s;
        }

        .glass-nav {
            background: rgba(5, 5, 5, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        html:not(.dark) .glass-nav {
            background: rgba(248, 250, 252, 0.8);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .card-gradient {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0.005) 100%);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        html:not(.dark) .card-gradient {
            background: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, 0.09) !important;
            box-shadow: 0 4px 24px -1px rgba(0, 0, 0, 0.04), 0 2px 8px -1px rgba(0, 0, 0, 0.02) !important;
        }

        .hero-glow {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 600px;
            background: radial-gradient(circle at 50% 0%, rgba(59, 130, 246, 0.12) 0%, rgba(5, 5, 5, 0) 70%);
            z-index: -1;
        }

        html:not(.dark) .hero-glow {
            background: radial-gradient(circle at 50% 0%, rgba(59, 130, 246, 0.05) 0%, rgba(248, 250, 252, 0) 70%);
        }
    </style>
</head>

<body class="bg-lightBg text-slate-700 dark:bg-darkBg dark:text-gray-300 antialiased font-sans">

    <div class="hero-glow"></div>

    <nav class="fixed top-0 w-full z-50 glass-nav">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">
            <div class="text-xl font-bold tracking-tighter text-slate-900 dark:text-white">
                {{ strtoupper($profile->nama ?? 'HAMBALI FITRIANTO') }}<span class="text-accent">.</span>
            </div>

            <div class="flex items-center space-x-4 sm:space-x-8 text-sm font-medium">
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400">Tentang</a>
                    <a href="#experience" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400">Pengalaman</a>
                    <a href="#education" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400">Pendidikan</a>
                    <a href="#projects" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400">Project</a>
                </div>

                <button onclick="toggleTheme()" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-200/60 dark:bg-white/5 border border-slate-300/50 dark:border-white/10 text-slate-800 dark:text-white hover:scale-105 transition" title="Ubah Tema">
                    <i id="theme-icon" class="fas fa-moon"></i>
                </button>

                <a href="mailto:{{ $profile->email ?? 'hambali.fitrianto01@gmail.com' }}" class="hidden sm:inline-block bg-slate-900 text-white dark:bg-white dark:text-black px-5 py-2 rounded-full font-bold hover:opacity-90 transition">
                    Kontak
                </a>
            </div>
        </div>
    </nav>

    <section id="about" class="min-h-screen flex flex-col items-center justify-center pt-24 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
            <div class="mb-6 px-4 py-1.5 rounded-full border border-blue-500/20 bg-blue-500/5 text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-[0.2em] max-w-full truncate">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse mr-2"></span>
                {{ $profile->sub_judul ?? 'Full-Stack Web Developer & System Integration' }}
            </div>

            @if($profile && $profile->foto)
            <div class="mb-8 relative">
                <div class="absolute inset-0 bg-blue-500 blur-3xl opacity-10 rounded-full"></div>
                <img src="{{ asset('storage/profile/' . $profile->foto) }}"
                    class="relative w-28 h-28 md:w-36 md:h-36 rounded-full object-cover border border-slate-300/60 dark:border-white/10 p-1 bg-white/5 shadow-xl">
            </div>
            @endif

            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black text-slate-900 dark:text-white leading-tight tracking-tight">
                {{ $profile->headline ?? 'Membangun Sistem Terintegrasi & Otomatisasi Efisien.' }}
            </h1>

            <p class="mt-6 text-slate-500 dark:text-gray-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
                @if($profile && $profile->deskripsi_singkat)
                {!! nl2br(e($profile->deskripsi_singkat)) !!}
                @else
                Saya seorang IT System Operator dan Web Developer yang berfokus pada sinkronisasi data real-time, integrasi API pihak ketiga, dan optimalisasi performa infrastruktur lokal maupun server.
                @endif
            </p>

            <div class="mt-10 flex flex-wrap justify-center items-center gap-4 sm:gap-6">
                @if($profile && $profile->cv_file)
                <a href="{{ asset('storage/cv/' . $profile->cv_file) }}" target="_blank"
                    class="flex items-center gap-3 bg-white dark:bg-white/5 border border-slate-300 dark:border-white/10 px-5 py-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-white/10 text-slate-900 dark:text-white font-bold text-xs sm:text-sm transition shadow-sm">
                    <span>Unduh CV</span>
                    <i class="fas fa-file-pdf text-red-500"></i>
                </a>
                @endif

                <div class="flex items-center gap-5">
                    @if($profile && $profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="text-slate-400 hover:text-slate-900 dark:text-gray-500 dark:hover:text-white transition text-xl sm:text-2xl" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    @endif

                    @if($profile && $profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="text-slate-400 hover:text-accent dark:text-gray-500 dark:hover:text-white transition text-xl sm:text-2xl" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-16 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-3">Riwayat Kerja</h2>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Pengalaman Profesional.</h3>
        </div>

        <div class="space-y-12">
            @forelse($experiences as $exp)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 pt-8 border-t border-slate-200/60 dark:border-white/5 first:border-t-0 first:pt-0">

                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 dark:text-gray-500 font-mono">{{ $exp->periode }}</span>
                    <h4 class="text-xl font-black text-slate-900 dark:text-white tracking-tight">{{ $exp->posisi }}</h4>
                    <p class="text-sm font-bold text-accent">{{ $exp->perusahaan }}</p>
                    <p class="text-xs text-slate-400 italic dark:text-gray-500">{{ $exp->alamat }}</p>
                </div>

                <div class="md:col-span-2">
                    <div class="card-gradient p-6 rounded-2xl text-sm leading-relaxed text-slate-600 dark:text-gray-400">
                        <p class="text-[10px] font-bold text-slate-400 dark:text-gray-500 uppercase tracking-widest mb-3">Tanggung Jawab Teknis:</p>
                        <div class="space-y-2">
                            {!! nl2br(e($exp->deskripsi)) !!}
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <p class="text-center text-sm text-gray-500 italic">Belum ada data pengalaman kerja.</p>
            @endforelse
        </div>
    </section>

    <section id="education" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-14 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-3">Edukasi</h2>
            <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Latar Belakang Pendidikan.</h3>
        </div>

        <div class="grid grid-cols-1 gap-6">
            @forelse($educations as $edu)
            <div class="card-gradient p-6 sm:p-8 rounded-3xl flex flex-col justify-between w-full">
                <div>
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                        <div>
                            <h4 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">{{ $edu->institusi }}</h4>
                            <p class="text-xs sm:text-sm text-slate-500 dark:text-gray-400 mt-0.5">{{ $edu->alamat }}</p>
                        </div>
                        <span class="text-[10px] font-bold px-3 py-1 bg-slate-200/50 dark:bg-white/5 border border-slate-300/30 dark:border-white/10 rounded-full text-slate-600 dark:text-gray-400 whitespace-nowrap">
                            {{ $edu->periode }}
                        </span>
                    </div>

                    <p class="text-sm sm:text-base font-bold text-accent mb-4">{{ $edu->gelar }}</p>

                    @if($edu->tugas_akhir)
                    <div class="mb-6 p-4 bg-slate-100 dark:bg-white/[0.02] border border-slate-200 dark:border-white/5 rounded-xl">
                        <span class="text-[9px] font-black text-accent uppercase tracking-wider block mb-1">Tugas Akhir / Skripsi:</span>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-gray-400 italic">"{{ $edu->tugas_akhir }}"</p>
                    </div>
                    @endif

                    <div class="text-xs sm:text-sm text-slate-500 dark:text-gray-400 leading-relaxed space-y-1">
                        {!! nl2br(e($edu->deskripsi)) !!}
                    </div>
                </div>

                @if($edu->gpa)
                <div class="mt-6 pt-4 border-t border-slate-200 dark:border-white/5 flex justify-between items-center">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Prestasi Akademik</span>
                    <span class="text-xs font-black text-green-600 dark:text-green-400 bg-green-500/10 px-2.5 py-1 rounded-lg">IPK {{ $edu->gpa }}</span>
                </div>
                @endif
            </div>
            @empty
            <p class="text-center text-sm text-gray-500 italic">Belum ada data riwayat pendidikan.</p>
            @endforelse
        </div>
    </section>

    <section id="projects" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-16 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-4">Portofolio</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">Project Unggulan.</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="card-gradient p-6 rounded-3xl group">
                <div class="mb-6 p-3 inline-block rounded-2xl bg-blue-500/10 text-accent">
                    <i class="fas fa-desktop text-lg"></i>
                </div>
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">SAP Monitoring Center</h4>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-gray-500 leading-relaxed mb-6">Real-time monitoring jalur produksi manufaktur menggunakan Python RFC untuk tracking performa stasiun kerja.</p>
                <div class="flex gap-2">
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">Python</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">SAP RFC</span>
                </div>
            </div>

            <div class="card-gradient p-6 rounded-3xl group">
                <div class="mb-6 p-3 inline-block rounded-2xl bg-blue-500/10 text-accent">
                    <i class="fas fa-tools text-lg"></i>
                </div>
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">MainTENZ</h4>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-gray-500 leading-relaxed mb-6">Sistem terpadu manajemen pemeliharaan mesin, manajemen work order, dan sinkronisasi log data via MaintainX API.</p>
                <div class="flex gap-2">
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">Laravel</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">API</span>
                </div>
            </div>

            <div class="card-gradient p-6 rounded-3xl group">
                <div class="mb-6 p-3 inline-block rounded-2xl bg-blue-500/10 text-accent">
                    <i class="fas fa-users text-lg"></i>
                </div>
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">AttenPay & Recruitment</h4>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-gray-500 leading-relaxed mb-6">Aplikasi monitoring data presensi dan sistem rekrutmen internal terintegrasi penuh ke Mekari Talenta API.</p>
                <div class="flex gap-2">
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">React.js</span>
                    <span class="text-[10px] font-bold px-2 py-1 bg-slate-200 dark:bg-white/5 rounded text-slate-600 dark:text-gray-400">Inertia</span>
                </div>
            </div>
        </div>
    </section>

    <footer class="border-t border-slate-200 dark:border-white/5 py-12 bg-slate-100 dark:bg-transparent">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.4em] text-slate-400 dark:text-gray-600 mb-3 italic">Build version 2.5</p>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white tracking-tighter">{{ strtoupper($profile->nama ?? 'Hambali Fitrianto') }}</h2>
            <div class="mt-6 text-slate-400 dark:text-gray-600 text-[10px] tracking-widest uppercase">
                &copy; {{ date('Y') }} Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
            document.getElementById('theme-icon').className = 'fas fa-sun';
        } else {
            document.documentElement.classList.add('dark');
            document.getElementById('theme-icon').className = 'fas fa-moon';
        }

        function toggleTheme() {
            const html = document.documentElement;
            const icon = document.getElementById('theme-icon');

            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                icon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                icon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>

</body>

</html>