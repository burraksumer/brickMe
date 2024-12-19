<x-welcome-layout>
    <div class="w-full bg-[#1E2127] min-h-screen">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center py-24">
                <div class="w-full max-w-md">
                    <div class="p-8 bg-[#1A1D24] rounded-lg shadow-2xl ring-1 ring-gray-900/10">
                        <h2 class="mb-6 text-2xl font-bold text-center text-gray-100">Verify Email</h2>

                        <div class="mb-4 text-sm text-gray-400">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="flex justify-between items-center mt-6">
                            <form
                                method="POST"
                                action="{{ route('verification.send') }}"
                            >
                                @csrf
                                <button
                                    class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                    type="submit"
                                >
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >
                                @csrf
                                <button
                                    class="text-sm text-gray-400 hover:text-gray-300"
                                    type="submit"
                                >
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-welcome-layout>
