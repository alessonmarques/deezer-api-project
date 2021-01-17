const mix = require('laravel-mix');
const { VERSION } = require('lodash');

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
    .sass('resources/views/front/assets/scss/reset.scss', 'public/front/css/reset.css')
    .sass('resources/views/front/assets/scss/app.scss', 'public/front/css/app.css')
    //
    .sass('resources/views/front/assets/scss/sb_admin/styles.scss', 'public/front/css/sb_admin.css')
    //
    .sass('resources/views/front/assets/scss/swal/swal.scss', 'public/front/css/swal.css')

    .copyDirectory('resources/views/front/assets/img/', 'public/front/img/')
    .copyDirectory('resources/views/front/assets/scss/addons/fonts/', 'public/front/css/fonts')

    //.scripts(['resources/views/front/assets/js/_lib.js'], 'public/front/js/_lib.js')
    .scripts([
        'resources/views/front/assets/js/_lib.js',
        'resources/views/front/assets/js/main.js',
    ], 'public/front/js/main.js')


    .scripts([
        'resources/views/front/assets/js/jquery.slim.min.js',
    ], 'public/front/js/jquery.min.js')

    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    ], 'public/front/js/bootstrap.bundle.min.js')

    .scripts([
        'resources/views/front/assets/js/swal/swal.min.js',
    ], 'public/front/js/swal.min.js')

    .scripts([
        'resources/views/front/assets/js/select/bootstrap-select.js',
    ], 'public/front/js/bootstrap-select.js')

    .scripts([
        'resources/views/front/assets/js/sb_admin/datachart/chart-area.js',
        'resources/views/front/assets/js/sb_admin/datachart/chart-bar.js',
        'resources/views/front/assets/js/sb_admin/datachart/chart-pie.js',
    ], 'public/front/js/sb_graph.js')

    .scripts([
        'resources/views/front/assets/js/sb_admin/scripts.js',
        //'resources/views/front/assets/js/sb_admin/datachart/datatables.js',
    ], 'public/front/js/sb_admin.js')

    .options({
        processCssUrls: false
    })

    .version();
