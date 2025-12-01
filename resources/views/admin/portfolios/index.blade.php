@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 bg-gray-50 min-h-screen">
        <div class="py-8">

            <div class="relative mb-8 text-center">

                <div class="absolute left-0 top-0 hidden md:block">
                    <a href="{{ route('admin.dashboard') }}"
                        class="group inline-flex items-center px-5 py-2.5 bg-white text-gray-600 font-medium text-sm rounded-xl border border-gray-200 shadow-sm  hover:bg-blue-600 hover:text-white hover:border-blue-600 hover:shadow-md  active:bg-blue-700 
                        transition-all duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-white group-hover:-translate-x-1 transition-all duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Management Portofolio</h2>
                <p class="text-sm text-gray-500 mt-2">Daftar semua portofolio yang diunggah mahasiswa</p>

                <div class="mt-4 md:hidden">
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 mb-6">
                <form method="GET" action="{{ route('admin.portfolios.index') }}">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                        <div class="flex items-center gap-2 w-full md:w-auto">
                            <span class="text-sm font-medium text-gray-500">Tampilkan</span>
                            <select name="per_page" onchange="this.form.submit()"
                                class="border-gray-200 bg-gray-50 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 form-select py-2 cursor-pointer">
                                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                                <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>Semua</option>
                            </select>
                        </div>

                        <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">

                            <div class="relative w-full md:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="block w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent sm:text-sm transition-all"
                                    placeholder="Cari Nama Proyek...">
                            </div>

                            <div class="w-full md:w-56">
                                <select name="prodi" onchange="this.form.submit()"
                                    class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-200 bg-gray-50 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent sm:text-sm rounded-lg transition-all cursor-pointer">
                                    <option value="">-- Pilih Program Studi --</option>

                                    <option value="D3 Teknik Elektronika"
                                        {{ request('prodi') == 'D3 Teknik Elektronika' ? 'selected' : '' }}>D3 Teknik
                                        Elektronika</option>
                                    <option value="D4 Teknik Elektronika"
                                        {{ request('prodi') == 'D4 Teknik Elektronika' ? 'selected' : '' }}>D4 Teknik
                                        Elektronika</option>

                                    <option value="D3 Teknik Telekomunikasi"
                                        {{ request('prodi') == 'D3 Teknik Telekomunikasi' ? 'selected' : '' }}>D3 Teknik
                                        Telekomunikasi</option>
                                    <option value="D4 Teknik Telekomunikasi"
                                        {{ request('prodi') == 'D4 Teknik Telekomunikasi' ? 'selected' : '' }}>D4 Teknik
                                        Telekomunikasi</option>

                                    <option value="D3 Teknik Elektro Industri"
                                        {{ request('prodi') == 'D3 Teknik Elektro Industri' ? 'selected' : '' }}>D3 Teknik
                                        Elektro Industri</option>
                                    <option value="D4 Teknik Elektro Industri"
                                        {{ request('prodi') == 'D4 Teknik Elektro Industri' ? 'selected' : '' }}>D4 Teknik
                                        Elektro Industri</option>

                                    <option value="D4 Teknologi Rekayasa Internet"
                                        {{ request('prodi') == 'D4 Teknologi Rekayasa Internet' ? 'selected' : '' }}>D4
                                        Teknologi Rekayasa Internet</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div
                    class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl relative mb-4 shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-full overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-100">
                <table class="w-full whitespace-no-wrap">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">
                            <th class="px-6 py-4">Mahasiswa</th>
                            <th class="px-6 py-4">Nama Proyek</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4">File</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach ($portfolios as $portfolio)
                            <tr class="hover:bg-gray-50 transition-colors duration-150 group">

                                <td class="px-6 py-4">
                                    <div class="flex items-center">

                                        <div class="flex-shrink-0 mr-3">
                                            @if ($portfolio->user->profile_photo)
                                                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-white shadow-sm"
                                                    src="{{ asset('storage/' . $portfolio->user->profile_photo) }}"
                                                    alt="{{ $portfolio->user->name }}">
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 text-indigo-600 flex items-center justify-center font-bold text-sm uppercase ring-2 ring-white shadow-sm">
                                                    {{ substr($portfolio->user->name ?? 'U', 0, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm">
                                                {{ $portfolio->user->name ?? 'User Hapus' }}
                                            </p>
                                            <p class="text-xs text-gray-500">{{ $portfolio->user->email ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block bg-gray-100 text-gray-700 text-xs font-semibold px-2.5 py-1 rounded-md border border-gray-200">
                                        {{ $portfolio->nama_proyek }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 w-48 truncate" title="{{ $portfolio->deskripsi }}">
                                        {{ Str::limit($portfolio->deskripsi, 40) }}
                                    </p>
                                    <span
                                        class="text-xs text-gray-400 block mt-1">{{ $portfolio->created_at->format('d M Y') }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    @if ($portfolio->pdf_file)
                                        <a href="{{ asset('storage/' . $portfolio->pdf_file) }}" target="_blank"
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600 hover:bg-blue-100 border border-blue-100 transition-colors">
                                            <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" />
                                            </svg>
                                            Lihat PDF
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Tidak ada file</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex justify-end items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}"
                                            class="p-2 text-indigo-600 bg-white border border-gray-200 rounded-lg hover:bg-indigo-50 hover:border-indigo-200 transition-all shadow-sm"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus portofolio ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 bg-white border border-gray-200 rounded-lg hover:bg-red-50 hover:border-red-200 transition-all shadow-sm"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($portfolios->isEmpty())
                <div
                    class="flex flex-col items-center justify-center py-16 bg-white rounded-2xl border border-dashed border-gray-300 mt-6">
                    <div class="bg-gray-50 p-4 rounded-full mb-3">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-gray-900 font-medium">Data tidak ditemukan</p>
                    <p class="text-gray-500 text-sm mt-1">Coba ubah kata kunci pencarian atau filter prodi Anda.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
