let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
.js('resources/assets/js/notifications.js','public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    'public/assets/css/error.css','public/assets/css/notifications.css','public/assets/css/simple-sidebar.css','public/assets/css/argon.css','public/assets/css/floating_button.css','public/assets/css/iziToast.min.css'],'public/css/all.css');
