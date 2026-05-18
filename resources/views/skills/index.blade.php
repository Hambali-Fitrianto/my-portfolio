@extends('layouts.app')
@section('title', 'Manajemen Keahlian & Tech Stack')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Skills & Infrastructure</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola keahlian programming, integrasi API, deployment, hingga instalasi hardware/OS.</p>
    </div>
    <a href="{{ route('skills.create') }}" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Skill
    </a>
</div>

@if(session('success'))
<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

<div class="card-admin overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-400">
            <thead class="text-xs text-gray-500 uppercase bg-white/[0.02] border-b border-white/5">
                <tr>
                    <th class="px-6 py-4 font-bold">Visual Ikon</th>
                    <th class="px-6 py-4 font-bold">Nama Keahlian / Tools</th>
                    <th class="px-6 py-4 font-bold">Kategori Kelompok</th>
                    <th class="px-6 py-4 font-bold text-center">Tingkat / Level</th>
                    <th class="px-6 py-4 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($skills as $item)
                <tr class="hover:bg-white/[0.01] transition duration-200">
                    <td class="px-6 py-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-600/10 border border-blue-500/10 flex items-center justify-center text-blue-500 text-base shadow-inner">
                            <i class="{{ $item->ikon }}"></i>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="font-bold text-white text-base tracking-tight">{{ $item->nama_skill }}</div>
                        <span class="text-[10px] text-gray-600 font-mono block mt-0.5">ID: #{{ $item->id }}</span>
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-lg text-xs font-medium text-gray-300">
                            {{ $item->kategori }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        @if(strtolower($item->tingkat) == 'expert' || strtolower($item->tingkat) == 'mahir')
                        <span class="inline-block text-[10px] font-black uppercase tracking-wider px-2.5 py-1 bg-green-500/10 text-green-400 border border-green-500/20 rounded-md shadow-sm">
                            {{ $item->tingkat }}
                        </span>
                        @elseif(strtolower($item->tingkat) == 'advanced' || strtolower($item->tingkat) == 'menengah')
                        <span class="inline-block text-[10px] font-black uppercase tracking-wider px-2.5 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-md shadow-sm">
                            {{ $item->tingkat }}
                        </span>
                        @else
                        <span class="inline-block text-[10px] font-black uppercase tracking-wider px-2.5 py-1 bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 rounded-md shadow-sm">
                            {{ $item->tingkat }}
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('skills.edit', $item->id) }}" class="p-2 bg-yellow-500/10 text-yellow-500 rounded-xl hover:bg-yellow-500 hover:text-black transition cursor-pointer" title="Edit Data Keahlian">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('skills.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus keahlian \'{{ $item->nama_skill }}\' dari daftar portofolio?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-500/10 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition cursor-pointer" title="Hapus Permanen">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center text-gray-600">
                        <i class="fas fa-laptop-code text-5xl mb-4 block opacity-20"></i>
                        <p class="text-lg font-bold">Belum ada data keahlian.</p>
                        <p class="text-sm mt-1">Mulai isi daftar keahlian software dev dan infrastruktur IT Anda lewat tombol di atas.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection