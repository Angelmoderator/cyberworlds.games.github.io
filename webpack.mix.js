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
 */


mix.js([
    'resources/js/jquery.js', 
] , 'public/js/vendor/jquery.js');
mix.js([
    'resources/js/what-input.js', 
] , 'public/js/vendor/what-input.js');
mix.js([
    'resources/js/foundation.min.js', 
] , 'public/js/vendor/foundation.min.js');
mix.js([
    'resources/js/all.js', 
] , 'public/js/app.js');

    // .sass('resources/sass/app.scss', 'public/css');
