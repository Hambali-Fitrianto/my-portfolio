@extends('layouts.app')

@section('title', 'Manajemen Profil')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Profil</h1>
    <a href="{{ route('profile.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700"> Tambah Profil </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-4 border-b">Foto</th>
                <th class="p-4 border-b">Nama</th>
                <th class="p-4 border-b text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $item)
            <tr class="hover:bg-gray-50">
                <td class="p-4 border-b">
                    <img src="{{ asset('storage/profile/' . $item->foto) }}" class="w-12 h-12 rounded-full object-cover">
                </td>
                <td class="p-4 border-b font-bold">{{ $item->nama }}</td>
                <td class="p-4 border-b text-center">
                    <a href="{{ route('profile.edit', $item->id) }}" class="text-yellow-600 font-bold px-2">Edit</a>
                    <form action="{{ route('profile.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 font-bold px-2" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection