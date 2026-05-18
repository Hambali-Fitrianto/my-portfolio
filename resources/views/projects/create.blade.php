@extends('layouts.app')
@section('title', 'Tambah Project Baru')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('projects.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Project</h1>
            <p class="text-gray-500 text-sm">Kelola portofolio aplikasi, screenshot, dan akun demo sistem.</p>
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

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="bg-[#111] border border-white/5 rounded-3xl p-8 shadow-2xl space-y-6">
            <h3 class="text-lg font-bold text-blue-500 uppercase tracking-wider border-b border-white/5 pb-2">1. Data Utama Aplikasi</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Project</label>
                    <input type="text" name="nama_project" value="{{ old('nama_project') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Website Maintenance (MainTENZ)">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Kategori / Tipe Project</label>
                    <input type="text" name="tipe_project" value="{{ old('tipe_project') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Manufaktur, Otomasi, Alat Internal">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Teknologi (Pisahkan dengan koma)</label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Laravel 11, React.js, Python, SAP RFC">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Link Aplikasi / Demo URL (Opsional)</label>
                    <input type="url" name="link_project" value="{{ old('link_project') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: https://github.com/hambali/maintenz">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi Fungsionalitas Sistem</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                    placeholder="Jelaskan alur sistem, latar belakang masalah, dan solusi otomatisasi yang dibangun..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Fitur Unggulan / Nilai Jual Teknis</label>
                <textarea name="fitur_kunci" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                    placeholder="Gunakan enter untuk poin baru...&#10;- Integrasi Cron-job via MaintainX API&#10;- HMAC Authentication Mekari API"></textarea>
            </div>

            <div class="space-y-4 pt-4 border-t border-white/5">
                <div class="flex justify-between items-center">
                    <div>
                        <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Aset Gambar / Screenshots Aplikasi</label>
                        <p class="text-[10px] text-gray-600 italic ml-1 mt-0.5">*Maksimal 2 MB per file gambar.</p>
                    </div>
                    <button type="button" onclick="addImageField()" class="px-3 py-1.5 bg-blue-600/10 hover:bg-blue-600/20 text-blue-400 text-xs font-bold rounded-lg border border-blue-500/20 transition flex items-center gap-1.5">
                        <i class="fas fa-plus text-[10px]"></i> Tambah Gambar
                    </button>
                </div>

                <div id="image-preview-container" class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="relative aspect-video rounded-xl border border-dashed border-white/10 bg-white/[0.01] hover:bg-white/[0.02] transition flex flex-col items-center justify-center p-2 group overflow-hidden" id="box-image-0">
                        <img id="preview-img-0" class="absolute inset-0 w-full h-full object-cover hidden z-10">

                        <div class="text-center space-y-1 text-gray-600 pointer-events-none group-hover:text-gray-400 transition z-0" id="placeholder-0">
                            <i class="fas fa-cloud-upload-alt text-xl"></i>
                            <span class="block text-[10px] font-bold uppercase tracking-wider">Pilih Foto</span>
                        </div>

                        <input type="file" name="screenshots[]" onchange="previewImage(this, 0)" accept="image/*"
                            class="absolute inset-0 opacity-0 cursor-pointer z-20">

                        <button type="button" onclick="removeImageField(0)" class="absolute top-2 right-2 w-6 h-6 rounded-lg bg-red-600 text-white text-xs font-bold flex items-center justify-center shadow-lg hover:bg-red-700 transition z-30 opacity-0 group-hover:opacity-100 duration-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
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
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white/[0.02] border border-white/5 p-4 rounded-2xl relative items-end group">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Role / Hak Akses</label>
                        <input type="text" name="accounts[0][role_akses]" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: Admin, Mekanik">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Username / Email Demo</label>
                        <input type="text" name="accounts[0][username]" class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="admin / user123">
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
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white font-bold px-12 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/10">
                Simpan Proyek Portofolio
            </button>
        </div>
    </form>
</div>

<script>
    let imageIndex = 1;
    let accountIndex = 1;

    // FUNGSI PREVIEW GAMBAR
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

    // TAMBAH KOTAK GAMBAR BARU
    function addImageField() {
        const container = document.getElementById('image-preview-container');

        // PERBAIKAN: Atribut required di bawah dihapus agar opsional sesuai backend
        const htmlField = `
            <div class="relative aspect-video rounded-xl border border-dashed border-white/10 bg-white/[0.01] hover:bg-white/[0.02] transition flex flex-col items-center justify-center p-2 group overflow-hidden" id="box-image-${imageIndex}">
                <img id="preview-img-${imageIndex}" class="absolute inset-0 w-full h-full object-cover hidden z-10">
                
                <div class="text-center space-y-1 text-gray-600 pointer-events-none group-hover:text-gray-400 transition z-0" id="placeholder-${imageIndex}">
                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                    <span class="block text-[10px] font-bold uppercase tracking-wider">Pilih Foto</span>
                </div>

                <input type="file" name="screenshots[]" onchange="previewImage(this, ${imageIndex})" accept="image/*"
                    class="absolute inset-0 opacity-0 cursor-pointer z-20">

                <button type="button" onclick="removeImageField(${imageIndex})" class="absolute top-2 right-2 w-6 h-6 rounded-lg bg-red-600 text-white text-xs font-bold flex items-center justify-center shadow-lg hover:bg-red-700 transition z-30 opacity-0 group-hover:opacity-100 duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', htmlField);
        imageIndex++;
    }

    // HAPUS KOTAK GAMBAR
    function removeImageField(index) {
        const container = document.getElementById('image-preview-container');
        if (container.children.length > 1) {
            document.getElementById(`box-image-${index}`).remove();
        } else {
            alert('Minimal harus ada 1 kotak unggahan screenshot, bos.');
        }
    }

    // TAMBAH BARIS AKUN DEMO
    function addAccountRow() {
        const container = document.getElementById('accounts-container');

        const htmlRow = `
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white/[0.02] border border-white/5 p-4 rounded-2xl relative items-end group">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Role / Hak Akses</label>
                    <input type="text" name="accounts[${accountIndex}][role_akses]" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="Contoh: User, Operator">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Username / Email Demo</label>
                    <input type="text" name="accounts[${accountIndex}][username]" required class="w-full bg-white/5 border border-white/10 rounded-xl px-3 py-2 text-white text-sm focus:outline-none focus:border-blue-500 transition" placeholder="user / email">
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
            alert('Minimal harus ada satu baris kredensial akun demo, bos.');
        }
    }
</script>
@endsection