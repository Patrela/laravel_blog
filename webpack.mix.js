// webpack.mix.js
let mix = require('laravel-mix');
mix.js('src/app.js', 'js').setPublicPath('js');
mix.js([
    'js/app.js',
    'js/bootstrap.js'
], 'js/app.js');
mix.sass([
    'resources/css/app.css',
    'resources/css/login/login.css'
], 'public/css');
