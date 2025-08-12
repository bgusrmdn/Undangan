/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],

    theme: {
        extend: {
            fontFamily: {
                'sans': ['Figtree', 'ui-sans-serif', 'system-ui'],
                'elegant': ['Playfair Display', 'serif'],
                'script': ['Dancing Script', 'cursive'],
                'modern': ['Poppins', 'sans-serif'],
                'classic': ['Crimson Text', 'serif'],
            },
            colors: {
                // Wedding theme colors
                'rose-gold': {
                    50: '#fdf7f0',
                    100: '#faebd7',
                    200: '#f4d5ae',
                    300: '#eab676',
                    400: '#dd8f47',
                    500: '#d4722b',
                    600: '#c65d21',
                    700: '#a4471e',
                    800: '#85391f',
                    900: '#6c2f1c',
                    950: '#3a160d',
                },
                'sage': {
                    50: '#f6f7f6',
                    100: '#e3e7e3',
                    200: '#c7d2c7',
                    300: '#9fb3a0',
                    400: '#718871',
                    500: '#5a6f5b',
                    600: '#455947',
                    700: '#37473a',
                    800: '#2e3b30',
                    900: '#273229',
                    950: '#141a16',
                },
                'blush': {
                    50: '#fef7f7',
                    100: '#feecec',
                    200: '#fcdcdc',
                    300: '#f9c0c0',
                    400: '#f49595',
                    500: '#ec6969',
                    600: '#d94747',
                    700: '#b73636',
                    800: '#983030',
                    900: '#7f2d2d',
                    950: '#451414',
                },
                'cream': {
                    50: '#fefcf3',
                    100: '#fef9e7',
                    200: '#fdf0c9',
                    300: '#fbe2a6',
                    400: '#f7cf82',
                    500: '#f2b955',
                    600: '#eca72c',
                    700: '#d18317',
                    800: '#b16718',
                    900: '#8f5419',
                    950: '#522c0b',
                },
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-up': 'slideUp 0.6s ease-out',
                'slide-down': 'slideDown 0.6s ease-out',
                'slide-left': 'slideLeft 0.6s ease-out',
                'slide-right': 'slideRight 0.6s ease-out',
                'bounce-in': 'bounceIn 0.8s ease-out',
                'float': 'float 3s ease-in-out infinite',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'spin-slow': 'spin 8s linear infinite',
                'wiggle': 'wiggle 1s ease-in-out infinite',
                'heart-beat': 'heartBeat 1.5s ease-in-out infinite',
                'gradient': 'gradient 3s ease infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideDown: {
                    '0%': { transform: 'translateY(-100%)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideLeft: {
                    '0%': { transform: 'translateX(100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideRight: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                bounceIn: {
                    '0%': { transform: 'scale(0.3)', opacity: '0' },
                    '50%': { transform: 'scale(1.05)' },
                    '70%': { transform: 'scale(0.9)' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' },
                },
                heartBeat: {
                    '0%': { transform: 'scale(1)' },
                    '14%': { transform: 'scale(1.3)' },
                    '28%': { transform: 'scale(1)' },
                    '42%': { transform: 'scale(1.3)' },
                    '70%': { transform: 'scale(1)' },
                },
                gradient: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                'paper-texture': "url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23f9f9f9\" fill-opacity=\"0.4\"%3E%3Ccircle cx=\"5\" cy=\"5\" r=\"1\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')",
            },
            boxShadow: {
                'elegant': '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'dreamy': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};