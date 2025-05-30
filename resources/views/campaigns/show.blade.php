<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Konten Utama -->
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-md">
            <!-- Gambar Campaign -->
            <img src="{{ asset('storage/' . $campaign->gambar) }}" alt="gambar {{ $campaign->title }}"
                class="w-auto h-auto my-auto">

            <!-- Judul -->
            <h1 class="text-3xl font-bold text-gray-900 mt-10 ">{{ $campaign->title }}</h1>

            <!-- Tanggal -->
            <div class="flex items-center text-sm text-gray-600 mt-2">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $campaign->created_at->translatedFormat('d F Y') }}
            </div>

            <!-- Pembuat Campaign -->
            <div class="flex items-center mt-2 mb-4">
                <img class="h-10 w-10 rounded-full mr-3"
                    src="{{ $campaign->user ? $campaign->user->profile_photo_url : asset('images/anonymous.png') }}"
                    alt="{{ $campaign->user ? $campaign->user->name : 'Admin' }}">
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ $campaign->user ? $campaign->user->name : 'Admin' }}
                    </p>
                    <p class="text-xs text-gray-500">Penggalang Dana</p>
                </div>
            </div>


            <!-- Deskripsi -->
            <div class="text-gray-800 leading-relaxed">
                {!! nl2br(e($campaign->description)) !!}
            </div>
           

        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Box Info Donasi -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                @php
                    $progress = $campaign->progressPercent();
                @endphp

                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Donasi</h2>

                <div class="mb-4">
                    <p class="text-sm text-gray-500">Terkumpul</p>
                    <p class="text-xl font-bold text-gray-900">{{ $campaign->displayCollected() }}</p>
                </div>

                <div class="mb-4">
                    <p class="text-sm text-gray-500">Target</p>
                    <p class="text-xl font-bold text-gray-900">{{ $campaign->displayTarget() }}</p>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Progress</span>
                        <span class="text-gray-900 font-medium">{{ number_format($progress, 0) }}%</span>
                    </div>
                    <div class="overflow-hidden h-2 bg-gray-200 rounded">
                        <div class="h-full bg-amber-500 rounded" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                <!-- Tombol Donasi -->
                <a href="{{ route('donations.create', $campaign->id) }}"
                    class="block w-full text-center bg-amber-500 text-white px-4 py-2 rounded-lg hover:bg-amber-600 transition duration-300 mt-4">
                    Donasi Sekarang
                </a>
            </div>

            <!-- Box Rekomendasi Lainnya -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Rekomendasi Lainnya</h2>

                <div class="grid grid-cols-1 gap-6">
                    @foreach ($recommendedCampaigns as $recommendation)
                        <a href="{{ route('campaigns.show', $recommendation->id) }}"
                            class="relative bg-white rounded-xl shadow-md overflow-hidden group cursor-pointer hover:scale-105 transform transition duration-300">
                            <img class="w-full h-40 object-cover"
                                src="{{ asset('storage/' . $recommendation->gambar) }}"
                                alt="{{ $recommendation->title }}">
                            <div
                                class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300">
                            </div>
                            <div class="absolute bottom-0 left-0 p-4 text-white z-10">
                                <h3 class="font-semibold">{{ Str::limit($recommendation->title, 30) }}</h3>
                                <p class="text-sm">{{ Str::limit($recommendation->description, 40) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @if ($donations->count())
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Donatur</h2>
    
                <div class="space-y-4 max-h-80 overflow-y-auto pr-2">
                    @foreach ($donations->where('payment_verified', 'approved')->take(5) as $donation)
            <div class="flex items-center bg-gray-100 rounded-lg p-3">
                <img class="w-10 h-10 rounded-full mr-3"
                    src="{{ $donation->user?->profile_photo_url ?? asset('images/anonymous.png') }}"
                    alt="{{ $donation->user?->name ?? 'Anonim' }}">
                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $donation->user?->name ?? 'Anonim' }}
                    </p>
                    <p class="text-sm text-gray-600">
                        @if ($campaign->type === 'financial')
                            Rp{{ number_format($donation->amount, 0, ',', '.') }}
                        @elseif ($campaign->type === 'goods')
                            {{ $donation->item_quantity }} Barang
                        @elseif ($campaign->type === 'emotional')
                            Sesi Dukungan
                        @endif
                    </p>
                    <p class="text-xs text-gray-500">{{ $donation->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
                </div>
            </div>
        @endif
        </div>

    </div>
</x-app-layout>
