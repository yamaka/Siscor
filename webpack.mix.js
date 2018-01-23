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
    // .js('resources/assets/js/vendor.js', 'public/js')
    .sass('resources/assets/sass/vendor.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/fonts')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .scripts([
        'node_modules/metismenu/dist/metisMenu.min.js',
        'node_modules/jquery-slimscroll/jquery.slimscroll.min.js',
        'node_modules/pace-js/pace.min.js',
        'resources/assets/js/inspinia.js'
    ],'public/js/vendor.js')
    .js('resources/assets/js/custom.js', 'public/js')
   ;
// mix.styles()
