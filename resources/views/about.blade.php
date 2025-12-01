<x-app-layout>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8 space-y-8">

                {{-- Tentang Web --}}
                <section>
                    <h3 class="text-2xl font-semibold text-indigo-500 mb-3">
                        Tentang Website
                    </h3>
                    <p class="text-gray-700 dark:text-gray-200 leading-relaxed">
                        Website ini adalah <span class="font-semibold">Direktori Portofolio Mahasiswa</span>
                        yang dibuat untuk menampilkan proyek, keahlian, dan CV mahasiswa secara terstruktur.
                    </p>
                </section>

                {{-- Pengenalan Kelompok --}}
                <section>
                    <h3 class="text-2xl font-semibold text-indigo-500 mb-3">
                        Pengenalan Kelompok
                    </h3>
                    <p class="text-gray-700 dark:text-gray-200 leading-relaxed mb-6">
                        Website ini dikembangkan oleh <span class="font-semibold">Kelompok 7</span>
                        Program Studi <span class="font-semibold">D4 Teknologi Rekayasa Internet</span>,
                        Politeknik Elektronika Negeri Surabaya.
                    </p>

                    {{-- Daftar Anggota --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-10 text-center text-gray-700 dark:text-gray-200">

    {{-- Anggota 1 --}}
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/dika.jpg') }}"
             alt="Dika Dwiki Rama"
             class="w-40 h-40 rounded-full object-cover shadow-xl border-2 border-indigo-400">
        <p class="mt-4 text-lg font-semibold">Dika Dwiki Rama</p>
        <p class="text-sm opacity-80">NRP: 2423600037</p>
    </div>

    {{-- Anggota 2 --}}
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/novaldi.jpg') }}"
             alt="Novaldi Bilqi Akbar Santoso"
             class="w-40 h-40 rounded-full object-cover shadow-xl border-2 border-indigo-400">
        <p class="mt-4 text-lg font-semibold">Novaldi Bilqi Akbar Santoso</p>
        <p class="text-sm opacity-80">NRP: 2423600038</p>
    </div>

    {{-- Anggota 3 --}}
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/laevis.jpg') }}"
             alt="Laevis Uriah Bangun"
             class="w-40 h-40 rounded-full object-cover shadow-xl border-2 border-indigo-400">
        <p class="mt-4 text-lg font-semibold">Laevis Uriah Bangun</p>
        <p class="text-sm opacity-80">NRP: 2423600041</p>
    </div>

</div>

                </section>

            </div>
        </div>
    </div>
</x-app-layout>
