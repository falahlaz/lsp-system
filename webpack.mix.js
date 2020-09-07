const mix = require("laravel-mix");

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

mix.scripts(
    [
        "public/assets/js/custom.js",
        "public/assets/js/stisla.js",
        "public/assets/js/scripts.js",
        "public/assets/js/page/modules-datatables.js"
    ],
    "public/assets/js/all.js"
).version();

mix.styles(
    [
        "public/assets/css/components.css",
        "public/assets/css/style.css",
    ],
    "public/assets/css/all.css"
).version();
