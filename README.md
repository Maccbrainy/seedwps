# SEEDWPS
## Prerequisites

This theme relies on NPM and Composer in order to load dependencies and packages. Webpack should always be running and watching during the development process, in order to properly compile and update files.

* Install Composer
* Install Node

## Installation
Open a Terminal window on the location of the theme folder
* Execute composer install
* Execute npm install

## Webpack
SEEDWPS uses Laravel Mix for assets management. Check the official documentation for advanced options

* Edit the webpack.mix.js in the root directory of your theme to set your localhost URL and customize your assets

* npm run watch to start browserSync with LiveReload and proxy to your custom URL
* npm run dev to quickly compile and bundle all the assets without watching
* npm run prod to compile the assets for production

## Features
* Built-in webpack.mix.js for fast development and compiling.
* OOP PHP, and namespaces with PSR4 autoload.
* Customizer ready with boilerplate and example classes.
* Gutenberg ready with boilerplate and example blocks.
* ES6 Javascript syntax ready.
* Modular, Components based file structure.
* License
GPLv3