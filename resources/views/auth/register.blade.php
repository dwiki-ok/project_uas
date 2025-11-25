<x-guest-layout>
    <div class="space-y-6">
        <div class="space-y-1">
            <h2 class="text-2xl font-semibold text-slate-900">Daftar Akun Mahasiswa</h2>
            <p class="text-sm text-slate-500">
                Lengkapi data berikut untuk membuat akun direktori portofolio.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-full"
                    type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full"
                    type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Program Studi -->
            <div>
                <x-input-label for="prodi" :value="__('Program Studi')" />
                <select id="prodi" name="prodi"
                    class="block mt-1 w-full rounded-md border-gray-300 bg-white text-sm
                           focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="D3 Teknik Elektronika" {{ old('prodi') == 'D3 Teknik Elektronika' ? 'selected' : '' }}>D3 Teknik Elektronika</option>
                    <option value="D4 Teknik Elektronika" {{ old('prodi') == 'D4 Teknik Elektronika' ? 'selected' : '' }}>D4 Teknik Elektronika</option>
                    <option value="D3 Teknik Telekomunikasi" {{ old('prodi') == 'D3 Teknik Telekomunikasi' ? 'selected' : '' }}>D3 Teknik Telekomunikasi</option>
                    <option value="D4 Teknik Telekomunikasi" {{ old('prodi') == 'D4 Teknik Telekomunikasi' ? 'selected' : '' }}>D4 Teknik Telekomunikasi</option>
                    <option value="D3 Teknik Elektro Industri" {{ old('prodi') == 'D3 Teknik Elektro Industri' ? 'selected' : '' }}>D3 Teknik Elektro Industri</option>
                    <option value="D4 Teknik Elektro Industri" {{ old('prodi') == 'D4 Teknik Elektro Industri' ? 'selected' : '' }}>D4 Teknik Elektro Industri</option>
                    <option value="D4 Teknologi Rekayasa Internet" {{ old('prodi') == 'D4 Teknologi Rekayasa Internet' ? 'selected' : '' }}>D4 Teknologi Rekayasa Internet</option>
                </select>
                <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="nrp" :value="__('NRP')" />
                <x-text-input id="nrp" class="block mt-1 w-full"
                  type="text" name="nrp"
                  :value="old('nrp')" required />
                <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
            </div>

            <!-- Tahun Masuk -->
            <div>
                <x-input-label for="tahun_masuk" :value="__('Tahun Masuk')" />
                <x-text-input id="tahun_masuk" class="block mt-1 w-full"
                    type="number" name="tahun_masuk" :value="old('tahun_masuk')"
                    min="2000" max="2100" placeholder="2025" required />
                <x-input-error :messages="$errors->get('tahun_masuk')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Button -->
            <div class="space-y-3">
                <button
                    class="w-full inline-flex justify-center items-center px-4 py-2.5
                           bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold
                           rounded-xl shadow-md shadow-blue-500/30 transition">
                    {{ __('Daftar') }}
                </button>

                <p class="text-xs text-center text-slate-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
