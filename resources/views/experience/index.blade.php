@extends('layouts.app')
@section('title', 'Riwayat Pengalaman Kerja')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Professional Experience</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola riwayat karir dan instansi tempat Anda bekerja.</p>
    </div>
    <a href="{{ route('experience.create') }}" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Pengalaman
    </a>
</div>

<div class="space-y-6">
    @forelse($experiences as $item)
    <div class="card-admin p-8 border-l-4 border-l-blue-600 hover:bg-white/[0.02] transition-all duration-300">
        <div class="flex flex-col lg:flex-row justify-between gap-6">
            <div class="flex-1">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-2xl font-extrabold text-white tracking-tight">{{ $item->posisi }}</h2>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-blue-500 font-bold">{{ $item->perusahaan }}</span>
                            <span class="text-gray-600">•</span>
                            <span class="text-gray-400 text-sm">{{ $item->alamat }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-xs font-black text-gray-400 uppercase tracking-widest">
                            {{ $item->periode }}
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-[10px] font-bold text-gray-600 uppercase tracking-[0.2em] mb-3 text-left">Tugas & Pencapaian Teknis</p>
                    <div class="text-gray-400 text-sm leading-relaxed prose prose-invert max-w-none">
                        {!! nl2br(e($item->deskripsi)) !!}
                    </div>
                </div>

                <div class="flex gap-3 mt-8 pt-6 border-t border-white/5">
                    <a href="{{ route('experience.show', $item->id) }}" class="px-4 py-2 bg-blue-500/10 text-blue-500 text-xs font-bold rounded-lg hover:bg-blue-500 hover:text-white transition flex items-center gap-2">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                    <a href="{{ route('experience.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500/10 text-yellow-500 text-xs font-bold rounded-lg hover:bg-yellow-500 hover:text-black transition flex items-center gap-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('experience.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500/10 text-red-500 text-xs font-bold rounded-lg hover:bg-red-500 hover:text-white transition flex items-center gap-2" onclick="return confirm('Hapus riwayat pengalaman ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="card-admin p-20 text-center text-gray-600 border-dashed border-2">
        <i class="fas fa-briefcase text-5xl mb-6 block opacity-20"></i>
        <p class="text-xl font-bold">Belum ada riwayat pengalaman.</p>
        <p class="text-sm mt-2 font-medium italic">Klik tombol "Tambah Pengalaman" untuk mengisi CV digital Anda.</p>
    </div>
    @endforelse
</div>
@endsection