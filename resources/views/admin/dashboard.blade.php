<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard Administrator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Banner -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Selamat Datang, Admin!</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">Ini adalah pusat kendali aplikasi. Anda dapat mengelola mahasiswa dan
                        memantau portofolio dari sini.</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Card 1: Jumlah Mahasiswa -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-indigo-100 text-indigo-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Mahasiswa</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $studentCount }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.index') }}"
                                class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Lihat Semua Mahasiswa
                                &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Jumlah Portofolio -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Portofolio</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $portfolioCount }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <span class="text-gray-500 text-sm">Diunggah oleh seluruh mahasiswa</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pintasan Cepat -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-yellow-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Aksi Cepat</p>
                                <p class="text-lg font-bold text-gray-900">Kelola Data</p>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('admin.create') }}"
                                class="bg-indigo-600 text-white text-xs font-bold py-2 px-3 rounded hover:bg-indigo-700 dark:bg-indigo-600 dark:hover:bg-indigo-700">
                                + Mahasiswa
                            </a>
                            <!-- Anda bisa menambah tombol lain di sini -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expanded dashboard: recent portfolios, students per prodi, latest students, photo stats -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left: Recent Portfolios -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-semibold">Portofolio Terbaru</h4>
                                <a href="{{ route('portfolio.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">Lihat Semua</a>
                            </div>

                            @if(isset($recentPortfolios) && $recentPortfolios->count())
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-900">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Judul</th>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Pemilik</th>
                                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Tahun Masuk</th>
                                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach($recentPortfolios as $portfolio)
                                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-100">{{ $portfolio->nama_proyek ?? 'Untitled' }}</td>
                                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-100">{{ $portfolio->user?->name ?? 'Unknown' }}</td>
                                                    <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-100">{{ $portfolio->user?->tahun_masuk ?? '-' }}</td>
                                                    <td class="px-4 py-3 text-sm text-center">
                                                        <a href="{{ route('portfolio.show', $portfolio->id) }}" class="text-indigo-600 hover:underline dark:text-indigo-400">Lihat</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-gray-500">Belum ada portofolio terbaru.</div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-lg font-semibold mb-3">Distribusi Mahasiswa per Prodi</h4>
                            @if(isset($studentsPerProdi) && $studentsPerProdi->count())
                                <div class="space-y-3">
                                    @foreach($studentsPerProdi as $row)
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm text-gray-700 dark:text-gray-100">{{ $row->prodi ?? 'Umum' }}</div>
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $row->total }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-gray-500">Belum ada data prodi.</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right: Latest Students + Photo Stats -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-lg font-semibold">Mahasiswa Terbaru</h4>
                            @if(isset($latestStudents) && $latestStudents->count())
                                <ul class="mt-4 space-y-3">
                                    @foreach($latestStudents as $s)
                                        <li class="flex items-center gap-3">
                                            @if($s->profile_photo)
                                                <img src="{{ asset('storage/' . $s->profile_photo) }}" alt="avatar" class="h-10 w-10 rounded-full object-cover">
                                            @else
                                                <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-600 dark:text-gray-200">{{ Str::substr($s->name,0,1) }}</div>
                                            @endif
                                            <div class="text-sm">
                                                <div class="font-medium text-gray-900 dark:text-gray-100">{{ $s->name }}</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $s->prodi ?? 'Umum' }}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-gray-500">Belum ada mahasiswa baru.</div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h4 class="text-lg font-semibold">Status Foto Profil</h4>
                            <div class="mt-3">
                                <div class="flex items-center justify-between text-sm text-gray-700 dark:text-gray-100">
                                    <div>Dengan Foto</div>
                                    <div class="font-semibold">{{ $studentsWithPhoto ?? 0 }}</div>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded mt-2 overflow-hidden">
                                    @php
                                        $total = ($studentCount > 0) ? $studentCount : 1;
                                        $percent = intval((($studentsWithPhoto ?? 0) / $total) * 100);
                                    @endphp
                                    <div class="h-2 bg-indigo-600" style="width: {{ $percent }}%"></div>
                                </div>

                                <div class="flex items-center justify-between text-sm text-gray-700 dark:text-gray-100 mt-3">
                                    <div>Tanpa Foto</div>
                                    <div class="font-semibold">{{ $studentsWithoutPhoto ?? 0 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
