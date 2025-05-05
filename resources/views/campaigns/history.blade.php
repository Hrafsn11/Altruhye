<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-semibold mb-6 text-gray-900">Riwayat Kampanye</h1>

        <div class="bg-white rounded-xl shadow-xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-amber-500 to-amber-600 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium">Judul Kampanye</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Target</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Progress</th>
                        <th class="px-6 py-4 text-left text-xs font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($campaigns as $campaign)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <img src="{{ asset('storage/' . $campaign->gambar) }}" alt="{{ $campaign->title }}"
                                    class="w-12 h-12 rounded-full object-cover">
                                <span class="font-medium text-gray-900">{{ $campaign->title }}</span>
                            </td>

                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $campaign->type }}</td>

                            <td class="px-6 py-4 text-gray-700">
                                @if ($campaign->type === 'financial')
                                    Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}
                                @elseif ($campaign->type === 'goods')
                                    {{ $campaign->target_quantity }} Barang
                                @elseif ($campaign->type === 'emotional')
                                    {{ $campaign->target_sessions }} Sesi
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @if ($campaign->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif ($campaign->status === 'active') bg-green-100 text-green-800
                                    @elseif ($campaign->status === 'rejected') bg-red-100 text-red-800 @endif">
                                    @if ($campaign->status === 'pending')
                                        Menunggu Persetujuan
                                    @elseif ($campaign->status === 'active')
                                        Disetujui
                                    @elseif ($campaign->status === 'rejected')
                                        Ditolak
                                    @endif
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-700 w-48">
                                @php $progress = $campaign->progressPercent(); @endphp
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-600">{{ $campaign->displayCollected() }}</span>
                                    <span class="text-gray-900 font-medium">{{ number_format($progress) }}%</span>
                                </div>
                                <div class="overflow-hidden h-2 bg-gray-200 rounded-full">
                                    <div class="h-full bg-amber-500 rounded-full transition-all duration-300 ease-in-out"
                                        style="width: {{ $progress }}%">
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-gray-700 relative">
                                <div x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                        class="p-2 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false"
                                        class="absolute top-0 right-full ml-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-100">

                                        @if ($campaign->type === 'emotional')
                                            <a href="{{ route('campaigns.messages', $campaign->id) }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                💬 Lihat Pesan
                                            </a>
                                        @endif

                                        <a href="{{ route('campaigns.show', $campaign->id) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                            📄 Lihat Kampanye
                                        </a>

                                        <a href="{{ route('campaigns.edit', $campaign->id) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                            ✏️ Edit
                                        </a>

                                        <form method="POST" action="{{ route('campaigns.destroy', $campaign->id) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus kampanye ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada kampanye yang
                                dibuat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $campaigns->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
