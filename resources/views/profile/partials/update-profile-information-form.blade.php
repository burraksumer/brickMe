<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form
        id="send-verification"
        method="post"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>

    <form
        class="mt-6 space-y-6"
        method="post"
        action="{{ route('profile.update') }}"
    >
        @csrf
        @method('patch')

        <div>
            <x-input-label
                class=""
                for="name"
                :value="__('Name')"
            />
            <x-text-input
                class="block mt-1 w-full"
                id="name"
                name="name"
                type="text"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />
        </div>

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
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-400">
                        {{ __('Your email address is unverified.') }}

                        <button
                            class="text-sm text-gray-400 underline rounded-md hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-400 dark:focus:ring-offset-gray-800"
                            form="send-verification"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex gap-4 items-center">
            <button
                class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                type="submit"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    class="text-sm text-gray-400"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
