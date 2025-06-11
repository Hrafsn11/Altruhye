<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
            <p class="mt-3 text-center text-sm text-gray-600">
                Selamat datang kembali! Silakan masuk untuk melanjutkan.
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-amber-600 font-semibold" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Kata Sandi') }}" class="text-amber-600 font-semibold" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-700">{{ __('Ingat Saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-amber-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" href="{{ route('password.request') }}">
                        {{ __('Lupa Kata Sandi Anda?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Masuk') }}
                </x-button>
            </div>

            <div class="flex items-center justify-end mt-6">
                <p class="text-sm text-gray-700">
                    {{ __("Belum punya akun?") }}
                    <a class="underline font-semibold text-amber-600 hover:text-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" href="{{ route('register') }}">
                        {{ __('Daftar di sini') }}
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
