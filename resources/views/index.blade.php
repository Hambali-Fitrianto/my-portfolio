<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - {{ $profile->nama ?? 'User' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white font-sans">

    <section class="h-screen flex flex-col justify-center items-center text-center p-6">
        @if(isset($profile) && $profile->foto)
        <img src="{{ asset('storage/profile/' . $profile->foto) }}" class="w-32 h-32 rounded-full mb-4 border-4 border-blue-500 object-cover">
        @endif

        <h1 class="text-4xl md:text-6xl font-bold">{{ $profile->nama ?? 'Nama Belum Diatur' }}</h1>
        <p class="text-blue-400 text-xl mt-2">{{ $profile->headline ?? 'Web Developer' }}</p>
        <p class="max-w-2xl mt-4 text-gray-400">
            {{ $profile->deskripsi_singkat ?? 'Selamat datang di portofolio saya.' }}
        </p>

        <div class="mt-8 flex gap-4">
            @if(isset($profile) && $profile->cv_file)
            <a href="{{ asset('storage/cv/' . $profile->cv_file) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-semibold transition">
                Download CV (PDF)
            </a>
            @endif
            <a href="mailto:{{ $profile->email ?? '' }}" class="border border-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 transition">
                Kontak Saya
            </a>
        </div>
    </section>

</body>

</html>