<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6 bg-white rounded-2xl shadow-xl">
        <h1 class="text-3xl font-bold mb-8 text-center text-amber-600">Donasi untuk: <span
                class="text-gray-800">{{ $campaign->title }}</span></h1>

        <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
            <input type="hidden" name="type" value="{{ $campaign->type }}">

            {{-- Nama Donatur --}}
            <div>
                <label class="block text-gray-700 font-medium mb-2"><i class="fas fa-user mr-1"></i> Nama
                    Donatur</label>
                <input type="text" id="donor_name" name="donor_name"
                    value="{{ auth()->check() ? auth()->user()->name : old('donor_name', 'Anonim') }}"
                    class="w-full border border-gray-300 bg-white text-gray-900 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400"
                    {{ auth()->check() ? 'readonly' : '' }}>
                @error('donor_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Checkbox Sembunyikan Nama --}}
                @if (auth()->check())
                    <div class="mt-2 flex items-center">
                        <div class="mx-2">
                            <input type="checkbox" id="hide_name" name="hide_name"
                                class="mr-2 rounded-full text-amber-500 focus:ring-2 focus:ring-amber-400"
                                {{ old('hide_name') ? 'checked' : '' }}>
                            <label for="hide_name" class="text-sm text-gray-600">Sembunyikan Nama (Donasi
                                Anonim)</label>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Input Berdasarkan Tipe Bantuan --}}
            @if ($campaign->type === 'financial')
                <div>
                    <label class="block text-gray-700 font-medium mb-2"> <i class="fas fa-coins mr-1"></i> Jumlah Donasi
                        (Rp)</label>
                    <input type="text" id="formatted_amount"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400"
                        placeholder="Contoh: 1.000.000" value="{{ old('amount') }}">
                    <input type="hidden" name="amount" id="amount" value="{{ old('amount') }}">
                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @elseif ($campaign->type === 'goods')
                <div>
                    <label class="block text-gray-700 font-medium mb-2"><i class="fas fa-box mr-1"></i> Deskripsi
                        Barang</label>
                    <textarea name="item_description" rows="3" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">{{ old('item_description') }}</textarea>
                    @error('item_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2"> <i class="fas fa-sort-numeric-up mr-1"></i>
                        Jumlah Barang</label>
                    <input type="number" name="item_quantity" value="{{ old('item_quantity') }}" min="1"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">
                    @error('item_quantity')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @elseif ($campaign->type === 'emotional')
                <div>
                    <label class="block text-gray-700 font-medium mb-2"><i class="fas fa-comments mr-1"></i> Pesan
                        Pertama</label>
                    <textarea name="initial_message" rows="3" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">{{ old('initial_message') }}</textarea>
                </div>
            @endif
            {{-- Bukti Pembayaran --}}
            @if ($campaign->type !== 'emotional')
                {{-- Bukti Pembayaran --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2"><i class="fa-regular fa-image"></i> Bukti
                        Pembayaran</label>
                    <input type="file" name="payment_proof" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    @error('payment_proof')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif
            {{-- Tombol Submit --}}
            <div>
                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out">

                    <i class="fas fa-paper-plane mr-2"></i> Kirim Donasi
                </button>
            </div>
        </form>
    </div>


</x-app-layout>
