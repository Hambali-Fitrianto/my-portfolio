@extends('layouts.app')
@section('title', 'Manajemen Pengalaman')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Experience</h1>
        <p class="text-gray-500 text-sm mt-1">Daftar riwayat pekerjaan dan proyek sistem yang telah dibangun.</p>
    </div>
    <a href="{{ route('experience.create') }}" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Pengalaman
    </a>
</div>

<div class="grid grid-cols-1 gap-6">
    @forelse($experiences as $item)
    <div class="card-admin p-6 flex flex-col lg:flex-row gap-8 hover:border-blue-500/30 transition-all duration-500 group">
        <div class="flex-1">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-2xl font-bold text-white group-hover:text-blue-400 transition">{{ $item->posisi }}</h2>
                    <p class="text-blue-500 font-semibold">{{ $item->perusahaan }}</p>
                </div>
                <span class="px-4 py-1 bg-white/5 border border-white/10 rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    {{ $item->periode }}
                </span>
            </div>

            <div class="text-gray-400 text-sm leading-relaxed mb-6">
                {!! nl2br(e($item->deskripsi)) !!}
            </div>

            <div class="space-y-3">
                @if($item->link_website)
                <a href="{{ $item->link_website }}" target="_blank" class="flex items-center gap-3 text-xs text-gray-400 hover:text-white transition">
                    <i class="fas fa-external-link-alt text-blue-500"></i>
                    <span class="underline decoration-blue-500/30">{{ $item->link_website }}</span>
                </a>
                @endif

                @if($item->akun_demo)
                <div class="p-4 bg-blue-500/5 border border-blue-500/10 rounded-xl">
                    <p class="text-[10px] font-bold text-blue-400 uppercase tracking-widest mb-2">Access / Demo Account:</p>
                    <p class="text-xs text-gray-300 font-mono">{{ $item->akun_demo }}</p>
                </div>
                @endif
            </div>

            <div class="flex gap-3 mt-8">
                <a href="{{ route('experience.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500/10 text-yellow-500 text-xs font-bold rounded-lg hover:bg-yellow-500 hover:text-black transition">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <form action="{{ route('experience.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500/10 text-red-500 text-xs font-bold rounded-lg hover:bg-red-500 hover:text-white transition" onclick="return confirm('Hapus pengalaman ini?')">
                        <i class="fas fa-trash mr-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:w-80 w-full flex-shrink-0">
            <p class="text-[10px] font-bold text-gray-600 uppercase tracking-widest mb-4">Screenshots ({{ count($item->foto_ss ?? []) }})</p>
            <div class="grid grid-cols-2 gap-3">
                @forelse($item->foto_ss ?? [] as $foto)
                <a href="{{ asset('storage/experience/' . $foto) }}" target="_blank" class="relative group/img overflow-hidden rounded-xl border border-white/5 aspect-video">
                    <img src="{{ asset('storage/experience/' . $foto) }}" class="w-full h-full object-cover transition duration-500 group-hover/img:scale-110">
                    <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover/img:opacity-100 transition flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-sm"></i>
                    </div>
                </a>
                @empty
                <div class="col-span-2 py-10 border-2 border-dashed border-white/5 rounded-2xl flex flex-col items-center justify-center text-gray-600">
                    <i class="fas fa-image text-2xl mb-2 opacity-20"></i>
                    <p class="text-[10px] uppercase font-bold tracking-tighter">No Screenshot</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    @empty
    <div class="card-admin p-20 text-center text-gray-600 border-dashed border-2">
        <i class="fas fa-briefcase text-5xl mb-6 block opacity-20"></i>
        <p class="text-xl font-bold">Belum ada pengalaman kerja.</p>
        <p class="text-sm mt-2">Mulai tambahkan pengalaman profesional atau proyek kamu.</p>
    </div>
    @endforelse
</div>
@endsection