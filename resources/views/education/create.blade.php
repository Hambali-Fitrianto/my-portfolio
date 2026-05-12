@extends('layouts.app')
@section('title', 'Tambah Pendidikan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('education.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Pendidikan</h1>
            <p class="text-gray-500 text-sm">Input riwayat akademik dan pencapaian studi Anda.</p>
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
        <form action="{{ route('education.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Nama Institusi / Universitas</label>
                    <input type="text" name="institusi" value="{{ old('institusi') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Trunojoyo University Madura">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Alamat / Lokasi</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Bangkalan, East Java">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Gelar / Jurusan</label>
                    <input type="text" name="gelar" value="{{ old('gelar') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Bachelor of Informatics Engineering">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Periode Studi</label>
                    <input type="text" name="periode" value="{{ old('periode') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Sep 2020 - Jan 2024">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">IPK / GPA (Opsional)</label>
                    <input type="text" name="gpa" value="{{ old('gpa') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: 3.71 / 4.00">
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Judul Tugas Akhir / Skripsi (Opsional)</label>
                    <input type="text" name="tugas_akhir" value="{{ old('tugas_akhir') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Sentiment Analysis on Madurese Herbal Reviews...">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Pencapaian & Spesialisasi</label>
                <textarea name="deskripsi" rows="5"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                    placeholder="Gunakan enter untuk membuat poin-poin baru mengenai keahlian atau proyek selama kuliah..."></textarea>
            </div>

            <div class="pt-6 border-t border-white/5 text-right">
                <button type="submit" class="bg-blue-600 text-white font-bold px-10 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/10">
                    Simpan Pendidikan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection