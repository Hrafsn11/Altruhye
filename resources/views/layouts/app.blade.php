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


    <!-- Styles -->
    @livewireStyles
    
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-navbar />

        <div class="pt-16"> <!-- Add padding-top to account for fixed navbar -->
            <div class="flex">
                @php
                    $withSidebarRoutes = [
                        'profile.show',
                        'verification',
                        'my-campaigns',
                        'history',
                        'chat',
                        'dashboard',
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
                        <main>
                            {{ $slot }}
                        </main>
                    </div> <!-- Ini nutup div dari if di atas -->
            </div>
        </div>

        @stack('modals')
        @livewireScripts
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

</body>

</html>
