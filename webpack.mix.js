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

mix .js('resources/user-front/js/app.js', 'public/users/js/app.js').minify('public/users/js/app.js')
    .js('resources/user-front/js/app_mobile.js', 'public/users/js/app_mobile.js').minify('public/users/js/app_mobile.js')
    .sass('resources/user-front/sass/app.sass', 'public/users/css/app.css').minify('public/users/css/app.css')
    .sass('resources/user-front/sass/app_mobile.sass', 'public/users/css/app_mobile.css').minify('public/users/css/app_mobile.css')
    .copyDirectory('resources/user-front/image', 'public/users/image')
    .copyDirectory('resources/user-front/fonts', 'public/users/fonts')
    .js('resources/admin-assets/js/app.js', 'public/admins/js/app.js').minify('public/admins/js/app.js')
    .sass('resources/admin-assets/sass/app.scss', 'public/admins/css').minify('public/admins/css/app.css')



if (mix.inProduction()) {
    mix.version();
}

// mix.browserSync({
//     proxy: '127.0.0.1:8000'
// });
