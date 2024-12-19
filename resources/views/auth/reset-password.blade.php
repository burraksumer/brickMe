<x-welcome-layout>
    <div class="w-full bg-[#1E2127] min-h-screen">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center py-24">
                <div class="w-full max-w-md">
                    <div class="p-8 bg-[#1A1D24] rounded-lg shadow-2xl ring-1 ring-gray-900/10">
                        <h2 class="mb-6 text-2xl font-bold text-center text-gray-100">Reset Password</h2>

                        <form
                            method="POST"
                            action="{{ route('password.store') }}"
                        >
                            @csrf

                            <!-- Password Reset Token -->
                            <input
                                name="token"
                                type="hidden"
                                value="{{ $request->route('token') }}"
                            >

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
                                    :value="old('email', $request->email)"
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
                                    class=""
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
                                    class="text-sm hover:text-gray-300"
                                    href="{{ route('login') }}"
                                >
                                    {{ __('Back to login') }}
                                </a>

                                <button
                                    class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                    type="submit"
                                >
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-welcome-layout>
