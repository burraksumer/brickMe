<div class="w-full bg-[#1E2127]">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center py-24 text-center">
            <div class="flex flex-col-reverse gap-16 items-center lg:flex-row lg:gap-24">
                <div class="flex flex-col items-center max-w-2xl text-center lg:items-center">
                    <h1 class="text-4xl font-bold tracking-tight text-center text-gray-100 sm:text-6xl">
                        Turn Photos into<br>
                        <span class="text-gold-400">LEGO Avatars</span>
                    </h1>

                    <p class="mt-6 text-lg leading-8 text-gray-300">
                        Create unique, personalized Lego-style avatars from your photos. Perfect for social media,
                        gaming
                        profiles, or just for fun!
                    </p>

                    <div class="flex gap-x-6 justify-center items-center mt-10 w-full">
                        @auth
                            <a
                                class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                href="{{ url('/dashboard') }}"
                            >
                                Start Creating
                            </a>
                        @else
                            <a
                                class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                                href="{{ route('register') }}"
                            >
                                Get Started
                            </a>
                            <a
                                class="text-base font-semibold text-gray-400 hover:text-gray-300"
                                href="{{ route('login') }}"
                            >
                                Log in <span aria-hidden="true">→</span>
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="relative w-full max-w-md lg:max-w-lg">
                    <!-- Background glow effect -->
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-r rounded-xl opacity-30 blur from-gold-400 to-gold-300">
                    </div>

                    <!-- Main image -->
                    <div class="relative z-20">
                        <x-responsive-image
                            class="w-full rounded-xl ring-1 shadow-2xl ring-gray-900/10"
                            src="img/example/hero.jpg"
                            alt="Lego Avatar Example"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
