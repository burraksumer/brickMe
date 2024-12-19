<div class="w-full bg-gold-400">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="py-24">
            <!-- Section Header -->
            <div class="mb-24 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-[#1E2127] sm:text-4xl">
                    Try It For Free
                </h2>
                <p class="mt-4 text-lg text-gray-800">
                    Get your first LEGO avatar completely free, no credit card required
                </p>
            </div>

            <!-- Showcase Grid -->
            <div class="grid grid-cols-1 gap-16 mt-20 lg:grid-cols-2">
                <!-- Before & After -->
                <div class="flex flex-col items-center space-y-6">
                    <h3 class="text-2xl font-semibold text-center text-[#1E2127]">Before & After</h3>
                    <p class="text-center text-gray-800">See how our AI transforms your photos into LEGO masterpieces.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-4 w-full max-w-lg">
                        <div class="overflow-hidden w-full rounded-xl shadow-lg aspect-square">
                            <x-responsive-image
                                class="object-cover w-full h-full"
                                src="img/example/before1.jpg"
                                alt="Original photo"
                            />
                        </div>
                        <div class="overflow-hidden w-full rounded-xl shadow-lg aspect-square">
                            <x-responsive-image
                                class="object-cover w-full h-full"
                                src="img/example/after1.jpg"
                                alt="LEGO avatar"
                            />
                        </div>
                    </div>
                </div>

                <!-- Example Results -->
                <div class="flex flex-col items-center space-y-6">
                    <h3 class="text-2xl font-semibold text-center text-[#1E2127]">Example Results</h3>
                    <p class="text-center text-gray-800">High-quality LEGO avatars for any occasion.</p>
                    <div class="grid grid-cols-2 gap-4 mt-4 w-full max-w-lg">
                        <div class="overflow-hidden w-full rounded-xl shadow-lg aspect-square">
                            <x-responsive-image
                                class="object-cover w-full h-full"
                                src="img/example/example1.jpg"
                                alt="LEGO avatar example 1"
                            />
                        </div>
                        <div class="overflow-hidden w-full rounded-xl shadow-lg aspect-square">
                            <x-responsive-image
                                class="object-cover w-full h-full"
                                src="img/example/example2.jpg"
                                alt="LEGO avatar example 2"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-20 text-center">
                <div class="inline-flex flex-col items-center">
                    <a
                        class="inline-block px-8 py-3 text-lg font-semibold text-gray-100 rounded-md shadow-sm bg-[#1E2127] hover:bg-gray-800"
                        href="{{ route('register') }}"
                    >
                        Create Your Free Avatar
                    </a>
                    <p class="mt-3 text-sm text-gray-700">No credit card required</p>
                </div>
            </div>
        </div>
    </div>
</div>
