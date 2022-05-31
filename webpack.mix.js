const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/merchant.js', 'public/js')
    .js('resources/js/customer.js', 'public/js')
    .js('resources/js/reader.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/css/base.css', 'public/css', [
    ])
    .postCss('resources/css/home.css', 'public/css', [
    ])
    .postCss('resources/css/merchant.css', 'public/css', [
    ])
    .postCss('resources/css/customer.css', 'public/css', [
    ])
    .postCss('resources/css/reader.css', 'public/css', [
    ])
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sourceMaps();

