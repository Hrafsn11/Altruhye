<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mt-5 p-6 bg-white rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Verifikasi Campaign</h2>
            </div>

            <!-- Overflow Horizontal untuk tabel -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-left table-auto">
                    <thead class="text-gray-500 text-sm border-b">
                        <tr>
                            <th
                                class="px-6 py-3 min-w-[500px] text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Dibuat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        @forelse ($campaigns as $campaign)

                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 flex items-center gap-3 font-medium text-gray-900">
                                <img src="{{ $campaign->gambar ? asset('storage/' . $campaign->gambar) : asset('images/default_campaign.png') }}"
                                    class="w-8 h-8 rounded-md object-cover" alt="Campaign Image">
                                {{ $campaign->title }}
                            </td>
                            <td class="px-6 py-4 capitalize">{{ $campaign->type }}</td>
                            <td class="px-6 py-4">{{ $campaign->created_at->format('d M Y') }}</td>

                            <td class="px-6 py-4">
                                <p class="px-3 w-fit py-1 rounded-full text-xs font-semibold capitalize
                                        @if ($campaign->status === 'pending') bg-violet-100 text-violet-800
                                        @elseif ($campaign->status === 'active') bg-blue-100 text-blue-800
                                        @elseif ($campaign->status === 'completed') bg-green-100 text-green-800
                                        @elseif ($campaign->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-violet-100 text-violet-800
                                        @endif">
                                    {{ $campaign->status }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    onclick="openModal('{{ route('admin.campaigns.update', $campaign->id) }}', '{{ $campaign->status }}')"
                                    class="text-sm px-4 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600 transition">
                                    Update
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">Belum ada campaign yang dibuat.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Update Status (SATU SAJA) -->
    <div id="updateModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Update Status Campaign</h2>

            <form id="updateForm" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Pilih Status</label>
                    <select name="status" id="modalStatus" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="pending">Pending</option>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
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
        function openModal(route, status) {
            const modal = document.getElementById('updateModal');
            const form = document.getElementById('updateForm');
            const select = document.getElementById('modalStatus');

            form.action = route;
            select.value = status;

            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('updateModal');
            modal.classList.add('hidden');
        }

    </script>
</x-app-layout>
