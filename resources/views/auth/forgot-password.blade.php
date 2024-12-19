<x-welcome-layout>
    <div class="w-full bg-[#1E2127] min-h-screen">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center py-24">
                <div class="w-full max-w-md">
                    <div class="p-8 bg-[#1A1D24] rounded-lg shadow-2xl ring-1 ring-gray-900/10">
                        <h2 class="mb-6 text-2xl font-bold text-center text-gray-100">Reset Password</h2>

                        <div class="mb-4 text-sm text-gray-400">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status
                            class="mb-4"
                            :status="session('status')"
                        />

                        <form
                            method="POST"
                            action="{{ route('password.email') }}"
                        >
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label
                                    class=""
                                    for="email"
                                    :value="__('Email')"
                                />
                                <x-text-input
                                    class="block mt-1 w-full"
                                    id="email"
                                    name="email"
                                    type="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('email')"
                                />
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <a
                                    class="text-sm hover:text-gray-300"
                                    href="{{ route('login') }}"
                                >
                                    {{ __('Back to login') }}
                                </a>

                                <button
                                    class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                    type="submit"
                                >
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-welcome-layout>
