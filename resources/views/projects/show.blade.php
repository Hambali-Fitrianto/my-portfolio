@extends('layouts.app')
@section('title', 'Detail Project')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('projects.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Review Proyek</h1>
                <p class="text-gray-500 text-sm">Detail data teknis, kredensial demo, dan aset gambar.</p>
            </div>
        </div>
        <a href="{{ route('projects.edit', $project->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition flex items-center gap-2 text-sm shadow-lg shadow-yellow-500/10">
            <i class="fas fa-edit text-xs"></i> Edit Aplikasi
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="card-admin p-8 border-t-4 border-t-blue-600 bg-gradient-to-b from-blue-600/5 to-transparent">
                <div class="flex justify-between items-start gap-4 border-b border-white/5 pb-4 mb-6">
                    <div>
                        @if($project->tipe_project)
                        <span class="px-3 py-1 bg-blue-600/10 border border-blue-500/20 rounded-lg text-blue-400 text-[10px] font-black uppercase tracking-wider">
                            {{ $project->tipe_project }}
                        </span>
                        @else
                        <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-lg text-gray-500 text-[10px] font-black uppercase tracking-wider">
                            Umum
                        </span>
                        @endif
                        <h2 class="text-3xl font-black text-white tracking-tight mt-2">{{ $project->nama_project }}</h2>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Fungsionalitas Sistem</h4>
                        <p class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">{{ $project->deskripsi }}</p>
                    </div>

                    @if($project->fitur_kunci)
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2">Fitur Unggulan Sistem</h4>
                        <div class="text-gray-300 text-sm leading-relaxed p-4 bg-white/[0.02] border border-white/5 rounded-xl whitespace-pre-line font-mono">{{ $project->fitur_kunci }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card-admin p-8 space-y-4">
                <h3 class="text-sm font-black text-yellow-500 uppercase tracking-wider border-b border-white/5 pb-2">Kredensial / Akun Akses Demo</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-400">
                        <thead class="text-xs text-gray-500 uppercase bg-white/5 rounded-xl">
                            <tr>
                                <th class="px-4 py-3 font-bold rounded-l-xl">Role Akses</th>
                                <th class="px-4 py-3 font-bold">Username / Email</th>
                                <th class="px-4 py-3 font-bold rounded-r-xl">Password</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($project->accounts as $acc)
                            <tr class="hover:bg-white/[0.01] transition">
                                <td class="px-4 py-3 font-bold text-white flex items-center gap-2">
                                    <i class="fas fa-user-shield text-yellow-500/60 text-xs"></i>
                                    {{ $acc->role_akses }}
                                </td>
                                <td class="px-4 py-3 font-mono text-xs text-gray-300">{{ $acc->username }}</td>
                                <td class="px-4 py-3 font-mono text-xs text-gray-300">{{ $acc->password }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-xs italic text-gray-600">Tidak ada akun demo khusus untuk sistem ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="card-admin p-6 space-y-4 bg-white/[0.01]">
                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2">Teknologi / Stack</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                        <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-lg text-xs font-semibold text-gray-300">
                            {{ trim($tech) }}
                        </span>
                        @endforeach
                    </div>
                </div>

                @if($project->link_project)
                <div class="pt-4 border-t border-white/5">
                    <h4 class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-2">Link Source / Demo</h4>
                    <a href="{{ $project->link_project }}" target="_blank" class="text-xs text-blue-400 hover:underline flex items-center gap-2 truncate">
                        <i class="fas fa-external-link-alt text-[10px]"></i> {{ $project->link_project }}
                    </a>
                </div>
                @endif
            </div>

            <div class="card-admin p-6 space-y-4">
                <h3 class="text-xs font-black text-gray-400 uppercase tracking-wider border-b border-white/5 pb-2">Galeri Tangkapan Layar</h3>

                <div class="grid grid-cols-2 gap-3">
                    @forelse($project->images as $img)
                    <div class="relative group aspect-video rounded-xl overflow-hidden border border-white/10 bg-black">
                        <img src="{{ asset('storage/projects/' . $img->path_gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.src='https://placehold.co/600x400/222/555?text=Gambar+Tidak+Ditemukan'">
                        <a href="{{ asset('storage/projects/' . $img->path_gambar) }}" target="_blank" class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-bold gap-1">
                            <i class="fas fa-search-plus"></i> Lihat Original
                        </a>
                    </div>
                    @empty
                    <div class="col-span-2 py-8 text-center border border-dashed border-white/5 rounded-xl text-xs italic text-gray-600">
                        <i class="fas fa-images textxl mb-2 block opacity-20"></i> Belum ada screenshot sistem.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection