<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">Detail Portofolio</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">{{ $portfolio->nama_proyek }}</h3>
                    <div class="text-sm text-gray-500 mb-4">Oleh: {{ $portfolio->user?->name ?? 'Unknown' }} • {{ $portfolio->created_at?->format('Y') ?? '-' }}</div>

                    @if($portfolio->deskripsi)
                        <div class="mb-4">
                            <h4 class="font-semibold">Deskripsi</h4>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $portfolio->deskripsi }}</p>
                        </div>
                    @endif

                    @if($portfolio->keahlian)
                        <div class="mb-4">
                            <h4 class="font-semibold">Keahlian</h4>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $portfolio->keahlian }}</p>
                        </div>
                    @endif

                    @if($portfolio->pdf_file)
                        <div class="mb-4">
                            <a href="{{ asset('storage/' . $portfolio->pdf_file) }}" target="_blank" class="inline-flex items-center gap-2 text-indigo-600 hover:underline dark:text-indigo-400">
                                Lihat CV / PDF
                            </a>
                        </div>
                    @endif

                    <div class="mt-6">
                        <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
