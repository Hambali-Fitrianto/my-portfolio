@extends('layouts.app')
@section('title', 'Edit Pendidikan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('education.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Pendidikan</h1>
            <p class="text-gray-500 text-sm">Perbarui data akademik di {{ $education->institusi }}.</p>
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
        <form action="{{ route('education.update', $education->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Nama Institusi / Universitas</label>
                    <input type="text" name="institusi" value="{{ old('institusi', $education->institusi) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Alamat / Lokasi</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $education->alamat) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Gelar / Jurusan</label>
                    <input type="text" name="gelar" value="{{ old('gelar', $education->gelar) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Periode Studi</label>
                    <input type="text" name="periode" value="{{ old('periode', $education->periode) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">IPK / GPA</label>
                    <input type="text" name="gpa" value="{{ old('gpa', $education->gpa) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Judul Tugas Akhir / Skripsi</label>
                    <input type="text" name="tugas_akhir" value="{{ old('tugas_akhir', $education->tugas_akhir) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-600 ml-1">Pencapaian & Spesialisasi</label>
                <textarea name="deskripsi" rows="5"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">{{ old('deskripsi', $education->deskripsi) }}</textarea>
            </div>

            <div class="pt-6 border-t border-white/5 flex justify-between items-center">
                <p class="text-[10px] text-gray-600 italic">Terakhir diupdate: {{ $education->updated_at->diffForHumans() }}</p>
                <button type="submit" class="bg-yellow-600 text-black font-bold px-10 py-4 rounded-2xl hover:bg-yellow-500 transition shadow-xl shadow-yellow-600/10">
                    Update Pendidikan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection