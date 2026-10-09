import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/ndeblauw/blue-admin/src/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                drukwerk: {
                    bg: '#0A0C11',
                    text: '#abadb3',
                    heading: '#ffffff',
                    link: '#fafafa',
                    gray: '#cccccc',
                    primary: '#2292b1',
                    blue: '#1b3385',
                    teal: '#25c5c9',
                    border: '#323438',
                    footer: '#999999',
                    'footer-border': '#313131',
                },
            },
        },
    },

    plugins: [forms],
};
