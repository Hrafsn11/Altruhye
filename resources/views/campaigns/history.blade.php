<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="bg-white rounded-xl shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Riwayat Galang Bantuan</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead class="text-gray-500 text-sm uppercase">
                        <tr>
                            <th class="py-3">Judul</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3">Progress</th>
                            <th class="py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($campaigns as $campaign)
                            @php
                                $progress = $campaign->progressPercent();
                            @endphp
                            <tr class="bg-gray-50 rounded-md shadow-sm">
                                <td class="py-4 flex items-center gap-3 font-medium text-gray-900">
                                    <img src="{{ asset('storage/' . $campaign->gambar) }}" alt="Campaign Image"
                                        class="w-8 h-8 rounded-md object-cover">
                                    <div class="flex flex-col">
                                        <span>{{ $campaign->title }}</span>
                                        @if ($campaign->status === 'pending')
                                            <span
                                                class="mt-1 text-xs w-fit px-2 py-0.5 bg-yellow-100 text-yellow-800 rounded-full">
                                                Menunggu Persetujuan
                                            </span>
                                        @elseif ($campaign->status === 'approved')
                                            <span
                                                class="mt-1 text-xs w-fit px-2 py-0.5 bg-green-100 text-green-800 rounded-full">
                                                Disetujui
                                            </span>
                                        @elseif ($campaign->status === 'rejected')
                                            <span
                                                class="mt-1 text-xs w-fit px-2 py-0.5 bg-red-100 text-red-800 rounded-full">
                                                Ditolak
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="py-4 px-4 capitalize text-gray-700">{{ $campaign->type }}</td>
                                <td class="py-4 px-4 text-gray-600">{{ $campaign->created_at->format('d M Y') }}</td>
                                <td class="py-4 px-4 w-64">
                                    <div class="relative w-full bg-gray-200 h-3 rounded-full overflow-hidden">
                                        <div class="bg-indigo-500 h-3 rounded-full transition-all duration-500"
                                            style="width: {{ $progress }}%"></div>
                                        @if ($progress >= 100)
                                            <span
                                                class="absolute top-0 right-0 -mt-7 text-xs font-medium bg-green-500 text-white px-2 py-0.5 rounded-full shadow">
                                                🎉 Target Tercapai
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">{{ $progress }}%</div>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        @if ($campaign->type === 'emotional')
                                            <a href="{{ route('campaigns.messages', $campaign->id) }}"
                                                class="px-3 h-8 flex items-center text-xs font-medium bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                                Pesan
                                            </a>
                                        @endif
                                        <a href="{{ route('campaigns.show', $campaign->id) }}"
                                            class="px-3 h-8 flex items-center text-xs font-medium bg-amber-500 text-white rounded-md hover:bg-amber-600 transition">
                                            Lihat
                                        </a>
                                        <a href="{{ route('campaigns.edit', $campaign->id) }}"
                                            class="px-3 h-8 flex items-center text-xs font-medium bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus kampanye ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 h-8 flex items-center text-xs font-medium bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500 italic">Belum ada campaign yang
                                    dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            


            <!-- Pagination -->
            <div class="mt-8">
                {{ $campaigns->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
