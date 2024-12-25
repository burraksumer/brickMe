<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="description"
        content="Create unique, personalized Lego-style avatars from your photos. Perfect for social media, gaming profiles, or just for fun!"
    >

    <meta
        property="og:title"
        content="{{ config('app.name') }} - Lego Style Avatars"
    >
    <meta
        property="og:description"
        content="Create unique, personalized Lego-style avatars from your photos. Perfect for social media, gaming profiles, or just for fun!"
    >
    <meta
        property="og:type"
        content="website"
    >
    <meta
        property="og:url"
        content="{{ url()->current() }}"
    >
    <meta
        property="og:image"
        content="{{ asset('img/logo.svg') }}"
    >

    <title>{{ config('app.name') }} - Lego Style Avatars</title>

    <!-- Favicons -->
    <link
        href="{{ asset('img/favicons/apple-touch-icon.png') }}"
        rel="apple-touch-icon"
        sizes="180x180"
    >
    <link
        type="image/svg+xml"
        href="{{ asset('img/favicons/favicon.svg') }}"
        rel="icon"
        sizes="32x32"
    >

    <link
        type="image/x-icon"
        href="{{ asset('img/favicons/favicon.ico') }}"
        rel="shortcut icon"
    >

    <link
        href="{{ asset('img/favicons/site.webmanifest') }}"
        rel="manifest"
    >
    <meta
        name="theme-color"
        content="#1E2127"
    >

    <link
        href="https://fonts.bunny.net"
        rel="preconnect"
    >
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        type="image/x-icon"
        href="{{ asset('img/favicons/favicon.ico') }}"
        rel="shortcut icon"
    >
    <script
        defer
        src="https://umami.mulayim.app/script.js"
        data-website-id="c6b834bd-03f3-4ff4-b7ef-eeb44188210a"
    ></script>
    @lemonJS
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="relative">
        {{ $slot }}
    </main>
    <x-footer />
    <x-cookie-banner />
</body>

</html>
