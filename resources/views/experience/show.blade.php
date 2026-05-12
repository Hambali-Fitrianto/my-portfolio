@extends('layouts.app')
@section('title', 'Detail Pengalaman')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div class="flex items-center gap-4">
            <a href="{{ route('experience.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Detail Pengalaman</h1>
                <p class="text-gray-500 text-sm">Review data teknis dan dokumentasi sistem.</p>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('experience.edit', $experience->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition flex items-center gap-2">
                <i class="fas fa-edit text-xs"></i> Edit Data
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="card-admin p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="text-blue-500 text-xs font-bold uppercase tracking-[0.2em] mb-2 block">Project / Work Experience</span>
                        <h2 class="text-3xl font-bold text-white">{{ $experience->posisi }}</h2>
                        <p class="text-xl text-gray-400 mt-1">{{ $experience->perusahaan }}</p>
                    </div>
                    <div class="text-right">
                        <span class="px-4 py-2 bg-blue-600/10 border border-blue-600/20 rounded-full text-xs font-bold text-blue-400 uppercase tracking-widest">
                            {{ $experience->periode }}
                        </span>
                    </div>
                </div>

                <div class="border-t border-white/5 pt-6">
                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Deskripsi Pekerjaan & Teknologi</h3>
                    <div class="text-gray-300 leading-relaxed text-base space-y-4">
                        {!! nl2br(e($experience->deskripsi)) !!}
                    </div>
                </div>
            </div>

            <div class="card-admin p-8">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">System Screenshots ({{ count($experience->foto_ss ?? []) }})</h3>
                <div class="grid grid-cols-1 gap-6">
                    @forelse($experience->foto_ss ?? [] as $foto)
                    <div class="rounded-2xl overflow-hidden border border-white/10 bg-white/5">
                        <img src="{{ asset('storage/experience/' . $foto) }}" class="w-full h-auto object-cover" alt="Screenshot">
                        <div class="p-3 bg-black/40 text-center">
                            <a href="{{ asset('storage/experience/' . $foto) }}" target="_blank" class="text-[10px] font-bold text-gray-500 hover:text-blue-400 transition uppercase tracking-widest">
                                <i class="fas fa-expand mr-1"></i> Lihat Gambar Penuh
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="py-20 text-center border-2 border-dashed border-white/5 rounded-3xl">
                        <i class="fas fa-image text-4xl text-gray-700 mb-4 block"></i>
                        <p class="text-gray-600 font-bold uppercase text-xs tracking-widest">Tidak ada screenshot</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="card-admin p-6 bg-blue-600/5 border-blue-600/10">
                <h3 class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-4">Akses Project</h3>

                <div class="space-y-4">
                    <div>
                        <p class="text-[10px] text-gray-500 uppercase font-bold mb-2">Live Website:</p>
                        @if($experience->link_website)
                        <a href="{{ $experience->link_website }}" target="_blank" class="flex items-center justify-between p-3 bg-white/5 rounded-xl border border-white/10 hover:border-blue-500/50 transition group">
                            <span class="text-xs text-white truncate mr-2">{{ $experience->link_website }}</span>
                            <i class="fas fa-external-link-alt text-blue-500 text-xs group-hover:scale-110 transition"></i>
                        </a>
                        @else
                        <p class="text-xs text-gray-600 italic">Link tidak tersedia</p>
                        @endif
                    </div>

                    <div>
                        <p class="text-[10px] text-gray-500 uppercase font-bold mb-2">Akun Demo / Credentials:</p>
                        @if($experience->akun_demo)
                        <div class="p-4 bg-[#050505] rounded-xl border border-white/5 font-mono text-xs text-blue-300 leading-relaxed">
                            {!! nl2br(e($experience->akun_demo)) !!}
                        </div>
                        @else
                        <p class="text-xs text-gray-600 italic">Info akun tidak tersedia</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-admin p-6">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Metadata</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center border-b border-white/5 pb-2">
                        <span class="text-[10px] text-gray-600 font-bold uppercase">ID Data</span>
                        <span class="text-xs text-white">#{{ $experience->id }}</span>
                    </div>
                    <div class="flex justify-between items-center border-b border-white/5 pb-2">
                        <span class="text-[10px] text-gray-600 font-bold uppercase">Dibuat</span>
                        <span class="text-xs text-white">{{ $experience->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] text-gray-600 font-bold uppercase">Update</span>
                        <span class="text-xs text-white">{{ $experience->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection