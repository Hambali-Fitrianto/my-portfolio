@extends('layouts.app')
@section('title', 'Tambah Skill & Keahlian Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('skills.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Skill</h1>
            <p class="text-gray-500 text-sm">Dokumentasikan keahlian software development, integrasi enterprise API, dan kapasitas infrastruktur IT Anda.</p>
        </div>
    </div>

    @if($errors->any())
    <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-xl mb-6">
        <ul class="list-disc ml-5 text-sm">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('skills.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl space-y-6">
            <h3 class="text-lg font-bold text-blue-500 uppercase tracking-wider border-b border-white/5 pb-2">Form Data Keahlian</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Keahlian / Tools</label>
                    <input type="text" name="nama_skill" value="{{ old('nama_skill') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Laravel, Python, Instalasi CCTV, Setup JPOS">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Kategori Kelompok</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}" list="kategori-list" required autocomplete="off"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Ketik baru atau pilih rekomendasi yang muncul...">

                    <datalist id="kategori-list">
                        <option value="Programming & Frameworks">
                        <option value="API & System Integration">
                        <option value="DevOps & Deployment">
                        <option value="IT Infrastructure & Support">
                        <option value="Hardware Installation">
                        <option value="Operating System & Software">
                    </datalist>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Tingkat / Level Kompetensi</label>
                    <select name="tingkat" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-gray-300 focus:outline-none focus:border-blue-500 transition appearance-none cursor-pointer">
                        <option value="" class="bg-[#111] text-gray-500">-- Pilih Tingkat --</option>
                        <option value="Expert" {{ old('tingkat') == 'Expert' ? 'selected' : '' }} class="bg-[#111]">Expert / Mahir</option>
                        <option value="Advanced" {{ old('tingkat') == 'Advanced' ? 'selected' : '' }} class="bg-[#111]">Advanced / Menengah Atas</option>
                        <option value="Intermediate" {{ old('tingkat') == 'Intermediate' ? 'selected' : '' }} class="bg-[#111]">Intermediate / Menengah</option>
                        <option value="Basic" {{ old('tingkat') == 'Basic' ? 'selected' : '' }} class="bg-[#111]">Basic / Dasar</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Class Ikon FontAwesome (Opsional)</label>
                    <div class="relative flex items-center">
                        <input type="text" id="ikon-input" name="ikon" value="{{ old('ikon') }}"
                            class="w-full bg-white/5 border border-white/10 rounded-xl pl-12 pr-4 py-3 text-white focus:outline-none focus:border-blue-500 transition font-mono text-sm"
                            placeholder="Contoh: fab fa-laravel, fas fa-print">
                        <div class="absolute left-4 text-gray-500">
                            <i id="ikon-preview" class="fas fa-laptop-code text-base"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-blue-500/5 border border-blue-500/10 rounded-2xl text-xs text-gray-400 space-y-2">
                <p class="font-bold text-blue-400"><i class="fas fa-info-circle"></i> Tips Memasukkan Ikon FontAwesome:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] leading-relaxed font-mono">
                    <div>• <span class="text-white">fab fa-laravel</span> (Laravel)</div>
                    <div>• <span class="text-white">fab fa-python</span> (Python Script)</div>
                    <div>• <span class="text-white">fab fa-windows</span> (Instalasi Windows OS)</div>
                    <div>• <span class="text-white">fas fa-video</span> (Instalasi CCTV)</div>
                    <div>• <span class="text-white">fas fa-print</span> (Setup Printer / JPOS)</div>
                    <div>• <span class="text-white">fas fa-server</span> (Deployment / Hosting)</div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white font-bold px-12 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/10 cursor-pointer">
                Simpan Data Keahlian
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconInput = document.getElementById('ikon-input');
        const iconPreview = document.getElementById('ikon-preview');

        iconInput.addEventListener('input', function() {
            const value = this.value.trim();
            iconPreview.className = value !== "" ? value : "fas fa-laptop-code";
        });
    });
</script>
@endsection