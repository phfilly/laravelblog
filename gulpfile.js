var gulp = require('gulp');

gulp.task('default', function() {
  // place code for your default task here
});

var paths = {
 'bootstrap': 'node_modules/bootstrap-sass/assets/',
 'fonts': 'node_modules/bootstrap-sass/assets/fonts/'
};


var elixir = require('laravel-elixir');
require('laravel-elixir-vue-2'); // recommended for vue 2

elixir(function(mix) {
 mix.sass('app.scss')
     .copy(paths.fonts + 'bootstrap/**', 'public/build/fonts/bootstrap')
     .copy(paths.bootstrap + 'javascripts/bootstrap.js', 'resources/assets/js')
     .copy('resources/assets/js/analyticstracker.js', 'public/js')
     .scripts([
      "jquery.js",
      "bootstrap.js",
      "app.js"
     ])
     .version(["public/css/app.css", "public/js/all.js"])
     .copy('resources/json' , 'public/json');
});