@php
    $campaigns = App\Models\Campaign::all(); // Mengambil semua data campaigns
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($campaigns as $campaign)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col min-h-[450px] max-w-xs mx-auto">
            
            <!-- Gambar Thumbnail -->
            <div class="relative">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $campaign->thumbnail) }}" alt="{{ $campaign->title }}">
                <div class="absolute top-4 left-4 bg-white px-3 py-1 rounded-full text-sm font-medium text-gray-700">
                    {{ ucfirst($campaign->category) }}
                </div>
            </div>

            <!-- Konten Campaign -->
            <div class="flex flex-col p-6 flex-grow">
                
                <!-- Bagian Tanggal Penggalangan Dana -->
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $campaign->created_at->translatedFormat('d F Y') }}
                </div>

                <!-- Bagian Judul Campaign -->
                <h3 class="text-xl font-semibold text-gray-900 mb-2 flex-grow overflow-hidden text-ellipsis whitespace-nowrap">{{ $campaign->title }}</h3>

                <!-- Bagian Penggalang Dana -->
                <div class="flex items-center mb-4">
                    <img class="h-8 w-8 rounded-full mr-2" src="{{ $campaign->user->profile_photo_url ?? asset('storage/images/anonymous.png') }}" alt="{{ $campaign->user->name }}">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $campaign->user->name ?? 'Anonim' }}</p>
                        <p class="text-xs text-gray-500">Penggalang Dana</p>
                    </div>
                </div>

                <!-- Bagian Progress Campaign -->
                <div class="mb-4 flex-grow">
                    @php
                        $progress = min(max(($campaign->current_amount / $campaign->target_amount) * 100, 0), 100);
                    @endphp
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600">Progress</span>
                        <span class="text-gray-900 font-medium">{{ number_format($progress, 0) }}%</span>
                    </div>
                    <div class="overflow-hidden h-2 bg-gray-200 rounded">
                        <div class="h-full bg-blue-600 rounded" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                <!-- Bagian Terkumpul dan Target -->
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <p class="text-sm text-gray-500">Terkumpul</p>
                        <p class="text-lg font-bold text-gray-900">Rp {{ number_format(min(max($campaign->current_amount, 0), $campaign->target_amount), 0, ',', '.') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Target</p>
                        <p class="text-lg font-bold text-gray-900">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Baca Selengkapnya -->
            <div class="p-6 mt-auto">
                <a href="{{ route('campaigns.show', $campaign->id) }}" class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Baca Selengkapnya
                </a>                
            </div>
        </div>
    @endforeach
</div>
