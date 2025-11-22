<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
                @csrf

                <!-- Nama Proyek -->
                <div class="mb-4">
                    <label class="block font-medium">Nama Project</label>
                    <input type="text" name="nama_proyek" class="w-full border-gray-300 rounded" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block font-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded"></textarea>
                </div>

                <!-- Keahlian -->
                <div class="mb-4">
                    <label class="block font-medium">Keahlian</label>
                    <input type="text" name="keahlian" placeholder="Contoh: Laravel, UI/UX, Database"
                        class="w-full border-gray-300 rounded">
                </div>

                <!-- Upload PDF -->
                <div class="mb-4">
                    <label class="block font-medium">Upload CV (PDF)</label>
                    <input type="file" name="pdf_file" class="w-full border-gray-300 rounded"
                        accept="application/pdf">
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>

        </div>
    </div>
</x-app-layout>
