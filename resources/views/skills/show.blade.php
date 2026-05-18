@extends('layouts.app')
@section('title', 'Detail Analisis Keahlian')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('skills.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-white tracking-tight">Detail Keahlian</h1>
                <p class="text-gray-500 text-sm">Review kapasitas teknis, pengelompokan sistem, dan visualisasi aset.</p>
            </div>
        </div>
        <a href="{{ route('skills.edit', $skill->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded-xl hover:bg-yellow-400 transition flex items-center gap-2 text-sm shadow-lg shadow-yellow-500/10 cursor-pointer">
            <i class="fas fa-edit text-xs"></i> Edit Keahlian
        </a>
    </div>

    <div class="card-admin p-8 border-t-4 border-t-blue-600 bg-gradient-to-b from-blue-600/5 to-transparent space-y-8">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 pb-6 border-b border-white/5">
            <div class="w-20 h-20 rounded-2xl bg-blue-600/10 border border-blue-500/20 flex items-center justify-center text-blue-500 text-3xl shadow-xl shadow-blue-500/5 flex-shrink-0 animate-pulse">
                <i class="{{ $skill->ikon }}"></i>
            </div>

            <div class="text-center sm:text-left space-y-2">
                <span class="px-3 py-1 bg-blue-600/10 border border-blue-500/20 rounded-lg text-blue-400 text-[10px] font-black uppercase tracking-wider">
                    {{ $skill->kategori }}
                </span>
                <h2 class="text-3xl font-black text-white tracking-tight">{{ $skill->nama_skill }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="p-4 bg-white/[0.01] border border-white/5 rounded-2xl space-y-1">
                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block">Tingkat Kemahiran</span>
                <div class="flex items-center gap-2 pt-1">
                    <span class="text-base font-bold text-white">{{ $skill->tingkat }}</span>
                    @if(strtolower($skill->tingkat) == 'expert' || strtolower($skill->tingkat) == 'mahir')
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                    @elseif(strtolower($skill->tingkat) == 'advanced' || strtolower($skill->tingkat) == 'menengah')
                    <span class="w-2 h-2 rounded-full bg-blue-500 animate-ping"></span>
                    @else
                    <span class="w-2 h-2 rounded-full bg-yellow-500 animate-ping"></span>
                    @endif
                </div>
            </div>

            <div class="p-4 bg-white/[0.01] border border-white/5 rounded-2xl space-y-1">
                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block">Class String Ikon</span>
                <code class="text-xs text-blue-400 font-mono block pt-1 select-all">{{ $skill->ikon }}</code>
            </div>

            <div class="p-4 bg-white/[0.01] border border-white/5 rounded-2xl space-y-1">
                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block">Tanggal Didata</span>
                <span class="text-sm font-semibold text-gray-300 block pt-1">{{ $skill->created_at->format('d F Y - H:i') }} WIB</span>
            </div>

            <div class="p-4 bg-white/[0.01] border border-white/5 rounded-2xl space-y-1">
                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block">Pembaruan Terakhir</span>
                <span class="text-sm font-semibold text-gray-300 block pt-1">{{ $skill->updated_at->format('d F Y - H:i') }} WIB</span>
            </div>
        </div>
    </div>
</div>
@endsection