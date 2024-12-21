<x-welcome-layout>
    <div class="w-full bg-[#1E2127] min-h-screen">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center py-24">
                <div class="w-full max-w-md">
                    <div class="p-8 bg-[#1A1D24] rounded-lg shadow-2xl ring-1 ring-gray-900/10">
                        <h2 class="mb-6 text-2xl font-bold text-center text-gray-100">Create your account</h2>

                        <form
                            method="POST"
                            action="{{ route('register') }}"
                        >
                            @csrf

                            @if (session('error'))
                                <div
                                    class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- Name -->
                            <div>
                                <x-input-label
                                    class="text-gray-300"
                                    for="name"
                                    :value="__('Name')"
                                />
                                <x-text-input
                                    class="block mt-1 w-full"
                                    id="name"
                                    name="name"
                                    type="text"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('name')"
                                />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label
                                    class="text-gray-300"
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
                                    class="text-gray-300"
                                    for="password"
                                    :value="__('Password')"
                                />
                                <x-text-input
                                    class="block mt-1 w-full"
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('password')"
                                />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label
                                    class="text-gray-300"
                                    for="password_confirmation"
                                    :value="__('Confirm Password')"
                                />
                                <x-text-input
                                    class="block mt-1 w-full"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                />
                                <x-input-error
                                    class="mt-2"
                                    :messages="$errors->get('password_confirmation')"
                                />
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <a
                                    class="text-sm text-gray-400 hover:text-gray-300"
                                    href="{{ route('login') }}"
                                >
                                    {{ __('Already have an account?') }}
                                </a>

                                <button
                                    class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                    type="submit"
                                >
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-welcome-layout>
