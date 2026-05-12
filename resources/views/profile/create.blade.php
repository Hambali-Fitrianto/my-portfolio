@extends('layouts.app')
@section('title', 'Tambah Profil')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('profile.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Profil Baru</h1>
    </div>

    <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl">
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: Hambali Fitrianto">
                </div>

                <!-- Headline -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Headline</label>
                    <input type="text" name="headline" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: Web Developer & IT Programmer">
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Email</label>
                    <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition" placeholder="email@domain.com">
                </div>

                <!-- No HP -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nomor HP</label>
                    <input type="text" name="no_hp" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition" placeholder="0812xxxx">
                </div>
            </div>

            <!-- Deskripsi Singkat -->
            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" rows="4" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition" placeholder="Ceritakan singkat tentang dirimu..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- LinkedIn -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">LinkedIn URL (Opsional)</label>
                    <input type="url" name="linkedin_url" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <!-- GitHub -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">GitHub URL (Opsional)</label>
                    <input type="url" name="github_url" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Foto -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Foto Profil</label>
                    <input type="file" name="foto" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-500 file:text-white hover:file:bg-blue-600 transition">
                </div>

                <!-- CV File -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">File CV (PDF)</label>
                    <input type="file" name="cv_file" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-red-500 file:text-white hover:file:bg-red-600 transition">
                </div>
            </div>

            <div class="pt-4 text-right">
                <button type="submit" class="bg-white text-black font-bold px-10 py-3 rounded-xl hover:bg-blue-500 hover:text-white transition shadow-lg">
                    Simpan Profil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection