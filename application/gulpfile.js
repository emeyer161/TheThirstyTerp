var elixir = require('laravel-elixir');
var gulp = require('gulp');

elixir.config.publicDir = '../public_html';
elixir.config.publicPath = '../public_html';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.scripts([
        "jquery.min.js",
        "bootstrap.min.js",
        "jasny-bootstrap.min.js",
        "tinymce.min.js",
    ]);
})