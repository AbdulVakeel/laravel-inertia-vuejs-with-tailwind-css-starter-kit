const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',
    ],

    darkMode: 'class',

    theme: {
        mode: 'jit',
        container: {
			center: true,
			padding: '1rem',
		},
        extend: {
          fontFamily: {
            sans: ['Roboto ', 'sans-serif', ...defaultTheme.fontFamily.sans],
            inter: "'Inter', sans-serif",

			},

            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                primary: {
                    lighter: '#bcd7ff',
                    light: '#599bff',
                    DEFAULT: '#0ea5e9',
                    dark: '#818cf8',
                    darker: '#818cf8',
                },
                secondary: {
                    lighter: '#f5f8fa',
                    light: '#919eab',       //  '#92929f'
                    DEFAULT: '#333d48',     // '#92929f'    // #333d48
                    dark: '#0a1e35',        //  #161c24
                    darker: '#0a1e35',      // '#161c24',
                },
                 
                info: {
                    lighter: "#D0F2FF",
                    light: "#74CAFF",
                    DEFAULT: "#1890FF",
                    dark: "#161c24",
                    darker: "#161c24" // text-info-darker
                },
                success: {
                    lighter: "#E9FCD4",
                    light: "#AAF27F",
                    DEFAULT: "#54D62C",
                    dark: "#161c24", //#161c24
                    darker: "#161c24" // #161c24
                },
                warning: {
                    lighter: "#FFF7CD",
                    light: "#FFE16A",
                    DEFAULT: "#FFC107",
                    dark: "#e29400",
                    darker: "#bb6902"
                },
                danger: {
                    lighter: "#FFE7D9",
                    light: "#FFA48D",
                    DEFAULT: "#FF4842",
                    dark: "#ed1c15",
                    darker: "#c8130d"
                },
            },

            boxShadow: {
                'md': '0 5px 10px 0px rgba(0, 0, 0, 0.2)',
                // 0px 8px 16px 0px rgb(253 169 45 / 24 %)
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
};
