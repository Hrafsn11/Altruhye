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
                <x-label for="photo" value="{{ __('Foto Profil') }}" class="text-amber-600 font-semibold" />

                <!-- Current Profile Photo -->
                <div class="mt-3" x-show="!photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}"
                         alt="{{ $this->user->name }}"
                         class="rounded-full h-24 w-24 object-cover border-4 border-amber-500 shadow-lg transition-all transform hover:scale-105">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-3" x-show="photoPreview">
                    <span class="block rounded-full w-24 h-24 bg-cover bg-no-repeat bg-center border-4 border-amber-300 shadow-lg"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'"
                          class="transition-all transform hover:scale-105">
                    </span>
                </div>

                <!-- File input -->
                <input type="file" class="hidden"
                    wire:model="photo"
                    x-ref="photo"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => { photoPreview = e.target.result; };
                        reader.readAsDataURL($refs.photo.files[0]);
                    " />

                <div class="flex items-center mt-4 space-x-3">
                    <x-secondary-button class="text-amber-600 border-amber-400 hover:bg-amber-100 transition-all ease-in-out"
                                        type="button"
                                        x-on:click.prevent="$refs.photo.click()">
                        {{ __('Pilih Foto Baru') }}
                    </x-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-secondary-button type="button"
                                            class="text-red-600 border-red-400 hover:bg-red-100 transition-all ease-in-out"
                                            wire:click="deleteProfilePhoto">
                            {{ __('Hapus Foto') }}
                        </x-secondary-button>
                    @endif
                </div>
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 mt-6">
            <x-label for="name" value="{{ __('Nama Lengkap') }}" class="text-amber-600 font-semibold" />
            <x-input id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="phone" value="{{ __('Nomor Telepon') }}" class="text-amber-600 font-semibold" />
            <x-input id="phone" type="text" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model.defer="state.phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="email" value="{{ __('Email') }}" class="text-amber-600 font-semibold" />
            <x-input id="email" type="email" class="mt-1 block w-full border-gray-300 rounded-lg shadow-md focus:ring-amber-500 focus:border-amber-500 transition-all"
                     wire:model.defer="state.email" />
            <x-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 text-green-600" on="saved">
            {{ __('Tersimpan.') }}
        </x-action-message>

        <x-button class="bg-amber-500 hover:bg-amber-600 text-white shadow-lg rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-amber-300 transition-all duration-200 ease-in-out"
                  wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-button>
    </x-slot>
</x-form-section>
