var gulp = require('gulp');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');

// gulp.task("build-production", ["build", "compressjs", "compresscss", "compressimages"]);
gulp.task("build", ["browserify"]);
// gulp.src('./assets/**/*.js').pipe(uglify()).pipe(gulp.dest('./build'));

gulp.task('browserify', function () {		// browserify should have a .babelrc type file or package.json
    return browserify({entries: './src/assets/js/Application.js', debug: true}) // Browserify website for entries and debug **ignore OUTPUT
        .transform(babelify, {presets: ["es2015", "react"]})
        .bundle()
        .on("error", function (err) { console.log("Error: " + err.message); })
        .pipe(source('../../public_html/js/application.js')) //'application.' + Date.now() + '.min.js'
        .pipe(gulp.dest('dist'));
});

// gulp.task("watch", ["build", "watch-js"]);
gulp.task('watch', ['build'], function () {
    gulp.watch('./src/assets/**/*.js', ['build']);
});

gulp.task('default', ['watch']);









// // -------------- Laravel pre-written

// var elixir = require('laravel-elixir');

// /*
//  |--------------------------------------------------------------------------
//  | Elixir Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Elixir provides a clean, fluent API for defining some basic Gulp tasks
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for our application, as well as publishing vendor resources.
//  |
//  */

// elixir(function(mix) {
//     mix.browserify('application.js')
//     ;
// });