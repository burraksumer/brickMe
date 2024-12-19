@props(['disabled' => false])

<input
    {{ $attributes->merge(['class' => 'text-gray-100 bg-gray-700 border-transparent rounded-md shadow-sm focus:border-gold-400 focus:ring-1 focus:ring-gold-400/10']) }}
    @disabled($disabled)
>
