const mix = require('laravel-mix');

require('laravel-mix-imagemin');

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

mix
	.copyDirectory('resources/img', 'public/images')
	.js('resources/js/app.js', 'public/js')
	.js('resources/js/backend/app.js', 'public/backend/js')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/backend/app.scss', 'public/backend/css')
	.imagemin('images/**.*');
