<aside class="fixed left-0 top-16 h-[calc(100vh-64px)] w-16 lg:w-64 bg-white border-r shadow-lg transition-all duration-300 z-40">
  <div class="flex flex-col h-full px-4 py-6">
      <!-- Logo -->
      <div class="flex items-center justify-center lg:justify-start mb-10">
          <span class="hidden lg:block text-2xl font-semibold text-amber-600 tracking-wide">Altruh</span>
          <i class="fa-solid fa-hand-holding-heart text-2xl text-amber-500 lg:hidden"></i>
      </div>

      <!-- Navigation -->
      <nav class="flex flex-col space-y-4 text-gray-700">
          <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('dashboard') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-house text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Dashboard</span>
          </a>

          <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('profile.show') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-user-pen text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Edit Profile</span>
          </a>

          <a href="{{ route('donations.history') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('donations.history') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-clock-rotate-left text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Riwayat</span>
          </a>

          <a href="{{ route('campaigns.history') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('campaigns.history') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-bullhorn text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Campaign Saya</span>
          </a>

          <a href="{{ route('identity_verifications.status') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('identity_verifications.status') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-id-card text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Verifikasi Identitas</span>
          </a>

          <a href="{{ route('messages.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-md transition-all duration-200 justify-center lg:justify-start
              {{ request()->routeIs('messages.index') ? 'bg-amber-50 text-amber-600 font-semibold' : 'hover:bg-amber-100 hover:text-amber-600' }}">
              <i class="fa-solid fa-message text-lg"></i>
              <span class="text-sm font-medium hidden lg:block">Pesan</span>
          </a>
      </nav>
  </div>
</aside>
