<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Pesan Dukungan Emosional</h2>

        @if ($campaigns->isEmpty())
            <div class="text-gray-500 text-center py-20">
                <p class="text-xl">Belum ada kampanye yang Anda buat.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($campaigns as $campaign)
                    @php
                        $messages = $campaign->donations;
                        $unreadCount = $messages->where('is_read', false)->count();
                    @endphp

                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $campaign->title }}</h3>

                            @if ($messages->count() > 0)
                                <p class="text-sm text-gray-700 mb-3 line-clamp-3">
                                    "{{ Str::limit($messages->last()->initial_message, 100) }}"
                                </p>

                                <div class="flex items-center gap-2">
                                    <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">
                                        Ada pesan untuk kamu
                                    </span>

                                    @if ($unreadCount > 0)
                                        <span class="inline-block bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">
                                            {{ $unreadCount }} belum dibaca
                                        </span>
                                    @endif
                                </div>
                            @else
                                <p class="text-sm text-gray-500 italic mb-3">Belum ada pesan masuk.</p>
                            @endif
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('campaigns.messages', $campaign) }}"
                               class="inline-block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md transition">
                                Lihat Pesan
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
