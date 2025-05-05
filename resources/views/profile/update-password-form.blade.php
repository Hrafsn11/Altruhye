<x-form-section submit="updatePassword">
    <x-slot name="title">
        <h2 class="text-2xl font-semibold text-gray-800">{{ __('Perbarui Password') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="text-sm text-gray-600">{{ __('Pastikan akun Anda menggunakan password yang panjang dan acak untuk menjaga keamanan.') }}</p>
    </x-slot>

    <x-slot name="form">
        <!-- Current Password -->
        <div class="col-span-6 sm:col-span-4 mt-6">
            <x-label for="current_password" value="{{ __('Password Saat Ini') }}" class="text-amber-600 font-semibold" />
            <x-input id="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="password" value="{{ __('Password Baru') }}" class="text-amber-600 font-semibold" />
            <x-input id="password" type="password" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" class="text-amber-600 font-semibold" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 text-green-600" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <x-button class="bg-amber-500 hover:bg-amber-600 text-white shadow-lg rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-amber-300 transition-all duration-200 ease-in-out">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>
