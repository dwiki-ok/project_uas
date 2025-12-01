<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data"
                class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                @csrf

                <!-- Nama Proyek -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-800 dark:text-gray-200">Nama Project</label>
                    <input type="text" name="nama_proyek"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded px-3 py-2"
                        required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-800 dark:text-gray-200">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded px-3 py-2"></textarea>
                </div>

                <!-- Keahlian -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-800 dark:text-gray-200">Keahlian</label>
                    <input type="text" name="keahlian" placeholder="Contoh: Laravel, UI/UX, Database"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded px-3 py-2">
                </div>

                <!-- Upload PDF -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-800 dark:text-gray-200">Upload CV (PDF)</label>
                    <input type="file" name="pdf_file"
                        class="w-full border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100"
                        accept="application/pdf">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded dark:bg-blue-600 dark:hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('portfolio.index') }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded dark:bg-red-500 dark:hover:bg-red-600">Batal</a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
