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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/projets.scss', 'public/css')
   .sass('resources/assets/sass/projet.scss', 'public/css')
   .sass('resources/assets/sass/paiment.scss', 'public/css')
   .sass('resources/assets/sass/template.scss', 'public/css');
