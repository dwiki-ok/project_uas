<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Akun Mahasiswa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    <div class="mb-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Form Data Mahasiswa</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Lengkapi data berikut untuk membuat akun
                            direktori portofolio.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100 mb-2"
                                for="photo">
                                Foto Profil
                            </label>
                            <div class="flex items-center space-x-4">
                                <div class="shrink-0">
                                    <div
                                        class="h-16 w-16 object-cover rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-200">
                                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <label class="block w-full">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" name="photo" id="photo" accept="image/*"
                                        class="block w-full text-sm text-slate-500 dark:text-gray-100
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-indigo-50 dark:file:bg-indigo-900 file:text-indigo-700 dark:file:text-indigo-200
                                        hover:file:bg-indigo-100 dark:hover:file:bg-indigo-800
                                        cursor-pointer
                                    " />
                                </label>
                            </div>
                            @error('photo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="name">Nama Lengkap</label>
                            <input id="name"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="text" name="name" :value="old('name')" required autofocus />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="email">Email</label>
                            <input id="email"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="email" name="email" :value="old('email')" required />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="prodi">Program Studi</label>
                            <select id="prodi" name="prodi"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                <option value="D3 Teknik Elektronika">D3 Elektronika</option>
                                <option value="D4 Teknik Elektronika">D4 Teknik Elektronika</option>
                                <option value="D3 Teknik Telekomukasi">D3 Teknik Telekomukasi</option>
                                <option value="D4 Teknik Telekomukasi">D4 Teknik Telekomukasi</option>
                                <option value="D3 Teknik Elektro_industri">D3 Teknik Elektro_industri</option>
                                <option value="D4 Teknik Elektro_industri">D4 Teknik Elektro_industri</option>
                                <option value="D4 Teknologi Rekayasa Internet">D4 Teknologi Rekayasa Internet</option>
                            </select>
                            @error('prodi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="nrp">NRP</label>
                            <input id="nrp"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="text" name="nrp" :value="old('nrp')" required />
                            @error('nrp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="tahun_masuk">Tahun Masuk</label>
                            <input id="tahun_masuk"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="number" name="tahun_masuk" value="{{ date('Y') }}" required />
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="password">Password</label>
                            <input id="password"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="password" name="password" required autocomplete="new-password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-100"
                                for="password_confirmation">Konfirmasi Password</label>
                            <input id="password_confirmation"
                                class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                type="password" name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-3">
                            <a href="{{ route('admin.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Batal
                            </a>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">
                                Daftar
                            </button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
