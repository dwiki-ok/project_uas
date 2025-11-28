@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 bg-gray-50 min-h-screen py-8">

        <div class="max-w-3xl mx-auto mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Portofolio</h2>
                <p class="text-sm text-gray-500 mt-1">Perbarui data proyek mahasiswa</p>
            </div>

            <a href="{{ route('admin.portfolios.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition-all">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="bg-indigo-50 px-8 py-4 border-b border-indigo-100 flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center font-bold text-sm">
                    {{ substr($portfolio->user->name ?? 'U', 0, 2) }}
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-800">Pemilik: {{ $portfolio->user->name ?? 'Mahasiswa' }}</h3>
                    <p class="text-xs text-gray-500">{{ $portfolio->user->email ?? '-' }}</p>
                </div>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="nama_proyek" class="block text-sm font-medium text-gray-700 mb-2">Nama Proyek</label>
                        <input type="text" name="nama_proyek" id="nama_proyek"
                            value="{{ old('nama_proyek', $portfolio->nama_proyek) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition duration-200"
                            placeholder="Contoh: Sistem Monitoring Suhu">
                        @error('nama_proyek')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="keahlian" class="block text-sm font-medium text-gray-700 mb-2">Keahlian /
                            Teknologi</label>
                        <input type="text" name="keahlian" id="keahlian"
                            value="{{ old('keahlian', $portfolio->keahlian) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition duration-200"
                            placeholder="Contoh: Laravel, IoT, Python">
                        <p class="text-xs text-gray-400 mt-1">Pisahkan dengan koma jika lebih dari satu.</p>
                        @error('keahlian')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Proyek</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition duration-200"
                            placeholder="Jelaskan detail proyek ini...">{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">File Laporan (PDF)</label>

                        @if ($portfolio->pdf_file)
                            <div class="flex items-center p-3 mb-3 bg-blue-50 border border-blue-100 rounded-lg">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" />
                                </svg>
                                <span class="text-sm text-blue-700 truncate mr-auto">File saat ini tersedia</span>
                                <a href="{{ asset('storage/' . $portfolio->pdf_file) }}" target="_blank"
                                    class="text-xs font-bold text-blue-600 hover:underline">Lihat</a>
                            </div>
                        @endif

                        <input type="file" name="pdf_file"
                            class="block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 file:text-indigo-700
                                      hover:file:bg-indigo-100
                                      transition cursor-pointer"
                            accept=".pdf">
                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah file.</p>
                        @error('pdf_file')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.portfolios.index') }}"
                            class="px-5 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-all">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md transition-all">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
