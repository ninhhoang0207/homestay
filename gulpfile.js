var elixir = require('laravel-elixir');

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

// Gentelella vendors path : vendor/vendors

elixir(function(mix) {
    
    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('gentelella-master/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('gentelella-master/build/css/custom.min.css', 'public/css/gentelella.min.css');

    /****************/
    /* Copy Scripts */
    /****************/

    // Bootstrap
    mix.copy('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

    // jQuery
    mix.copy('gentelella-master/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

    // Gentelella
    mix.copy('gentelella-master/build/js/custom.min.js', 'public/js/gentelella.min.js');

    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('gentelella-master/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('gentelella-master/vendors/font-awesome/fonts/', 'public/fonts');
});
