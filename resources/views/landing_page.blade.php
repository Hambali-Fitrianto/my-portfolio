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

        /* Perbaikan Tengah Sempurna */
        .modal-active {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="bg-lightBg text-slate-700 dark:bg-darkBg dark:text-gray-300 antialiased font-sans relative">

    <div class="hero-glow"></div>

    <nav class="fixed top-0 w-full z-40 glass-nav">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">
            <div class="text-xl font-bold tracking-tighter text-slate-900 dark:text-white z-50">
                {{ strtoupper($profile->nama ?? 'HAMBALI FITRIANTO') }}<span class="text-accent">.</span>
            </div>

            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="#about" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Tentang</a>
                <a href="#education" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Pendidikan</a>
                <a href="#experience" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Pengalaman</a>
                <a href="#projects" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Project</a>
                <a href="#skills" class="hover:text-slate-900 dark:hover:text-white transition text-slate-500 dark:text-gray-400 font-semibold">Skill</a>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-4 z-50">
                <button onclick="toggleTheme()" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-200/60 dark:bg-white/5 border border-slate-300/50 dark:border-white/10 text-slate-800 dark:text-white hover:scale-105 transition shadow-sm cursor-pointer" title="Ubah Tema">
                    <i id="theme-icon" class="fas fa-moon"></i>
                </button>

                <a href="mailto:{{ $profile->email ?? 'hambali.fitrianto01@gmail.com' }}" class="hidden sm:inline-block bg-slate-900 text-white dark:bg-white dark:text-black px-5 py-2.5 rounded-full font-bold hover:opacity-90 text-sm transition shadow-md">
                    Kontak
                </a>

                <button id="menu-btn" class="flex md:hidden w-10 h-10 items-center justify-center rounded-xl bg-slate-200/60 dark:bg-white/5 border border-slate-300/50 dark:border-white/10 text-slate-800 dark:text-white text-lg transition cursor-pointer" aria-label="Toggle Menu">
                    <i id="menu-icon" class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden fixed inset-0 top-20 bg-lightBg/95 dark:bg-darkBg/95 backdrop-blur-lg flex-col px-6 py-8 space-y-6 text-lg font-semibold border-b border-slate-200 dark:border-white/5 h-screen max-h-[calc(100vh-5rem)] overflow-y-auto">
            <a href="#about" class="mobile-link text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white border-b border-slate-200/50 dark:border-white/5 pb-3">Tentang</a>
            <a href="#education" class="mobile-link text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white border-b border-slate-200/50 dark:border-white/5 pb-3">Pendidikan</a>
            <a href="#experience" class="mobile-link text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white border-b border-slate-200/50 dark:border-white/5 pb-3">Pengalaman</a>
            <a href="#projects" class="mobile-link text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white border-b border-slate-200/50 dark:border-white/5 pb-3">Project</a>
            <a href="#skills" class="mobile-link text-slate-500 dark:text-gray-400 hover:text-slate-900 dark:hover:text-white border-b border-slate-200/50 dark:border-white/5 pb-3">Skill</a>
            <a href="mailto:{{ $profile->email ?? 'hambali.fitrianto01@gmail.com' }}" class="mobile-link inline-block text-center bg-slate-900 text-white dark:bg-white dark:text-black py-3 rounded-xl font-bold transition shadow-md">
                Hubungi Kontak
            </a>
        </div>
    </nav>

    <section id="about" class="min-h-screen flex flex-col items-center justify-center pt-28 pb-12 px-4 sm:px-6">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto w-full">

            <div class="mb-6 px-4 py-2 rounded-2xl md:rounded-full border border-blue-500/20 bg-blue-500/5 text-blue-600 dark:text-blue-400 text-[10px] sm:text-xs font-bold uppercase tracking-[0.15em] flex flex-wrap items-center justify-center gap-2 max-w-[95%] sm:max-w-full text-center leading-relaxed">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse flex-shrink-0"></span>
                <span>{{ $profile->sub_judul ?? 'Full-Stack Developer | System Integration' }}</span>
            </div>

            @if($profile && $profile->foto)
            <div class="mb-8 relative group">
                <div class="absolute inset-0 bg-blue-500 blur-3xl opacity-10 rounded-full"></div>
                <button type="button" onclick="openLightboxModal('{{ asset('storage/profile/' . $profile->foto) }}')" 
                    class="relative w-28 h-28 md:w-36 md:h-36 rounded-full border border-slate-300/60 dark:border-white/10 p-1 bg-white/5 shadow-xl overflow-hidden cursor-pointer hover:scale-105 transition-all duration-300 block z-10">
                    <img src="{{ asset('storage/profile/' . $profile->foto) }}" class="w-full h-full rounded-full object-cover">
                    <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
                        <i class="fas fa-search-plus text-white text-base md:text-lg"></i>
                    </div>
                </button>
            </div>
            @endif

            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black text-slate-900 dark:text-white leading-tight tracking-tight px-2">
                Membangun Sistem <span class="text-accent">Full-Stack</span> & Integrasi Sistem Komprehensif
            </h1>

            <p class="mt-6 text-slate-500 dark:text-gray-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed font-medium px-2">
                @if($profile && $profile->deskripsi_singkat)
                {!! nl2br(e($profile->deskripsi_singkat)) !!}
                @else
                Saya seorang IT System Operator dan Web Developer yang berfokus pada sinkronisasi data real-time, integrasi API pihak ketiga, dan optimalisasi performa infrastruktur lokal maupun server.
                @endif
            </p>

            <div class="mt-10 flex flex-wrap justify-center items-center gap-4 sm:gap-6 w-full">
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

    <section id="projects" class="max-w-5xl mx-auto px-4 sm:px-6 py-24 border-t border-slate-200 dark:border-white/5">
        <div class="mb-16 text-center md:text-left">
            <h2 class="text-xs font-bold text-accent uppercase tracking-[0.3em] mb-4">Portofolio</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white tracking-tight">Project Terbaru</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
            <div class="card-gradient rounded-3xl overflow-hidden flex flex-col justify-between group bg-white/5 shadow-lg hover:shadow-xl transition-all duration-300 w-full relative">
                <div>
                    <div class="relative aspect-video w-full overflow-hidden bg-black/50 border-b border-slate-200/10 dark:border-white/5 group/imgContainer">
                        @if($project->images->count() > 0)
                        <button type="button" onclick="openLightboxModal('{{ asset('storage/projects/' . $project->images->first()->path_gambar) }}')" 
                            class="w-full h-full block cursor-pointer overflow-hidden relative z-10">
                            <img src="{{ asset('storage/projects/' . $project->images->first()->path_gambar) }}"
                                alt="{{ $project->nama_project }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/imgContainer:opacity-100 flex items-center justify-center transition-opacity duration-300">
                                <i class="fas fa-search-plus text-white text-lg"></i>
                            </div>
                        </button>
                        @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400 dark:text-slate-500">
                            <i class="fas fa-code text-3xl mb-2 opacity-40"></i>
                            <span class="text-xs font-bold tracking-wider uppercase opacity-40">No Preview</span>
                        </div>
                        @endif

                        @if($project->tipe_project)
                        <span class="absolute top-3 left-3 bg-blue-600 text-white text-[9px] font-black uppercase px-2.5 py-1 rounded-md tracking-wider shadow-md pointer-events-none z-20">
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
                            class="btn-open-detail w-full text-center py-2.5 px-3 bg-slate-100 hover:bg-slate-200 dark:bg-white/5 dark:hover:bg-white/10 text-slate-900 dark:text-white text-xs font-bold rounded-xl border border-slate-300/50 dark:border-white/10 transition flex items-center justify-center gap-1.5 cursor-pointer relative z-30"
                            data-name="{{ $project->nama_project }}"
                            data-desc="{{ $project->deskripsi }}"
                            data-features="{{ $project->fitur_kunci }}"
                            data-link="{{ $project->link_project }}"
                            data-accounts="{{ json_encode($project->accounts) }}"
                            data-images="{{ json_encode($project->images->map(fn($img) => asset('storage/projects/' . $img->path_gambar))) }}">
                            <i class="fas fa-layer-group text-[11px] opacity-70"></i> Detail
                        </button>

                        @if($project->link_project)
                        <a href="{{ $project->link_project }}" target="_blank"
                            class="w-full text-center py-2.5 px-3 bg-blue-600 hover:bg-blue-700 text-white text-xs font-extrabold rounded-xl transition flex items-center justify-center gap-1.5 shadow-md shadow-blue-500/20 group/btn relative z-30">
                            <span>Live</span>
                            <i class="fas fa-arrow-right text-[9px] transform group-hover/btn:translate-x-0.5 transition-transform"></i>
                        </a>
                        @else
                        <button type="button" disabled
                            class="w-full py-2.5 px-3 bg-slate-200 dark:bg-white/[0.02] text-slate-400 dark:text-gray-600 text-xs font-bold rounded-xl border border-dashed border-slate-300 dark:border-white/5 cursor-not-allowed flex items-center justify-center gap-1 relative z-30">
                            <i class="fas fa-desktop text-[10px] opacity-50"></i> Internal
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

    <div id="portfolioModal" class="fixed inset-0 z-50 hidden p-2 sm:p-4 bg-black/80 backdrop-blur-md opacity-0 transition-opacity duration-300 overflow-y-auto custom-scrollbar">
        <div class="m-auto bg-slate-50 dark:bg-[#0f0f11] border border-slate-200 dark:border-white/10 rounded-3xl max-w-4xl w-full flex flex-col shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-white/5 flex justify-between items-center sticky top-0 bg-slate-50 dark:bg-[#0f0f11] z-50">
                <h3 id="modalProjectName" class="text-lg font-black text-slate-900 dark:text-white tracking-tight">Detail Project</h3>
                <button type="button" id="closePortfolioModal" class="text-gray-400 hover:text-slate-900 dark:hover:text-white bg-slate-200/50 hover:bg-slate-200 dark:bg-white/5 dark:hover:bg-white/10 w-8 h-8 rounded-xl flex items-center justify-center transition cursor-pointer">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>

            <div class="p-6 space-y-8 text-sm text-slate-700 dark:text-gray-300">
                <div class="space-y-2">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400">Fungsionalitas Sistem</h5>
                    <p id="modalProjectDesc" class="leading-relaxed text-slate-600 dark:text-gray-400 text-xs sm:text-sm whitespace-pre-line"></p>
                </div>

                <div id="modalFeaturesWrapper" class="space-y-2">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400">Fitur Unggulan</h5>
                    <div id="modalProjectFeatures" class="p-4 bg-slate-100 dark:bg-white/[0.03] border border-slate-200 dark:border-white/5 rounded-xl text-xs leading-relaxed"></div>
                </div>

                <div id="modalAccountsWrapper" class="space-y-3">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400">Akses Akun Uji Coba</h5>
                    <div class="overflow-x-auto border border-slate-200 dark:border-white/5 rounded-xl bg-white/50 dark:bg-white/[0.01] custom-scrollbar">
                        <table class="w-full text-left text-xs min-w-[450px]">
                            <thead class="bg-slate-100 dark:bg-white/5 text-slate-500 dark:text-gray-400 uppercase font-bold text-[9px] tracking-wider border-b border-slate-200 dark:border-white/5">
                                <tr>
                                    <th class="px-4 py-3">Role</th>
                                    <th class="px-4 py-3">Username</th>
                                    <th class="px-4 py-3">Password</th>
                                </tr>
                            </thead>
                            <tbody id="modalProjectAccounts" class="divide-y divide-slate-200 dark:divide-white/5 text-xs text-slate-700 dark:text-gray-300"></tbody>
                        </table>
                    </div>
                </div>

                <div id="modalImagesWrapper" class="space-y-3">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400">Galeri Antarmuka</h5>
                    <div id="modalProjectImages" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                </div>
            </div>

            <div id="modalActionFooter" class="px-6 py-4 border-t border-slate-200 dark:border-white/5 bg-slate-100/50 dark:bg-white/[0.02] flex justify-end items-center">
                <a id="modalDemoLink" href="#" target="_blank"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs px-6 py-3 rounded-xl shadow-lg shadow-blue-500/20 transition group/modalBtn">
                    <span>Eksplorasi Live</span>
                    <i class="fas fa-external-link-alt text-[10px] transform group-hover/modalBtn:scale-110 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="lightboxModal" class="fixed inset-0 z-[60] hidden p-4 bg-black/95 backdrop-blur-lg opacity-0 transition-opacity duration-300 items-center justify-center">
        <div class="relative max-w-5xl w-full transform scale-95 transition-transform duration-300 flex flex-col items-center">
            <button type="button" onclick="closeLightboxModal()" class="absolute -top-12 right-0 text-white hover:text-gray-400 bg-white/10 w-10 h-10 rounded-full flex items-center justify-center transition cursor-pointer">
                <i class="fas fa-times"></i>
            </button>
            <img id="lightboxImg" src="" class="max-w-full max-h-[80vh] rounded-xl object-contain shadow-2xl">
        </div>
    </div>

    <footer class="border-t border-slate-200 dark:border-white/5 py-12 bg-slate-100 dark:bg-transparent">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-xl font-bold text-slate-900 dark:text-white tracking-tighter">{{ strtoupper($profile->nama ?? 'Hambali Fitrianto') }}</h2>
            <div class="mt-6 text-slate-400 dark:text-gray-600 text-[10px] tracking-widest uppercase">
                &copy; {{ date('Y') }} - All Rights Reserved.
            </div>
        </div>
    </footer>

    <button id="backToTopBtn" type="button" class="fixed bottom-6 right-6 z-50 p-3.5 rounded-2xl bg-blue-600 text-white shadow-xl opacity-0 translate-y-4 transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Theme Engine
        function applyTheme() {
            if (localStorage.getItem('theme') === 'light') {
                document.documentElement.classList.remove('dark');
                document.getElementById('theme-icon').className = 'fas fa-sun';
            } else {
                document.documentElement.classList.add('dark');
                document.getElementById('theme-icon').className = 'fas fa-moon';
            }
        }
        applyTheme();

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            const isDark = document.documentElement.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            document.getElementById('theme-icon').className = isDark ? 'fas fa-moon' : 'fas fa-sun';
        }

        // Lightbox Handler
        function openLightboxModal(src) {
            const lb = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImg');
            img.src = src;
            document.documentElement.style.overflow = 'hidden';
            lb.classList.remove('hidden');
            lb.classList.add('modal-active');
            setTimeout(() => {
                lb.classList.remove('opacity-0');
                lb.querySelector('.transform').classList.remove('scale-95');
            }, 10);
        }

        function closeLightboxModal() {
            const lb = document.getElementById('lightboxModal');
            lb.classList.add('opacity-0');
            lb.querySelector('.transform').classList.add('scale-95');
            setTimeout(() => {
                lb.classList.remove('modal-active');
                lb.classList.add('hidden');
                if (document.getElementById('portfolioModal').classList.contains('hidden')) {
                    document.documentElement.style.overflow = '';
                }
            }, 300);
        }

        // Project Detail Handler
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('portfolioModal');
            const btnClose = document.getElementById('closePortfolioModal');
            const backToTopBtn = document.getElementById('backToTopBtn');

            // Open Detail
            document.querySelectorAll('.btn-open-detail').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const data = {
                        name: this.getAttribute('data-name'),
                        desc: this.getAttribute('data-desc'),
                        features: this.getAttribute('data-features'),
                        link: this.getAttribute('data-link'),
                        accounts: JSON.parse(this.getAttribute('data-accounts')),
                        images: JSON.parse(this.getAttribute('data-images'))
                    };

                    document.getElementById('modalProjectName').innerText = data.name;
                    document.getElementById('modalProjectDesc').innerText = data.desc;
                    document.getElementById('modalProjectFeatures').innerText = data.features || '-';
                    
                    const accBody = document.getElementById('modalProjectAccounts');
                    accBody.innerHTML = '';
                    if (data.accounts.length) {
                        document.getElementById('modalAccountsWrapper').classList.remove('hidden');
                        data.accounts.forEach(acc => {
                            accBody.innerHTML += `<tr class="border-b dark:border-white/5">
                                <td class="px-4 py-3 font-bold">${acc.role_akses}</td>
                                <td class="px-4 py-3 select-all">${acc.username}</td>
                                <td class="px-4 py-3 select-all">${acc.password}</td>
                            </tr>`;
                        });
                    } else {
                        document.getElementById('modalAccountsWrapper').classList.add('hidden');
                    }

                    const imgGrid = document.getElementById('modalProjectImages');
                    imgGrid.innerHTML = '';
                    data.images.forEach(src => {
                        imgGrid.innerHTML += `<div class="aspect-video rounded-xl overflow-hidden bg-black cursor-pointer group relative" onclick="openLightboxModal('${src}')">
                            <img src="${src}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"><i class="fas fa-search-plus text-white"></i></div>
                        </div>`;
                    });

                    if (data.link) {
                        document.getElementById('modalActionFooter').classList.remove('hidden');
                        document.getElementById('modalDemoLink').href = data.link;
                    } else {
                        document.getElementById('modalActionFooter').classList.add('hidden');
                    }

                    document.documentElement.style.overflow = 'hidden';
                    modal.classList.remove('hidden');
                    modal.classList.add('modal-active');
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
                    modal.classList.remove('modal-active');
                    modal.classList.add('hidden');
                    document.documentElement.style.overflow = '';
                }, 300);
            }

            btnClose.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

            // Hamburger Menu
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            menuBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
                document.getElementById('menu-icon').className = isHidden ? 'fas fa-times' : 'fas fa-bars';
            });

            // Scroll Logic
            window.addEventListener('scroll', () => {
                const show = window.scrollY > 300;
                backToTopBtn.classList.toggle('opacity-0', !show);
                backToTopBtn.classList.toggle('translate-y-4', !show);
            });
            backToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        });
    </script>
</body>
</html>