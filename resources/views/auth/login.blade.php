<x-guest-layout>
    <div class="space-y-6">
        <div class="space-y-1">
            <h2 class="text-2xl font-semibold text-slate-900">Masuk ke Akun</h2>
            <p class="text-sm text-slate-500">
                Gunakan email kampus untuk mengakses direktori portofolio.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" />
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-xs text-blue-600 hover:text-blue-700">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <x-text-input id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember me -->
            <div class="flex items-center gap-2">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                <label for="remember_me" class="text-xs text-slate-600">
                    {{ __('Ingat saya') }}
                </label>
            </div>

            <!-- Button -->
            <div class="space-y-3">
                <button
                    class="w-full inline-flex justify-center items-center px-4 py-2.5
                           bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold
                           rounded-xl shadow-md shadow-blue-500/30 transition">
                    {{ __('Masuk') }}
                </button>

                <p class="text-xs text-center text-slate-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
