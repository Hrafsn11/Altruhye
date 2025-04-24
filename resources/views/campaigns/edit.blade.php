<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- Header -->
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">
            <h1 class="text-4xl font-extrabold text-amber-600 mb-2">Edit Bantuan</h1>
            <p class="text-gray-600 text-sm">Perbarui informasi kampanye bantuanmu di sini.</p>
        </div>

        <!-- Form Edit -->
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700"><i class="fa-regular fa-user mr-2"></i> Judul</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $campaign->title) }}"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 focus:outline-none transition">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700"><i class="fa-regular fa-message mr-2"></i>Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">{{ old('description', $campaign->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tipe Bantuan -->
                <div>
                    <label for="type" class="block text-sm font-bold text-gray-700"><i class="fas fa-hand-holding-heart  mr-1"></i> Tipe Bantuan</label>
                    <select name="type" id="type"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition"
                        onchange="toggleFields(this.value)">
                        <option value="">Pilih</option>
                        <option value="financial" @selected($campaign->type === 'financial')>Finansial</option>
                        <option value="goods" @selected($campaign->type === 'goods')>Barang</option>
                        <option value="emotional" @selected($campaign->type === 'emotional')>Dukungan Emosional</option>
                    </select>
                    @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Field Dinamis -->
                <div id="financial" class="target-field {{ $campaign->type === 'financial' ? '' : 'hidden' }}">
                    <label for="target_amount" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-coins mr-2"></i>Target Dana (Rp)</label>
                    <input type="text" id="formatted_amount"
                        value="{{ old('target_amount', $campaign->target_amount ? 'Rp ' . number_format($campaign->target_amount, 0, ',', '.') : '') }}"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    <input type="hidden" name="target_amount" id="amount"
                        value="{{ old('target_amount', $campaign->target_amount) }}">
                    @error('target_amount')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div id="goods" class="target-field {{ $campaign->type === 'goods' ? '' : 'hidden' }}">
                    <label for="target_items" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-box-open mr-2"></i>Target Barang (jumlah)</label>
                    <input type="number" name="target_items" id="target_items"
                        value="{{ old('target_items', $campaign->target_items) }}"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    @error('target_items')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div id="emotional" class="target-field {{ $campaign->type === 'emotional' ? '' : 'hidden' }}">
                    <label for="target_sessions" class="block text-sm font-bold text-gray-700"><i class="fas fa-hand-holding-heart mr-2"></i>Target Sesi Curhat</label>
                    <input type="number" name="target_sessions" id="target_sessions"
                        value="{{ old('target_sessions', $campaign->target_sessions) }}"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    @error('target_sessions')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-bold text-gray-700"><i class="fa-solid fa-images mr-2"></i>Gambar Baru</label>
                    <input type="file" name="gambar" id="gambar"
                        class="mt-1 w-full border p-3 rounded-lg shadow-sm focus:ring-2 focus:ring-amber-500 transition">
                    @if ($campaign->gambar)
                        <p class="text-sm text-gray-500 mt-2"><i class="fa-solid fa-images mr-2"></i>Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $campaign->gambar) }}"
                            class="w-32 h-32 object-cover rounded-md mt-2 border border-gray-300">
                    @endif
                    @error('gambar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol -->
                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white px-4 py-3 rounded-lg font-semibold tracking-wide transition shadow-md hover:shadow-lg">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

   

</x-app-layout>
