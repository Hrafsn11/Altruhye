<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Identitas') }}
        </h2>
    </x-slot>


    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Verifikasi KTP') }}</h2>
       


            @if ($verification) <!-- Jika data verifikasi ada -->
                @if ($verification->status == 'pending') <!-- Status Pending -->
                    <div class="text-yellow-600">
                        <h3>{{ __('Status Verifikasi:') }}</h3>
                        <p>{{ __('Verifikasi Anda sedang diproses, harap tunggu.') }}</p>
                    </div>
                @elseif ($verification->status == 'approved') <!-- Status Approved -->
                    <div class="text-green-600">
                        <h3>{{ __('Status Verifikasi:') }}</h3>
                        <p>{{ __('Verifikasi Anda diterima.') }}</p>
                    </div>
                @elseif ($verification->status == 'rejected') <!-- Status Rejected -->
                    <div class="text-red-600">
                        <h3>{{ __('Status Verifikasi:') }}</h3>
                        <p>{{ __('Verifikasi Anda ditolak. Silakan periksa kembali data yang Anda unggah.') }}</p>
                    </div>
                @endif
            @else
                <!-- Form Verifikasi jika belum ada verifikasi -->
                <form action="{{ route('verification.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="space-y-4">
                        <!-- Foto KTP -->
                        <div class="col-span-6 sm:col-span-4">
                            <label for="photo" class="block text-sm font-medium text-gray-700">{{ __('Foto KTP') }}</label>
                            <input type="file" id="photo" name="photo" class="hidden" required />


                            <!-- Preview Foto -->
                            <div class="mt-2" id="photoPreviewContainer" style="display:none;">
                                <span id="photoPreview" class="block rounded-lg w-48 h-32 bg-cover bg-no-repeat bg-center border"></span>
                            </div>


                            <button type="button" class="mt-2 mr-2 px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600" onclick="document.getElementById('photo').click()">
                                {{ __('Pilih Foto KTP') }}
                            </button>


                            @error('photo')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Nomor KTP -->
                        <div class="col-span-6 sm:col-span-4">
                            <label for="no_ktp" class="block text-sm font-medium text-gray-700">{{ __('Nomor KTP') }}</label>
                            <input id="no_ktp" type="text" name="no_ktp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required />
                            @error('no_ktp')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Tombol Submit -->
                        <div class="mt-4 text-right">
                            <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>


    <!-- Script Preview Foto -->
    <script>
        document.getElementById('photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photoPreview').style.backgroundImage = `url('${e.target.result}')`;
                    document.getElementById('photoPreviewContainer').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>



