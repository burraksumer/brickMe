<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-[#1A1D24] shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-[#1A1D24]">
                    @if ($avatars->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">You haven't created any avatars yet.</p>
                        <a
                            class="inline-block mt-4 text-gold-500 hover:text-gold-400"
                            href="{{ route('dashboard') }}"
                        >
                            Create your first avatar →
                        </a>
                    @else
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($avatars as $avatar)
                                <div class="rounded-lg shadow-lg bg-[#1E2127]">
                                    <div class="p-4">
                                        <div class="relative pb-[75%]">
                                            <img
                                                class="object-cover absolute inset-0 w-full h-full rounded-lg"
                                                src="{{ $avatar['avatar'] }}"
                                                alt="Avatar"
                                            >
                                        </div>
                                        <div class="flex justify-between items-center mt-4">
                                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ \Carbon\Carbon::createFromTimestamp($avatar['created_at'])->diffForHumans() }}
                                            </span>
                                            <div class="flex gap-3">
                                                <a
                                                    class="text-sm text-gold-500 hover:text-gold-400"
                                                    href="{{ $avatar['avatar'] }}"
                                                    download="lego-avatar.png"
                                                >
                                                    Download
                                                </a>
                                                <button
                                                    class="text-sm text-gold-500 hover:text-gold-400"
                                                    x-data=""
                                                    @click="$dispatch('open-modal', 'view-original-{{ $loop->index }}')"
                                                >
                                                    View original
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <x-modal
                                    name="view-original-{{ $loop->index }}"
                                    :show="false"
                                    maxWidth="2xl"
                                >
                                    <div class="flex flex-col bg-[#1A1D24]">
                                        <!-- Header with close button -->
                                        <div class="flex justify-end px-2 pt-4">
                                            <button
                                                class="inline-flex justify-center items-center p-2 text-gold-500 hover:text-gold-400 rounded-full focus:outline-none bg-[#1E2127] hover:bg-[#2A2D32] transition-colors"
                                                type="button"
                                                @click="$dispatch('close-modal', 'view-original-{{ $loop->index }}')"
                                            >
                                                <span class="sr-only">Close</span>
                                                <svg
                                                    class="w-6 h-6"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"
                                                    />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Image container -->
                                        <div class="flex flex-1 justify-center items-center p-4">
                                            <img
                                                class="max-h-[70vh] w-auto rounded-lg"
                                                src="{{ $avatar['original'] }}"
                                                alt="Original photo"
                                            >
                                        </div>
                                    </div>
                                </x-modal>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
