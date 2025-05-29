<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <h2 class="text-2xl font-semibold text-gray-800">{{ __('Informasi Profil') }}</h2>
    </x-slot>

    <x-slot name="description">
        <p class="text-sm text-gray-600">{{ __('Perbarui informasi profil dan email akun Anda dengan mudah.') }}</p>
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Foto Profil') }}" class="text-amber-600 font-semibold" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover border border-gray-300">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center border border-gray-300"
                          x-bind:style="'background-image: url(\\'' + photoPreview + '\\\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Pilih Foto Baru') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Hapus Foto') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nama Lengkap') }}" class="text-amber-600 font-semibold" />
            <x-input id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="phone" value="{{ __('Nomor Telepon') }}" class="text-amber-600 font-semibold" />
            <x-input id="phone" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" wire:model.defer="state.phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="email" value="{{ __('Email') }}" class="text-amber-600 font-semibold" />
            <x-input id="email" type="email" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm transition-all" wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Alamat email Anda belum diverifikasi.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 text-green-600" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>
