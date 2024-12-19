<div
    class="fixed bottom-0 left-0 right-0 z-50 p-4 bg-[#1E2127] border-t border-white/10"
    x-data="{ show: !localStorage.getItem('cookie-consent') }"
    x-show="show"
    x-transition
>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center space-y-4 md:flex-row md:justify-between md:items-center md:space-y-0">
            <div class="flex-1 text-sm text-center text-gray-300 md:text-left">
                We use cookies to enhance your experience. By continuing to visit this site you agree to our use of
                cookies.
                <a
                    class="underline text-gold-400"
                    href="{{ route('privacy') }}"
                >Learn more</a>
            </div>
            <div class="flex justify-center space-x-4 w-full md:w-auto">
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-900 rounded-md bg-gold-400 hover:bg-gold-300"
                    @click="localStorage.setItem('cookie-consent', '1'); show = false"
                >
                    Accept
                </button>
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-300 rounded-md border border-gray-600 hover:bg-white/5"
                    @click="show = false"
                >
                    Decline
                </button>
            </div>
        </div>
    </div>
</div>
