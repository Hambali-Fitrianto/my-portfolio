@extends('layouts.app')
@section('title', 'Manajemen Pendidikan')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Education</h1>
        <p class="text-gray-500 text-sm mt-1">Daftar riwayat pendidikan dan pencapaian akademik Anda.</p>
    </div>
    <a href="{{ route('education.create') }}" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Pendidikan
    </a>
</div>

<div class="grid grid-cols-1 gap-6">
    @forelse($educations as $item)
    <div class="card-admin p-8 border-l-4 border-l-blue-600 hover:bg-white/[0.02] transition-all duration-300">
        <div class="flex flex-col lg:flex-row justify-between gap-6">
            <div class="flex-1">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-2xl font-extrabold text-white tracking-tight">{{ $item->institusi }}</h2>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-blue-400 font-bold text-sm">{{ $item->gelar }}</span>
                            <span class="text-gray-600">•</span>
                            <span class="text-gray-400 text-sm">{{ $item->alamat }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-xs font-black text-gray-400 uppercase tracking-widest">
                            {{ $item->periode }}
                        </span>
                        @if($item->gpa)
                        <div class="mt-2">
                            <span class="text-xs font-bold text-green-500 bg-green-500/10 px-3 py-1 rounded-lg">
                                GPA: {{ $item->gpa }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                @if($item->tugas_akhir)
                <div class="mb-4 p-4 bg-white/5 rounded-xl border border-white/5">
                    <p class="text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1">Final Project / Thesis:</p>
                    <p class="text-xs text-gray-300 italic">"{{ $item->tugas_akhir }}"</p>
                </div>
                @endif

                <div class="mt-4">
                    <p class="text-[10px] font-bold text-gray-600 uppercase tracking-[0.2em] mb-2">Pencapaian & Spesialisasi</p>
                    <div class="text-gray-400 text-sm leading-relaxed">
                        {!! nl2br(e($item->deskripsi)) !!}
                    </div>
                </div>

                <div class="flex gap-3 mt-8 pt-6 border-t border-white/5">
                    <a href="{{ route('education.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500/10 text-yellow-500 text-xs font-bold rounded-lg hover:bg-yellow-500 hover:text-black transition flex items-center gap-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('education.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500/10 text-red-500 text-xs font-bold rounded-lg hover:bg-red-500 hover:text-white transition flex items-center gap-2" onclick="return confirm('Hapus riwayat pendidikan ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="card-admin p-20 text-center text-gray-600 border-dashed border-2">
        <i class="fas fa-graduation-cap text-5xl mb-6 block opacity-20"></i>
        <p class="text-xl font-bold">Belum ada data pendidikan.</p>
        <p class="text-sm mt-2">Klik tombol "Tambah Pendidikan" untuk melengkapi profil akademik Anda.</p>
    </div>
    @endforelse
</div>
@endsection