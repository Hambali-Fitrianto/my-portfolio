<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nama ?? 'Hambali Fitrianto' }} | Portofolio</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 999px;
        }

        html:not(.dark) .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-lightBg text-slate-700 dark:bg-darkBg dark:text-gray-300 antialiased font-sans relative">

    <div class="hero-glow"></div>

    <nav class="fixed top-0 w-full z-40 glass-nav">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">
            <div class="text-xl font-black tracking-tighter text-slate-900 dark:text-white">
                {{ strtoupper($profile->nama ?? 'HAMBALI FITRIANTO') }}<span class="text-accent">.</span>
            </div>

            <div class="flex items-center space-x-4 sm:space-x-8 text-sm font-medium">
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#about" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Tentang</a>
                    <a href="#education" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Pendidikan</a>
                    <a href="#experience" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Pengalaman</a>
                    <a href="#projects" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Project</a>
                    <a href="#skills" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Skill</a>
                </div>

                <button onclick="toggleTheme()" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-200/60 dark:bg-white/5 border border-slate-300/50 dark:border-white/10 text-slate-800 dark:text-white hover:scale-105 transition shadow-sm cursor-pointer" title="Ubah Tema">
                    <i id="theme-icon" class="fas fa-moon"></i>
                </button>

                <a href="mailto:{{ $profile->email ?? 'hambali.fitrianto01@gmail.com' }}" class="hidden sm:inline-block bg-slate-900 text-white dark:bg-white dark:text-black px-5 py-2 rounded-full font-bold hover:opacity-90 transition shadow-md">
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

            <p class="mt-6 text-slate-500 dark:text-gray-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed font-medium">
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

    <section id="projects" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-16 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-4">Portofolio</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">Project Unggulan.</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
            <div class="card-gradient rounded-3xl overflow-hidden flex flex-col justify-between group bg-white/5 shadow-lg hover:shadow-xl transition-all duration-300">
                <div>
                    <div class="relative aspect-video w-full overflow-hidden bg-black/50 border-b border-slate-200/10 dark:border-white/5">
                        @if($project->images->count() > 0)
                        <img src="{{ asset('storage/projects/' . $project->images->first()->path_gambar) }}"
                            alt="{{ $project->nama_project }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 dark:text-slate-500">
                            <i class="fas fa-code text-3xl mb-2 opacity-40"></i>
                            <span class="text-xs font-bold tracking-wider uppercase opacity-40">No Preview</span>
                        </div>
                        @endif

                        @if($project->tipe_project)
                        <span class="absolute top-3 left-3 bg-blue-600 text-white text-[9px] font-black uppercase px-2.5 py-1 rounded-md tracking-wider shadow-md">
                            {{ $project->tipe_project }}
                        </span>
                        @endif
                    </div>

                    <div class="p-6 space-y-3">
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white tracking-tight truncate">
                            {{ $project->nama_project }}
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-500 dark:text-gray-400 leading-relaxed line-clamp-3">
                            {{ $project->deskripsi }}
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 space-y-4 mt-auto">
                    <div class="flex flex-wrap gap-1.5 pt-2">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                        <span class="text-[10px] font-semibold px-2 py-0.5 bg-slate-100 dark:bg-white/5 rounded-md text-slate-600 dark:text-gray-400 border border-slate-200 dark:border-white/5">
                            {{ trim($tech) }}
                        </span>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-3 border-t border-slate-200 dark:border-white/5">
                        <button type="button"
                            class="btn-open-detail w-full text-center py-2.5 px-3 bg-slate-100 hover:bg-slate-200 dark:bg-white/5 dark:hover:bg-white/10 text-slate-900 dark:text-white text-xs font-bold rounded-xl border border-slate-300/50 dark:border-white/10 transition flex items-center justify-center gap-1.5 cursor-pointer"
                            data-name="{{ $project->nama_project }}"
                            data-desc="{{ $project->deskripsi }}"
                            data-features="{{ $project->fitur_kunci }}"
                            data-link="{{ $project->link_project }}"
                            data-accounts="{{ json_encode($project->accounts) }}"
                            data-images="{{ json_encode($project->images->map(fn($img) => asset('storage/projects/' . $img->path_gambar))) }}">
                            <i class="fas fa-layer-group text-[11px] opacity-70"></i> Detail Info
                        </button>

                        @if($project->link_project)
                        <a href="{{ $project->link_project }}" target="_blank"
                            class="w-full text-center py-2.5 px-3 bg-blue-600 hover:bg-blue-700 text-white text-xs font-extrabold rounded-xl transition flex items-center justify-center gap-1.5 shadow-md shadow-blue-500/20 group/btn"
                            title="Buka dan Eksplorasi Aplikasi">
                            <span>Live Preview</span>
                            <i class="fas fa-arrow-right text-[9px] transform group-hover/btn:translate-x-0.5 transition-transform"></i>
                        </a>
                        @else
                        <button type="button" disabled
                            class="w-full py-2.5 px-3 bg-slate-200 dark:bg-white/[0.02] text-slate-400 dark:text-gray-600 text-xs font-bold rounded-xl border border-dashed border-slate-300 dark:border-white/5 cursor-not-allowed flex items-center justify-center gap-1"
                            title="Aplikasi berjalan di server lokal / internal">
                            <i class="fas fa-desktop text-[10px] opacity-50"></i> Local Only
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3 py-16 text-center text-slate-400 dark:text-gray-600">
                <i class="fas fa-project-diagram text-4xl mb-3 block opacity-30"></i>
                <p class="text-sm italic">Belum ada karya proyek yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>
    </section>

    <section id="skills" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-16 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-4">Keahlian</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">Tech Stack & Infrastructure.</h3>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse($skills as $skill)
            <div class="card-gradient p-4 rounded-2xl flex items-center gap-3.5 bg-white/5 hover:scale-[1.02] hover:border-blue-500/20 transition-all duration-300 group/card">
                <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/5 group-hover/card:bg-blue-600 group-hover/card:text-white flex items-center justify-center text-accent text-lg transition duration-300 flex-shrink-0">
                    <i class="{{ $skill->ikon ?? 'fas fa-laptop-code' }}"></i>
                </div>
                <div class="overflow-hidden flex-1">
                    <h5 class="text-sm font-bold text-slate-900 dark:text-white truncate" title="{{ $skill->nama_skill }}">{{ $skill->nama_skill }}</h5>
                    <span class="text-[10px] text-slate-400 block truncate" title="{{ $skill->kategori }}">{{ $skill->kategori }}</span>
                </div>
            </div>
            @empty
            <div class="col-span-2 sm:col-span-3 md:col-span-4 py-12 text-center text-slate-400 dark:text-gray-600 border border-dashed border-white/5 rounded-2xl">
                <i class="fas fa-laptop-code text-3xl mb-2 opacity-30"></i>
                <p class="text-xs italic">Daftar keahlian belum ditambahkan di panel admin.</p>
            </div>
            @endforelse
        </div>
    </section>

    <footer class="border-t border-slate-200 dark:border-white/5 py-12 bg-slate-100 dark:bg-transparent">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <p class="text-xs font-bold uppercase tracking-[0.4em] text-slate-400 dark:text-gray-600 mb-3 italic">Build version 2.6</p>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white tracking-tighter">{{ strtoupper($profile->nama ?? 'Hambali Fitrianto') }}</h2>
            <div class="mt-6 text-slate-400 dark:text-gray-600 text-[10px] tracking-widest uppercase">
                &copy; {{ date('Y') }} Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>

    <button id="backToTopBtn" type="button"
        class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-blue-600/90 text-white shadow-xl shadow-blue-500/20 hover:bg-blue-600 hover:scale-110 active:scale-95 transition-all duration-300 opacity-0 translate-y-4 pointer-events-none cursor-pointer backdrop-blur-sm border border-white/10 flex items-center justify-center"
        title="Kembali ke Atas">
        <i class="fas fa-chevron-up text-sm animate-bounce"></i>
    </button>

    <div id="portfolioModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-slate-50 dark:bg-[#0f0f11] border border-slate-200 dark:border-white/10 rounded-3xl max-w-4xl w-full max-h-[85vh] flex flex-col shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-white/5 flex justify-between items-center bg-white/[0.01]">
                <h3 id="modalProjectName" class="text-lg font-black text-slate-900 dark:text-white tracking-tight">Detail Project</h3>
                <button type="button" id="closePortfolioModal" class="text-gray-400 hover:text-slate-900 dark:hover:text-white bg-slate-200/50 hover:bg-slate-200 dark:bg-white/5 dark:hover:bg-white/10 w-8 h-8 rounded-xl flex items-center justify-center transition cursor-pointer">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto space-y-6 flex-1 text-sm text-slate-700 dark:text-gray-300 custom-scrollbar">
                <div class="space-y-1.5">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Fungsionalitas Sistem</h5>
                    <p id="modalProjectDesc" class="leading-relaxed text-slate-600 dark:text-gray-400 text-xs sm:text-sm whitespace-pre-line"></p>
                </div>

                <div id="modalFeaturesWrapper" class="space-y-1.5">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Fitur Unggulan</h5>
                    <div id="modalProjectFeatures" class="p-4 bg-slate-100 dark:bg-white/[0.02] border border-slate-200 dark:border-white/5 rounded-xl font-mono text-xs text-blue-600 dark:text-blue-400 whitespace-pre-line leading-relaxed"></div>
                </div>

                <div id="modalAccountsWrapper" class="space-y-2">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Akses Akun Uji Coba</h5>
                    <div class="overflow-x-auto border border-slate-200 dark:border-white/5 rounded-xl bg-white/50 dark:bg-white/[0.01]">
                        <table class="w-full text-left text-xs min-w-[500px] sm:min-w-full">
                            <thead class="bg-slate-100 dark:bg-white/5 text-slate-500 dark:text-gray-400 uppercase font-bold text-[9px] tracking-wider border-b border-slate-200 dark:border-white/5">
                                <tr>
                                    <th class="px-4 py-3">Hak Akses / Role</th>
                                    <th class="px-4 py-3">Username / Email</th>
                                    <th class="px-4 py-3">Password</th>
                                </tr>
                            </thead>
                            <tbody id="modalProjectAccounts" class="divide-y divide-slate-200 dark:divide-white/5 font-mono text-xs text-slate-700 dark:text-gray-300"></tbody>
                        </table>
                    </div>
                </div>

                <div id="modalImagesWrapper" class="space-y-3">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Galeri Antarmuka Aplikasi</h5>
                    <div id="modalProjectImages" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                </div>
            </div>

            <div id="modalActionFooter" class="px-6 py-4 border-t border-slate-200 dark:border-white/5 bg-slate-100 dark:bg-white/[0.01] flex justify-end items-center">
                <a id="modalDemoLink" href="#" target="_blank"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs px-6 py-3 rounded-xl shadow-lg shadow-blue-500/20 transition group/modalBtn">
                    <span>Eksplorasi Aplikasi Sekarang</span>
                    <i class="fas fa-external-link-alt text-[10px] transform group-hover/modalBtn:scale-110 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        // HANDLING THEME (DARK / LIGHT)
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

        // CONTROL LOGIC JAVASCRIPT
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('portfolioModal');
            const btnClose = document.getElementById('closePortfolioModal');
            const modalDemoLink = document.getElementById('modalDemoLink');
            const modalActionFooter = document.getElementById('modalActionFooter');
            const backToTopBtn = document.getElementById('backToTopBtn');

            const htmlElement = document.documentElement;
            const bodyElement = document.body;

            // LOGIC UTK TOMBOL BACK TO TOP (DIPICU SCROLL SEJAUH 300px)
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                } else {
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                    backToTopBtn.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                }
            });

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // MODAL DISPLAYER
            document.querySelectorAll('.btn-open-detail').forEach(btn => {
                btn.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const desc = this.getAttribute('data-desc');
                    const features = this.getAttribute('data-features');
                    const link = this.getAttribute('data-link');
                    const accounts = JSON.parse(this.getAttribute('data-accounts'));
                    const images = JSON.parse(this.getAttribute('data-images'));

                    document.getElementById('modalProjectName').innerText = name;
                    document.getElementById('modalProjectDesc').innerText = desc;

                    if (link && link.trim() !== "") {
                        modalActionFooter.classList.remove('hidden');
                        modalDemoLink.setAttribute('href', link);
                    } else {
                        modalActionFooter.classList.add('hidden');
                    }

                    const featWrapper = document.getElementById('modalFeaturesWrapper');
                    if (features && features.trim() !== "") {
                        featWrapper.classList.remove('hidden');
                        document.getElementById('modalProjectFeatures').innerText = features;
                    } else {
                        featWrapper.classList.add('hidden');
                    }

                    const accWrapper = document.getElementById('modalAccountsWrapper');
                    const accTbody = document.getElementById('modalProjectAccounts');
                    accTbody.innerHTML = '';
                    if (accounts && accounts.length > 0) {
                        accWrapper.classList.remove('hidden');
                        accounts.forEach(acc => {
                            const tr = document.createElement('tr');
                            tr.className = 'border-b border-slate-200 dark:border-white/5 last:border-0';
                            tr.innerHTML = `
                                <td class="px-4 py-3 font-bold text-slate-900 dark:text-white">${acc.role_akses}</td>
                                <td class="px-4 py-3 text-slate-600 dark:text-gray-300 select-all">${acc.username}</td>
                                <td class="px-4 py-3 text-slate-600 dark:text-gray-300 select-all">${acc.password}</td>
                            `;
                            accTbody.appendChild(tr);
                        });
                    } else {
                        accWrapper.classList.add('hidden');
                    }

                    const imgWrapper = document.getElementById('modalImagesWrapper');
                    const imgContainer = document.getElementById('modalProjectImages');
                    imgContainer.innerHTML = '';
                    if (images && images.length > 0) {
                        imgWrapper.classList.remove('hidden');
                        images.forEach(src => {
                            const item = document.createElement('div');
                            item.className = 'relative aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-white/5 bg-black shadow-inner';
                            item.innerHTML = `<img src="${src}" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400/222/555?text=Preview+Error'">`;
                            imgContainer.appendChild(item);
                        });
                    } else {
                        imgWrapper.classList.add('hidden');
                    }

                    // Kunci scroll body di belakang modal
                    htmlElement.classList.add('overflow-hidden');
                    bodyElement.classList.add('overflow-hidden');

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    setTimeout(() => {
                        modal.classList.remove('opacity-0');
                        modal.querySelector('.transform').classList.remove('scale-95');
                    }, 10);
                });
            });

            function closeModal() {
                modal.classList.add('opacity-0');
                modal.querySelector('.transform').classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');

                    // Kembalikan fungsi scroll normal halaman utama
                    htmlElement.classList.remove('overflow-hidden');
                    bodyElement.classList.remove('overflow-hidden');
                }, 300);
            }

            btnClose.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
            });
        });
    </script>
</body>

</html>