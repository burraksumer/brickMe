<x-welcome-layout>
    <div class="w-full bg-[#1E2127] min-h-screen">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center py-24">
                <div class="w-full max-w-md">
                    <!-- Session Status -->
                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')"
                    />

                    <div class="p-8 bg-[#1A1D24] rounded-lg shadow-2xl ring-1 ring-gray-900/10">
                        <h2 class="mb-6 text-2xl font-bold text-center text-gray-100">Log in to your account</h2>

                        <form
                            method="POST"
                            action="{{ route('login') }}"
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
                                    autocomplete="username"
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('email')"
                                />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label
                                    class=""
                                    for="password"
                                    :value="__('Password')"
                                />
                                <x-text-input
                                    class="block mt-1 w-full"
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('password')"
                                />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label
                                    class="inline-flex items-center"
                                    for="remember_me"
                                >
                                    <input
                                        class="bg-gray-700 rounded border-transparent text-gold-400 focus:ring-1 focus:ring-gold-400/10 focus:border-transparent"
                                        id="remember_me"
                                        name="remember"
                                        type="checkbox"
                                    >
                                    <span class="text-sm text-gray-400 ms-2">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                @if (Route::has('password.request'))
                                    <a
                                        class="text-sm text-gray-400 hover:text-gray-300"
                                        href="{{ route('password.request') }}"
                                    >
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <button
                                    class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                    type="submit"
                                >
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-welcome-layout>
