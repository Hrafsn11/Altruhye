<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />



    <!-- Styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-navbar />

        <div class="pt-16">
            <!-- Add padding-top to account for fixed navbar -->
            <div class="flex">
                @php
                $withSidebarRoutes = [
                'profile.show',
                'verification',
                'campaigns.history',
                'history',
                'chatify',
                'dashboard',
                'admin.campaigns.index',
                'admin.user.index', 'admin.donatur.index',
                ];
                @endphp

                @if (in_array(Route::currentRouteName(), $withSidebarRoutes))
                <x-sidebar />
                <div class="flex-1 ml-16 lg:ml-64">
                    @else
                    <div class="flex-1 w-full">
                        @endif

                        <!-- Page Heading -->
                        @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                        @endif

                        <!-- Page Content -->
                        <main class="py-6 px-4 sm:px-6 lg:px-8">
                            {{ $slot }}
                        </main>
                    </div>
                </div>
            </div>

            @stack('modals')
            @livewireScripts
            @php
            $noFooterRoutes = [
            'profile.show',
            'verification',
            'campaigns.history',
            'history',
            'chatify',
            'dashboard',
            'admin.campaigns.index',
            'admin.user.index',
            'admin.donatur.index', 'admin.donatur.index',
            ];
            @endphp

            @if (!in_array(Route::currentRouteName(), $noFooterRoutes))
            <x-footer />
            @endif
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                toastr.success("{{ session('success') }}", "Berhasil!", {
                    timeOut: 5000,
                    positionClass: 'toast-top-center',
                    closeButton: true,
                    progressBar: true
                });
            });

        </script>
        @endif

        @if(session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                toastr.error("{{ session('error') }}", "Gagal!", {
                    timeOut: 5000,
                    positionClass: 'toast-top-center',
                    closeButton: true,
                    progressBar: true
                });
            });

        </script>
        @endif
        <script>
            const formattedInput = document.getElementById('formatted_target_amount');
            const rawInput = document.getElementById('target_amount');

            formattedInput.addEventListener('input', function (e) {
                // Ambil angka tanpa karakter selain digit
                let angkaBersih = e.target.value.replace(/\D/g, '');

                // Simpan ke input hidden
                rawInput.value = angkaBersih;

                // Format tampilan dengan titik ribuan
                formattedInput.value = formatRupiah(angkaBersih);
            });

            function formatRupiah(angka) {
                return 'Rp ' + angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

        </script>

        <script>
            const formattedAmount = document.getElementById('formatted_amount');
            const rawAmount = document.getElementById('amount');

            formattedAmount.addEventListener('input', function (e) {
                // Ambil angka tanpa karakter selain digit
                let angkaBersih = e.target.value.replace(/\D/g, '');

                // Simpan ke input hidden
                rawAmount.value = angkaBersih;

                // Format tampilan dengan titik ribuan
                formattedAmount.value = formatRupiah(angkaBersih);
            });

            function formatRupiah(angka) {
                return 'Rp ' + angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

        </script>
        <script>
            // Handle checkbox anonim
            const hideCheckbox = document.getElementById('hide_name');
            const donorInput = document.getElementById('donor_name');
            hideCheckbox ? .addEventListener('change', function () {
                if (this.checked) {
                    donorInput.value = 'Anonim';
                    donorInput.readOnly = true;
                } else {
                    donorInput.value = '{{ auth()->user()->name ?? '
                    ' }}';
                    donorInput.readOnly = true;
                }
            });

        </script>

</body>

</html>
