
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        watch: {
            js: {
                files: ['js/src/*.js', 'js/lib/**/*.js'],
                tasks: ['uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
                files: ['css/src/*.scss'],
                tasks: ['sass','autoprefixer'],
                options: {
                    spawn: false
                }
            }
        },


        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                files: {
                    'js/main.js': [
                        'js/magnific/dist/jquery.magnific-popup.min.js',
                        'js/src/*.js'
                    ]
                }
            }
        },


        // we use the Sass
        sass: {
            dist: {
                options: {
                    // nested, compact, compressed, expanded
                    style: 'compressed'
                },
                files: {
                    'css/src/main-unprefixed.css': [
                        'css/src/main.scss',
                        'js/magnific/dist/magnific-popup.css',
                    ]
                }
            }
        },


        // auto-prefix our css3 properties.
        autoprefixer: {
            files: {
                dest: 'css/main.css',
                src: 'css/src/main-unprefixed.css'
            }
        },


        // minify images
        imagemin: { 
            dynamic: {                         // Another target
                files: [{
                    expand: true,                  // Enable dynamic expansion
                    cwd: 'img/src/',                   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: 'img/'                  // Destination path prefix
                }]
            }
        },


        // sync up some files when the js/css build.
        rsync: {
            js: {
                files: 'js/main.js',
                options: {
                    host: 'jpederson.com',
                    port: '22',
                    user: 'james',
                    remoteBase: '~/viewbook.jpederson.net/wp-content/themes/ripon-viewbook'
                }
            },
            css: {
                files: 'css/main.css',
                options: {
                    host: 'jpederson.com',
                    port: '22',
                    user: 'james',
                    remoteBase: '~/viewbook.jpederson.net/wp-content/themes/ripon-viewbook'
                }
            }
        }


    });

    // register task
    grunt.registerTask('default', ['watch']);

    // a build task just in case we want to
    grunt.registerTask('build', ['sass','autoprefixer','uglify','imagemin']);

};

