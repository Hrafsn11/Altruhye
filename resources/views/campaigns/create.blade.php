<x-app-layout>
   
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Header & Intro -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Galang Bantuan</h1>
            <p class="text-gray-600 text-sm">
                Buat kampanye bantuan sesuai kebutuhanmu. Isi form di bawah dengan lengkap, dan kami akan meninjau pengajuanmu sesegera mungkin. Kamu bisa menggalang dana, barang, atau sesi curhat untuk mendapatkan dukungan emosional.
            </p>
        </div>

        <!-- Syarat & Ketentuan -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h2 class="text-xl font-semibold text-blue-800 mb-2">Syarat & Ketentuan Singkat:</h2>
            <ul class="list-disc list-inside text-sm text-blue-700 space-y-1">
                <li>Penggalang bantuan wajib mengisi data dengan lengkap dan benar.</li>
                <li>Identitas akan diverifikasi sebelum kampanye ditampilkan ke publik.</li>
                <li>Kampanye tidak boleh mengandung unsur SARA, kekerasan, atau penipuan.</li>
                <li>Kampanye yang lolos verifikasi akan tayang maksimal 1x24 jam.</li>
            </ul>
        </div>

    
            <!-- Form Galang Bantuan -->
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="createCampaignForm">
                    @csrf
    
                    <!-- Judul -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700">Judul</label>
                        <input type="text" name="title" id="title" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('title') }}">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <!-- Tipe Bantuan -->
                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-700">Tipe Bantuan</label>
                        <select name="type" id="type" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="toggleFields(this.value)">
                            <option value="">Pilih</option>
                            <option value="financial">Finansial</option>
                            <option value="goods">Barang</option>
                            <option value="emotional">Dukungan Emosional</option>
                        </select>
                        @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <!-- Target Field -->
                    <div id="financial" class="target-field hidden">
                        <label for="target_amount" class="block text-sm font-semibold text-gray-700">Target Dana (Rp)</label>
                        <input type="number" name="target_amount" id="target_amount" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('target_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <div id="goods" class="target-field hidden">
                        <label for="target_items" class="block text-sm font-semibold text-gray-700">Target Barang (jumlah)</label>
                        <input type="number" name="target_items" id="target_items" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('target_items') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <div id="emotional" class="target-field hidden">
                        <label for="target_sessions" class="block text-sm font-semibold text-gray-700">Target Sesi Curhat</label>
                        <input type="number" name="target_sessions" id="target_sessions" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('target_sessions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-gray-700">Gambar (opsional)</label>
                        <input type="file" name="gambar" id="gambar" class="w-full border p-3 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="previewImage()">
                        <img id="imagePreview" class="mt-4 hidden w-32 h-32 object-cover rounded-md" alt="Image Preview">
                        @error('gambar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
    
                    <!-- Tombol Ajukan -->
                    <button type="button" onclick="openModal()" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Ajukan Bantuan</button>
                </form>
            </div>
        </div>
    

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Konfirmasi Pengajuan</h2>
            <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin mengajukan bantuan ini?</p>
            <div class="flex justify-end space-x-4">
                <button onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Batal</button>
                <button onclick="submitForm()" class="bg-blue-600 text-white px-4 py-2 rounded-md">Ajukan</button>
            </div>
        </div>
    </div>

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
        reader.onloadend = function() {
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

            let isValid = title !== '' && description !== '' && type !== '';
            if (type === 'financial') isValid = isValid && targetAmount !== '';
            if (type === 'goods') isValid = isValid && targetItems !== '';
            if (type === 'emotional') isValid = isValid && targetSessions !== '';

            if (!isValid) {
                toastr.error("Mohon lengkapi semua field yang dibutuhkan sebelum mengajukan bantuan.", "Form Tidak Lengkap", {
                    timeOut: 4000,
                    positionClass: 'toast-top-center',
                    closeButton: true,
                    progressBar: true
                });
                return;
            }

            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('confirmationModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('confirmationModal').classList.remove('flex');
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        function submitForm() {
            document.getElementById('createCampaignForm').submit();
        }

        document.addEventListener("DOMContentLoaded", function () {
            const successMessage = document.getElementById('toastSuccess');
            if (successMessage) {
                const message = successMessage.getAttribute('data-message');
                toastr.success(message, 'Berhasil!', {
                    timeOut: 5000,
                    positionClass: 'toast-top-center',
                    closeButton: true,
                    progressBar: true
                });
            }
        });
    </script>
</x-app-layout>
