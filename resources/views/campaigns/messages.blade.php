<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                💬 Pesan Dukungan Emosional untuk: 
                <span class="text-indigo-600">"{{ $campaign->title }}"</span>
            </h2>

            @if ($messages->isEmpty())
                <div class="text-center py-8 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h6m-6 4h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H7l-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="mt-4 text-sm">Belum ada pesan dukungan emosional yang masuk.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($messages as $msg)
                        <div class="p-4 rounded-xl bg-gray-50 shadow-sm border border-gray-200">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-600 font-semibold">
                                    👤 {{ $msg->donor_name }}
                                </p>
                                <span class="text-xs text-gray-400">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <p class="mt-3 text-gray-800 leading-relaxed">
                                {{ $msg->initial_message }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
