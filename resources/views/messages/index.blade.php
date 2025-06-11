<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Pesan Dukungan Emosional</h2>

        @if ($campaigns->isEmpty())
            <div class="text-gray-500 text-center py-20">
                <p class="text-xl">Belum ada kampanye yang Anda buat.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($campaigns as $campaign)
                    @php
                        // Ambil semua donasi untuk kampanye ini (termasuk donasi emosional)
                        $messages = $campaign->donations()->where('type', 'emotional')->get();
                        $messageCount = $messages->count();
                    @endphp

                    {{-- PERUBAHAN 1: Tambahkan `flex flex-col` untuk membuat kartu ini menjadi container flex vertikal --}}
                    <div class="bg-white border border-gray-200 rounded-xl shadow-2xl hover:shadow-2xl transition transform hover:scale-105 duration-300 ease-in-out flex flex-col">
                        
                        {{-- PERUBAHAN 2: Ganti kelas di div ini menjadi `flex-1` (atau `flex-grow`). 
                             Ini akan membuatnya "tumbuh" dan mengisi ruang kosong, mendorong tombol ke bawah. --}}
                        <div class="p-6 flex-1">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ $campaign->title }}</h3>

                            @if ($messageCount > 0)
                                <p class="text-base text-gray-700 mb-4 line-clamp-3">
                                    "{{ Str::limit($messages->last()->initial_message, 120) }}"
                                </p>

                                <div class="flex items-center gap-2 mb-2">
                                    <span class="inline-block bg-amber-100 text-amber-700 text-xs font-semibold px-4 py-2 rounded-full shadow-md">
                                        Ada {{ $messageCount }} pesan untuk kamu
                                    </span>
                                </div>
                                <span class="text-sm text-gray-500 italic">Terakhir: {{ $messages->last()->created_at->diffForHumans() }}</span>
                            @else
                                <p class="text-sm text-gray-500 italic mb-4">Belum ada pesan masuk.</p>
                            @endif
                        </div>

                        <div class="bg-gradient-to-r from-amber-400 to-amber-500 p-0 rounded-b-xl">
                            <a href="{{ route('campaigns.messages', $campaign) }}"
                               class="block w-full text-center bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-400 text-white text-base font-bold py-3 rounded-b-xl transition duration-200 tracking-wide shadow-none border-0 focus:outline-none focus:ring-2 focus:ring-amber-300">
                                <span class="inline-flex items-center justify-center gap-2">
                                    Lihat Pesan
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>