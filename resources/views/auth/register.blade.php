<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
            <p class="mt-3 text-center text-sm text-gray-600">
                Bergabunglah dengan kami! Buat akun untuk memulai perjalanan Anda.
            </p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama') }}" class="text-amber-600 font-semibold" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-amber-600 font-semibold" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Kata Sandi') }}" class="text-amber-600 font-semibold" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" class="text-amber-600 font-semibold" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2 text-sm text-gray-700">
                                {!! __('Saya setuju dengan :terms_of_service dan :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-amber-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">'.__('Ketentuan Layanan').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-amber-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">'.__('Kebijakan Privasi').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-amber-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
