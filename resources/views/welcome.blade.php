<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans">

    <div class="relative min-h-screen overflow-hidden">

        {{-- Background perpustakaan + overlay lembut --}}
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/library-bg.png') }}"
                 alt="Perpustakaan"
                 class="w-full h-full object-cover">
            {{-- overlay tipis supaya teks dan tombol tetap jelas --}}
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/65 via-slate-900/45 to-slate-900/25"></div>
        </div>

        <div class="min-h-screen flex flex-col text-white">

            {{-- Konten utama: 2 kolom --}}
            <main class="flex-1 flex flex-col lg:flex-row items-center justify-between px-6 lg:px-16 py-10 gap-10">

                {{-- Kiri: Judul + tombol ke login --}}
                <section class="max-w-xl space-y-6">
                    <p class="text-xs tracking-[0.3em] uppercase text-blue-200">
                        SELAMAT DATANG
                    </p>

                    <h1 class="text-3xl md:text-4xl font-semibold leading-tight">
                        Direktori Portofolio Mahasiswa
                        <span class="block text-blue-300 mt-1 text-xl md:text-2xl">
                            by Kelompok 7
                        </span>
                    </h1>

                    <p class="text-sm md:text-base text-slate-200 max-w-md">
                        Platform untuk menampilkan profil, portofolio, dan keahlian mahasiswa
                        PENS
                    </p>

                    <div class="flex items-center gap-4 mt-4">
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center justify-center px-6 py-2.5 rounded-full
                                  bg-blue-600 hover:bg-blue-700 text-sm font-semibold
                                  shadow-lg shadow-blue-500/40 transition">
                            Masuk ke Aplikasi
                        </a>

                        <a href="{{ route('register') }}"
                           class="hidden sm:inline-flex text-sm text-blue-200 hover:text-white underline-offset-4 hover:underline">
                            Belum punya akun? Daftar
                        </a>
                    </div>
                </section>

<section class="hidden lg:flex flex-col items-center justify-center text-center
                absolute right-1/4 top-1/2 -translate-y-1/2 gap-4">

    <img src="{{ asset('images/logo-pens.png') }}"
         alt="Logo PENS"
         class="h-48 md:h-56 w-auto drop-shadow-2xl">

    {{-- Teks kampus --}}
    <div class="leading-tight">
        <div class="text-lg md:text-xl font-bold">
            POLITEKNIK ELEKTRONIKA
        </div>
        <div class="text-lg md:text-xl font-bold">
            NEGERI SURABAYA
        </div>
    </div>

</section>


            </main>

        </div>
    </div>

</body>
</html>
