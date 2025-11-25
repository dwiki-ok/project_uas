<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Navigation Tabs -->
            <div class="mb-6 flex gap-2 border-b border-gray-200 dark:border-gray-700">
                <button onclick="showTab('profil-saya')" class="tab-btn active px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold">
                    Profil Saya
                </button>
                <button onclick="showTab('mahasiswa-lain')" class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-600 dark:text-gray-400 font-semibold hover:text-indigo-600">
                    Mahasiswa Lain
                </button>
            </div>

            <!-- Tab Content: Profil Saya -->
            <div id="profil-saya" class="tab-content bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(isset($user))
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="col-span-1">
                                <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded">
                                    <h3 class="text-lg font-semibold">Profil Mahasiswa</h3>
                                    <p class="mt-3"><strong>Nama:</strong> {{ $user->name }}</p>
                                    <p class="mt-1"><strong>Prodi:</strong> {{ $user->prodi ?? '-' }}</p>
                                    <p class="mt-1"><strong>Tahun Masuk:</strong> {{ $user->tahun_masuk ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded">
                                    <h3 class="text-lg font-semibold">Portofolio Saya</h3>
                                    @if($portfolios->isEmpty())
                                        <p class="mt-3 text-gray-600">Belum ada portofolio yang ditambahkan.</p>
                                    @else
                                        <ul class="mt-3 space-y-3">
                                            @foreach($portfolios as $p)
                                                <li class="p-3 bg-white dark:bg-gray-800 rounded border">
                                                    <div class="flex items-center justify-between">
                                                        <div>
                                                            <div class="font-semibold">{{ $p->nama_proyek }}</div>
                                                            <div class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($p->deskripsi, 120) }}</div>
                                                            <div class="text-xs text-gray-500 mt-1">Keahlian: {{ $p->keahlian ?? '-' }}</div>
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

            <!-- Tab Content: Mahasiswa Lain -->
            <div id="mahasiswa-lain" class="tab-content hidden bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($allMahasiswa->isEmpty())
                        <p class="text-gray-600">Tidak ada mahasiswa lain.</p>
                    @else
                        <div class="space-y-6">
                            @foreach($allMahasiswa as $m)
                                @if($m->id !== $user->id)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div class="col-span-1">
                                                <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded">
                                                    <h4 class="text-lg font-semibold">{{ $m->name }}</h4>
                                                    <p class="mt-2 text-sm"><strong>Prodi:</strong> {{ $m->prodi ?? '-' }}</p>
                                                    <p class="mt-1 text-sm"><strong>Tahun Masuk:</strong> {{ $m->tahun_masuk ?? '-' }}</p>
                                                </div>
                                            </div>

                                            <div class="md:col-span-2">
                                                <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded">
                                                    <h5 class="font-semibold">Portofolio</h5>
                                                    @if($m->portfolios->isEmpty())
                                                        <p class="mt-2 text-sm text-gray-600">Belum ada portofolio.</p>
                                                    @else
                                                        <ul class="mt-2 space-y-2">
                                                            @foreach($m->portfolios as $p)
                                                                <li class="p-2 bg-white dark:bg-gray-800 rounded border text-sm">
                                                                    <div class="font-semibold">{{ $p->nama_proyek }}</div>
                                                                    <div class="text-xs text-gray-600">{{ \Illuminate\Support\Str::limit($p->deskripsi, 100) }}</div>
                                                                    <div class="text-xs text-gray-500 mt-1">Keahlian: {{ $p->keahlian ?? '-' }}</div>
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
        function showTab(tabName) {
            // Hide all tabs
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.add('hidden'));

            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-b-2', 'border-indigo-600', 'text-indigo-600');
                btn.classList.add('border-b-2', 'border-transparent', 'text-gray-600', 'dark:text-gray-400');
            });

            // Show selected tab
            document.getElementById(tabName).classList.remove('hidden');

            // Add active class to clicked button
            event.target.classList.remove('border-b-2', 'border-transparent', 'text-gray-600', 'dark:text-gray-400');
            event.target.classList.add('border-b-2', 'border-indigo-600', 'text-indigo-600');
        }
    </script>
</x-app-layout>
