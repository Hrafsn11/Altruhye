<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Judul Halaman -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Donasi untuk Sesama</h1>

        <!-- Filter Tipe Kampanye -->
        <div class="flex justify-center mb-8 gap-3 flex-wrap">
            @php
                $activeType = request('type');
            @endphp
            @foreach (['semua' => 'Semua', 'financial' => 'Donasi Uang', 'goods' => 'Donasi Barang', 'emotional' => 'Dukungan Emosional'] as $key => $label)
                <a href="{{ route('campaigns.index', ['type' => $key !== 'semua' ? $key : null]) }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ $activeType === $key || (!$activeType && $key === 'semua') ? 'bg-amber-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <!-- Daftar Kampanye -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($campaigns as $campaign)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $campaign->gambar) }}"
                             alt="{{ $campaign->title }}">
                        <div class="absolute top-4 left-4 bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-gray-700">
                            {{ ucfirst($campaign->category) }}
                        </div>
                    </div>

                    <div class="p-5">
                        <!-- Tanggal -->
                        <div class="flex items-center text-xs text-gray-500 mb-3">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $campaign->created_at->translatedFormat('d F Y') }}
                        </div>

                        <!-- Judul -->
                        <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2 min-h-[3.5rem]">
                            {{ $campaign->title }}
                        </h2>
                        <!-- Deskripsi -->
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($campaign->description, 150) }}
                        </p>

                        <!-- Progres -->
                        @php
                            $progress = $campaign->progressPercent();
                        @endphp
                        <div class="mb-4">
                            <div class="flex justify-between text-xs mb-1 text-gray-600">
                                <span>Progress</span>
                                <span>{{ number_format($progress) }}%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-200 rounded-full">
                                <div class="h-2 rounded-full bg-amber-500" style="width: {{ $progress }}%"></div>
                            </div>
                        </div>

                        <!-- Terkumpul dan Target -->
                        <div class="flex justify-between text-xs text-gray-700 mb-4">
                            <div>
                                <p class="text-gray-500">Terkumpul</p>
                                <p class="font-semibold">{{ $campaign->displayCollected() }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500">Target</p>
                                <p class="font-semibold">{{ $campaign->displayTarget() }}</p>
                            </div>
                        </div>

                        <!-- Penggalang -->
                        <div class="flex items-center gap-3 border-t pt-4 mt-4">
                            <img class="h-8 w-8 rounded-full object-cover"
                                 src="{{ $campaign->user ? $campaign->user->profile_photo_url : asset('images/anonymous.png') }}"
                                 alt="{{ $campaign->user->name ?? 'Admin' }}">
                            <div class="text-sm">
                                <p class="font-medium text-gray-800">{{ $campaign->user->name ?? 'Admin' }}</p>
                                <p class="text-xs text-gray-500">Penggalang Dana</p>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <a href="{{ route('campaigns.show', $campaign->id) }}"
                           class="block mt-5 w-full text-center bg-amber-500 text-white text-sm font-medium py-2 rounded-lg hover:bg-amber-600 transition">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 text-sm">
                    Tidak ada kampanye donasi untuk saat ini.
                </div>
            @endforelse
        </div>
        <!-- Pagination -->
        <div class="mt-6">
            {{ $campaigns->appends(request()->query())->links('pagination::tailwind') }}
        </div>

    </div>
</x-app-layout>
