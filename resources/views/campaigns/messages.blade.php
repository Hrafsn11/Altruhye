<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="bg-gradient-to-r from-amber-400 to-amber-500 rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-white mb-6 border-b pb-4">
                💬 Pesan Dukungan Emosional untuk: 
                <span class="text-amber-200">"{{ $campaign->title }}"</span>
            </h2>

            @if ($messages->isEmpty())
                <div class="text-center py-12 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-amber-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h6m-6 4h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H7l-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="mt-4 text-sm">Belum ada pesan dukungan emosional yang masuk.</p>
                </div>
            @else
                <div class="space-y-6">
                    @foreach ($messages as $msg)
                        <div class="p-6 rounded-2xl bg-white shadow-lg border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-xl hover:bg-amber-50">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-amber-700 font-semibold">
                                    👤 {{ $msg->donor_name }}
                                </p>
                                <span class="text-xs text-gray-500">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <p class="mt-4 text-gray-800 leading-relaxed text-sm">
                                {{ $msg->initial_message }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
