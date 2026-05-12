@extends('layouts.app')
@section('title', 'Detail Pendidikan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div class="flex items-center gap-4">
            <a href="{{ route('education.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Detail Pendidikan</h1>
                <p class="text-gray-500 text-sm">Informasi lengkap riwayat akademik.</p>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('education.edit', $education->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition flex items-center gap-2">
                <i class="fas fa-edit text-xs"></i> Edit Data
            </a>
        </div>
    </div>

    <div class="card-admin p-10 border-t-4 border-t-blue-600 bg-gradient-to-b from-blue-600/5 to-transparent relative overflow-hidden">
        <i class="fas fa-graduation-cap absolute -right-10 -bottom-10 text-9xl text-white/[0.02] -rotate-12"></i>

        <div class="flex flex-col md:flex-row justify-between items-start gap-6 pb-10 border-b border-white/5">
            <div class="flex-1">
                <span class="text-blue-500 text-xs font-black uppercase tracking-[0.3em] mb-3 block">Academic Background</span>
                <h2 class="text-4xl font-black text-white leading-tight mb-2">{{ $education->institusi }}</h2>
                <div class="flex flex-wrap items-center gap-3 text-xl text-gray-400">
                    <span class="font-bold text-blue-400">{{ $education->gelar }}</span>
                    <span class="hidden md:block text-gray-600">•</span>
                    <span class="text-sm italic">{{ $education->alamat }}</span>
                </div>
            </div>
            <div class="md:text-right flex flex-col items-end gap-3">
                <div class="px-5 py-2 bg-white/5 border border-white/10 rounded-2xl">
                    <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1">Periode</p>
                    <p class="text-sm font-bold text-white">{{ $education->periode }}</p>
                </div>
                @if($education->gpa)
                <div class="px-5 py-2 bg-green-500/10 border border-green-500/20 rounded-2xl">
                    <p class="text-[10px] font-black text-green-500 uppercase tracking-widest mb-1">Grade / GPA</p>
                    <p class="text-xl font-black text-green-400 leading-none">{{ $education->gpa }}</p>
                </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
            <div class="md:col-span-2 space-y-8">
                @if($education->tugas_akhir)
                <div>
                    <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-4">Final Project / Skripsi</h3>
                    <div class="p-6 bg-blue-600/5 border border-blue-600/10 rounded-2xl relative">
                        <i class="fas fa-quote-left absolute top-4 left-4 text-blue-600/20 text-xl"></i>
                        <p class="text-gray-200 font-semibold italic text-lg leading-relaxed pl-6">
                            "{{ $education->tugas_akhir }}"
                        </p>
                    </div>
                </div>
                @endif

                <div>
                    <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-4">Pencapaian & Spesialisasi</h3>
                    <div class="text-gray-300 leading-relaxed text-base bg-white/[0.02] border border-white/5 p-6 rounded-2xl">
                        {!! nl2br(e($education->deskripsi)) !!}
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="card-admin p-6 bg-white/[0.02]">
                    <h3 class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-4">Metadata</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] text-gray-600 font-bold uppercase">Status</span>
                            <span class="text-xs text-green-500 font-bold">Verified</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] text-gray-600 font-bold uppercase">Added on</span>
                            <span class="text-xs text-white">{{ $education->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-2xl border border-dashed border-white/10 text-center">
                    <p class="text-[10px] text-gray-600 font-bold uppercase mb-2 leading-tight">Focus Areas</p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <span class="px-2 py-1 bg-white/5 rounded text-[10px] text-gray-400 italic">Data Analysis</span>
                        <span class="px-2 py-1 bg-white/5 rounded text-[10px] text-gray-400 italic">Web Dev</span>
                        <span class="px-2 py-1 bg-white/5 rounded text-[10px] text-gray-400 italic">Machine Learning</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection