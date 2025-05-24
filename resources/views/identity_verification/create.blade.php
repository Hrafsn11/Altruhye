<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-white shadow-2xl rounded-xl p-8 space-y-6">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Ajukan Verifikasi Identitas</h2>

            <form action="{{ route('identity_verifications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <input type="text" name="full_name" placeholder="Nama Lengkap" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Email -->
                    <div>
                        <input type="email" name="email" placeholder="Email" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Nomor HP -->
                    <div>
                        <input type="text" name="phone_number" placeholder="Nomor HP" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Nomor Rekening -->
                    <div>
                        <input type="text" name="bank_account_number" placeholder="Nomor Rekening" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Nomor KTP -->
                    <div>
                        <input type="text" name="ktp_number" placeholder="Nomor KTP" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Foto -->
                    <div>
                        <input type="file" name="photo" required class="form-input w-full p-4 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none transition-all duration-300 shadow-sm hover:shadow-lg" />
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="w-full py-4 rounded-lg bg-amber-600 text-white font-semibold text-lg transition-all duration-300 hover:bg-amber-700 focus:outline-none shadow-lg hover:shadow-2xl">
                            Ajukan Verifikasi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
