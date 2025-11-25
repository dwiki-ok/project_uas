<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex gap-2 border-b border-gray-200 dark:border-gray-700">
                <button onclick="showTab('profil-saya', event)"
                    class="tab-btn active px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold">
                    Profil Saya
                </button>
                <button onclick="showTab('mahasiswa-lain', event)"
                    class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 font-semibold hover:text-indigo-600 dark:hover:text-indigo-400">
                    Mahasiswa Lain
                </button>
            </div>

            <div id="profil-saya" class="tab-content bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (isset($user))
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-shrink-0">
                                            @if($user->profile_photo)
                                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full object-cover">
                                            @else
                                                <div class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                    <span class="text-gray-500 dark:text-gray-400 text-sm">No Photo</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <h3 class="text-2xl font-semibold text-indigo-600">{{ $user->name }}</h3>
                                            <p class="mt-1 text-lg"><strong class="text-gray-600 dark:text-gray-400">Nrp:</strong>
                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->nrp }}</span>
                                            </p>
                                            <p class="mt-1 text-lg"><strong class="text-gray-600 dark:text-gray-400">Prodi:</strong>
                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->prodi ?? '-' }}</span>
                                            </p>
                                            <p class="mt-1 text-lg"><strong class="text-gray-600 dark:text-gray-400">Tahun Masuk:</strong>
                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->tahun_masuk ?? '-' }}</span>
                                            </p>
                                            @if($portfolios && $portfolios->first() && $portfolios->first()->pdf_file)
                                                <div class="mt-3">
                                                    <a href="{{ asset('storage/' . $portfolios->first()->pdf_file) }}" target="_blank" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                        Lihat CV
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-indigo-600">Portofolio Saya</h3>
                                        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-3 py-1.5 rounded">
                                            Kelola Portofolio
                                        </a>
                                    </div>
                                    @if ($portfolios->isEmpty())
                                        <p class="mt-3 text-gray-600 dark:text-gray-400">Belum ada portofolio yang ditambahkan.</p>
                                    @else
                                        <ul class="mt-3 space-y-4">
                                            @foreach ($portfolios as $p)
                                                <li
                                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                                                    <div class="flex items-center justify-between">
                                                        <div>
                                                            <div class="font-semibold text-indigo-600 text-xl">
                                                                {{ $p->nama_proyek }}</div>
                                                            <div class="text-base text-gray-600 dark:text-gray-300">
                                                                {{ \Illuminate\Support\Str::limit($p->deskripsi, 120) }}
                                                            </div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Keahlian:
                                                                {{ $p->keahlian ?? '-' }}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        {{ __("You're logged in!") }}
                    @endif
                </div>
            </div>

            <div id="mahasiswa-lain"
                class="tab-content hidden bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($allMahasiswa->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">Tidak ada mahasiswa lain.</p>
                    @else
                        <div class="space-y-6">
                            @foreach ($allMahasiswa as $m)
                                @if (isset($user) && $m->id !== $user->id)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div class="col-span-1">
                                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                                    <div class="flex items-center gap-4">
                                                        <div class="flex-shrink-0">
                                                            @if($m->profile_photo)
                                                                <img src="{{ asset('storage/' . $m->profile_photo) }}" alt="{{ $m->name }}" class="w-24 h-24 rounded-full object-cover">
                                                            @else
                                                                <div class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                                    <span class="text-gray-500 dark:text-gray-400 text-sm">No Photo</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="min-w-0">
                                                            <h4 class="text-2xl font-semibold text-indigo-600">{{ $m->name }}</h4>
                                                            <p class="mt-2 text-lg"><strong class="text-gray-600 dark:text-gray-400">Nrp:</strong>
                                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->nrp }}</span>
                                                            </p>
                                                            <p class="mt-1 text-lg"><strong class="text-gray-600 dark:text-gray-400">Prodi:</strong>
                                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->prodi ?? '-' }}</span>
                                                            </p>
                                                            <p class="mt-1 text-lg"><strong class="text-gray-600 dark:text-gray-400">Tahun Masuk:</strong>
                                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $m->tahun_masuk ?? '-' }}</span>
                                                            </p>
                                                            @if($m->portfolios && $m->portfolios->first() && $m->portfolios->first()->pdf_file)
                                                                <div class="mt-3">
                                                                    <a href="{{ asset('storage/' . $m->portfolios->first()->pdf_file) }}" target="_blank" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                                        Lihat CV
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-lg shadow-md">
                                                    <h5 class="font-semibold text-indigo-600">Portofolio</h5>
                                                    @if ($m->portfolios->isEmpty())
                                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Belum ada portofolio.</p>
                                                    @else
                                                        <ul class="mt-2 space-y-4">
                                                            @foreach ($m->portfolios as $p)
                                                                <li
                                                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                                                                    <div class="font-semibold text-indigo-600 text-lg">
                                                                        {{ $p->nama_proyek }}</div>
                                                                    <div class="text-sm text-gray-600 dark:text-gray-300">
                                                                        {{ \Illuminate\Support\Str::limit($p->deskripsi, 100) }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Keahlian: {{ $p->keahlian ?? '-' }}</div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName, event) {
            // Hide all tabs
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.add('hidden'));

            // Remove active class from all buttons and set to inactive style
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-indigo-600', 'text-indigo-600');
                btn.classList.add('border-transparent', 'text-gray-600', 'dark:text-gray-400');
                btn.classList.remove('dark:hover:text-indigo-400'); // Clean up old classes if necessary
            });

            // Show selected tab
            document.getElementById(tabName).classList.remove('hidden');

            // Add active class to clicked button
            if (event && event.target) {
                event.target.classList.remove('border-transparent', 'text-gray-600', 'dark:text-gray-400');
                event.target.classList.add('border-indigo-600', 'text-indigo-600');
            }
        }

        // Initialize first tab (optional, but good practice)
        document.addEventListener('DOMContentLoaded', () => {
            // Ensure only the first tab is visible on load
            const initialTab = document.getElementById('profil-saya');
            const otherTabs = document.querySelectorAll('.tab-content:not(#profil-saya)');
            if (initialTab) {
                initialTab.classList.remove('hidden');
            }
            otherTabs.forEach(tab => tab.classList.add('hidden'));
        });
    </script>
</x-app-layout>