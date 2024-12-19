<x-legal-layout>
    <h1 class="text-3xl font-bold text-gray-100">Privacy Policy</h1>

    <div class="mt-8 space-y-6 text-gray-300">
        <section>
            <h2 class="text-xl font-semibold text-gray-100">1. Information We Collect</h2>
            <p class="mt-4">When you use {{ config('app.name') }}, we collect:</p>
            <ul class="mt-2 ml-6 list-disc">
                <li>Email address for account creation</li>
                <li>Photos you upload for avatar generation</li>
                <li>Generated LEGO-style avatars</li>
                <li>Payment information (processed securely by our payment provider)</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-100">2. How We Use Your Information</h2>
            <p class="mt-4">We use your information to:</p>
            <ul class="mt-2 ml-6 list-disc">
                <li>Generate LEGO-style avatars from your photos</li>
                <li>Process your payments</li>
                <li>Send important account notifications</li>
                <li>Improve our avatar generation service</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-100">3. Data Storage</h2>
            <p class="mt-4">Your uploaded photos are:</p>
            <ul class="mt-2 ml-6 list-disc">
                <li>Processed securely on our servers</li>
                <li>Never shared with third parties</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-100">4. Your Rights</h2>
            <p class="mt-4">You have the right to:</p>
            <ul class="mt-2 ml-6 list-disc">
                <li>Access your personal data</li>
                <li>Delete your account and associated data</li>
                <li>Export your generated avatars</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-100">5. Contact Us</h2>
            <p class="mt-4">For privacy-related questions, please contact us at:</p>
            <p class="mt-2">burak@mulayim.app</p>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-100">6. Updates to This Policy</h2>
            <p class="mt-4">We may update this privacy policy from time to time. We will notify you of any changes by
                posting the new policy on this page.</p>
            <p class="mt-2">Last updated: {{ date('F j, Y') }}</p>
        </section>
    </div>
</x-legal-layout>
