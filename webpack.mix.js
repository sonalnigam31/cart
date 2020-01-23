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

 //mix.js('resources/js/app.js', 'public/js');
 mix.js([
    'resources/js/app.js',
    'resources/js/common.js',
    'resources/js/bootstrap.min.js',
     'resources/js/jquery.dataTables.min.js',    
     'resources/js/dataTables.bootstrap4.min.js'
], 'public/js/app.js');
//    .sass('resources/sass/app.scss', 'public/css');
// mix.combine([
// 	//'resources/js/app.js',
//     //'resources/js/jquery-3.4.1.slim.min.js',
//     'resources/js/jquery.min.js',
//     'resources/js/popper.min.js',
//     'resources/js/bootstrap.min.js',
//     'resources/js/jquery.dataTables.min.js',    
//     'resources/js/dataTables.bootstrap4.min.js'
// ], 'public/js/app.js');
mix.combine([
    'resources/sass/bootstrap.min.css', 
    'resources/sass/dataTables.bootstrap4.min.css', 
    // 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css',
], 'public/css/app.css');

