<x-app-layout>
    <div class="w-full bg-[#1E2127] py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-[#1A1D24] shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-[#1A1D24]">
                    @if (session('error'))
                        <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div
                            class="p-4 mb-6 text-green-700 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-100">
                            Your Credits: <span
                                class="text-gold-500 dark:text-gold-400">{{ auth()->user()->credits }}</span>
                        </h3>
                        <p class="mt-1 text-sm text-gray-300">
                            Each avatar generation costs 1 credit
                        </p>
                    </div>

                    <div
                        class="space-y-6"
                        x-data="imageUpload()"
                    >
                        @if (auth()->user()->credits <= 0)
                            <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                You're out of credits!
                                <a
                                    class="underline hover:text-red-600 dark:hover:text-red-300"
                                    href="{{ route('welcome') }}#pricing"
                                >
                                    Purchase more credits
                                </a>
                                to continue generating avatars.
                            </div>
                        @endif

                        @php
                            $isDisabled = auth()->user()->credits <= 0;
                        @endphp

                        @if (session('error_type') === 'api')
                            <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                {{ session('errors')->first('error') }}
                            </div>
                        @endif

                        @if (session('error_type') === 'credit')
                            <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                {{ session('errors')->first('error') }}
                                <br>
                                <span class="text-sm">Please purchase more credits to continue.</span>
                            </div>
                        @endif

                        <form
                            class="space-y-6"
                            action="{{ route('avatar.generate') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            @submit.prevent="submitForm"
                        >
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-300">
                                    Upload Photo
                                </label>
                                <div
                                    class="flex justify-center px-6 pt-5 pb-6 mt-1 rounded-md border-2 border-gray-300 border-dashed dark:border-gray-700 bg-[#2A2D32] hover:bg-[#3A3D42] transition duration-200"
                                    x-bind:class="{ 'border-gold-500': isDragging }"
                                    @dragover.prevent="isDragging = true"
                                    @dragleave.prevent="isDragging = false"
                                    @drop.prevent="handleDrop($event)"
                                >
                                    <div class="space-y-1 text-center">
                                        <template x-if="!imageUrl">
                                            <svg
                                                class="mx-auto w-12 h-12 text-gray-400"
                                                stroke="currentColor"
                                                fill="none"
                                                viewBox="0 0 48 48"
                                            >
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </template>
                                        <template x-if="imageUrl">
                                            <div class="flex relative justify-center w-full">
                                                <div class="inline-block relative">
                                                    <img
                                                        class="max-h-48 rounded-lg"
                                                        alt="Preview"
                                                        :src="imageUrl"
                                                    >
                                                    <button
                                                        class="absolute -top-2 -right-2 p-1.5 text-white bg-red-600 rounded-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                        type="button"
                                                        @click="removeFile"
                                                    >
                                                        <svg
                                                            class="w-4 h-4"
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
                                            </div>
                                        </template>
                                        <div class="flex justify-center text-sm text-gray-300">
                                            <label
                                                class="relative font-medium rounded-md cursor-pointer text-gold-500 dark:text-gold-400 hover:text-gold-400 focus-within:outline-none"
                                            >
                                                <span>Upload a file</span>
                                                <input
                                                    class="sr-only"
                                                    id="photo"
                                                    name="photo"
                                                    type="file"
                                                    accept="image/*"
                                                    @change="handleFileSelect"
                                                >
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-black uppercase rounded-md border border-transparent transition duration-150 ease-in-out bg-gold-500 hover:bg-gold-400 focus:bg-gold-400 active:bg-gold-600 focus:outline-none focus:ring-2 focus:ring-gold-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-gold-500"
                                    type="submit"
                                    x-bind:disabled="!hasFile || isLoading || {{ $isDisabled ? 'true' : 'false' }}"
                                >
                                    <template x-if="isLoading">
                                        <svg
                                            class="mr-3 -ml-1 w-5 h-5 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <circle
                                                class="opacity-25"
                                                cx="12"
                                                cy="12"
                                                r="10"
                                                stroke="currentColor"
                                                stroke-width="4"
                                            ></circle>
                                            <path
                                                class="opacity-75"
                                                fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                            ></path>
                                        </svg>
                                    </template>
                                    <span x-text="isLoading ? 'Generating...' : 'Generate Avatar'"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    @if (session('avatar'))
                        <div class="grid grid-cols-2 gap-4 mt-8">
                            <div>
                                <h4 class="mb-2 text-lg font-medium text-gray-100">Original Photo</h4>
                                <img
                                    class="rounded-lg"
                                    src="{{ session('original') }}"
                                    alt="Original photo"
                                >
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-medium text-gray-100">Lego Avatar</h4>
                                <img
                                    class="rounded-lg"
                                    src="{{ session('avatar') }}"
                                    alt="Generated avatar"
                                >
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function imageUpload() {
            return {
                isDragging: false,
                imageUrl: null,
                hasFile: false,
                isLoading: false,

                handleFileSelect(event) {
                    const file = event.target.files[0];
                    this.handleFile(file);
                },

                handleDrop(event) {
                    this.isDragging = false;
                    const file = event.dataTransfer.files[0];
                    this.handleFile(file);
                },

                handleFile(file) {
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.imageUrl = e.target.result;
                            this.hasFile = true;
                        };
                        reader.readAsDataURL(file);
                    }
                },

                submitForm(event) {
                    if (this.hasFile && !this.isLoading) {
                        this.isLoading = true;
                        event.target.submit();
                    }
                },

                removeFile() {
                    this.imageUrl = null;
                    this.hasFile = false;
                    document.getElementById('photo').value = '';
                }
            }
        }
    </script>
</x-app-layout>
