<x-app-layout>
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Anda</h1>

        <!-- Statistik Donasi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Total Donasi Uang</p>
                <p class="text-2xl font-bold text-amber-500">Rp {{ number_format($totalMoney, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Total Donasi Barang</p>
                <p class="text-2xl font-bold text-blue-600">{{ $totalItems }} Barang</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Total Dukungan Emosional</p>
                <p class="text-2xl font-bold text-purple-600">{{ $totalSessions }} Sesi</p>
            </div>
        </div>

        <!-- Statistik Kampanye -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Kampanye Disetujui</p>
                <p class="text-xl font-bold text-green-600">{{ $campaignStatusCount['active'] }}</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Menunggu Persetujuan</p>
                <p class="text-xl font-bold text-yellow-500">{{ $campaignStatusCount['pending'] }}</p>
            </div>
            <div class="bg-white shadow rounded-xl p-6">
                <p class="text-sm text-gray-500">Kampanye Ditolak</p>
                <p class="text-xl font-bold text-red-500">{{ $campaignStatusCount['rejected'] }}</p>
            </div>
        </div>

        <!-- Chart Donasi -->
        <div class="bg-white shadow-xl rounded-xl p-6 mb-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Statistik Donasi per Jenis</h2>
        
            @foreach ([
                'Uang' => ['id' => 'chartFinancial', 'data' => $financialTop],
                'Barang' => ['id' => 'chartGoods', 'data' => $goodsTop],
                'Dukungan Emosional' => ['id' => 'chartEmotional', 'data' => $emotionalTop]
            ] as $label => $chart)
        
                <div class="mb-12">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Top Donasi {{ $label }}</h3>
                    @if (count($chart['data']))
                        <div id="{{ $chart['id'] }}" class="w-full h-80"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const data = @json($chart['data']);
                                const categories = data.map(item => item.title);
                                const values = data.map(item => item.value);
        
                                const options = {
                                    chart: {
                                        type: 'bar',
                                        height: 300,
                                        toolbar: { show: false }
                                    },
                                    series: [{
                                        name: 'Jumlah',
                                        data: values
                                    }],
                                    xaxis: {
                                        categories: categories,
                                        labels: { style: { fontSize: '13px', fontWeight: '600', colors: '#374151' } }
                                    },
                                    yaxis: {
                                        labels: { style: { fontSize: '13px', fontWeight: '600', colors: '#374151' } }
                                    },
                                    colors: ['#fbbf24'],
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 8,
                                            columnWidth: '50%'
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        style: { fontSize: '12px', fontWeight: '600' }
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: function(val) {
                                                return val.toLocaleString();
                                            }
                                        }
                                    }
                                };
        
                                new ApexCharts(document.querySelector("#{{ $chart['id'] }}"), options).render();
                            });
                        </script>
                    @else
                        <p class="text-gray-500">Belum ada data donasi {{ strtolower($label) }}.</p>
                    @endif
                </div>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


        <!-- Daftar Kampanye & Donasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kampanye Saya -->
            <div class="bg-white shadow rounded-xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Kampanye Saya</h2>
                    <a href="{{ route('campaigns.create') }}"
                        class="text-sm bg-amber-500 text-white px-3 py-1 rounded hover:bg-amber-600">+ Buat Kampanye</a>
                </div>
                <ul class="space-y-2">
                    @forelse ($campaigns as $campaign)
                        <li>
                            <a href="{{ route('campaigns.show', $campaign->slug) }}"
                                class="block p-3 border border-gray-200 rounded hover:bg-amber-50">
                                {{ $campaign->title }}
                                <span class="block text-sm text-gray-500">Status:
                                    {{ ucfirst($campaign->status) }}</span>
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500">Belum ada kampanye yang dibuat.</li>
                    @endforelse
                </ul>
            </div>

            <!-- Donasi Terakhir -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Donasi Terakhir</h2>
                <ul class="space-y-2">
                    @forelse ($donations->take(5) as $donation)
                        <li class="p-3 border border-gray-200 rounded hover:bg-amber-50">
                            <div class="flex justify-between">
                                <span class="font-semibold">{{ $donation->donor_name }}</span>
                                @if ($donation->type === 'financial')
                                    <span class="text-green-600">Rp
                                        {{ number_format($donation->amount, 0, ',', '.') }}</span>
                                @elseif ($donation->type === 'goods')
                                    <span class="text-blue-600">{{ $donation->item_quantity }} barang</span>
                                @elseif ($donation->type === 'emotional')
                                    <span class="text-purple-600">{{ $donation->session_count }} sesi</span>
                                @endif
                            </div>
                        </li>
                    @empty
                        <li class="text-gray-500">Belum ada donasi.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
