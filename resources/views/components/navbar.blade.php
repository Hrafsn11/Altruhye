<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-lg shadow-md border-b border-gray-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <span class="text-2xl font-bold text-amber-600 tracking-wide">ALTRUH</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6">
                <x-navlinks href="/" :active="request()->is('/')">Home</x-navlinks>
                <x-navlinks href="{{ route('campaigns.index') }}" :active="request()->is('campaigns')">Donasi</x-navlinks>

                <x-navlinks href="{{ route('campaigns.create') }}" :active="request()->routeIs('campaigns.create')">Galang Bantuan</x-navlinks>

                <x-navlinks href="/about" :active="request()->is('about')">Tentang Kami</x-navlinks>

            </div>

            <!-- Right Section -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Notifikasi -->
                <div class="relative">
                    <button onclick="toggleNotificationDropdown()"
                        class="p-2 rounded-full hover:bg-amber-100 text-gray-700 hover:text-amber-600 relative">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022a24.255 24.255 0 005.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                        @auth
                            @if (Auth::user()->unreadNotifications->count() > 0)
                                <span
                                    class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1.5 animate-pulse">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        @endauth
                    </button>

                    <!-- Notifikasi Dropdown -->
                    <div id="notification-dropdown"
                        class="hidden absolute right-0 mt-2 w-80 max-h-96 overflow-y-auto rounded-xl bg-white shadow-xl ring-1 ring-amber-300 z-50">
                        <div class="py-2">
                            <form method="POST" action="{{ route('notifications.read') }}"
                                class="text-right px-4 mb-2">
                                @csrf
                                <button class="text-yellow-500 text-sm hover:underline font-medium" type="submit">
                                    Tandai semua dibaca
                                </button>
                            </form>

                            @php
                                $allNotifications = auth()->user() ? auth()->user()->notifications : [];
                            @endphp

                            @forelse ($allNotifications as $notification)
                                @php
                                    $url = $notification->data['url'] ?? '#';
                                @endphp
                                <a href="{{ $url }}"
                                    class="block px-4 py-3 text-sm rounded-lg mx-2 my-1 transition
        duration-200 ease-in-out
        {{ $notification->read_at
            ? 'text-gray-700 hover:bg-orange-50'
            : 'text-gray-900 font-semibold bg-orange-100 hover:bg-orange-200' }}">
                                    <div>{{ $notification->data['title'] ?? 'Notifikasi' }}</div>
                                    <div class="text-xs text-gray-600 mt-1">
                                        {{ $notification->data['message'] ?? '' }}</div>
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm px-4 py-2">Tidak ada notifikasi baru</p>
                            @endforelse

                        </div>
                    </div>

                </div>

                <!-- Avatar User -->
                <div class="relative">
                    <button onclick="toggleDropdown()"
                        class="flex items-center justify-center rounded-full hover:ring-2 ring-amber-400 transition-shadow">
                        <img class="h-9 w-9 rounded-full border-2 border-amber-500 hover:border-amber-400"
                            src="{{ Auth::check() ? (Auth::user()->profile_photo_path ? Auth::user()->profile_photo_url : Avatar::create(Auth::user()->name)->toBase64()) : asset('images/anonymous.png') }}"
                            alt="{{ Auth::check() ? Auth::user()->name : 'Anonymous' }}">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="user-menu"
                        class="hidden absolute right-0 mt-2 w-48 origin-top-right rounded-lg bg-white shadow-lg ring-1 ring-black/10 py-1 z-50">
                        @auth
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Edit Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Keluar</a>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Login</a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button onclick="toggleMobileMenu()"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-amber-600 hover:bg-amber-100 focus:outline-none">
                    <svg id="menu-open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                    </svg>
                    <svg id="menu-close" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
        <a href="/" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Home</a>
        <a href="{{ route('campaigns.index') }}"
            class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Donasi</a>
        <a href="{{ route('campaigns.create') }}"
            class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Galang Bantuan</a>
        <a href="/about" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Tentang Kami</a>

        @auth
            <a href="{{ route('profile.show') }}"
                class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Keluar</a>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Login</a>
            <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-amber-50">Daftar</a>
        @endauth
    </div>
</nav>

<script src="{{ asset('js/script.js') }}"></script>
