
<aside class="fixed left-0 flex flex-col h-[calc(100vh-64px)] px-2 lg:px-5 py-8 overflow-y-auto bg-white w-16 lg:w-64 transition-all duration-300 border-r">
    <div class="flex flex-col flex-1">
        <nav class="flex-1 space-y-2">
            <div class="space-y-3">
                <label class="px-3 text-xs text-gray-500 uppercase dark:text-gray-400 hidden lg:block">Altruh</label>

                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Dashboard</span>
                </a>
            </div>

            <div class="space-y-2">
                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('profile.show') }}">
                    <i class="fa-solid fa-user-pen"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Edit Profile</span>
                </a>
            </div>

            <div class="space-y-2">
                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('history') }}">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Riwayat</span>
                </a>
            </div>

            <div class="space-y-2">
                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('my-campaigns') }}">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Campaign Saya</span>
                </a>
            </div>

            <div class="space-y-2">
                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('verification') }}">
                    <i class="fa-solid fa-id-card"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Verifikasi Identitas</span>
                </a>
            </div>

            <div class="space-y-2">
                <a class="flex items-center px-3 py-3 text-gray-600 transition-colors duration-300 transform rounded-lg hover:bg-gray-100 justify-center lg:justify-start" href="{{ route('chat') }}">
                    <i class="fa-solid fa-message"></i>
                    <span class="mx-2 text-sm font-medium hidden lg:block">Chat</span>
                </a>
            </div>
        </nav>
    </div>
</aside>

