import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gold: {
                    50: '#ffffe7',
                    100: '#feffc1',
                    200: '#fffd86',
                    300: '#fff441',
                    400: '#ffe60d',
                    500: '#ffd700',
                    600: '#d19e00',
                    700: '#a67102',
                    800: '#89580a',
                    900: '#74480f',
                    950: '#442604',
                },
            },
        },
    },

    plugins: [forms],
};
