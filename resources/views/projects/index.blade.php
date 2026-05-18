@extends('layouts.app')
@section('title', 'Manajemen Project Portofolio')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Projects</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola portofolio aplikasi, multi-screenshot, dan kredensial akun demo sistem.</p>
    </div>
    <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Project
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
                    <th class="px-6 py-4 font-bold">Nama Project & Kategori</th>
                    <th class="px-6 py-4 font-bold">Teknologi / Stack</th>
                    <th class="px-6 py-4 font-bold text-center">Screenshots</th>
                    <th class="px-6 py-4 font-bold text-center">Akun Demo</th>
                    <th class="px-6 py-4 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($projects as $item)
                <tr class="hover:bg-white/[0.01] transition duration-200">
                    <td class="px-6 py-4">
                        <div class="font-bold text-white text-base tracking-tight">{{ $item->nama_project }}</div>
                        @if($item->tipe_project)
                        <span class="inline-block text-[10px] font-black text-blue-400 uppercase tracking-wider mt-1">
                            {{ $item->tipe_project }}
                        </span>
                        @else
                        <span class="inline-block text-[10px] font-bold text-gray-600 uppercase tracking-wider mt-1">
                            Umum
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5 max-w-xs">
                            @foreach(explode(',', $item->tech_stack) as $tech)
                            <span class="px-2 py-0.5 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">
                                {{ trim($tech) }}
                            </span>
                            @endforeach
                        </div>
                    </td>

                    <td class="px-6 py-4 text-center">
                        @if($item->images->count() > 0)
                        <button type="button"
                            class="btn-view-images inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-500/10 text-purple-400 border border-purple-500/20 hover:bg-purple-500/20 transition cursor-pointer"
                            data-project-name="{{ $item->nama_project }}"
                            data-images="{{ json_encode($item->images->map(fn($img) => asset('storage/projects/' . $img->path_gambar))) }}">
                            <i class="fas fa-images text-[10px]"></i> {{ $item->images->count() }} Gambar
                        </button>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-white/5 text-gray-500 border border-white/5">
                            <i class="fas fa-image text-[10px]"></i> 0 Gambar
                        </span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-yellow-500/10 text-yellow-500 border border-yellow-500/10">
                            <i class="fas fa-user-lock text-[10px]"></i> {{ $item->accounts->count() }} Role
                        </span>
                    </td>

                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('projects.show', $item->id) }}" class="p-2 bg-blue-500/10 text-blue-400 rounded-xl hover:bg-blue-600 hover:text-white transition" title="Lihat Detail">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                            <a href="{{ route('projects.edit', $item->id) }}" class="p-2 bg-yellow-500/10 text-yellow-500 rounded-xl hover:bg-yellow-500 hover:text-black transition" title="Edit Data">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('projects.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus project beserta seluruh screenshot dan akun demo terkait?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-500/10 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition" title="Hapus Total">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center text-gray-600">
                        <i class="fas fa-project-diagram text-5xl mb-4 block opacity-20"></i>
                        <p class="text-lg font-bold">Belum ada project portofolio.</p>
                        <p class="text-sm mt-1">Mulai isi data sistem otomatisasi andalan Anda lewat tombol di atas.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div id="screenshotModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm transition-opacity duration-300 opacity-0">
    <div class="bg-[#121214] border border-white/10 rounded-2xl max-w-4xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300">
        <div class="px-6 py-4 border-b border-white/5 flex justify-between items-center bg-white/[0.01]">
            <div>
                <h3 id="modalTitle" class="text-lg font-bold text-white">Screenshots</h3>
                <p class="text-xs text-gray-500">Preview hasil tangkapan layar sistem aplikasi.</p>
            </div>
            <button type="button" id="closeModalBtn" class="text-gray-400 hover:text-white bg-white/5 hover:bg-white/10 w-8 h-8 rounded-xl flex items-center justify-center transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="p-6 overflow-y-auto flex-1">
            <div id="modalImageContainer" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('screenshotModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalImageContainer = document.getElementById('modalImageContainer');
        const closeModalBtn = document.getElementById('closeModalBtn');

        document.querySelectorAll('.btn-view-images').forEach(button => {
            button.addEventListener('click', function() {
                const projectName = this.getAttribute('data-project-name');
                const images = JSON.parse(this.getAttribute('data-images'));

                modalTitle.innerText = `Screenshots - ${projectName}`;
                modalImageContainer.innerHTML = '';

                images.forEach(src => {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.className = 'relative group rounded-xl overflow-hidden border border-white/5 bg-black/40 aspect-[16/9]';

                    imgWrapper.innerHTML = `
                        <img src="${src}" alt="Screenshot" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" onerror="this.src='https://placehold.co/600x400/222/555?text=Gambar+Tidak+Ditemukan'">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-200 flex items-center justify-center">
                            <a href="${src}" target="_blank" class="px-3 py-1.5 bg-white text-black font-semibold text-xs rounded-lg shadow flex items-center gap-1.5">
                                <i class="fas fa-external-link-alt text-[10px]"></i> Buka Tab Baru
                            </a>
                        </div>
                    `;
                    modalImageContainer.appendChild(imgWrapper);
                });

                // Efek fade-in modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.querySelector('.transform').classList.remove('scale-95');
                }, 10);
            });
        });

        function closeModal() {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        closeModalBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
@endsection