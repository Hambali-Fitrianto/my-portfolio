@extends('layouts.app')
@section('title', 'Edit Pengalaman')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('experience.index') }}" class="p-2 bg-white/5 text-gray-400 rounded-lg hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Pengalaman</h1>
            <p class="text-gray-500 text-sm">Perbarui detail pekerjaan di {{ $experience->perusahaan }}.</p>
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
        <form action="{{ route('experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Nama Perusahaan / Institusi</label>
                    <input type="text" name="perusahaan" value="{{ old('perusahaan', $experience->perusahaan) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Posisi / Jabatan</label>
                    <input type="text" name="posisi" value="{{ old('posisi', $experience->posisi) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Periode Kerja</label>
                    <input type="text" name="periode" value="{{ old('periode', $experience->periode) }}" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Link Website Project (Opsional)</label>
                    <input type="url" name="link_website" value="{{ old('link_website', $experience->link_website) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Deskripsi & Tugas Teknis</label>
                <textarea name="deskripsi" rows="6" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">{{ old('deskripsi', $experience->deskripsi) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Informasi Akun Demo (Bebas/Opsional)</label>
                <textarea name="akun_demo" rows="4"
                    class="w-full bg-blue-500/5 border border-blue-500/10 rounded-xl px-4 py-3 text-gray-300 font-mono text-sm focus:outline-none focus:border-blue-500 transition">{{ old('akun_demo', $experience->akun_demo) }}</textarea>
            </div>

            <div class="space-y-6 p-6 bg-white/5 rounded-2xl border border-white/10">
                <div>
                    <label class="text-xs font-bold uppercase tracking-widest text-white block mb-4">Screenshots Saat Ini</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse($experience->foto_ss ?? [] as $foto)
                        <div class="relative aspect-video rounded-xl overflow-hidden border border-white/10 group">
                            <img src="{{ asset('storage/experience/' . $foto) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <span class="text-[10px] font-bold text-white uppercase">Existing Image</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-xs text-gray-600 italic">Belum ada screenshot yang diunggah.</p>
                        @endforelse
                    </div>
                </div>

                <div class="pt-6 border-t border-white/5">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 bg-yellow-600/20 text-yellow-500 rounded-xl">
                            <i class="fas fa-upload text-xl"></i>
                        </div>
                        <div>
                            <label class="text-xs font-bold uppercase tracking-widest text-white block">Ganti Semua Screenshot</label>
                            <p class="text-[10px] text-gray-500">Pilih file baru jika ingin mengganti semua foto di atas.</p>
                        </div>
                    </div>

                    <input type="file" name="foto_ss[]" id="foto_ss" multiple
                        class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-yellow-600 file:text-white hover:file:bg-yellow-700 transition cursor-pointer">

                    <div id="preview-container" class="grid grid-cols-4 gap-4 mt-4"></div>
                </div>
            </div>

            <div class="pt-6 border-t border-white/5 flex justify-between items-center">
                <p class="text-[10px] text-gray-600 italic">Terakhir diperbarui: {{ $experience->updated_at->diffForHumans() }}</p>
                <button type="submit" class="bg-blue-600 text-white font-bold px-12 py-4 rounded-2xl hover:bg-blue-700 transition shadow-xl transform active:scale-95">
                    Perbarui Pengalaman
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Script preview yang sama dengan create
    document.getElementById('foto_ss').addEventListener('change', function() {
        const container = document.getElementById('preview-container');
        container.innerHTML = '';
        const files = this.files;

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative aspect-video rounded-lg overflow-hidden border border-yellow-500/50';
                div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover opacity-70">
                                 <div class="absolute inset-0 flex items-center justify-center"><i class="fas fa-plus text-white text-xs"></i></div>`;
                container.appendChild(div);
            }
            reader.readAsDataURL(files[i]);
        }
    });
</script>
@endsection