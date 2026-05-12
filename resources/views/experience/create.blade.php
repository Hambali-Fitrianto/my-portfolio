@extends('layouts.app')
@section('title', 'Tambah Pengalaman Kerja')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('experience.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Pengalaman</h1>
            <p class="text-gray-500 text-sm">Input riwayat karir profesional Anda.</p>
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

    <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl">
        <form action="{{ route('experience.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Perusahaan / Institusi</label>
                    <input type="text" name="perusahaan" value="{{ old('perusahaan') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: PT. Ibal Bojay">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Alamat / Lokasi</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Madura, Jawa Timur">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Posisi / Jabatan</label>
                    <input type="text" name="posisi" value="{{ old('posisi') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Full-Stack Web Developer">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Periode Kerja</label>
                    <input type="text" name="periode" value="{{ old('periode') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Aug 2025 - Present">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi & Tugas Teknis</label>
                <textarea name="deskripsi" rows="8" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                    placeholder="Gunakan enter untuk membuat poin-poin baru..."></textarea>
                <p class="text-[10px] text-gray-600 italic">*Fokuskan pada teknologi yang digunakan dan pencapaian sistem.</p>
            </div>

            <div class="pt-6 border-t border-white/5 text-right">
                <button type="submit" class="bg-blue-600 text-white font-bold px-10 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/10">
                    Simpan Pengalaman
                </button>
            </div>
        </form>
    </div>
</div>
@endsection