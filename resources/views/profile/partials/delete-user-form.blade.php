<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        class="px-8 py-3 text-base font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete Account') }}
    </button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            class="p-6"
            method="post"
            action="{{ route('profile.destroy') }}"
        >
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label
                    class="text-gray-700 dark:text-gray-300"
                    for="password"
                    :value="__('Password')"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error
                    class="mt-2"
                    :messages="$errors->userDeletion->get('password')"
                />
            </div>

            <div class="flex gap-4 justify-end items-center mt-6">
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-gray-300"
                    type="button"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('Cancel') }}
                </button>

                <button
                    class="px-8 py-3 text-base font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500"
                    type="submit"
                >
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
