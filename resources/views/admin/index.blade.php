<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Bagian Statistik Ringkas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border-l-4 border-indigo-500">
                    <div class="text-gray-500 text-sm font-medium">Total Mahasiswa</div>
                    <div class="text-2xl font-bold text-gray-900">{{ $students->count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border-l-4 border-green-500">
                    <div class="text-gray-500 text-sm font-medium">Prodi Terdaftar</div>
                    <div class="text-2xl font-bold text-gray-900">{{ $students->unique('prodi')->count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 border-l-4 border-blue-500">
                    <div class="text-gray-500 text-sm font-medium">Angkatan Terbaru</div>
                    <div class="text-2xl font-bold text-gray-900">{{ $students->max('tahun_masuk') ?? '-' }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Notifikasi Sukses -->
                    @if (session('success'))
                        <div x-data="{ show: true }" x-show="show"
                            class="mb-4 flex items-center justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                            <button @click="show = false" class="text-green-700 hover:text-green-900">
                                <span class="text-2xl">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Toolbar: Search, Filter & Add -->
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

                        <!-- Search & Filter Wrapper -->
                        <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto flex-grow">
                            <!-- Search Input -->
                            <div class="relative w-full md:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="searchInput" placeholder="Cari Nama / NRP..."
                                    class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    onkeyup="filterTable()">
                            </div>

                            <!-- Filter Prodi Dropdown -->
                            <select id="prodiFilter" onchange="filterTable()"
                                class="block w-full md:w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Semua Prodi</option>
                                @foreach ($students->unique('prodi')->pluck('prodi') as $prodi)
                                    @if ($prodi)
                                        <option value="{{ $prodi }}">{{ $prodi }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Tambah -->
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Mahasiswa
                        </a>
                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-hidden border border-gray-200 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200" id="mahasiswaTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                                        Mahasiswa</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Identitas Akademik</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($students as $student)
                                    <tr class="hover:bg-gray-50 transition-colors student-row">
                                        <!-- Kolom Nama & Email dengan Avatar -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border border-indigo-200">
                                                        {{ substr($student->name, 0, 1) }}{{ substr(strrchr($student->name, ' '), 1, 1) }}
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 student-name">
                                                        {{ $student->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $student->email }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Kolom Akademik -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 font-mono student-nrp">
                                                {{ $student->nrp }}</div>
                                            <div class="text-xs mt-1 flex flex-wrap gap-1">
                                                @if ($student->prodi)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 student-prodi">
                                                        {{ $student->prodi }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        -
                                                    </span>
                                                @endif

                                                @if ($student->tahun_masuk)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $student->tahun_masuk }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>

                                        <!-- Kolom Status (Mockup) -->
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aktif
                                            </span>
                                        </td>

                                        <!-- Kolom Aksi -->
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="flex justify-center items-center space-x-3">

                                                <!-- Tombol Edit -->
                                                <a href="{{ route('admin.edit', $student->id) }}"
                                                    class="group text-indigo-600 hover:text-indigo-900"
                                                    title="Edit Data">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <!-- Tombol Kelola Portofolio -->
                                                <a href="{{ route('admin.managePortfolios', $student->id) }}"
                                                    class="group text-blue-600 hover:text-blue-900"
                                                    title="Lihat Portofolio">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('admin.destroy', $student->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data {{ $student->name }}? Data tidak bisa dikembalikan.');"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="group text-red-600 hover:text-red-900"
                                                        title="Hapus Permanen">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr id="noDataRow">
                                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="h-12 w-12 text-gray-300 mb-3" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                                <p class="text-base font-medium text-gray-900">Tidak ada data ditemukan
                                                </p>
                                                <p class="text-sm text-gray-500">Coba ubah filter atau tambah mahasiswa
                                                    baru.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                <!-- Baris Pesan Tidak Ditemukan (Disembunyikan Default) -->
                                <tr id="noResultRow" class="hidden">
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        <p class="text-base font-medium text-gray-900">Pencarian tidak ditemukan</p>
                                        <p class="text-sm text-gray-500">Tidak ada mahasiswa yang cocok dengan kata
                                            kunci tersebut.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Info (Optional) -->
                    <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
                        <div>
                            Menampilkan <span class="font-bold" id="visibleCount">{{ $students->count() }}</span>
                            dari <span class="font-bold">{{ $students->count() }}</span> mahasiswa.
                        </div>
                        <div class="text-xs">
                            Data diperbarui {{ now()->format('d M Y') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Script JavaScript Sederhana untuk Filter Tabel -->
    <script>
        function filterTable() {
            // Ambil nilai input
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const prodiFilter = document.getElementById('prodiFilter').value.toLowerCase();

            // Ambil semua baris tabel
            const rows = document.querySelectorAll('.student-row');
            let visibleCount = 0;
            let hasResult = false;

            rows.forEach(row => {
                // Ambil data dari kolom
                const name = row.querySelector('.student-name').innerText.toLowerCase();
                const nrp = row.querySelector('.student-nrp').innerText.toLowerCase();
                const prodi = row.querySelector('.student-prodi') ? row.querySelector('.student-prodi').innerText
                    .toLowerCase() : '';

                // Logika Filter
                const matchesSearch = name.includes(searchInput) || nrp.includes(searchInput);
                const matchesProdi = prodiFilter === '' || prodi === prodiFilter || (prodiFilter === '-' &&
                    prodi === '');

                // Tampilkan/Sembunyikan
                if (matchesSearch && matchesProdi) {
                    row.style.display = '';
                    visibleCount++;
                    hasResult = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update Counter
            document.getElementById('visibleCount').innerText = visibleCount;

            // Tampilkan pesan "Tidak ditemukan" jika hasil 0
            const noResultRow = document.getElementById('noResultRow');
            const noDataRow = document.getElementById('noDataRow'); // Baris kosong asli PHP

            if (!hasResult && !noDataRow) {
                noResultRow.classList.remove('hidden');
            } else {
                noResultRow.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
