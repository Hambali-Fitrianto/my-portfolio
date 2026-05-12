@extends('layouts.app')
@section('title', 'Edit Profil')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('profile.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Profil: {{ $profile->nama }}</h1>
    </div>

    @if(session('error'))
    <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-4 rounded-xl mb-6">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl">
        <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $profile->nama) }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Headline</label>
                    <input type="text" name="headline" value="{{ old('headline', $profile->headline) }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nomor HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $profile->no_hp) }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" rows="4" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">{{ old('deskripsi_singkat', $profile->deskripsi_singkat) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-white/5 pt-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Ganti Foto Profil</label>
                    @if($profile->foto)
                    <div class="mb-3 relative w-20 h-20">
                        <img src="{{ asset('storage/profile/'.$profile->foto) }}" class="w-20 h-20 rounded-xl object-cover ring-2 ring-white/10">
                    </div>
                    @endif
                    <input type="file" name="foto" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Ganti File CV (PDF)</label>
                    @if($profile->cv_file)
                    <div class="mb-3 flex items-center gap-2 text-xs text-red-400 bg-red-400/10 w-fit px-3 py-2 rounded-lg">
                        <i class="fas fa-file-pdf"></i> {{ Str::limit($profile->cv_file, 15) }}
                    </div>
                    @endif
                    <input type="file" name="cv_file" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-red-600 file:text-white hover:file:bg-red-700 transition">
                </div>
            </div>

            <div class="pt-6 border-t border-white/5 text-right">
                <button type="submit" class="bg-blue-600 text-white font-bold px-10 py-3 rounded-xl hover:bg-blue-700 transition shadow-lg transform active:scale-95">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection