const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')

       .styles([

         'bootstrap.min.css',
         'demo.css',
         'material-dashboard',
       ],'./public/css/mycss.css')

       .scripts([
         'app.js',
         'bootstrap-notify.js',
         'bootstrap.js',
         'chartist.min.js',
         'demo.js',
         'jquery-3.1.0.min.js',
         'material-dashboard.js',
         'material.min.js'
       ],'./public/js/myjs.js')
});
