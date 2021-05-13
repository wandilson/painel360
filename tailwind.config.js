const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'main-red': '#ec4561',
                'main-red-hover': '#e82244',

                'main-dark': '#333547',

                'main-purple': '#626ed4',
                'main-purple-hover': '#4452cc',

                'main-blue': '#38a4f8',
                'main-blue-hover': '#1393f7 ',

                'main-green': '#02a499',
                'main-green-hover': '#027e76',   

                'main-yellow': '#f8b425',
                'main-green-hover': '#efa508',           
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
