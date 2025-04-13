<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Konten Utama -->
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-md">
            <!-- Gambar Campaign -->
            <img src="{{ asset('storage/' . $campaign->thumbnail) }}" class="w-full h-64 object-cover rounded-lg mb-6" alt="{{ $campaign->title }}">

            <!-- Judul -->
            <h1 class="text-3xl font-bold text-gray-900">{{ $campaign->title }}</h1>

            <!-- Tanggal -->
            <div class="flex items-center text-sm text-gray-600 mt-2">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $campaign->created_at->translatedFormat('d F Y') }}
            </div>

            <!-- Pembuat Campaign -->
            <div class="flex items-center mt-2 mb-4">
                <img class="h-10 w-10 rounded-full mr-3"
                     src="{{ $campaign->user->profile_photo_url ?? asset('storage/images/anonymous.png') }}"
                     alt="{{ $campaign->user->name }}">
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ $campaign->user->name ?? 'Anonim' }}</p>
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
                    $progress = min(max(($campaign->current_amount / $campaign->target_amount) * 100, 0), 100);
                @endphp
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Donasi</h2>
                
                <div class="mb-4">
                    <p class="text-sm text-gray-500">Terkumpul</p>
                    <p class="text-xl font-bold text-gray-900">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</p>
                </div>

                <div class="mb-4">
                    <p class="text-sm text-gray-500">Target</p>
                    <p class="text-xl font-bold text-gray-900">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Progress</span>
                        <span class="text-gray-900 font-medium">{{ number_format($progress, 0) }}%</span>
                    </div>
                    <div class="overflow-hidden h-2 bg-gray-200 rounded">
                        <div class="h-full bg-blue-600 rounded" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                <!-- Tombol Donasi -->
                <a href="{{ route('donations.create') }}" class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 mt-4">
                    Donasi Sekarang atau kamu mati 
                </a>
            </div>

            <!-- Box Rekomendasi (Placeholder) -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Rekomendasi Lainnya</h2>
                <p class="text-sm text-gray-500">Fitur ini akan menampilkan campaign sejenis.</p>
            </div>
        </div>
    </div>
</x-app-layout>
