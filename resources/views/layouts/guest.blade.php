<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Layout Wrapper */
        #login-wrapper {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }



        /* 1. MEngatur  WARNA INPUT MENJADI HITAM PEKAT */
        #form-container input,
        #form-container select,
        #form-container textarea {
            color: #000000 !important;
            /* Warna Standar: Hitam */
            -webkit-text-fill-color: #000000 !important;
            /* INI KUNCINYA: Memaksa Chrome/Safari pakai Hitam */
            background-color: #ffffff !important;
            /* Background Putih */
            border: 1px solid #9ca3af !important;
            /* Border Abu */
        }

        /* 2. Warna Judul (Label) */
        #form-container label {
            color: #000000 !important;
            font-weight: 600 !important;
        }

        /* 3. Warna  (Teks bayangan) */
        #form-container ::placeholder {
            color: #6b7280 !important;
            /* Abu-abu medium */
            -webkit-text-fill-color: #6b7280 !important;
            /*  placeholder tidak ikut menjadi hitam pekat */
            opacity: 1;
        }

        /* 4. Warna Dropdown Options */
        #form-container option {
            color: #000000 !important;
            background: #ffffff !important;
        }

        /* 5. Tombol Login/Register putih ) */
        #form-container button {
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff !important;
            background-color: #1f2937 !important;
        }

        /* 6. Fokus Input (Ungu) */
        #form-container input:focus,
        #form-container select:focus {
            border-color: #4f46e5 !important;
            outline: 2px solid transparent !important;
            box-shadow: 0 0 0 2px #4f46e5 !important;
        }

        /* --- 2. warna  TOMBOL KEMBALI  --- */
        #back-home-link {
            color: rgba(255, 255, 255, 0.8) !important;
            /* Warna Awal: Putih Transparan */
            text-decoration: underline;
            transition: all 0.3s ease;
            /* Animasi halus */
            padding: 5px 10px;
            /* Ruang untuk background saat hover */
            border-radius: 5px;
        }

        #back-home-link:hover {
            color: #000000 !important;
            /* SAAT HOVER: Tulisan jadi HITAM */
            -webkit-text-fill-color: #000000 !important;
            background-color: rgba(255, 255, 255, 0.8) !important;
            /* Background Putih Transparan */
            text-decoration: none !important;
            /* Hilangkan garis bawah */
            font-weight: bold !important;
        }
    </style>
</head>

<body class="is-preload">

    <div id="wrapper">
        <div id="bg"></div>
        <div id="overlay"></div>

        <div id="login-wrapper">

            <div class="mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white drop-shadow-lg" />
                </a>
            </div>

            <div id="form-container"
                class="w-full sm:max-w-md px-6 py-4 bg-white/90 dark:bg-gray-800/90 shadow-md overflow-hidden sm:rounded-lg backdrop-blur-sm">
                {{ $slot }}
            </div>

            <div class="mt-4">
                <a href="/" class="text-sm text-white/70 hover:text-white underline">Kembali ke Beranda</a>
            </div>

        </div>
    </div>

    <script>
        window.onload = function() {
            document.body.classList.remove('is-preload');
        }
        window.ontouchmove = function() {
            return false;
        }
        window.onorientationchange = function() {
            document.body.scrollTop = 0;
        }
    </script>
</body>

</html>
