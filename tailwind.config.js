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
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
                'Ubuntu': ['Ubuntu'],
                'Lobster': ['Lobster'],
            },
            backgroundImage: theme => ({
                'top-background': "url('/storage/app/public/top_image.png')",
            }),
            colors: {
                'slate': {
                    '125': '#EEF2F7',
                    '150': '#EAEFF5',
                    '175': '#E6ECF3',
                    '250': '#D7DFE9',
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
                },
                'fox': {
                    '50': '#FDF6F0',
                    '100': '#FBECD1',
                    '200': '#F7E1B2',
                    '300': '#F3D693',
                    '400': '#EFCB74',
                    '500': '#C38743',
                    '600': '#A76F34',
                    '700': '#8B5725',
                    '800': '#6F3F16',
                    '900': '#532707',
                },
                'mauve': {
                    '50': '#FDF5F8',
                    '100': '#FBEAF1',
                    '200': '#F7DDEA',
                    '300': '#F3D0E3',
                    '400': '#EFC3DC',
                    '500': '#BB85AB',
                    '600': '#9F6F8C',
                    '700': '#83596D',
                    '800': '#67434E',
                    '900': '#4B2D2F',
                }
            }
        },
    },
    darkMode: 'class', // 'media' or 'class'
    variants: {},

    plugins: [forms],
};
