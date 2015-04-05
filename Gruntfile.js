'use strict';

module.exports = function (grunt) {
    // show elapsed time at the end
    require('time-grunt')(grunt);
    // load all grunt tasks
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        watch: {
            compass: {
                files: ['scss/{,*/}*.{scss,sass}'],
                tasks: ['compass']
            },
        },
        compass: {
            options: {
                sassDir: 'scss',
                cssDir: 'css',
                imagesDir: 'img',
                javascriptsDir: 'js',
                fontsDir: 'fonts',
                httpImagesPath: '/img',
                httpFontsPath: '/fonts',
                relativeAssets: false
            },
            dist: {},
        },
        concat: {
          dist: {
            src: ['js/plugins/*.js'],
            dest: 'js/plugins.js'
          }
        }
    });

    grunt.registerTask('default', [
        'compass',
        'watch'
    ]);
};
