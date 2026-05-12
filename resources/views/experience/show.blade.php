@extends('layouts.app')
@section('title', 'Detail Riwayat Kerja')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div class="flex items-center gap-4">
            <a href="{{ route('experience.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Detail Pengalaman</h1>
                <p class="text-gray-500 text-sm">Review riwayat karir profesional.</p>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('experience.edit', $experience->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition flex items-center gap-2">
                <i class="fas fa-edit text-xs"></i> Edit Data
            </a>
        </div>
    </div>

    <div class="card-admin p-10 border-t-4 border-t-blue-600 bg-gradient-to-b from-blue-600/5 to-transparent">
        <div class="flex flex-col md:flex-row justify-between items-start gap-6 pb-10 border-b border-white/5">
            <div>
                <span class="text-blue-500 text-xs font-black uppercase tracking-[0.3em] mb-3 block">Professional Experience</span>
                <h2 class="text-4xl font-black text-white leading-tight mb-2">{{ $experience->posisi }}</h2>
                <div class="flex items-center gap-3 text-xl text-gray-400">
                    <i class="fas fa-building text-blue-500/50 text-sm"></i>
                    <span class="font-bold">{{ $experience->perusahaan }}</span>
                </div>
            </div>
            <div class="md:text-right">
                <div class="inline-block px-5 py-2 bg-white/5 border border-white/10 rounded-2xl">
                    <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Periode Kerja</p>
                    <p class="text-sm font-bold text-white">{{ $experience->periode }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
            <div class="space-y-6">
                <div>
                    <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-3">Lokasi / Alamat</h3>
                    <div class="flex items-start gap-3 text-gray-300">
                        <i class="fas fa-map-marker-alt text-blue-500 mt-1"></i>
                        <span class="text-sm leading-relaxed">{{ $experience->alamat }}</span>
                    </div>
                </div>

                <div>
                    <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-3">Metadata</h3>
                    <div class="text-xs text-gray-500 space-y-2 italic">
                        <p>Ditambahkan: {{ $experience->created_at->format('d M Y') }}</p>
                        <p>Terakhir Update: {{ $experience->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-4">Tugas & Kontribusi Teknis</h3>
                <div class="text-gray-300 leading-relaxed text-base">
                    <div class="bg-white/[0.02] border border-white/5 p-6 rounded-2xl">
                        {!! nl2br(e($experience->deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center">
        <p class="text-xs text-gray-600">
            <i class="fas fa-info-circle mr-1"></i> Data ini akan ditampilkan pada bagian "Resume/Experience" di Landing Page.
        </p>
    </div>
</div>
@endsection