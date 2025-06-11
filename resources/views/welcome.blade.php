<x-layout>
  {{-- HEADER --}}
  <header class="px-6 lg:px-8 py-32 md:py-40 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-b-3xl overflow-hidden">
      <div class="flex flex-col md:flex-row items-center justify-between">
          <div class="md:w-1/2">
              <h2 class="text-blue-700 text-lg font-semibold tracking-wide uppercase mb-2">Berbagi Manfaat Untuk Sesama</h2>
              <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">Setiap bantuanmu <span class="text-amber-600">pasti bermanfaat</span></h1>
              <p class="text-gray-700 mt-4 text-lg leading-relaxed">Galang dana dan donasi online kini semakin mudah dilakukan dimanapun dan kapanpun.</p>
              <a href="#campaigns" class="inline-block bg-amber-500 text-white px-8 py-4 rounded-full mt-8 text-lg font-semibold shadow-lg transition-all duration-300 hover:bg-amber-600 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-opacity-75">Donasi Sekarang</a>
              <p class="text-gray-700 mt-10 text-base font-semibold">Download Aplikasi Altruh</p>
              <div class="flex space-x-4 mt-2">
                  <img alt="Google Play Store" class="h-12 cursor-pointer transform transition-all duration-300 hover:scale-110"
                       src="https://cdn.worldvectorlogo.com/logos/google-play-badge-2022-2.svg" />
                  <img alt="Apple App Store" class="h-12 transform transition-all duration-300 hover:scale-110"
                       src="https://cdn.worldvectorlogo.com/logos/available-on-the-app-store-1.svg" />
              </div>
          </div>
          <div class="md:w-1/2 flex flex-wrap justify-center mt-6 md:mt-0">
              <div class="w-full md:w-1/2 p-2">
                  <img alt="Smiling child pointing" loading="lazy"
                       class="w-full h-auto object-cover rounded-2xl shadow-xl transform transition-all duration-300 hover:scale-105"
                       src="https://storage.googleapis.com/a1aa/image/DCMLURoZWZ0u71HEaoYyG6FToxGvjmqc9p8OcqdI_dQ.jpg" />
              </div>
              <div class="w-full md:w-1/2 p-2">
                  <img alt="Group of children smiling and pointing" loading="lazy"
                       class="w-full h-auto object-cover rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105"
                       src="https://storage.googleapis.com/a1aa/image/o6W64-h6PdpUbad9TPXwXSnGv5p3p1TLAsocvgo8SjU.jpg" />
              </div>
          </div>
      </div>
  </header>

  {{-- FITUR UTAMA --}}
  <div class="bg-white py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto pt-12">
          <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Apa yang bisa kamu lakukan di Altruh?</h2>
          <div class="grid grid-cols-1 gap-8 md:grid-cols-3 mt-10">
              {{-- Bantuan Uang --}}
              <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                  <div class="p-6">
                      <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Uang</h3>
                      <p class="text-gray-600">Salurkan bantuan finansial Anda untuk membantu mereka yang membutuhkan.
                          Setiap rupiah yang Anda berikan akan membuat perubahan berarti.</p>
                  </div>
              </div>

              {{-- Bantuan Barang --}}
              <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                  <div class="p-6">
                      <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                          <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                              viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                          </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Barang</h3>
                      <p class="text-gray-600">Donasikan barang-barang yang masih layak pakai untuk membantu sesama.
                          Dari pakaian hingga buku, semuanya bermanfaat.</p>
                  </div>
              </div>

              {{-- Bantuan Curhat --}}
              <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                  <div class="p-6">
                      <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                              viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                          </svg>
                      </div>
                      <h3 class="text-xl font-semibold text-gray-900 mb-2">Bantuan Curhat</h3>
                      <p class="text-gray-600">Dapatkan dukungan moral dan konseling dari para relawan kami. Kami siap
                          mendengarkan dan membantu Anda melewati masa sulit.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  {{-- KAMPANYE TERKINI --}}
  <div id="campaigns" class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Bantuan Terkini</h2>
        @php
            $activeCampaigns = $campaigns->where('status', 'active');
        @endphp
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
          @forelse ($activeCampaigns as $campaign)
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-200/80">
              <div class="relative">
                  <img class="w-full h-48 object-cover" loading="lazy" src="{{ asset('storage/' . $campaign->gambar) }}"
                       alt="{{ $campaign->title }}">
                  <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-amber-700 shadow-sm">
                      {{ ucfirst($campaign->category) }}
                  </div>
              </div>

              <div class="p-5">
                  <!-- Tanggal -->
                  <div class="flex items-center text-xs text-gray-500 mb-3">
                      <svg class="h-4 w-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                      {{ $campaign->created_at->translatedFormat('d F Y') }}
                  </div>

                  <!-- Judul -->
                  <h2 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 min-h-[3.5rem]">
                      {{ $campaign->title }}
                  </h2>
                  <!-- Deskripsi -->
                  <p class="text-sm text-gray-600 mb-4 line-clamp-3 min-h-[4.5rem]">
                      {{ Str::limit($campaign->description, 150) }}
                  </p>

                  <!-- Progres -->
                  @php
                      $progress = $campaign->progressPercent();
                  @endphp
                  <div class="mb-4">
                      <div class="flex justify-between text-xs mb-1 text-gray-600">
                          <span class="font-medium">Progress</span>
                          <span class="font-semibold text-amber-600">{{ number_format($progress) }}%</span>
                      </div>
                      <div class="w-full h-2.5 bg-gray-200 rounded-full">
                          <div class="h-2.5 rounded-full bg-gradient-to-r from-amber-400 to-amber-600" style="width: {{ $progress }}%"></div>
                      </div>
                  </div>

                  <!-- Terkumpul dan Target -->
                  <div class="flex justify-between text-sm text-gray-700 mb-4">
                      <div>
                          <p class="text-xs text-gray-500">Terkumpul</p>
                          <p class="font-bold text-amber-600">{{ $campaign->displayCollected() }}</p>
                      </div>
                      <div class="text-right">
                          <p class="text-xs text-gray-500">Target</p>
                          <p class="font-semibold">{{ $campaign->displayTarget() }}</p>
                      </div>
                  </div>

                  <!-- Penggalang -->
                  <div class="flex items-center gap-3 border-t pt-4 mt-4">
                      <img class="h-8 w-8 rounded-full object-cover"
                           src="{{ $campaign->user ? ($campaign->user->profile_photo_url ?? asset('images/anonymous.png')) : asset('images/anonymous.png') }}"
                           alt="{{ $campaign->user->name ?? 'Admin' }}">
                      <div class="text-sm">
                          <p class="font-medium text-gray-800">{{ $campaign->user->name ?? 'Admin' }}</p>
                          <p class="text-xs text-gray-500">Penggalang Dana</p>
                      </div>
                  </div>

                  <!-- Tombol -->
                  <a href="{{ route('campaigns.show', $campaign->id) }}"
                     class="block mt-5 w-full text-center bg-amber-500 text-white text-sm font-medium py-2 rounded-lg hover:bg-amber-600 transition">
                      Donasi Sekarang
                  </a>
              </div>
          </div>
      @empty
          <div class="col-span-full text-center text-gray-500 text-sm">
              Tidak ada kampanye donasi untuk saat ini.
          </div>
      @endforelse
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('campaigns.index') }}"
               class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg hover:bg-gray-800 transition duration-300">
                Lihat Semua Bantuan
            </a>
        </div>
    </div>
  </div>

<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
  <div class="max-w-7xl mx-auto text-center bg-gradient-to-br from-amber-50 via-amber-100 to-orange-100 rounded-lg p-8 shadow-lg">
    <h2 class="text-2xl font-bold text-gray-900 mb-8">Altruh dalam Angka</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
      <div>
        <p class="text-4xl font-extrabold text-blue-600">Rp 520 Juta</p>
        <p class="mt-2 text-gray-600">Total Donasi Terkumpul</p>
      </div>
      <div>
        <p class="text-4xl font-extrabold text-green-600">1.200+</p>
        <p class="mt-2 text-gray-600">Campaign Terbantu</p>
      </div>
      <div>
        <p class="text-4xl font-extrabold text-purple-600">3.500+</p>
        <p class="mt-2 text-gray-600">Donatur Berpartisipasi</p>
      </div>
    </div>
  </div>
</section>

<section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-12">Cerita Mereka, Bukti Nyata</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
        <img class="h-20 w-20 mx-auto rounded-full mb-4 object-cover ring-2 ring-amber-300 ring-offset-2" src="https://randomuser.me/api/portraits/women/12.jpg" alt="Ayu" loading="lazy">
        <p class="italic text-gray-700">"Anakku sempat tidak bisa sekolah karena biaya. Berkat Altruh, kami dapat bantuan dengan cepat. Terima kasih untuk semua donatur."</p>
        <p class="mt-4 font-semibold text-gray-900">Ayu – Ibu Rumah Tangga, Bandung</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
        <img class="h-20 w-20 mx-auto rounded-full mb-4 object-cover ring-2 ring-blue-300 ring-offset-2" src="https://randomuser.me/api/portraits/men/68.jpg" alt="Fajar" loading="lazy">
        <p class="italic text-gray-700">"Saya ikut membantu kampanye pengobatan adik kecil. Rasanya luar biasa bisa menolong walau sedikit."</p>
        <p class="mt-4 font-semibold text-gray-900">Fajar – Mahasiswa, Yogyakarta</p>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
        <img class="h-20 w-20 mx-auto rounded-full mb-4 object-cover ring-2 ring-purple-300 ring-offset-2" src="https://randomuser.me/api/portraits/women/47.jpg" alt="Dewi" loading="lazy">
        <p class="italic text-gray-700">"Saat merasa sendiri, saya coba fitur dukungan emosional. Rasanya seperti ngobrol dengan teman lama. Terima kasih Altruh."</p>
        <p class="mt-4 font-semibold text-gray-900">Dewi – Guru SD, Surabaya</p>
      </div>

    </div>
  </div>
</section>

<section class="bg-white py-20 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
  <div class="max-w-4xl mx-auto">
    <h2 class="text-4xl font-bold text-center text-amber-400 mb-12">Pertanyaan Umum</h2>

    <div class="space-y-4">
      <!-- FAQ Item -->
      <div class="bg-white border-l-4 border-amber-300 rounded-md shadow p-5">
        <button onclick="toggleFaq(0)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-amber-500 text-lg">Apakah saya harus login untuk berdonasi?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-0">
          Tidak. Anda bisa berdonasi tanpa login. Namun, jika ingin menyimpan riwayat dan mendapatkan notifikasi, kami sarankan untuk login.
        </div>
      </div>

      <div class="bg-white border-l-4 border-amber-300 rounded-md shadow p-5">
        <button onclick="toggleFaq(1)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-amber-500 text-lg">Bagaimana saya tahu donasi saya digunakan dengan benar?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-1">
          Kami menyediakan pembaruan langsung di setiap kampanye serta laporan transparan dari penggalang bantuan.
        </div>
      </div>

      <div class="bg-white border-l-4 border-amber-300 rounded-md shadow p-5">
        <button onclick="toggleFaq(2)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-amber-500 text-lg">Apakah bisa membantu selain dengan uang?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-2">
          Tentu! Anda bisa menyumbang barang atau memberikan dukungan emosional melalui fitur chat kami.
        </div>
      </div>

      <div class="bg-white border-l-4 border-amber-300 rounded-md shadow p-5">
        <button onclick="toggleFaq(3)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-amber-500 text-lg">Bagaimana cara membuat kampanye bantuan?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-3">
          Setelah login dan verifikasi identitas, Anda bisa langsung membuat kampanye melalui halaman Galang Bantuan.
        </div>
      </div>

    </div>
  </div>

  <script>
    function toggleFaq(index) {
      const content = document.getElementById('faq-' + index);
      const icon = document.getElementById('icon-' + index);

      content.classList.toggle('hidden');
      icon.classList.toggle('rotate-180');
    }
  </script>
</section>

<section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-2xl font-bold text-gray-900 mb-12">Keamanan & Kepercayaan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">

      <div class="flex flex-col items-center">
        {{-- Mengganti gambar dengan SVG atau ikon jika memungkinkan untuk konsistensi --}}
        {{-- Contoh menggunakan ikon heroicons (membutuhkan instalasi @heroicons/react atau serupa) --}}
        {{-- Jika tidak menggunakan library ikon, pertimbangkan menggunakan gambar yang konsisten atau SVG inline --}}
        <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.003 12.003 0 002 12c0 2.514.806 4.852 2.198 6.823A12.003 12.003 0 0012 22c2.514 0 4.852-.806 6.823-2.198A12.003 12.003 0 0022 12c0-2.514-.806-4.852-2.198-6.823z"></path>
        </svg>
        {{-- <img src="https://static.vecteezy.com/system/resources/previews/011/015/345/non_2x/security-concept-secure-information-3d-render-personal-data-free-png.png" class="w-20 h-20 mb-4" alt="Secure"> --}}
        <p class="font-semibold text-gray-800">Transaksi Aman</p>
        <p class="text-sm text-gray-600 mt-2">Kami menggunakan enkripsi dan sistem pembayaran terpercaya.</p>
      </div>

      <div class="flex flex-col items-center">
        <svg class="w-16 h-16 text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.003 12.003 0 002 12c0 2.514.806 4.852 2.198 6.823A12.003 12.003 0 0012 22c2.514 0 4.852-.806 6.823-2.198A12.003 12.003 0 0022 12c0-2.514-.806-4.852-2.198-6.823z"></path>
        </svg>
        {{-- <img src="https://static.vecteezy.com/system/resources/previews/029/896/118/non_2x/3d-social-media-blue-verified-free-png.png" class="w-16 h-16 mb-4" alt="Verified"> --}}
        <p class="font-semibold text-gray-800">Akun Terverifikasi</p>
        <p class="text-sm text-gray-600 mt-2">Semua penggalang bantuan diverifikasi sebelum kampanye tayang.</p>
      </div>

      <div class="flex flex-col items-center">
        <svg class="w-16 h-16 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4H5.07c.546 0 1.07-.11 1.555-.318A13.953 13.953 0 0112 21c2.649 0 5.195-.673 7.425-1.988.485.208 1.009.318 1.555.318h1.868c.334 0 .606-.27.606-.604V14.56a.604.604 0 00-.606-.604h-1.868c-.546 0-1.07.11-1.555.318A13.953 13.953 0 0112 17c-2.649 0-5.195-.673-7.425-1.988-.485.208-1.009.318-1.555.318H2.606a.604.604 0 00-.606.604v5.836c0 .334.272.604.606.604h1.868zM12 3a9 9 0 100 18 9 9 0 000-18z"></path>
        </svg>
        {{-- <img src="https://static.vecteezy.com/system/resources/thumbnails/028/293/896/small_2x/five-star-ratting-icon-3d-render-illustration-png.png" class="w-16 h-16 mb-4" alt="Report"> --}}
        <p class="font-semibold text-gray-800">Pelaporan Mudah</p>
        <p class="text-sm text-gray-600 mt-2">Pengguna dapat melaporkan kampanye mencurigakan kapan saja.</p>
      </div>

    </div>
  </div>
</section>


<x-footer></x-footer>

</x-layout>
