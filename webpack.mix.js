const mix = require('laravel-mix');
require('laravel-mix-purgecss');

// ...

mix.postCss('resources/css/app.scss', 'public/css',[require('tailwindcss')])
.purgeCss();