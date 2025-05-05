<x-action-section>
    <x-slot name="title">
        <h2 class="text-2xl font-semibold text-amber-600">{{ __('Autentikasi Dua Faktor') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="text-sm text-gray-600">{{ __('Tambahkan lapisan keamanan tambahan pada akun Anda dengan menggunakan autentikasi dua faktor.') }}</p>
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Selesaikan proses aktivasi autentikasi dua faktor.') }}
                @else
                    {{ __('Autentikasi dua faktor telah diaktifkan.') }}
                @endif
            @else
                {{ __('Autentikasi dua faktor belum diaktifkan.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Saat autentikasi dua faktor diaktifkan, Anda akan diminta untuk memasukkan kode token acak selama proses autentikasi. Anda dapat mengambil kode ini dari aplikasi Google Authenticator di ponsel Anda.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Untuk menyelesaikan aktivasi autentikasi dua faktor, pindai kode QR berikut menggunakan aplikasi autentikator di ponsel Anda atau masukkan kunci setup dan masukkan kode OTP yang dihasilkan.') }}
                        @else
                            {{ __('Autentikasi dua faktor kini telah diaktifkan. Pindai kode QR berikut menggunakan aplikasi autentikator di ponsel Anda atau masukkan kunci setup.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white rounded-lg shadow-md">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Kunci Setup') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('Kode') }}" />
                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2 border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500"
                                 inputmode="numeric" autofocus autocomplete="one-time-code"
                                 wire:model="code"
                                 wire:keydown.enter="confirmTwoFactorAuthentication" />
                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Simpan kode pemulihan ini di pengelola kata sandi yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat autentikasi dua faktor hilang.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled" class="bg-amber-500 hover:bg-amber-600 text-white shadow-lg px-6 py-2 rounded-md">
                        {{ __('Aktifkan') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="me-3 text-amber-500 hover:text-amber-600">
                            {{ __('Regenerasi Kode Pemulihan') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="me-3 bg-amber-500 hover:bg-amber-600 text-white shadow-lg px-6 py-2 rounded-md" wire:loading.attr="disabled">
                            {{ __('Konfirmasi') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="me-3 text-amber-500 hover:text-amber-600">
                            {{ __('Tampilkan Kode Pemulihan') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled" class="text-gray-600 hover:text-gray-700">
                            {{ __('Batal') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled" class="bg-red-600 hover:bg-red-700 text-white shadow-lg px-6 py-2 rounded-md">
                            {{ __('Nonaktifkan') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif
            @endif
        </div>
    </x-slot>
</x-action-section>
