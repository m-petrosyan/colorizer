/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            spacing: {
                'navbar': '50px',
                'full-content': `calc(100vh - 50px)`,
            },
        },
        fontSize: {
            'extra-big': '70px',
            'bigger': '50px',
            'big': '28px',
            'normal': '20px',
            'small': '16px'
        },
        colors: {
            'orange': '#ff5722',
            'milky-white': 'rgb(239, 230, 238)',
            'grey-blue': '#607d8b',
            'grey': '#7d7c83',
            'dark': 'rgba(0, 0, 0, 0.11)',
            'dark-grey': 'rgba(61, 61, 61, 0.11)',
        },
        screens: {
            'sm': '580px',
            // => @media (min-width: 580px) { ... }

            'md': '860px',
            // => @media (min-width: 860px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }
        },

    },
    plugins: [],
}

