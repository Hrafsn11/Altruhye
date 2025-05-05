<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-semibold mb-6 text-gray-900">Riwayat Donasi</h1>

        <div class="bg-white rounded-xl shadow-xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-amber-500 to-amber-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium">Campaign</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Jumlah Donasi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($donations as $donation)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <img src="{{ asset('storage/' . $donation->campaign->gambar) }}"
                                     alt="{{ $donation->campaign->title }}" class="w-12 h-12 rounded-full object-cover">
                                <span class="font-medium text-gray-900">{{ $donation->campaign->title }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $donation->campaign->type }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                @if ($donation->campaign->type === 'financial')
                                    Rp{{ number_format($donation->amount, 0, ',', '.') }}
                                @elseif ($donation->campaign->type === 'goods')
                                    {{ $donation->item_quantity }} Barang
                                @elseif ($donation->campaign->type === 'emotional')
                                    {{ $donation->item_quantity }} Sesi
                                @endif
                                <div class="text-xs mt-1">
                                    @if ($donation->payment_verified === 'approved')
                                        <span class="text-green-600">✓ Telah Terkirim</span>
                                    @elseif ($donation->payment_verified === 'pending')
                                        <span class="text-yellow-600">⏳ Sedang Diproses</span>
                                    @elseif ($donation->payment_verified === 'rejected')
                                        <span class="text-red-600">✖ Gagal</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($donation->payment_verified === 'approved')
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Approved
                                    </span>
                                @elseif ($donation->payment_verified === 'pending')
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @elseif ($donation->payment_verified === 'rejected')
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Rejected
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $donation->created_at->format('d F Y H:i:s') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada riwayat donasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginasi --}}
        <div class="mt-6">
            {{ $donations->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
