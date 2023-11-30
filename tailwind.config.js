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
            backgroundImage: theme => ({
                'top-background': "url('/storage/app/public/top_image.png')",
            }),
            colors: {
                'slate': {
                    '150': '#eaeff5',
                }
            }
        },
    },
    variants: {},

    plugins: [forms],
};
