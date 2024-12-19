<nav
    class="bg-[#1E2127]"
    x-data="{ open: false }"
>
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="/">
                        <x-application-logo class="block w-auto h-9 text-gray-200 fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        <x-nav-link
                            :href="route('dashboard')"
                            :active="request()->routeIs('dashboard')"
                        >
                            {{ __('Create Lego Avatar') }}
                        </x-nav-link>
                        <x-nav-link
                            :href="route('avatar.gallery')"
                            :active="request()->routeIs('avatar.gallery')"
                        >
                            {{ __('My Avatars') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown
                        align="right"
                        width="48"
                    >
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-400 rounded-md transition duration-150 ease-in-out hover:text-gray-300 focus:outline-none"
                            >
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg
                                        class="w-4 h-4 fill-current"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                >
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a
                            class="text-base font-semibold text-gray-400 hover:text-gray-300"
                            href="{{ route('login') }}"
                        >
                            Log in
                        </a>
                        <a
                            class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                            href="{{ route('register') }}"
                        >
                            Register
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button
                    class="inline-flex justify-center items-center p-2 text-gray-400 rounded-md transition duration-150 ease-in-out hover:text-gray-300 hover:bg-[#1A1D24] focus:outline-none focus:bg-[#1A1D24] focus:text-gray-300"
                    @click="open = ! open"
                >
                    <svg
                        class="w-6 h-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            class="inline-flex"
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            class="hidden"
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        class="hidden sm:hidden"
        :class="{ 'block': open, 'hidden': !open }"
    >
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                >
                    {{ __('Create Lego Avatar') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link
                    :href="route('avatar.gallery')"
                    :active="request()->routeIs('avatar.gallery')"
                >
                    {{ __('My Avatars') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link
                        :href="route('profile.edit')"
                        :active="request()->routeIs('profile.edit')"
                    >
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf
                        <x-responsive-nav-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link
                    class="font-medium text-gold-400"
                    :href="route('register')"
                >
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
