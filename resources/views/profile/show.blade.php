@extends('layouts.app')
@section('title', 'Detail Profil')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('profile.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Detail Profil</h1>
        </div>
        <a href="{{ route('profile.edit', $profile->id) }}" class="bg-yellow-500 text-black font-bold px-6 py-2 rounded-xl hover:bg-yellow-400 transition">
            Edit Data
        </a>
    </div>

    <div class="bg-[#111] border border-white/5 rounded-3xl p-10 overflow-hidden relative">
        <div class="absolute top-0 right-0 p-10 opacity-5 text-9xl text-white">
            <i class="fas fa-user text-9xl"></i>
        </div>

        <div class="flex flex-col md:flex-row gap-10 relative z-10">
            <div class="shrink-0 text-center">
                <img src="{{ asset('storage/profile/'.$profile->foto) }}" class="w-48 h-48 rounded-3xl object-cover ring-4 ring-blue-500/20 mx-auto shadow-2xl">
                <div class="mt-6 flex justify-center gap-4">
                    <a href="{{ $profile->github_url }}" target="_blank" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-github"></i></a>
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="flex-1 space-y-6">
                <div>
                    <h2 class="text-4xl font-bold text-white">{{ $profile->nama }}</h2>
                    <p class="text-blue-400 text-xl font-medium mt-1">{{ $profile->headline }}</p>
                </div>

                <div class="bg-white/5 p-6 rounded-2xl border border-white/5">
                    <p class="text-gray-400 leading-relaxed italic">"{{ $profile->deskripsi_singkat }}"</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-3 text-gray-300">
                        <i class="fas fa-envelope text-blue-500"></i> {{ $profile->email }}
                    </div>
                    <div class="flex items-center gap-3 text-gray-300">
                        <i class="fas fa-phone text-blue-500"></i> {{ $profile->no_hp }}
                    </div>
                    @if($profile->cv_file)
                    <div class="md:col-span-2">
                        <a href="{{ asset('storage/cv/'.$profile->cv_file) }}" target="_blank" class="inline-flex items-center gap-2 text-red-400 hover:underline">
                            <i class="fas fa-file-pdf"></i> Download Curriculum Vitae (CV)
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection