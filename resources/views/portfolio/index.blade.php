<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portofolio Saya') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('portfolio.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                + Tambah Portofolio
            </a>
            @foreach ($portfolios as $p)
                <div class="p-4 bg-white rounded shadow mb-4 flex justify-between items-center gap-4">

                    <div class="flex-1 space-y-3 min-w-0">
                        <div class="flex items-start">
                            <span class="font-bold text-lg w-32 shrink-0">Nama Project</span>
                            <span class="font-bold text-lg mr-2">:</span>
                            <span class="text-lg break-all">{{ $p->nama_proyek }}</span>
                        </div>

                        <div class="flex items-start">
                            <span class="font-bold text-lg w-32 shrink-0">Deskripsi</span>
                            <span class="font-bold text-lg mr-2">:</span>
                            <span class="text-lg break-all">{{ $p->deskripsi }}</span>
                        </div>

                        <div class="flex items-start">
                            <span class="font-bold text-lg w-32 shrink-0">Keahlian</span>
                            <span class="font-bold text-lg mr-2">:</span>
                            <span class="text-lg break-all">{{ $p->keahlian }}</span>
                        </div>

                        <!-- Menampilkan File PDF jika ada -->
                        @if ($p->pdf_file)
                            <div class="flex items-start">
                                <span class="font-bold text-lg w-32 shrink-0">Sertifikat</span>
                                <span class="font-bold text-lg mr-2">:</span>
                                <a href="{{ asset('storage/' . $p->pdf_file) }}" target="_blank"
                                    class="text-blue-500 hover:text-blue-700">Lihat Sertifikat</a>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col gap-2 w-32 shrink-0">
                        <a href="{{ route('portfolio.edit', $p->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm text-center w-full block"
                            title="Edit">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('portfolio.destroy', $p->id) }}"
                            onsubmit="return confirm('Yakin ingin menghapus project ini?');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm w-full"
                                title="Hapus">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
