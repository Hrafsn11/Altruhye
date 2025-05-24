<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="space-y-8">
            @if ($verification->status === 'pending')
                <div class="bg-yellow-100 p-8 rounded-xl border-l-8 border-yellow-500 shadow-lg flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-hourglass-start text-6xl text-yellow-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Data Anda sedang dalam proses verifikasi.</h3>
                        <p class="text-lg text-gray-600 mb-4">Harap tunggu hingga 1x24 jam. Tim kami sedang memeriksa dokumen Anda.</p>
                        <p class="text-sm text-gray-500">Kami akan memberi tahu Anda segera setelah status verifikasi Anda berubah.</p>
                    </div>
                </div>
            @elseif ($verification->status === 'approved')
                <div class="bg-green-100 p-8 rounded-xl border-l-8 border-green-500 shadow-lg flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-check-circle text-6xl text-green-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Verifikasi Anda disetujui!</h3>
                        <p class="text-lg text-gray-600 mb-4">Selamat! Anda sekarang dapat membuat kampanye. Terima kasih atas kesabarannya.</p>
                        <p class="text-sm text-gray-500">Sekarang Anda bisa mulai membuat kampanye dan mendapatkan dukungan dari komunitas.</p>
                    </div>
                </div>
            @elseif ($verification->status === 'rejected')
                <div class="bg-red-100 p-8 rounded-xl border-l-8 border-red-500 shadow-lg flex items-center space-x-6">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-times-circle text-6xl text-red-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Verifikasi Anda ditolak.</h3>
                        <p class="text-lg text-gray-600 mb-4">Kami tidak dapat memverifikasi data Anda pada saat ini. Anda bisa mencoba lagi.</p>
                        <p class="text-sm text-gray-500 mb-4">Periksa kembali dokumen yang Anda kirimkan dan pastikan semuanya benar. Jika Anda yakin ada kesalahan, Anda dapat mengajukan ulang verifikasi.</p>
                        <a href="{{ route('identity_verifications.reapply') }}" class="inline-block bg-amber-600 text-white py-3 px-6 rounded-lg text-lg hover:bg-amber-700 transition duration-200">Ajukan Ulang Verifikasi</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
