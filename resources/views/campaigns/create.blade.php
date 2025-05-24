<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- Header & Intro -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
            <h1 class="text-4xl font-extrabold text-amber-600 mb-2">Galang Bantuan</h1>
            <p class="text-gray-600 text-sm leading-relaxed">
                Buat kampanye bantuan sesuai kebutuhanmu. Isi form di bawah dengan lengkap, dan kami akan meninjau pengajuanmu sesegera mungkin. Kamu bisa menggalang dana, barang, atau sesi curhat untuk mendapatkan dukungan emosional.
            </p>
        </div>

        <!-- Syarat & Ketentuan -->
        <div class="bg-gradient-to-br from-amber-100 to-amber-50 border border-amber-200 rounded-2xl p-5 shadow-sm">
            <h2 class="text-xl font-semibold text-amber-700 mb-3"><i class="fas fa-exclamation-circle mr-2 text-amber-500"></i>
                Syarat & Ketentuan Singkat:</h2>
            <ul class="list-disc list-inside text-sm text-amber-800 space-y-1">
                <li>Penggalang bantuan wajib mengisi data dengan lengkap dan benar.</li>
                <li>Identitas akan diverifikasi sebelum kampanye ditampilkan ke publik.</li>
                <li>Kampanye tidak boleh mengandung unsur SARA, kekerasan, atau penipuan.</li>
                <li>Kampanye yang lolos verifikasi akan tayang maksimal 1x24 jam.</li>
            </ul>
        </div>

        <!-- Form Galang Bantuan -->
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="createCampaignForm">
                @csrf

                <!-- Judul -->
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700"><i class="fa-regular fa-user mr-2"></i> Judul</label>
                    <input type="text" name="title" id="title" placeholder="Contoh: Bantu Biaya Operasi"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 focus:outline-none transition"
                        value="{{ old('title') }}">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700"><i class="fa-regular fa-message mr-2"></i>Deskripsi</label>
                    <textarea name="description" id="description" rows="4" placeholder="Jelaskan detail kebutuhan bantuanmu..."
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 focus:outline-none transition">{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tipe Bantuan -->
                <div>
                    <label for="type" class="block text-sm font-bold text-gray-700"><i class="fas fa-hand-holding-heart  mr-1"></i> Tipe Bantuan</label>
                    <select name="type" id="type"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 focus:outline-none transition"
                        onchange="toggleFields(this.value)">
                        <option value="">Pilih</option>
                        <option value="financial">Finansial</option>
                        <option value="goods">Barang</option>
                        <option value="emotional">Dukungan Emosional</option>
                    </select>
                    @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Field Dinamis -->
                <div id="financial" class="target-field hidden">
                    <label for="formatted_target_amount" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-coins mr-2"></i>Target Dana (Rp)</label>
                    <input type="text" id="formatted_target_amount" placeholder="Contoh: 1.000.000"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    <input type="hidden" name="target_amount" id="target_amount" value="{{ old('target_amount') }}">
                    @error('target_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div id="goods" class="target-field hidden">
                    <label for="target_items" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-box-open mr-2"></i>Target Barang (jumlah)</label>
                    <input type="number" name="target_items" id="target_items"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    @error('target_items') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div id="emotional" class="target-field hidden">
                    <label for="target_sessions" class="block text-sm font-bold text-gray-700"><i class="fas fa-hand-holding-heart mr-2"></i>Target Sesi Curhat</label>
                    <input type="number" name="target_sessions" id="target_sessions"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    @error('target_sessions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-images mr-2"></i>Gambar</label>
                    <input type="file" name="gambar" id="gambar"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition"
                        onchange="previewImage()" required>
                        <img id="imagePreview" class="mt-4 hidden w-32 h-32 object-cover rounded-xl shadow-md border border-gray-300" alt="Image Preview">
                        @error('gambar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tombol -->
                <button type="button"
                    onclick="openModal()"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white px-4 py-3 rounded-lg font-semibold tracking-wide transition shadow-md hover:shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i> Ajukan Bantuan

                </button>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-xl shadow-xl max-w-md w-full animate-fade-in">
            <h2 class="text-xl font-bold text-gray-700 mb-3">Konfirmasi Pengajuan</h2>
            <p class="text-sm text-gray-600 mb-5">Apakah Anda yakin ingin mengajukan bantuan ini?</p>
            <div class="flex justify-end gap-3">
                <button onclick="closeModal()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Batal</button>
                <button onclick="submitForm()" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600">Ajukan</button>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        function toggleFields(value) {
            document.querySelectorAll('.target-field').forEach(el => el.classList.add('hidden'));
            if (value) {
                document.getElementById(value).classList.remove('hidden');
            }
        }

        function previewImage() {
            const file = document.getElementById('gambar').files[0];
            const reader = new FileReader();
            reader.onloadend = function () {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.classList.remove('hidden');
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function openModal() {
            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            const type = document.getElementById('type').value;
            const targetAmount = document.getElementById('target_amount').value.trim();
            const targetItems = document.getElementById('target_items').value.trim();
            const targetSessions = document.getElementById('target_sessions').value.trim();
            const image = document.getElementById('gambar').files[0];

            let isValid = title && description && type && image;
            if (type === 'financial') isValid = isValid && targetAmount;
            if (type === 'goods') isValid = isValid && targetItems;
            if (type === 'emotional') isValid = isValid && targetSessions;

            if (!isValid) {
                toastr.error("Mohon lengkapi semua field yang dibutuhkan.", "Form Tidak Lengkap", {
                    timeOut: 4000,
                    positionClass: 'toast-top-center',
                    closeButton: true,
                    progressBar: true
                });
                return;
            }

            document.getElementById('confirmationModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('createCampaignForm').submit();
        }
    </script>
</x-app-layout>
