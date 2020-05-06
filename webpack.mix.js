/**
 * SEEDWPS uses Laravel Mix
 * Check the documentation at 
 * @https://laravel.com/docs/7.x/mix
 */
const mix = require('laravel-mix');

mix.setPublicPath('./assets/public');

// Compile assets
mix.js('assets/src/scripts/app.js', 'assets/public/js')
   .js('assets/src/scripts/admin.js', 'assets/public/js')
   .sass('assets/src/sass/style.scss', 'assets/public/css')
   .sass('assets/src/sass/admin.scss', 'assets/public/css');
 
 // Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}