<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mt-5 p-6 bg-white rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Verifikasi Donasi</h2>
            </div>

            <!-- Overflow Horizontal untuk tabel -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-left table-auto">
                    <thead class="text-gray-500 text-sm border-b">
                        <tr>
                            <th
                                class="px-6 py-3 min-w-[250px] text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Campaign</th>
                            <th
                                class="px-6 py-3 min-w-[250px] text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Donatur</th>
                            <th class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipe</th>
                            <th class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deskripsi</th>
                            <th class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bukti</th>
                            <th class="px-6 py-3  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah </th>
                            <th
                                class="px-6 py-3 min-w-[250px] text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Pembayaran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                payment_verified</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($donaturs as $item)

                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                {{$item->campaign->title}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->donor_name}}
                            </td>
                            <td class="px-6 py-4 capitalize">{{ $item->type }}</td>

                            <td class="px-6 py-4">
                                <p>{{ $item->item_description }}</p>
                            </td>
                            <td class="px-6 py-4 flex items-center gap-3 font-medium text-gray-900">
                                <a href="{{ $item->payment_proof ? asset('storage/' . $item->payment_proof) : asset('images/default_campaign.png') }}"
                                    target="_blank">
                                    <img src="{{ $item->payment_proof ? asset('storage/' . $item->payment_proof) : asset('images/default_campaign.png') }}"
                                        class="w-14 h-14 rounded-md object-cover" alt="Campaign Image">
                                </a>
                            </td>

                            <td class="px-6 py-4">
                                @if ($item->type == "financial")
                                <p>Rp {{ number_format($item->amount, 0, ',', '.') }}</p>
                                @elseif ($item->type == "goods")
                                <p>{{ $item->item_quantity }}</p>
                                @else
                                <p>{{ $item->session_count }}</p>
                                @endif
                            </td>


                            <td class="px-6 py-4">
                                <p>{{ $item->created_at->format('d M Y, H:i') }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="px-3 w-fit py-1 rounded-full text-xs font-semibold capitalize
                                        @if ($item->payment_verified === 'pending') bg-violet-100 text-violet-800
                                        @elseif ($item->payment_verified === 'approved') bg-blue-100 text-blue-800
                                        @elseif ($item->payment_verified === 'rejected') bg-red-100 text-red-800
                                        @else bg-violet-100 text-violet-800
                                        @endif">
                                    {{ $item->payment_verified }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    onclick="openModal('{{ route('admin.donatur.update', $item->id) }}', '{{ $item->payment_verified }}')"
                                    class="text-sm px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600 transition">
                                    Update
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">Belum ada donatur.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Update payment_verified (SATU SAJA) -->
    <div id="updateModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Update STatus Donasi</h2>

            <form id="updateForm" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="payment_verified" class="block text-sm font-medium text-gray-700 mb-2">Pilih
                        Status</label>
                    <select name="payment_verified" id="modalpayment_verified"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(route, payment_verified) {
            const modal = document.getElementById('updateModal');
            const form = document.getElementById('updateForm');
            const select = document.getElementById('modalpayment_verified');

            form.action = route;
            select.value = payment_verified;

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('updateModal');
            modal.classList.add('hidden');
        }

    </script>
</x-app-layout>
