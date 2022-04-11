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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.sass', 'public/css')
    .sourceMaps();

mix.copy('node_modules/tom-select/dist/css/tom-select.min.css.map', 'public/css/tom-select.min.css.map');
mix.copy('node_modules/vanilla-rangeslider/css/rangeslider.css', 'public/css/rangeslider.css');
mix.copy('node_modules/vanilla-rangeslider/js/rangeslider.min.js', 'public/js/rangeslider.min.js');