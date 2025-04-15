<nav class=" fixed top-0 left-0 right-0 z-50 bg-custom-orange">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="ml-2">
                    <span class="text-2xl font-bold text-white">ALTRUH</span>
                </div>
            </div>

            <!-- Centered Nav Links -->
            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex items-baseline space-x-4">
                    <x-navlinks href="/" :active="request()->is('/')">Home</x-navlinks>
                    <x-navlinks href="{{ route('campaigns.index') }}" :active="request()->is('campaigns')">Donasi</x-navlinks>
                    @auth
                        <x-navlinks href="{{ route('campaigns.create') }}" :active="request()->routeIs('campaigns.create')">Galang Bantuan</x-navlinks>
                    @endauth
                    <x-navlinks href="/about" :active="request()->is('about')">Tentang Kami</x-navlinks>
                </div>
            </div>

            <!-- Right Side Icons/Profile -->
            <div class="hidden md:flex items-center">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                onclick="toggleDropdown()">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ Auth::check()
                                        ? (Auth::user()->profile_photo_path
                                            ? Auth::user()->profile_photo_url
                                            : Avatar::create(Auth::user()->name)->toBase64())
                                        : asset('images/anonymous.png') }}"
                                    alt="{{ Auth::check() ? Auth::user()->name : 'Anonymous' }}">
                            </button>
                        </div>

                        <!-- Profile dropdown menu content -->
                        <div id="user-menu"
                            class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            @auth
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Edit Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Pengaturan</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="hidden" name="redirect" value="/" />
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Keluar
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                    tabindex="-1">Login</a>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                    tabindex="-1">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    onclick="toggleMobileMenu()" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg id="menu-open" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg id="menu-close" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-navlinks href="/" :active="request()->is('/')">Home</x-navlinks>
            <x-navlinks href="{{ route('campaigns.index') }}" :active="request()->is('campaigns')">Donasi</x-navlinks>
            @auth
                <x-navlinks href="{{ route('campaigns.create') }}" :active="request()->is('campaigns/create')">Galang Bantuan</x-navlinks>
            @endauth
            <x-navlinks href="/about" :active="request()->is('about')">Tentang Kami</x-navlinks>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="{{ Auth::check()
                            ? (Auth::user()->profile_photo_path
                                ? Auth::user()->profile_photo_url
                                : Avatar::create(Auth::user()->name)->toBase64())
                            : asset('images/anonymous.png') }}"
                        alt="{{ Auth::check() ? Auth::user()->name : 'Anonymous' }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">
                        {{ Auth::check() ? $nama : 'Anonymous' }}</div><!-- Nama User ambil dari database -->
                    <div class="text-sm font-medium leading-none text-gray-400">
                        {{ Auth::check() ? $email : 'anonymous@example.com' }}</div>
                </div>
                <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </div>
            <!-- Mobile menu authentication options -->
            <div class="mt-3 space-y-1 px-2">
                @auth
                    <a href="{{ route('profile.show') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Edit
                        Profile</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Pengaturan</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="redirect" value="/" />
                        <a href="{{ route('logout') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Keluar
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
                    <a href="{{ route('register') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<script src="{{ asset('js/script.js') }}"></script>
