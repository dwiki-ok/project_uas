<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Student Account Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border-l-4 border-indigo-500 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Total Mahasiswa</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $students->count() }}</p>
                    </div>
                    <div class="p-2 bg-indigo-100 rounded-full text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border-l-4 border-green-500 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Prodi Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $students->unique('prodi')->count() }}</p>
                    </div>
                    <div class="p-2 bg-green-100 rounded-full text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border-l-4 border-blue-500 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Angkatan Terbaru</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $students->max('tahun_masuk') ?? '-' }}</p>
                    </div>
                    <div class="p-2 bg-blue-100 rounded-full text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border-l-4 border-yellow-500 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Data Portofolio</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $students->sum(fn($s) => $s->portfolios->count()) }}
                        </p>
                    </div>
                    <div class="p-2 bg-yellow-100 rounded-full text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms
                            class="mb-6 flex items-center justify-between bg-green-50 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 px-4 py-3 rounded shadow-sm"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-bold">Berhasil!</p>
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                            <button @click="show = false"
                                class="text-green-700 hover:text-green-900 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <div class="flex flex-col lg:flex-row justify-between items-center mb-6 gap-4">

                        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                            <div class="flex items-center">
                                <span class="text-sm text-gray-500 mr-2">Show</span>
                                <select id="rowsPerPage" onchange="changeRowsPerPage()"
                                    class="form-select block w-20 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="all">All</option>
                                </select>
                            </div>

                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="searchInput" placeholder="Cari Nama, NRP..."
                                    class="pl-10 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    onkeyup="processTable()">
                            </div>

                            <select id="prodiFilter" onchange="processTable()"
                                class="block w-full sm:w-48 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Semua Prodi</option>
                                @foreach ($students->unique('prodi')->pluck('prodi') as $prodi)
                                    @if ($prodi)
                                        <option value="{{ $prodi }}">{{ $prodi }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-wrap gap-2 w-full lg:w-auto justify-end">
                            <button onclick="exportToCSV()"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Export excel
                            </button>

                            <a href="{{ route('admin.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md dark:bg-indigo-600 dark:hover:bg-indigo-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Akun Baru
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="mainTable">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-6 py-3 w-10">
                                        <input type="checkbox" id="selectAll" onchange="toggleSelectAll()"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </th>
                                    <th scope="col" onclick="sortTable(1)"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 group">
                                        <div class="flex items-center">
                                            Mahasiswa
                                            <span
                                                class="ml-1 text-gray-400 group-hover:text-indigo-500 sort-icon">⇅</span>
                                        </div>
                                    </th>
                                    <th scope="col" onclick="sortTable(2)"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 group">
                                        <div class="flex items-center">
                                            NRP
                                            <span
                                                class="ml-1 text-gray-400 group-hover:text-indigo-500 sort-icon">⇅</span>
                                        </div>
                                    </th>
                                    <th scope="col" onclick="sortTable(3)"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 group">
                                        <div class="flex items-center">
                                            Info Akademik
                                            <span
                                                class="ml-1 text-gray-400 group-hover:text-indigo-500 sort-icon">⇅</span>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" id="tableBody">
                                @forelse($students as $student)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors student-row group">
                                        <td class="px-6 py-4">
                                            <input type="checkbox"
                                                class="row-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-200 font-bold border border-indigo-200 dark:border-indigo-700">
                                                        {{ substr($student->name, 0, 1) }}{{ substr(strrchr($student->name, ' '), 1, 1) }}
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100 student-name">
                                                            {{ $student->name }}</div>
                                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->email }}</div>
                                                    </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="student-nrp font-mono text-sm text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">{{ $student->nrp }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <span
                                                    class="student-prodi text-xs font-semibold text-blue-600 dark:text-blue-200 bg-blue-100 dark:bg-blue-900 px-2 py-0.5 rounded-full w-max mb-1">
                                                    {{ $student->prodi ?? 'Umum' }}
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    Angkatan: <span
                                                        class="font-bold student-year">{{ $student->tahun_masuk ?? '-' }}</span>
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div
                                                class="flex justify-center items-center opacity-80 group-hover:opacity-100 transition-opacity">
                                                <form action="{{ route('admin.destroy', $student->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus {{ $student->name }}?');"
                                                    class="inline-block">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="p-1.5 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-200 rounded-md hover:bg-red-200 dark:hover:bg-red-800"
                                                        title="Hapus">
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
                                    <tr class="no-data-php">
                                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                            Tidak ada data ditemukan.
                                        </td>
                                    </tr>
                                @endforelse

                                <tr id="noResultRow" class="hidden">
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 bg-gray-50">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                            <p class="text-lg font-medium text-gray-900">Tidak ditemukan</p>
                                            <p class="text-sm">Coba kata kunci lain atau ubah filter.</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-700">
                        <div class="mb-2 sm:mb-0">
                            Menampilkan <span class="font-bold" id="startRange">0</span> sampai <span
                                class="font-bold" id="endRange">0</span> dari <span class="font-bold"
                                id="totalRows">0</span> data.
                        </div>
                        <div class="flex space-x-1" id="paginationControls">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // State Variables
        let rows = [];
        let filteredRows = [];
        let currentPage = 1;
        let rowsPerPage = 10;
        let sortDirection = 1; // 1 = ASC, -1 = DESC
        let currentSortColumn = -1;

        // Inisialisasi saat load
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua baris asli dari HTML
            const tableBody = document.getElementById('tableBody');
            const originalRows = Array.from(tableBody.querySelectorAll('.student-row'));

            // Simpan referensi baris untuk manipulasi
            rows = originalRows.map(row => ({
                element: row,
                name: row.querySelector('.student-name').innerText.toLowerCase(),
                nrp: row.querySelector('.student-nrp').innerText.toLowerCase(),
                prodi: row.querySelector('.student-prodi') ? row.querySelector('.student-prodi')
                    .innerText.toLowerCase() : '',
                year: row.querySelector('.student-year') ? row.querySelector('.student-year')
                    .innerText : '0'
            }));

            // Hapus baris 'no-data-php' jika ada data
            if (rows.length > 0) {
                const phpEmpty = document.querySelector('.no-data-php');
                if (phpEmpty) phpEmpty.style.display = 'none';
            }

            // Jalankan filter pertama kali
            processTable();
        });

        // 1. FUNGSI UTAMA: PROCESS TABLE (Filter -> Sort -> Paginate)
        function processTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const prodiFilter = document.getElementById('prodiFilter').value.toLowerCase();

            // STEP 1: FILTERING
            filteredRows = rows.filter(row => {
                const matchesSearch = row.name.includes(searchInput) || row.nrp.includes(searchInput);
                const matchesProdi = prodiFilter === '' || row.prodi === prodiFilter;
                return matchesSearch && matchesProdi;
            });

            // STEP 2: SORTING (Jika ada kolom yg aktif)
            if (currentSortColumn !== -1) {
                filteredRows.sort((a, b) => {
                    let valA, valB;
                    // Tentukan nilai berdasarkan kolom
                    if (currentSortColumn === 1) {
                        valA = a.name;
                        valB = b.name;
                    } // Nama
                    else if (currentSortColumn === 2) {
                        valA = a.nrp;
                        valB = b.nrp;
                    } // NRP
                    else if (currentSortColumn === 3) {
                        valA = a.year;
                        valB = b.year;
                    } // Angkatan

                    if (valA < valB) return -1 * sortDirection;
                    if (valA > valB) return 1 * sortDirection;
                    return 0;
                });
            }

            // Reset ke halaman 1 jika filter berubah
            const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
            if (currentPage > totalPages) currentPage = 1;
            if (currentPage < 1) currentPage = 1;

            // STEP 3: RENDER PAGINATION & TABLE
            renderTable();
            renderPagination();
        }

        // 2. RENDER TABLE
        function renderTable() {
            // Sembunyikan semua baris dulu
            rows.forEach(r => r.element.style.display = 'none');
            document.getElementById('noResultRow').classList.add('hidden');

            // Hitung Start & End Index
            const start = (currentPage - 1) * rowsPerPage;
            const end = rowsPerPage === 'all' ? filteredRows.length : start + parseInt(rowsPerPage);

            // Tampilkan baris yang sesuai slice halaman
            const pageRows = rowsPerPage === 'all' ? filteredRows : filteredRows.slice(start, end);

            if (pageRows.length > 0) {
                pageRows.forEach(r => r.element.style.display = '');
            } else {
                document.getElementById('noResultRow').classList.remove('hidden');
            }

            // Update Info Footer
            document.getElementById('totalRows').innerText = filteredRows.length;
            document.getElementById('startRange').innerText = filteredRows.length === 0 ? 0 : start + 1;
            document.getElementById('endRange').innerText = Math.min(end, filteredRows.length);
        }

        // 3. RENDER PAGINATION CONTROLS
        function renderPagination() {
            const controls = document.getElementById('paginationControls');
            controls.innerHTML = ''; // Reset

            if (rowsPerPage === 'all') return;

            const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
            if (totalPages <= 1) return;

            // Helper button creator
            const createBtn = (page, text, isActive = false, isDisabled = false) => {
                const btn = document.createElement('button');
                btn.innerText = text;
                btn.className = `px-3 py-1 rounded-md border text-sm font-medium ${
                    isActive 
                    ? 'bg-indigo-600 text-white border-indigo-600' 
                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50'
                } ${isDisabled ? 'opacity-50 cursor-not-allowed' : ''}`;

                if (!isDisabled) {
                    btn.onclick = () => {
                        currentPage = page;
                        renderTable(); // Hanya render ulang tabel
                        renderPagination();
                    };
                }
                controls.appendChild(btn);
            };

            // Prev Button
            createBtn(currentPage - 1, 'Prev', false, currentPage === 1);

            // Numbered Buttons
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    createBtn(i, i, i === currentPage);
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    const span = document.createElement('span');
                    span.innerText = '...';
                    span.className = 'px-2 py-1';
                    controls.appendChild(span);
                }
            }

            // Next Button
            createBtn(currentPage + 1, 'Next', false, currentPage === totalPages);
        }

        // 4. SORTING HANDLER
        function sortTable(columnIndex) {
            if (currentSortColumn === columnIndex) {
                sortDirection *= -1;
            } else {
                currentSortColumn = columnIndex;
                sortDirection = 1; // Default ASC
            }

            // Update UI Icon
            const headers = document.querySelectorAll('th.cursor-pointer span');
            headers.forEach(h => h.innerText = '⇅'); // Reset all
            const activeHeader = document.querySelector(`th:nth-child(${columnIndex + 1}) span`);
            if (activeHeader) activeHeader.innerText = sortDirection === 1 ? '↑' : '↓';

            processTable();
        }

        // 5. CHANGE ROWS PER PAGE
        function changeRowsPerPage() {
            const select = document.getElementById('rowsPerPage');
            rowsPerPage = select.value === 'all' ? 'all' : parseInt(select.value);
            currentPage = 1;
            processTable();
        }

        // 6. EXPORT TO CSV
        function exportToCSV() {
            let csvContent = "data:text/csv;charset=utf-8,";
            csvContent += "Nama Lengkap,Email,NRP,Prodi,Angkatan\n"; // Header

            filteredRows.forEach(row => {
                const email = row.element.querySelector('.text-xs.text-gray-500').innerText;
                const rowStr = `"${row.name}","${email}","${row.nrp}","${row.prodi}","${row.year}"`;
                csvContent += rowStr + "\n";
            });

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "data_mahasiswa.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // 7. SELECT ALL CHECKBOX
        function toggleSelectAll() {
            const masterCheckbox = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => {
                if (cb.closest('tr').style.display !== 'none') {
                    cb.checked = masterCheckbox.checked;
                }
            });
        }
    </script>
</x-app-layout>
