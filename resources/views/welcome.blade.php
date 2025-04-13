<x-layout>
    {{-- HEADER --}}
    <header class="full px-8 py-8">
      <div class="flex flex-col md:flex-row items-center justify-between bg-gray-100 p-8 rounded-lg">
        <div class="md:w-1/2">
          <h2 class="text-blue-600 text-lg font-semibold">Berbagi Manfaat Untuk Sesama</h2>
          <h1 class="text-xl font-bold text-gray-800 mt-2">Setiap bantuanmu pasti bermanfaat</h1>
          <p class="text-gray-600 mt-4">Galang dana dan donasi online kini semakin mudah dilakukan dimanapun dan kapanpun</p>
          <button class="bg-red-500 text-white px-6 py-3 rounded-full mt-6 shadow-lg transform transition duration-500 hover:bg-red-600 hover:scale-105">Donasi Sekarang</button>
          <p class="text-gray-600 mt-4">Download Aplikasi Atapkita</p>
          <div class="flex space-x-4 mt-2">
            <img alt="Google Play Store" class="h-12 transform transition duration-500 hover:scale-110" src="https://storage.googleapis.com/a1aa/image/ih10lROEWWIrxXwEg-o865tC4sVODyADheQaaXrZ2lA.jpg"/>
            <img alt="Apple App Store" class="h-12 transform transition duration-500 hover:scale-110" src="https://storage.googleapis.com/a1aa/image/J1QwXPQMy9Pm4VyLqYLAsvayZsVjHkTg5GpimC3rFO4.jpg"/>
            <img alt="Huawei AppGallery" class="h-12 transform transition duration-500 hover:scale-110" src="https://storage.googleapis.com/a1aa/image/xRbU0xK0xR3pK29ZJHnJhP0u4HaqgI5jZ27y6IeYmsw.jpg"/>
          </div>
        </div>
        <div class="md:w-1/2 flex flex-wrap justify-center mt-6 md:mt-0">
          <div class="w-full md:w-1/2 p-2">
            <img alt="Smiling child pointing" class="w-full h-auto object-cover rounded-lg shadow-lg transform transition duration-500 hover:scale-105" src="https://storage.googleapis.com/a1aa/image/DCMLURoZWZ0u71HEaoYyG6FToxGvjmqc9p8OcqdI_dQ.jpg"/>
          </div>
          <div class="w-full md:w-1/2 p-2">
            <img alt="Group of children smiling and pointing" class="w-full h-auto object-cover rounded-lg shadow-lg transform transition duration-500 hover:scale-105" src="https://storage.googleapis.com/a1aa/image/o6W64-h6PdpUbad9TPXwXSnGv5p3p1TLAsocvgo8SjU.jpg"/>
          </div>
        </div>
      </div>
    </header>
  
    {{-- FITUR UTAMA --}}
    <div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Apa yang bisa kamu lakukan di Altruh?</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
          {{-- Bantuan Uang --}}
          <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
              <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Uang</h3>
              <p class="text-gray-600">Salurkan bantuan finansial Anda untuk membantu mereka yang membutuhkan. Setiap rupiah yang Anda berikan akan membuat perubahan berarti.</p>
            </div>
          </div>
  
          {{-- Bantuan Barang --}}
          <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
              <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Barang</h3>
              <p class="text-gray-600">Donasikan barang-barang yang masih layak pakai untuk membantu sesama. Dari pakaian hingga buku, semuanya bermanfaat.</p>
            </div>
          </div>
  
          {{-- Bantuan Curhat --}}
          <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
              <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Curhat</h3>
              <p class="text-gray-600">Dapatkan dukungan moral dan konseling dari para relawan kami. Kami siap mendengarkan dan membantu Anda melewati masa sulit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    {{-- KAMPANYE TERKINI --}}
    <div class="bg-white py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Bantuan Terkini</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
          @foreach ($campaigns as $campaign)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
              <div class="relative">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $campaign->thumbnail) }}" alt="{{ $campaign->title }}">
                <div class="absolute top-4 left-4 bg-white px-3 py-1 rounded-full text-sm font-medium text-gray-700">
                  {{ ucfirst($campaign->category) }}
                </div>
              </div>
              <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                  <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  {{ $campaign->created_at->translatedFormat('d F Y') }}
                </div>
  
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $campaign->title }}</h3>
  
                <div class="flex items-center mb-4">
                  <img class="h-8 w-8 rounded-full mr-2" src="{{ $campaign->user->profile_photo_url ?? asset('storage/images/anonymous.png') }}" alt="{{ $campaign->user->name }}">
                  <div>
                    <p class="text-sm font-medium text-gray-900">{{ $campaign->user->name ?? 'Anonim' }}</p>
                    <p class="text-xs text-gray-500">Penggalang Dana</p>
                  </div>
                </div>
  
                <div class="mb-4">
                  @php
                    $progress = ($campaign->current_amount / $campaign->target_amount) * 100;
                  @endphp
                  <div class="flex justify-between text-sm mb-2">
                    <span class="text-gray-600">Progress</span>
                    <span class="text-gray-900 font-medium">{{ number_format($progress, 0) }}%</span>
                  </div>
                  <div class="overflow-hidden h-2 bg-gray-200 rounded">
                    <div class="h-full bg-blue-600 rounded" style="width: {{ $progress }}%"></div>
                  </div>
                </div>
  
                <div class="flex justify-between items-center mb-4">
                  <div>
                    <p class="text-sm text-gray-500">Terkumpul</p>
                    <p class="text-lg font-bold text-gray-900">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</p>
                  </div>
                  <div class="text-right">
                    <p class="text-sm text-gray-500">Target</p>
                    <p class="text-lg font-bold text-gray-900">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                  </div>
                </div>
  
                <a href="#" class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                  Baca Selengkapnya
                </a>
              </div>
            </div>
          @endforeach
        </div>
  
        <div class="text-center mt-8">
          <a href="#" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg hover:bg-gray-800 transition duration-300">
            Lihat Semua Bantuan
          </a>
        </div>
      </div>
    </div>
  </x-layout>
  