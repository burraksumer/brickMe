<div class="w-full bg-[#1E2127]">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-24">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-100 sm:text-4xl">
                    Simple, transparent pricing
                </h2>
                <p class="mt-4 text-lg text-gray-300">
                    Choose the package that best fits your creative needs.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-16 lg:grid-cols-3">
                <!-- Mini Maker -->
                <div class="flex flex-col p-8 h-full rounded-xl bg-white/5">
                    <div class="flex-grow">
                        <h3 class="text-2xl font-semibold text-gray-100">Mini Maker</h3>
                        <p class="mt-4 text-gray-300">Perfect for trying out our service</p>
                        <p class="mt-8">
                            <span class="text-4xl font-bold text-gray-100">$5</span>
                        </p>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">15 credits to generate Lego figures</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">High quality LEGO avatars</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">Save all your generated avatars</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a
                            class="block px-8 py-3 w-full text-base font-semibold text-center text-gray-900 rounded-md bg-gold-400 hover:bg-gold-300"
                            href="{{ auth()->check() ? route('checkout.mini-maker') : route('register') }}"
                        >
                            {{ auth()->check() ? 'Buy Now' : 'Register to Buy' }}
                        </a>
                    </div>
                </div>

                <!-- Starter (Popular) -->
                <div class="flex overflow-hidden relative flex-col p-8 h-full rounded-xl bg-white/5">
                    <div class="absolute top-6 -right-11 w-40 transform rotate-45">
                        <div class="py-1 w-full text-sm font-medium text-center text-gray-900 bg-gold-400">
                            Popular
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-2xl font-semibold text-gray-100">Starter</h3>
                        <p class="mt-4 text-gray-300">Perfect for getting started</p>
                        <p class="mt-8">
                            <span class="text-4xl font-bold text-gray-100">$9</span>
                        </p>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">35 credits to generate Lego figures</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">High quality LEGO avatars</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">Save all your generated avatars</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a
                            class="block px-8 py-3 w-full text-base font-semibold text-center text-gray-900 rounded-md bg-gold-400 hover:bg-gold-300"
                            href="{{ auth()->check() ? route('checkout.starter') : route('register') }}"
                        >
                            {{ auth()->check() ? 'Buy Now' : 'Register to Buy' }}
                        </a>
                    </div>
                </div>

                <!-- Pro -->
                <div class="flex flex-col p-8 h-full rounded-xl bg-white/5">
                    <div class="flex-grow">
                        <h3 class="text-2xl font-semibold text-gray-100">Pro</h3>
                        <p class="mt-4 text-gray-300">Best value for pros</p>
                        <p class="mt-8">
                            <span class="text-4xl font-bold text-gray-100">$29</span>
                        </p>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">150 credits to generate Lego figures</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">High quality LEGO avatars</span>
                            </li>
                            <li class="flex items-center text-gray-300">
                                <div class="flex-shrink-0 p-1.5 rounded-lg bg-gold-400">
                                    <svg
                                        class="w-5 h-5 text-gray-900"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <span class="ml-3">Best value per avatar (only $0.19 each)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8">
                        <a
                            class="block px-8 py-3 w-full text-base font-semibold text-center text-gray-900 rounded-md bg-gold-400 hover:bg-gold-300"
                            href="{{ auth()->check() ? route('checkout.pro') : route('register') }}"
                        >
                            {{ auth()->check() ? 'Buy Now' : 'Register to Buy' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
