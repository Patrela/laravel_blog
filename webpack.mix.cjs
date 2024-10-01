const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 coplie with npm run dev / npm run prod/build
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/general.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version();


    // webpack.mix.js

//mix.js('src/app.js', 'dist').setPublicPath('dist');
