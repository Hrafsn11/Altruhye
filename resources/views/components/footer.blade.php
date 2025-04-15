{{-- FOOTER --}}
<footer class="bg-gray-900 text-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-xl font-semibold mb-4">Tentang Altruh</h3>
            <p class="text-sm">Altruh adalah platform donasi digital yang memudahkan siapapun untuk memberikan bantuan secara online, baik berupa uang, barang, maupun dukungan emosional.</p>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Navigasi</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="/" class="hover:underline">Beranda</a></li>
                <li><a href="{{ route('campaigns.index') }}" class="hover:underline">Lihat Kampanye</a></li>
                <li><a href="/galang" class="hover:underline">Galang Bantuan</a></li>
                
            </ul>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Kontak Kami</h3>
            <p class="text-sm mb-2">Email: support@altruh.id</p>
            <p class="text-sm mb-2">Telepon: +62 812 3456 7890</p>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.23 5.924c-.793.353-1.644.59-2.538.697a4.418 4.418 0 001.938-2.433 8.86 8.86 0 01-2.808 1.073A4.404 4.404 0 0015.448 4c-2.445 0-4.424 1.978-4.424 4.423 0 .347.039.684.114 1.008a12.514 12.514 0 01-9.09-4.61 4.423 4.423 0 001.367 5.902 4.39 4.39 0 01-2.004-.553v.056c0 2.17 1.544 3.983 3.595 4.393a4.447 4.447 0 01-2.001.076 4.428 4.428 0 004.132 3.07A8.85 8.85 0 012 19.542a12.49 12.49 0 006.29 1.84c7.547 0 11.675-6.253 11.675-11.675 0-.178-.004-.355-.012-.531A8.353 8.353 0 0024 4.59a8.654 8.654 0 01-2.49.682 4.303 4.303 0 001.923-2.37"></path></svg></a>
                <a href="#" class="hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 2.87 8.15 6.84 9.48.5.09.68-.22.68-.48 0-.24-.01-.87-.01-1.71-2.78.61-3.37-1.34-3.37-1.34-.45-1.14-1.11-1.44-1.11-1.44-.91-.63.07-.62.07-.62 1.01.07 1.54 1.04 1.54 1.04.89 1.53 2.34 1.09 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.26.1-2.62 0 0 .84-.27 2.75 1.02a9.56 9.56 0 015 0c1.91-1.29 2.75-1.02 2.75-1.02.55 1.36.2 2.37.1 2.62.64.7 1.03 1.59 1.03 2.68 0 3.85-2.34 4.7-4.57 4.95.36.31.68.92.68 1.85 0 1.34-.01 2.42-.01 2.75 0 .27.18.58.69.48A10 10 0 0022 12c0-5.5-4.46-9.96-9.96-9.96z"></path></svg></a>
            </div>
        </div>
        <div class="text-center md:text-center">
            <p class="text-white font-semibold mb-2">Temukan kami di:</p>
            <div class="flex items-center justify-center md:justify-end space-x-4">
                <a href="#" target="_blank">
                    <img alt="Google Play Store" class="h-10 hover:scale-105 transition"
                         src="https://cdn.worldvectorlogo.com/logos/google-play-badge-2022-2.svg" />
                </a>
                <a href="#" target="_blank">
                    <img alt="Apple App Store" class="h-10 hover:scale-105 transition"
                         src="https://cdn.worldvectorlogo.com/logos/available-on-the-app-store-1.svg" />
                </a>
            </div>
        </div>
        
    </div>
    <div class="bg-gray-800 text-center py-4 text-sm">
        &copy; {{ date('Y') }} Altruh. Semua hak dilindungi.
    </div>
</footer>
