<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6 bg-white rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Donasi untuk: {{ $campaign->title }}</h1>

        <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
            <input type="hidden" name="type" value="{{ $campaign->type }}">

            {{-- Nama Donatur --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Donatur</label>
                <input type="text" name="donor_name" value="{{ old('donor_name') }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">
                @error('donor_name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Berdasarkan Tipe Bantuan --}}
            @if ($campaign->type === 'financial')
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Jumlah Donasi (Rp)</label>
                    <input type="number" name="amount" value="{{ old('amount') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">
                    @error('amount')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            @elseif ($campaign->type === 'goods')
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi Barang</label>
                    <textarea name="item_description" rows="3" required
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">{{ old('item_description') }}</textarea>
                    @error('item_description')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            @elseif ($campaign->type === 'emotional')
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Jumlah Sesi Dukungan</label>
                    <input type="number" name="session_count" value="{{ old('session_count') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400">
                    @error('session_count')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            {{-- Upload Bukti Pembayaran (opsional saat ini) --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Upload Bukti Pembayaran</label>
                <input type="file" name="payment_proof" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">
                @error('payment_proof')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <button type="submit"
                    class="w-full bg-amber-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-amber-600 transition">
                Kirim Donasi
            </button>
        </form>
    </div>
</x-app-layout>
