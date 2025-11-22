<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('portfolio.update', $portfolio->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Proyek -->
                        <div class="mb-4">
                            <label for="nama_proyek" class="block text-gray-700 text-sm font-bold mb-2">
                                Nama Proyek
                            </label>
                            <input type="text" name="nama_proyek" id="nama_proyek"
                                value="{{ old('nama_proyek', $portfolio->nama_proyek) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_proyek') border-red-500 @enderror"
                                required>
                            @error('nama_proyek')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                                required>{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Keahlian -->
                        <div class="mb-4">
                            <label for="keahlian" class="block text-gray-700 text-sm font-bold mb-2">
                                Keahlian
                            </label>
                            <input type="text" name="keahlian" id="keahlian"
                                value="{{ old('keahlian', $portfolio->keahlian) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('keahlian') border-red-500 @enderror"
                                required>
                            @error('keahlian')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div> <!-- Upload PDF (Edit) -->
                        <div class="mb-4">
                            <label for="pdf_file" class="block text-gray-700 text-sm font-bold mb-2">Ubah file PDF
                                CV</label>
                            <input type="file" name="pdf_file" class="w-full border-gray-300 rounded"
                                accept="application/pdf">
                            @if ($portfolio->pdf_file)
                                <p class="text-blue-500 text-sm">
                                    <a href="{{ asset('storage/' . $portfolio->pdf_file) }}" target="_blank">Lihat file
                                        CV yang ada</a>
                                </p>
                            @endif
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Portofolio
                            </button>
                            <a href="{{ route('portfolio.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
