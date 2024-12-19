@props(['src', 'alt', 'class' => ''])

@php
    $webpSrc = str_replace(['.jpg', '.jpeg', '.png'], '.webp', $src);
@endphp

<picture>
    <source
        srcset="{{ asset($webpSrc) }}"
        type="image/webp"
    >
    <img
        class="{{ $class }}"
        src="{{ asset($src) }}"
        alt="{{ $alt }}"
        loading="lazy"
    >
</picture>
