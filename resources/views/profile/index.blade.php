@extends('layouts.app')
@section('title', 'Manajemen Profil')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Manajemen Profil</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola informasi data diri utama untuk landing page.</p>
    </div>
    <a href="{{ route('profile.create') }}" class="bg-white text-black font-bold px-6 py-3 rounded-xl hover:bg-blue-500 hover:text-white transition shadow-lg flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Data
    </a>
</div>

<div class="card-admin overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-white/5 border-b border-white/5">
                <th class="p-5 text-xs font-bold uppercase tracking-widest text-gray-400">Identitas</th>
                <th class="p-5 text-xs font-bold uppercase tracking-widest text-gray-400">Headline</th>
                <th class="p-5 text-xs font-bold uppercase tracking-widest text-gray-400 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($profiles as $item)
            <tr class="hover:bg-white/[0.02] transition">
                <td class="p-5">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/profile/' . $item->foto) }}" class="w-14 h-14 rounded-2xl object-cover ring-2 ring-white/5">
                        <div>
                            <div class="font-bold text-white">{{ $item->nama }}</div>
                            <div class="text-xs text-gray-500">{{ $item->email }}</div>
                        </div>
                    </div>
                </td>
                <td class="p-5 text-sm text-gray-400 italic">
                    "{{ Str::limit($item->headline, 50) }}"
                </td>
                <td class="p-5">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('profile.edit', $item->id) }}" class="p-2 bg-yellow-500/10 text-yellow-500 rounded-lg hover:bg-yellow-500 hover:text-black transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('profile.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition" onclick="return confirm('Hapus profil ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-20 text-center text-gray-600">
                    <i class="fas fa-folder-open text-4xl mb-4 block"></i>
                    Belum ada data profil.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection