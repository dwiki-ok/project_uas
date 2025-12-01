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

    <div class="relative min-h-screen">

        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/library-bg.png') }}" alt="Gedung PENS" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-blue-900/20"></div>
        </div>

        {{-- Layer konten --}}
        <div class="min-h-screen flex flex-col text-white">

            {{-- Header kiri atas: Logo + tulisan kampus --}}
            <header class="px-6 pt-4 pb-2 flex items-center gap-3">
                <img src="{{ asset('images/logo-pens.png') }}" alt="Logo PENS" class="h-10 w-auto">

                <div class="leading-tight">
                    <div class="text-[10px] tracking-[0.35em] uppercase text-blue-100">
                        POLITEKNIK ELEKTRONIKA
                    </div>
                    <div class="text-xs md:text-sm font-semibold">
                        NEGERI SURABAYA
                    </div>
                </div>
            </header>

            {{-- Main: box login/register DI TENGAH --}}
            <main class="flex-1 flex items-center justify-center px-6 pb-10">
                <div
                    class="w-full max-w-md lg:max-w-lg
                            bg-white/95 text-slate-900 rounded-2xl shadow-2xl shadow-blue-900/30
                            backdrop-blur p-6 sm:p-8">
                    {{ $slot }}
                </div>
            </main>

        </div>
    </div>

</body>

</html>
