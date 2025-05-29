<x-app-layout>
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-10">Dashboard Anda</h1>

        <!-- Statistik Donasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-amber-100 text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Donasi Uang</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">Rp {{ number_format($totalMoney, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125-1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Donasi Barang</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $totalItems }} Barang</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72m.94 3.198l-.001-.03c0-.224.012-.447.037-.666A11.944 11.944 0 0012 21c2.17 0 4.207-.576 5.963-1.584a5.963 5.963 0 00.94-3.197z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Dukungan Emosional</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $totalSessions }} Sesi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Kampanye -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Kampanye Disetujui</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $campaignStatusCount['active'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Menunggu Persetujuan</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $campaignStatusCount['pending'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-2xl p-6 transform hover:scale-105 transition-transform duration-300 ease-out">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-red-100 text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Kampanye Ditolak</p>
                        <p class="text-2xl sm:text-3xl font-bold text-gray-800">{{ $campaignStatusCount['rejected'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Donasi -->
        <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Statistik Donasi per Jenis</h2>
        
            @foreach ([
                'Uang' => ['id' => 'chartFinancial', 'data' => $financialTop, 'color' => '#f59e0b'], // amber-500
                'Barang' => ['id' => 'chartGoods', 'data' => $goodsTop, 'color' => '#3b82f6'], // blue-500
                'Dukungan Emosional' => ['id' => 'chartEmotional', 'data' => $emotionalTop, 'color' => '#8b5cf6'] // purple-500
            ] as $label => $chart)
        
                <div class="mb-12 last:mb-0">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Top Donasi {{ $label }}</h3>
                    @if (count($chart['data']))
                        <div id="{{ $chart['id'] }}" class="w-full h-80"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const data_{{ $chart['id'] }} = @json($chart['data']);
                                const categories_{{ $chart['id'] }} = data_{{ $chart['id'] }}.map(item => item.title);
                                const values_{{ $chart['id'] }} = data_{{ $chart['id'] }}.map(item => item.value);
        
                                const options_{{ $chart['id'] }} = {
                                    chart: {
                                        type: 'bar',
                                        height: 300,
                                        toolbar: { show: false },
                                        fontFamily: 'inherit'
                                    },
                                    series: [{
                                        name: 'Jumlah',
                                        data: values_{{ $chart['id'] }}
                                    }],
                                    xaxis: {
                                        categories: categories_{{ $chart['id'] }},
                                        labels: { style: { fontSize: '13px', fontWeight: '600', colors: '#4b5563'} } // gray-600
                                    },
                                    yaxis: {
                                        labels: { 
                                            style: { fontSize: '13px', fontWeight: '600', colors: '#4b5563' }, // gray-600
                                            formatter: function (val) {
                                                return val.toLocaleString();
                                            }
                                        }
                                    },
                                    colors: ["{{ $chart['color'] }}"],
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 8,
                                            columnWidth: '50%',
                                            distributed: categories_{{ $chart['id'] }}.length === 1 ? false : true, // Use distributed colors if more than one bar
                                            dataLabels: {
                                                position: 'top',
                                            },
                                        }
                                    },
                                    legend: { show: categories_{{ $chart['id'] }}.length === 1 ? false : true, },
                                    dataLabels: {
                                        enabled: true,
                                        offsetY: -20,
                                        style: { fontSize: '12px', fontWeight: 'bold', colors: ["#374151"] }, // gray-700
                                        formatter: function(val) {
                                            return val.toLocaleString();
                                        }
                                    },
                                    tooltip: {
                                        theme: 'dark',
                                        y: {
                                            formatter: function(val) {
                                                return val.toLocaleString();
                                            }
                                        }
                                    },
                                    grid: {
                                        borderColor: '#e5e7eb', // gray-200
                                        strokeDashArray: 4,
                                        yaxis: {
                                            lines: {
                                                show: true
                                            }
                                        },
                                        xaxis: {
                                            lines: {
                                                show: false
                                            }
                                        }
                                    }
                                };
        
                                new ApexCharts(document.querySelector("#{{ $chart['id'] }}"), options_{{ $chart['id'] }}).render();
                            });
                        </script>
                    @else
                        <div class="text-center py-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data</h3>
                            <p class="mt-1 text-sm text-gray-500">Belum ada data donasi {{ strtolower($label) }} untuk ditampilkan.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


        <!-- Daftar Kampanye & Donasi -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-10">
            <!-- Kampanye Saya -->
            <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Kampanye Saya</h2>
                    <a href="{{ route('campaigns.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold text-sm rounded-lg shadow-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Buat Kampanye
                    </a>
                </div>
                @if($campaigns->count() > 0)
                <ul class="space-y-3">
                    @foreach ($campaigns as $campaign)
                        <li class="border-b border-gray-200 last:border-b-0 pb-3 mb-3 last:pb-0 last:mb-0">
                            <a href="{{ route('campaigns.show', $campaign->id) }}"
                                class="block p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-700 group-hover:text-amber-600">{{ $campaign->title }}</span>
                                    @php
                                        $statusClasses = [
                                            'active' => 'bg-green-100 text-green-700',
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'rejected' => 'bg-red-100 text-red-700',
                                            'completed' => 'bg-blue-100 text-blue-700',
                                            'archived' => 'bg-gray-100 text-gray-700',
                                        ];
                                        $defaultClass = 'bg-gray-100 text-gray-700';
                                        $statusClass = $statusClasses[$campaign->status] ?? $defaultClass;
                                    @endphp
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusClass }}">
                                        {{ ucfirst(str_replace('_', ' ', $campaign->status)) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Target: Rp {{ number_format($campaign->target_donation, 0, ',', '.') }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @else
                    <div class="text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927C9.581 2.345 10.419 2 11.318 2h1.364c.9 0 1.736.345 2.268.927l4.318 4.75A2.25 2.25 0 0120.25 9v9.75A2.25 2.25 0 0118 21H6a2.25 2.25 0 01-2.25-2.25V9c0-.688.287-1.32.75-1.75l4.318-4.75zM15 9H9v6h6V9z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kampanye</h3>
                        <p class="mt-1 text-sm text-gray-500">Anda belum membuat kampanye apapun. Mulai buat sekarang!</p>
                        <div class="mt-6">
                             <a href="{{ route('campaigns.create') }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Buat Kampanye Baru
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Donasi Terakhir -->
            <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Donasi Terakhir Anda</h2>
                @if($donations->count() > 0)
                <ul class="space-y-3">
                    @foreach ($donations->take(5) as $donation)
                        <li class="py-3 px-1 border-b border-gray-200 last:border-b-0 hover:bg-gray-50 transition-colors duration-150 rounded-md">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    @if ($donation->type === 'financial')
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-green-100 text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.5 2.5 0 00-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.006 6 8c0 .994.602 1.766 1.324 2.246.484.328.996.542 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.994 14 12c0-.994-.602-1.766-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" /></svg>
                                    </span>
                                    @elseif ($donation->type === 'goods')
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7H5V5zm1 9a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                                    </span>
                                    @elseif ($donation->type === 'emotional')
                                    <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full bg-purple-100 text-purple-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" /></svg>
                                    </span>
                                    @endif
                                    <span class="text-gray-700 font-medium">{{ $donation->donor_name }}</span>
                                </div>
                                <div class="text-right">
                                    @if ($donation->type === 'financial')
                                        <span class="text-sm font-semibold text-green-600">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                                        <span class="block text-xs text-gray-500">Uang</span>
                                    @elseif ($donation->type === 'goods')
                                        <span class="text-sm font-semibold text-blue-600">{{ $donation->item_quantity }} barang</span>
                                        <span class="block text-xs text-gray-500">Barang</span>
                                    @elseif ($donation->type === 'emotional')
                                        <span class="text-sm font-semibold text-purple-600">{{ $donation->session_count }} sesi</span>
                                        <span class="block text-xs text-gray-500">Dukungan</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @else
                    <div class="text-center py-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada donasi</h3>
                        <p class="mt-1 text-sm text-gray-500">Anda belum melakukan donasi apapun.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
