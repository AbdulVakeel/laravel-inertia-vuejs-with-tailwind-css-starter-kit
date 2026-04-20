const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    
    darkMode: 'class',
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Open Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                primary: {
                    lighter: '#feecc7',
                    light: '#fed889',
                    DEFAULT: '#f78109', 
                    dark: '#fda92d',
                    darker: '#b63d07',
                },
                secondary: {
                    lighter: '#f5f8fa',
                    light: '#919eab',
                    DEFAULT: '#333d48',
                    dark: '#212b36',
                    darker: '#161c24',
                    bgsidebar: '#1a202c',
                },
                info: {
                    lighter: '#D0F2FF',
                    light: '#74CAFF',
                    DEFAULT: '#1890FF',
                    dark: '#0C53B7',
                    darker: '#04297A',
                },
                success: {
                    lighter: '#E9FCD4',
                    light: '#AAF27F',
                    DEFAULT: '#54D62C',
                    dark: '#229A16',
                    darker: '#08660D',
                },
                warning: {
                    lighter: '#FFF7CD',
                    light: '#FFE16A',
                    DEFAULT: '#FFC107',
                    dark: '#B78103',
                    darker: '#7A4F01',
                },
                danger: {
                    lighter: '#FFE7D9',
                    light: '#FFA48D',
                    DEFAULT: '#FF4842',
                    dark: '#B72136',
                    darker: '#7A0C2E',
                },
            },
            boxShadow: {
                md: '0 5px 10px 0px rgba(0, 0, 0, 0.2)',
            },
        },
    },
    
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
};
