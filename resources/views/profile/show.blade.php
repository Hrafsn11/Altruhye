<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg">
                     @livewire('profile.two-factor-authentication-form')
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="p-4 sm:p-8 bg-white shadow-lg rounded-lg">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
