/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {},
        colors: {
            'bg-navbar': 'rgb(239, 230, 238)',
            'navbar-color': '#607d8b',
            'grey': '#7d7c83',
            'btn-hover-color': 'rgba(0, 0, 0, 0.11)',
            'btn-active-color': 'rgba(61, 61, 61, 0.11)',
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

