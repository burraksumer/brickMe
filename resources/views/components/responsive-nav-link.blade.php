@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-gold-400 text-start text-base font-medium text-gray-100 bg-[#1A1D24] focus:outline-none focus:text-gray-100 focus:bg-[#1A1D24] focus:border-gold-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-400 hover:text-gray-300 hover:bg-[#1A1D24] hover:border-gray-700 focus:outline-none focus:text-gray-300 focus:bg-[#1A1D24] focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
