<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if (isset($user))
                <span class="text-sm text-gray-600 dark:text-gray-400">Selamat datang,
                    <strong>{{ $user->name }}</strong></span>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cards Section -->
            @if (isset($user))
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <!-- Total Portfolio Card -->
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100 text-sm font-medium">Total Portfolio</p>
                                <p class="text-3xl font-bold mt-2">{{ $portfolios->count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-blue-300 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM4 9h12v5H4V9z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!-- Total Mahasiswa Card -->
                    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Total Mahasiswa</p>
                                <p class="text-3xl font-bold mt-2">{{ $allMahasiswa->count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-green-300 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 6a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM11 7a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Profile Completion Card -->
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium">Profil Lengkap</p>
                                <p class="text-3xl font-bold mt-2">
                                    {{ ($user->profile_photo ? 25 : 0) + ($user->prodi ? 25 : 0) + ($user->tahun_masuk ? 25 : 0) + 25 }}%
                                </p>
                            </div>
                            <svg class="w-12 h-12 text-purple-300 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 3.062v2.332c0 2.992-1.635 5.6-4.06 7.001-2.425-1.401-4.06-4.009-4.06-7V6.517a3.066 3.066 0 012.812-3.062zM9 13a1 1 0 11-2 0 1 1 0 012 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Mahasiswa Lain Card -->
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100 text-sm font-medium">Mahasiswa Lain</p>
                                <p class="text-3xl font-bold mt-2">{{ $allMahasiswa->count() }}</p>
                            </div>
                            <svg class="w-12 h-12 text-orange-300 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a4 4 0 00-4-4h-2.5a4 4 0 00-4 4v1h10.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Profile Completion Progress -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Status Profil</h3>
                    <div class="space-y-4">
                        <!-- Nama -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</span>
                                <span class="text-xs font-semibold text-green-600">✓ Lengkap</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <!-- NRP -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">NRP</span>
                                <span class="text-xs font-semibold text-green-600">✓ Lengkap</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <!-- Foto Profil -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Foto Profil</span>
                                <span
                                    class="text-xs font-semibold {{ $user->profile_photo ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $user->profile_photo ? '✓ Lengkap' : '✗ Belum' }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-{{ $user->profile_photo ? 'green' : 'red' }}-500 h-2 rounded-full"
                                    style="width: {{ $user->profile_photo ? '100' : '0' }}%"></div>
                            </div>
                        </div>

                        <!-- Prodi -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Program Studi</span>
                                <span
                                    class="text-xs font-semibold {{ $user->prodi ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $user->prodi ? '✓ Lengkap' : '✗ Belum' }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-{{ $user->prodi ? 'green' : 'red' }}-500 h-2 rounded-full"
                                    style="width: {{ $user->prodi ? '100' : '0' }}%"></div>
                            </div>
                        </div>

                        <!-- Tahun Masuk -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Masuk</span>
                                <span
                                    class="text-xs font-semibold {{ $user->tahun_masuk ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $user->tahun_masuk ? '✓ Lengkap' : '✗ Belum' }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-{{ $user->tahun_masuk ? 'green' : 'red' }}-500 h-2 rounded-full"
                                    style="width: {{ $user->tahun_masuk ? '100' : '0' }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Quick Actions Section -->
            @if (isset($user))
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Aksi Cepat</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-3 p-4 bg-indigo-50 dark:bg-indigo-900 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 transition">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-100">Edit Profil</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Update informasi profil Anda</p>
                            </div>
                        </a>

                        <a href="{{ route('portfolio.create') }}"
                            class="flex items-center gap-3 p-4 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-100">Tambah Portfolio</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Buat portfolio baru</p>
                            </div>
                        </a>

                        <a href="{{ route('portfolio.index') }}"
                            class="flex items-center gap-3 p-4 bg-blue-50 dark:bg-blue-900 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-800 transition">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-800 dark:text-gray-100">Kelola Portfolio</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Lihat semua portfolio Anda</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            <!-- Tab Navigation -->
            <div class="mb-6 flex gap-2 border-b border-gray-200 dark:border-gray-700">
                <button onclick="showTab('profil-saya', event)"
                    class="tab-btn active px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold">
                    Profil Saya
                </button>
                <button onclick="showTab('mahasiswa-lain', event)"
                    class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 font-semibold hover:text-indigo-600 dark:hover:text-indigo-400">
                    Mahasiswa Lain
                </button>
                <button onclick="showTab('statistik', event)"
                    class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 font-semibold hover:text-indigo-600 dark:hover:text-indigo-400">
                    Statistik
                </button>
            </div>

            <div id="profil-saya"
                class="tab-content bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (isset($user))
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-shrink-0">
                                            @if ($user->profile_photo)
                                                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                                    alt="{{ $user->name }}"
                                                    class="w-24 h-24 rounded-full object-cover">
                                            @else
                                                <div
                                                    class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                    <span class="text-gray-500 dark:text-gray-400 text-sm">No
                                                        Photo</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <h3 class="text-2xl font-semibold text-indigo-600">{{ $user->name }}
                                            </h3>
                                            <p class="mt-1 text-lg"><strong
                                                    class="text-gray-600 dark:text-gray-400">Nrp:</strong>
                                                <span
                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->nrp }}</span>
                                            </p>
                                            <p class="mt-1 text-lg"><strong
                                                    class="text-gray-600 dark:text-gray-400">Prodi:</strong>
                                                <span
                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->prodi ?? '-' }}</span>
                                            </p>
                                            <p class="mt-1 text-lg"><strong
                                                    class="text-gray-600 dark:text-gray-400">Tahun Masuk:</strong>
                                                <span
                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->tahun_masuk ?? '-' }}</span>
                                            </p>
                                            @if ($portfolios && $portfolios->first() && $portfolios->first()->pdf_file)
                                                <div class="mt-3">
                                                    <a href="{{ asset('storage/' . $portfolios->first()->pdf_file) }}"
                                                        target="_blank"
                                                        class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                        Lihat CV
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-indigo-600">Portofolio Saya</h3>
                                        <a href="{{ route('portfolio.index') }}"
                                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-3 py-1.5 rounded">
                                            Kelola Portofolio
                                        </a>
                                    </div>
                                    @if ($portfolios->isEmpty())
                                        <p class="mt-3 text-gray-600 dark:text-gray-400">Belum ada portofolio yang
                                            ditambahkan.</p>
                                    @else
                                        <ul class="mt-3 space-y-4">
                                            @foreach ($portfolios as $p)
                                                <li
                                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                                                    <div class="flex items-center justify-between">
                                                        <div>
                                                            <div class="font-semibold text-indigo-600 text-xl">
                                                                {{ $p->nama_proyek }}</div>
                                                            <div class="text-base text-gray-600 dark:text-gray-300">
                                                                {{ \Illuminate\Support\Str::limit($p->deskripsi, 120) }}
                                                            </div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                                Keahlian:
                                                                {{ $p->keahlian ?? '-' }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        {{ __("You're logged in!") }}
                    @endif
                </div>
            </div>

            <div id="mahasiswa-lain"
                class="tab-content hidden bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($allMahasiswa->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">Tidak ada mahasiswa lain.</p>
                    @else
                        <div class="space-y-6">
                            @foreach ($allMahasiswa as $m)
                                @if (isset($user) && $m->id !== $user->id)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div class="col-span-1">
                                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                                    <div class="flex items-center gap-4">
                                                        <div class="flex-shrink-0">
                                                            @if ($m->profile_photo)
                                                                <img src="{{ asset('storage/' . $m->profile_photo) }}"
                                                                    alt="{{ $m->name }}"
                                                                    class="w-24 h-24 rounded-full object-cover">
                                                            @else
                                                                <div
                                                                    class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                                    <span
                                                                        class="text-gray-500 dark:text-gray-400 text-sm">No
                                                                        Photo</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="min-w-0">
                                                            <h4 class="text-2xl font-semibold text-indigo-600">
                                                                {{ $m->name }}</h4>
                                                            <p class="mt-2 text-lg"><strong
                                                                    class="text-gray-600 dark:text-gray-400">Nrp:</strong>
                                                                <span
                                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->nrp }}</span>
                                                            </p>
                                                            <p class="mt-1 text-lg"><strong
                                                                    class="text-gray-600 dark:text-gray-400">Prodi:</strong>
                                                                <span
                                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->prodi ?? '-' }}</span>
                                                            </p>
                                                            <p class="mt-1 text-lg"><strong
                                                                    class="text-gray-600 dark:text-gray-400">Tahun
                                                                    Masuk:</strong>
                                                                <span
                                                                    class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->tahun_masuk ?? '-' }}</span>
                                                            </p>
                                                            @if ($m->portfolios && $m->portfolios->first() && $m->portfolios->first()->pdf_file)
                                                                <div class="mt-3">
                                                                    <a href="{{ asset('storage/' . $m->portfolios->first()->pdf_file) }}"
                                                                        target="_blank"
                                                                        class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                                                                        <svg class="w-4 h-4" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                                            </path>
                                                                        </svg>
                                                                        Lihat CV
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                                    <h5 class="font-semibold text-indigo-600">Portofolio</h5>
                                                    @if ($m->portfolios->isEmpty())
                                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Belum
                                                            ada portofolio.</p>
                                                    @else
                                                        <ul class="mt-2 space-y-4">
                                                            @foreach ($m->portfolios as $p)
                                                                <li
                                                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                                                                    <div class="font-semibold text-indigo-600 text-lg">
                                                                        {{ $p->nama_proyek }}</div>
                                                                    <div
                                                                        class="text-sm text-gray-600 dark:text-gray-300">
                                                                        {{ \Illuminate\Support\Str::limit($p->deskripsi, 100) }}
                                                                    </div>
                                                                    <div
                                                                        class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                                        Keahlian: {{ $p->keahlian ?? '-' }}</div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Statistik Tab -->
            <div id="statistik"
                class="tab-content hidden bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (isset($user))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Portfolio Statistics -->
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-semibold text-indigo-600 mb-6">📊 Statistik Portfolio Anda</h3>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Total Portfolio Dibuat</span>
                                        <span
                                            class="text-2xl font-bold text-indigo-600">{{ $portfolios->count() }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Portfolio dengan CV</span>
                                        <span
                                            class="text-2xl font-bold text-green-600">{{ $portfolios->where('pdf_file', '!=', null)->count() }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Portfolio Tanpa CV</span>
                                        <span
                                            class="text-2xl font-bold text-orange-600">{{ $portfolios->where('pdf_file', null)->count() }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- User Statistics -->
                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-semibold text-purple-600 mb-6">👥 Statistik Pengguna</h3>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Total Mahasiswa</span>
                                        <span
                                            class="text-2xl font-bold text-purple-600">{{ $allMahasiswa->count() }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Mahasiswa Aktif Lainnya</span>
                                        <span
                                            class="text-2xl font-bold text-blue-600">{{ $allMahasiswa->count() }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-3 bg-white dark:bg-gray-800 rounded">
                                        <span class="text-gray-700 dark:text-gray-300">Mahasiswa dengan Foto</span>
                                        <span
                                            class="text-2xl font-bold text-pink-600">{{ $allMahasiswa->where('profile_photo', '!=', null)->count() + ($user->profile_photo ? 1 : 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Portfolio Details List -->
                            <div class="md:col-span-2">
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-semibold text-indigo-600 mb-4">📋 Daftar Portfolio Saya
                                    </h3>
                                    @if ($portfolios->isEmpty())
                                        <p class="text-gray-600 dark:text-gray-400 text-center py-6">Belum ada
                                            portfolio. <a href="{{ route('portfolio.create') }}"
                                                class="text-indigo-600 hover:text-indigo-800 font-semibold">Buat
                                                sekarang</a></p>
                                    @else
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full text-sm">
                                                <thead>
                                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                                        <th
                                                            class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                                                            Nama Proyek</th>
                                                        <th
                                                            class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                                                            Keahlian</th>
                                                        <th
                                                            class="text-left py-3 px-4 font-semibold text-gray-700 dark:text-gray-300">
                                                            CV</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($portfolios as $p)
                                                        <tr
                                                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-white dark:hover:bg-gray-800">
                                                            <td class="py-3 px-4 text-gray-700 dark:text-gray-300">
                                                                {{ $p->nama_proyek }}</td>
                                                            <td class="py-3 px-4">
                                                                <span
                                                                    class="inline-block bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 px-2 py-1 rounded text-xs">
                                                                    {{ $p->keahlian }}
                                                                </span>
                                                            </td>
                                                            <td class="py-3 px-4">
                                                                @if ($p->pdf_file)
                                                                    <a href="{{ asset('storage/' . $p->pdf_file) }}"
                                                                        target="_blank"
                                                                        class="text-green-600 hover:text-green-800 font-semibold">✓
                                                                        Ada</a>
                                                                @else
                                                                    <span class="text-gray-500 dark:text-gray-400">✗
                                                                        Tidak ada</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName, event) {
            // Hide all tabs
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.add('hidden'));

            // Remove active class from all buttons and set to inactive style
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-indigo-600', 'text-indigo-600');
                btn.classList.add('border-transparent', 'text-gray-600', 'dark:text-gray-400');
                btn.classList.remove('dark:hover:text-indigo-400'); // Clean up old classes if necessary
            });

            // Show selected tab
            document.getElementById(tabName).classList.remove('hidden');

            // Add active class to clicked button
            if (event && event.target) {
                event.target.classList.remove('border-transparent', 'text-gray-600', 'dark:text-gray-400');
                event.target.classList.add('border-indigo-600', 'text-indigo-600');
            }
        }

        // Initialize first tab (optional, but good practice)
        document.addEventListener('DOMContentLoaded', () => {
            // Ensure only the first tab is visible on load
            const initialTab = document.getElementById('profil-saya');
            const otherTabs = document.querySelectorAll('.tab-content:not(#profil-saya)');
            if (initialTab) {
                initialTab.classList.remove('hidden');
            }
            otherTabs.forEach(tab => tab.classList.add('hidden'));
        });
    </script>
</x-app-layout>
