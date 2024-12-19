<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form
        class="mt-6 space-y-6"
        method="post"
        action="{{ route('password.update') }}"
    >
        @csrf
        @method('put')

        <div>
            <x-input-label
                class=""
                for="update_password_current_password"
                :value="__('Current Password')"
            />
            <x-text-input
                class="block mt-1 w-full"
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
            />
            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')"
            />
        </div>

        <div>
            <x-input-label
                class=""
                for="update_password_password"
                :value="__('New Password')"
            />
            <x-text-input
                class="block mt-1 w-full"
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
            />
            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')"
            />
        </div>

        <div>
            <x-input-label
                class=""
                for="update_password_password_confirmation"
                :value="__('Confirm Password')"
            />
            <x-text-input
                class="block mt-1 w-full"
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
            />
            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />
        </div>

        <div class="flex gap-4 items-center">
            <button
                class="px-8 py-3 text-base font-semibold text-gray-900 rounded-md shadow-sm bg-gold-400 hover:bg-gold-300"
                type="submit"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
