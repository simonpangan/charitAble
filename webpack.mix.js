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
    .vue(3)
    .js('resources/js/vendor.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/vendor.scss', 'public/css')
	.sourceMaps()
	.version();