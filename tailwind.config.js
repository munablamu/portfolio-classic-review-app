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
                },
                'sage': {
                    '50': '#F3F4D8',
                    '100': '#E1E5B2',
                    '200': '#CFD68C',
                    '300': '#BDC766',
                    '400': '#ABB840',
                    '500': '#8A9A5B',
                    '600': '#6E8A30',
                    '700': '#526A20',
                    '800': '#364A10',
                    '900': '#1A2A00',
                }
            }
        },
    },
    variants: {},

    plugins: [forms],
};
