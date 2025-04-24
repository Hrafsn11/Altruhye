<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mt-5 p-6 bg-white rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Riwayat Donasi</h2>

                {{-- ==== Filter kategori (kanan atas) ==== --}}
                <form method="get" class="flex items-center gap-3">
                    @php
                        $currentCategory = request('category', 'all');
                        $categories = [
                            'all' => 'Semua Kategori',
                            'financial' => 'Financial',
                            'barang' => 'Barang',
                            'emosional' => 'Emosional',
                        ];
                    @endphp

                    <label for="category" class="text-sm font-medium text-gray-700">Filter:</label>
                    <div class="relative">
                        <select id="category" name="category"
                            class="block appearance-none w-48 pl-4 pr-10 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}" {{ $currentCategory === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left overflow-x-auto table-auto">
                    <thead class="text-gray-500 text-sm border-b">
                        <tr>
                            <th class="py-3 min-w-[250px]">Judul Campaign</th>
                            <th class="py-3 min-w-[150px]">Kategori Donasi</th>
                            <th class="py-3 min-w-[150px]">Jumlah Donasi</th>
                            <th class="py-3 min-w-[150px]">Tanggal Donasi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        
                        @forelse ($donations as $donation)
                            @php
                                $progress = 0;
                                if (
                                    $donation->campaign->type === 'financial' &&
                                    $donation->campaign->target_amount > 0
                                ) {
                                    $progress = min(
                                        100,
                                        round(
                                            ($donation->campaign->current_amount / $donation->campaign->target_amount) *
                                                100,
                                        ),
                                    );
                                } elseif (
                                    $donation->campaign->type === 'barang' &&
                                    $donation->campaign->target_goods > 0
                                ) {
                                    $progress = min(
                                        100,
                                        round(
                                            ($donation->campaign->current_goods / $donation->campaign->target_goods) *
                                                100,
                                        ),
                                    );
                                } elseif (
                                    $donation->campaign->type === 'dukungan emosional' &&
                                    $donation->campaign->target_sessions > 0
                                ) {
                                    $progress = min(
                                        100,
                                        round(
                                            ($donation->campaign->current_sessions /
                                                $donation->campaign->target_sessions) *
                                                100,
                                        ),
                                    );
                                }
                            @endphp
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-4 flex items-center gap-3 font-medium text-gray-900 min-w-[250px]">
                                    <img src="{{ $donation->campaign->gambar ? asset('storage/' . $donation->campaign->gambar) : asset('images/default_campaign.png') }}"
                                        class="w-8 h-8 rounded-md object-cover" alt="Campaign Image">
                                    {{ $donation->campaign->title }}
                                </td>
                                <td class="py-4 capitalize min-w-[150px]">{{ $donation->campaign->type }}</td>
                                <td class="py-4 min-w-[150px]">Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                </td>
                                <td class="py-4 min-w-[150px]">{{ $donation->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">Belum ada donasi yang
                                    dilakukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                @if (
                    $donations instanceof \Illuminate\Pagination\LengthAwarePaginator ||
                        $donations instanceof \Illuminate\Pagination\Paginator)
                    {{ $donations->links('vendor.pagination.tailwind') }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
