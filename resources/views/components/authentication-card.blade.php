<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50">
    <div class="mb-6">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-lg mt-6 px-8 py-10 bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 ease-in-out hover:scale-105">
        {{ $slot }}
    </div>
</div>
