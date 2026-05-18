@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('projects.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Project</h1>
            <p class="text-gray-500 text-sm">Perbarui informasi sistem, screenshot, dan kredensial akses demo.</p>
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

    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl space-y-6">
            <h3 class="text-lg font-bold text-blue-500 uppercase tracking-wider border-b border-white/5 pb-2">1. Data Utama Aplikasi</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Project</label>
                    <input type="text" name="nama_project" value="{{ old('nama_project', $project->nama_project) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Kategori / Tipe Project</label>
                    <input type="text" name="tipe_project" value="{{ old('tipe_project', $project->tipe_project) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Teknologi (Pisahkan dengan koma)</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Link Aplikasi / Demo URL (Opsional)</label>
                    <input type="url" name="link_project" value="{{ old('link_project', $project->link_project) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi Fungsionalitas Sistem</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">{{ old('deskripsi', $project->deskripsi) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Fitur Unggulan / Nilai Jual Teknis</label>
                <textarea name="fitur_kunci" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">{{ old('fitur_kunci', $project->fitur_kunci) }}</textarea>
            </div>

            <div class="space-y-3 pt-4 border-t border-white/5">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1 block">Screenshots Saat Ini (Klik hapus untuk membuang berkas fisik)</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    @forelse($project->images as $img)
                    <div class="relative group aspect-video rounded-xl overflow-hidden border border-white/10 bg-black">
                        <img src="{{ asset('storage/projects/' . $img->path_gambar) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-2">
                            <button type="button" onclick="event.preventDefault(); if(confirm('Hapus gambar ini secara permanen dari server?')) { document.getElementById('delete-img-{{ $img->id }}').submit(); }" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg transition flex items-center gap-1 shadow-lg">
                                <i class="fas fa-trash-alt text-[10px]"></i> Hapus
                            </button>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-4 text-xs italic text-gray-600 py-2">Belum ada screenshot sistem yang diunggah.</p>
                    @endforelse
                </div>
            </div>

            <div class="space-y-4 pt-4 border-t border-white/5">
                <div class="flex justify-between items-center">
                    <div>
                        <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Tambah Screenshots Baru</label>
                        <p class="text-[10px] text-gray-600 italic ml-1 mt-0.5">*Maksimal 2 MB per file gambar baru.</p>
                    </div>
                    <button type="button" onclick="addNewImageField()" class="px-3 py-1.5 bg-blue-600/10 hover:bg-blue-600/20 text-blue-400 text-xs font-bold rounded-lg border border-blue-500/20 transition flex items-center gap-1.5">
                        <i class="fas fa-plus text-[10px]"></i> Tambah Slot Gambar
                    </button>
                </div>

                <div id="image-preview-container" class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                </div>
            </div>
        </div>

        <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl space-y-6">
            <div class="flex justify-between items-center border-b border-white/5 pb-2">
                <h3 class="text-lg font-bold text-yellow-500 uppercase tracking-wider">2. Kredensial / Akun Demo Sistem</h3>
                <button type="button" onclick="addAccountRow()" class="px-4 py-2 bg-yellow-600/10 hover:bg-yellow-600/20 text-yellow-500 text-xs font-bold rounded-xl border border-yellow-500/20 transition flex items-center gap-2">
                    <i class="fas fa-plus"></i> Tambah Baris Akun
                </button>
            </div>

            <div id="accounts-container" class="space-y-4">
                @forelse($project->accounts as $index => $account)
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white/[0.02] border border-white/5 p-4 rounded-2xl relative items-end group">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Role / Hak Akses</label>
                        <input type="text" name="accounts[{{ $index }}][role_akses]" value="{{ $account->role_akses }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Username / Email Demo</label>
                        <input type="text" name="accounts[{{ $index }}][username]" value="{{ $account->username }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Password Demo</label>
                        <input type="text" name="accounts[{{ $index }}][password]" value="{{ $account->password }}" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition">
                    </div>
                    <div class="pb-1">
                        <button type="button" onclick="removeAccountRow(this)" class="w-full py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 text-xs font-bold rounded-xl border border-red-500/10 transition group-hover:opacity-100 md:opacity-0 duration-300">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Baris
                        </button>
                    </div>
                </div>
                @empty
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white/[0.02] border border-white/5 p-4 rounded-2xl relative items-end group">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Role / Hak Akses</label>
                        <input type="text" name="accounts[0][role_akses]" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: Admin">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Username / Email Demo</label>
                        <input type="text" name="accounts[0][username]" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="admin">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Password Demo</label>
                        <input type="text" name="accounts[0][password]" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="admin123">
                    </div>
                    <div class="pb-1">
                        <button type="button" onclick="removeAccountRow(this)" class="w-full py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 text-xs font-bold rounded-xl border border-red-500/10 transition opacity-0 group-hover:opacity-100 duration-300">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Baris
                        </button>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white font-bold px-12 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/10">
                Perbarui Proyek Portofolio
            </button>
        </div>
    </form>
</div>

@foreach($project->images as $img)
<form id="delete-img-{{ $img->id }}" action="{{ route('projects.destroyImage', $img->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endforeach

<script>
    let imageIndex = 1;
    let accountIndex = parseInt("{{ $project->accounts->count() > 0 ? $project->accounts->count() : 1 }}");

    // FUNGSI PREVIEW GAMBAR BARU
    function previewImage(input, index) {
        const preview = document.getElementById(`preview-img-${index}`);
        const placeholder = document.getElementById(`placeholder-${index}`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // SLOT TAMBAH SCREENSHOT BARU
    function addNewImageField() {
        const container = document.getElementById('image-preview-container');

        // PERBAIKAN: Atribut required dihapus agar opsional dan tidak mengunci form saat di-submit
        const htmlField = `
            <div class="relative aspect-video rounded-xl border border-dashed border-white/10 bg-white/[0.01] hover:bg-white/[0.02] transition flex flex-col items-center justify-center p-2 group overflow-hidden" id="box-image-${imageIndex}">
                <img id="preview-img-${imageIndex}" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                
                <div class="text-center space-y-1 text-gray-600 pointer-events-none group-hover:text-gray-400 transition z-0" id="placeholder-${imageIndex}">
                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                    <span class="block text-[10px] font-bold uppercase tracking-wider">Pilih Foto</span>
                </div>

                <input type="file" name="screenshots[]" onchange="previewImage(this, ${imageIndex})" accept="image/*"
                    class="absolute inset-0 opacity-0 cursor-pointer z-20">

                <button type="button" onclick="removeNewImageField(${imageIndex})" class="absolute top-2 right-2 w-6 h-6 rounded-lg bg-red-600 text-white text-xs font-bold flex items-center justify-center shadow-lg hover:bg-red-700 transition z-30 opacity-0 group-hover:opacity-100 duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', htmlField);
        imageIndex++;
    }

    // REMOVE SLOT SCREENSHOT BARU SEBELUM DI-CREATE
    function removeNewImageField(index) {
        document.getElementById(`box-image-${index}`).remove();
    }

    // TAMBAH BARIS AKUN DEMO
    function addAccountRow() {
        const container = document.getElementById('accounts-container');

        const htmlRow = `
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white/[0.02] border border-white/5 p-4 rounded-2xl relative items-end group">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Role / Hak Akses</label>
                    <input type="text" name="accounts[${accountIndex}][role_akses]" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: Operator, Guest">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Username / Email Demo</label>
                    <input type="text" name="accounts[${accountIndex}][username]" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="username">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Password Demo</label>
                    <input type="text" name="accounts[${accountIndex}][password]" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="password">
                </div>
                <div class="pb-1">
                    <button type="button" onclick="removeAccountRow(this)" class="w-full py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 text-xs font-bold rounded-xl border border-red-500/10 transition group-hover:opacity-100 md:opacity-0 duration-300">
                        <i class="fas fa-trash-alt mr-1"></i> Hapus Baris
                    </button>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', htmlRow);
        accountIndex++;
    }

    // HAPUS BARIS AKUN DEMO
    function removeAccountRow(button) {
        const container = document.getElementById('accounts-container');
        if (container.children.length > 1) {
            button.closest('.grid').remove();
        } else {
            alert('Minimal harus tersisa satu baris kredensial demo, bos.');
        }
    }
</script>
@endsection