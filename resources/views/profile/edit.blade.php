<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 bg-[#1A1D24] shadow-2xl ring-1 ring-gray-900/10 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-[#1A1D24] shadow-2xl ring-1 ring-gray-900/10 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-[#1A1D24] shadow-2xl ring-1 ring-gray-900/10 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
