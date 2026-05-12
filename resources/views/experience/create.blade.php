@extends('layouts.app')
@section('title', 'Tambah Pengalaman')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('experience.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Pengalaman</h1>
            <p class="text-gray-500 text-sm">Input detail pekerjaan, project, dan akses demo kamu.</p>
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
        <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Perusahaan / Institusi</label>
                    <input type="text" name="perusahaan" value="{{ old('perusahaan') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: PT. Kayu Mebel Indonesia">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Posisi / Jabatan</label>
                    <input type="text" name="posisi" value="{{ old('posisi') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Web Developer (Contract)">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Periode Kerja</label>
                    <input type="text" name="periode" value="{{ old('periode') }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="Contoh: Aug 2025 - Present">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Link Website Project (Opsional)</label>
                    <input type="url" name="link_website" value="{{ old('link_website') }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                        placeholder="https://maintenance.hambalifitrianto.com">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi & Tugas Teknis</label>
                <textarea name="deskripsi" rows="6" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition"
                    placeholder="Jelaskan integrasi API SAP, HMAC, atau sistem yang kamu bangun..."></textarea>
                <p class="text-[10px] text-gray-600 italic">*Gunakan enter untuk membuat poin-poin baru.</p>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Informasi Akun Demo (Bebas/Opsional)</label>
                <textarea name="akun_demo" rows="4"
                    class="w-full bg-blue-500/5 border border-blue-500/10 rounded-xl px-4 py-3 text-gray-300 font-mono text-sm focus:outline-none focus:border-blue-500 transition"
                    placeholder="Contoh: &#10;Admin Login: admin@mail.com | Pass: 123&#10;Staff Login: staff@mail.com | Pass: 123"></textarea>
            </div>

            <div class="space-y-4 p-6 bg-white/5 rounded-2xl border border-dashed border-white/10">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-600/20 text-blue-500 rounded-xl">
                        <i class="fas fa-images text-xl"></i>
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase tracking-widest text-white block">Upload Multiple Screenshots</label>
                        <p class="text-[10px] text-gray-500">Pilih banyak foto sekaligus (JPG, PNG, max 5MB/file).</p>
                    </div>
                </div>

                <input type="file" name="foto_ss[]" id="foto_ss" multiple
                    class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">

                <div id="preview-container" class="grid grid-cols-4 gap-4 mt-4"></div>
            </div>

            <div class="pt-6 border-t border-white/5 text-right">
                <button type="submit" class="bg-white text-black font-bold px-12 py-4 rounded-2xl hover:bg-blue-600 hover:text-white transition shadow-xl transform active:scale-95">
                    Simpan Pengalaman Kerja
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('foto_ss').addEventListener('change', function() {
        const container = document.getElementById('preview-container');
        container.innerHTML = '';
        const files = this.files;

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative aspect-video rounded-lg overflow-hidden border border-white/10';
                div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                container.appendChild(div);
            }
            reader.readAsDataURL(files[i]);
        }
    });
</script>
@endsection