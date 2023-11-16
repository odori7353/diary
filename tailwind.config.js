const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        
        extend: {
            fontFamily: {
                        body: [
                          'Helvetica Neue',
                          'Arial',
                          'Hiragino Kaku Gothic ProN',
                          'Hiragino Sans',
                          'Meiryo',
                          'sans-serif',
                        ],
                //sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
