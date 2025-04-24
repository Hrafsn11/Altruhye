<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mt-5 p-6 bg-white rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Riwayat Galang Bantuan</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="text-gray-500 text-sm border-b">
                        <tr>
                            <th class="py-3">Judul</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Tanggal Dibuat</th>
                            <th class="py-3">Progress</th>
                            <th class="py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($campaigns as $campaign)
                            @php
                                $progress = 0;
                                if ($campaign->type === 'financial' && $campaign->target_amount > 0) {
                                    $progress = min(
                                        100,
                                        round(($campaign->current_amount / $campaign->target_amount) * 100),
                                    );
                                } elseif ($campaign->type === 'barang' && $campaign->target_goods > 0) {
                                    $progress = min(
                                        100,
                                        round(($campaign->current_goods / $campaign->target_goods) * 100),
                                    );
                                } elseif ($campaign->type === 'dukungan emosional' && $campaign->target_sessions > 0) {
                                    $progress = min(
                                        100,
                                        round(($campaign->current_sessions / $campaign->target_sessions) * 100),
                                    );
                                }
                            @endphp
                          <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-4 flex items-center gap-3 font-medium text-gray-900">
                                <img src="{{ asset('storage/' . $campaign->gambar) }}" alt="Campaign Image"
                                    class="w-8 h-8 rounded-md object-cover">
                                {{ $campaign->title }}
                            </td>
                            <td class="py-4 capitalize">{{ $campaign->type }}</td>
                            <td class="py-4">{{ $campaign->created_at->format('d M Y') }}</td>
                            <td class="py-4 w-1/3">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-600 h-2 rounded-full transition-all duration-300 ease-in-out"
                                        style="width: {{ $progress }}%;"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1 block">{{ $progress }}%</span>
                            </td>
                           
                            <td class="py-4 text-right flex gap-3 justify-end">
                                <a href="{{ route('campaigns.show', $campaign->id) }}"
                                    class="text-sm px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600 transition">
                                    Lihat
                                </a>
                                <a href="{{ route('campaigns.edit', $campaign->id) }}"
                                    class="text-sm px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                    Edit
                                </a>
                        
                                <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus kampanye ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-gray-500">Belum ada campaign yang
                                    dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $campaigns->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>


</x-app-layout>
