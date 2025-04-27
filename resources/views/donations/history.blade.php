<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6 text-gray-900">Riwayat Donasi</h1>

        <div class="bg-white rounded-xl shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Campaign</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Donasi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Donasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($donations as $donation)
                        <tr>
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
                            </td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $donation->created_at->format('d F Y H:i:s') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada riwayat donasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
