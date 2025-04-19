<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Kampanye Donasi</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($campaigns as $campaign)
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $campaign->gambar) }}"
                        alt="{{ $campaign->title }}">
                        <div
                            class="absolute top-4 left-4 bg-white px-3 py-1 rounded-full text-sm font-medium text-gray-700">
                            {{ ucfirst($campaign->category) }}
                        </div>
                    </div>

                    <div class="p-5">
                        <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $campaign->title }}</h2>

                        <p class="text-sm text-gray-600 mb-4">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>

                        @php
                             $progress = $campaign->progressPercent();
                        @endphp
                        <div class="mb-3">
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Progress</span>
                                <span class="text-gray-900 font-medium">{{ number_format($progress, 0) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-amber-500 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-sm mb-4">
                            <div>
                                <p class="text-gray-500">Terkumpul</p>
                                <p class="font-semibold text-gray-800">
                                  <p class="font-semibold text-gray-800">{{ $campaign->displayCollected() }}</p>                            </div>
                            <div class="text-right">
                                <p class="text-gray-500">Target</p>
                                <p class="font-semibold text-gray-800">
                                  <p class="font-semibold text-gray-800">{{ $campaign->displayTarget() }}</p>
                            </div>
                        </div>

                        <a href="{{ route('campaigns.show', $campaign->id) }}"
                            class="block text-center bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    Tidak ada kampanye donasi untuk saat ini.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
