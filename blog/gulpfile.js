var elixir = require('laravel-elixir');

require('laravel-elixir-jade');

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
    mix.sass('layout.sass', 'public/css/layout.css');
    mix.jade({
      search: '/*/*.jade',
      dest: '/views/',
      src: '/assets/jade/'
    });
    mix.browserSync({
      proxy: 'localhost:8000',
      notify: false
    });
});
