<x-layout>
  {{-- HEADER --}}
  <header class="px-8 py-12 bg-gray-100 rounded-lg">
      <div class="flex flex-col md:flex-row items-center justify-between">
          <div class="md:w-1/2">
              <h2 class="text-blue-600 text-lg font-semibold">Berbagi Manfaat Untuk Sesama</h2>
              <h1 class="text-3xl font-bold text-gray-800 mt-2">Setiap bantuanmu pasti bermanfaat</h1>
              <p class="text-gray-600 mt-4">Galang dana dan donasi online kini semakin mudah dilakukan dimanapun dan kapanpun.</p>
              <button class="bg-blue-600 text-white px-6 py-3 rounded-full mt-6 shadow-lg transition-all duration-300 hover:bg-blue-600 hover:scale-105">Donasi Sekarang</button>
              <p class="text-gray-600 mt-4">Download Aplikasi Altruh</p>
              <div class="flex space-x-4 mt-2">
                  <img alt="Google Play Store" class="h-12 transform transition-all duration-300 hover:scale-110"
                       src="https://cdn.worldvectorlogo.com/logos/google-play-badge-2022-2.svg" />
                  <img alt="Apple App Store" class="h-12 transform transition-all duration-300 hover:scale-110"
                       src="https://cdn.worldvectorlogo.com/logos/available-on-the-app-store-1.svg" />
              </div>
          </div>
          <div class="md:w-1/2 flex flex-wrap justify-center mt-6 md:mt-0">
              <div class="w-full md:w-1/2 p-2">
                  <img alt="Smiling child pointing"
                       class="w-full h-auto object-cover rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105"
                       src="https://storage.googleapis.com/a1aa/image/DCMLURoZWZ0u71HEaoYyG6FToxGvjmqc9p8OcqdI_dQ.jpg" />
              </div>
              <div class="w-full md:w-1/2 p-2">
                  <img alt="Group of children smiling and pointing"
                       class="w-full h-auto object-cover rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105"
                       src="https://storage.googleapis.com/a1aa/image/o6W64-h6PdpUbad9TPXwXSnGv5p3p1TLAsocvgo8SjU.jpg" />
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
  <div class="bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Bantuan Terkini</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($campaigns as $campaign)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <a href="{{ route('campaigns.show', $campaign->id) }}">
                            <img class="w-full h-48 object-cover rounded-t-2xl" src="{{ asset('storage/' . $campaign->gambar) }}"
                                 alt="{{ $campaign->title }}">
                        </a>
                        
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $campaign->created_at->translatedFormat('d F Y') }}
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $campaign->title }}</h3>

                        <div class="flex items-center mb-4">
                            <img class="h-8 w-8 rounded-full mr-2"
                                 src="{{ $campaign->user->profile_photo_url ?? asset('storage/images/anonymous.png') }}"
                                 alt="{{ $campaign->user->name }}">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $campaign->user->name ?? 'Anonim' }}</p>
                                <p class="text-xs text-gray-500">Penggalang Dana</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            @php
                                $progress = $campaign->progressPercent();
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
                                <p class="font-semibold text-gray-800">{{ $campaign->displayCollected() }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Target</p>
                                <p class="font-semibold text-gray-800">{{ $campaign->displayTarget() }}</p>
                            </div>
                        </div>

                        <a href="{{ route('campaigns.show', $campaign->id) }}"
                           class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('campaigns.index') }}"
               class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg hover:bg-gray-800 transition duration-300">
                Lihat Semua Bantuan
            </a>
        </div>
    </div>
</div>

<section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
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

<section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-12">Cerita Mereka, Bukti Nyata</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-xl transition">
        <img class="h-20 w-20 mx-auto rounded-full mb-4" src="https://randomuser.me/api/portraits/women/12.jpg" alt="Ayu">
        <p class="italic text-gray-700">"Anakku sempat tidak bisa sekolah karena biaya. Berkat Altruh, kami dapat bantuan dengan cepat. Terima kasih untuk semua donatur."</p>
        <p class="mt-4 font-semibold text-gray-900">Ayu – Ibu Rumah Tangga, Bandung</p>
      </div>

      <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-xl transition">
        <img class="h-20 w-20 mx-auto rounded-full mb-4" src="https://randomuser.me/api/portraits/men/68.jpg" alt="Fajar">
        <p class="italic text-gray-700">"Saya ikut membantu kampanye pengobatan adik kecil. Rasanya luar biasa bisa menolong walau sedikit."</p>
        <p class="mt-4 font-semibold text-gray-900">Fajar – Mahasiswa, Yogyakarta</p>
      </div>

      <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-xl transition">
        <img class="h-20 w-20 mx-auto rounded-full mb-4" src="https://randomuser.me/api/portraits/women/47.jpg" alt="Dewi">
        <p class="italic text-gray-700">"Saat merasa sendiri, saya coba fitur dukungan emosional. Rasanya seperti ngobrol dengan teman lama. Terima kasih Altruh."</p>
        <p class="mt-4 font-semibold text-gray-900">Dewi – Guru SD, Surabaya</p>
      </div>

    </div>
  </div>
</section>

<section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <h2 class="text-4xl font-bold text-center text-indigo-800 mb-12">Pertanyaan Umum</h2>

    <div class="space-y-4">
      <!-- FAQ Item -->
      <div class="bg-white border-l-4 border-indigo-500 rounded-md shadow p-5">
        <button onclick="toggleFaq(0)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-indigo-700 text-lg">Apakah saya harus login untuk berdonasi?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-0">
          Tidak. Anda bisa berdonasi tanpa login. Namun, jika ingin menyimpan riwayat dan mendapatkan notifikasi, kami sarankan untuk login.
        </div>
      </div>

      <div class="bg-white border-l-4 border-indigo-500 rounded-md shadow p-5">
        <button onclick="toggleFaq(1)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-indigo-700 text-lg">Bagaimana saya tahu donasi saya digunakan dengan benar?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-1">
          Kami menyediakan pembaruan langsung di setiap kampanye serta laporan transparan dari penggalang bantuan.
        </div>
      </div>

      <div class="bg-white border-l-4 border-indigo-500 rounded-md shadow p-5">
        <button onclick="toggleFaq(2)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-indigo-700 text-lg">Apakah bisa membantu selain dengan uang?</span>
          <svg class="w-5 h-5 transform transition-transform duration-300" id="icon-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="mt-3 text-gray-700 hidden" id="faq-2">
          Tentu! Anda bisa menyumbang barang atau memberikan dukungan emosional melalui fitur chat kami.
        </div>
      </div>

      <div class="bg-white border-l-4 border-indigo-500 rounded-md shadow p-5">
        <button onclick="toggleFaq(3)" class="w-full text-left flex justify-between items-center">
          <span class="font-semibold text-indigo-700 text-lg">Bagaimana cara membuat kampanye bantuan?</span>
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


<section class="bg-white py-20 px-4 sm:px-6 lg:px-8">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-2xl font-bold text-gray-900 mb-12">Keamanan & Kepercayaan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">

      <div class="flex flex-col items-center">
        <img src="https://static.vecteezy.com/system/resources/previews/011/015/345/non_2x/security-concept-secure-information-3d-render-personal-data-free-png.png" class="w-20 h-20 mb-4" alt="Secure">
        <p class="font-semibold text-gray-800">Transaksi Aman</p>
        <p class="text-sm text-gray-600 mt-2">Kami menggunakan enkripsi dan sistem pembayaran terpercaya.</p>
      </div>

      <div class="flex flex-col items-center">
        <img src="https://static.vecteezy.com/system/resources/previews/029/896/118/non_2x/3d-social-media-blue-verified-free-png.png" class="w-16 h-16 mb-4" alt="Verified">
        <p class="font-semibold text-gray-800">Akun Terverifikasi</p>
        <p class="text-sm text-gray-600 mt-2">Semua penggalang bantuan diverifikasi sebelum kampanye tayang.</p>
      </div>

      <div class="flex flex-col items-center">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/028/293/896/small_2x/five-star-ratting-icon-3d-render-illustration-png.png" class="w-16 h-16 mb-4" alt="Report">
        <p class="font-semibold text-gray-800">Pelaporan Mudah</p>
        <p class="text-sm text-gray-600 mt-2">Pengguna dapat melaporkan kampanye mencurigakan kapan saja.</p>
      </div>

    </div>
  </div>
</section>


<x-footer></x-footer>

</x-layout>
