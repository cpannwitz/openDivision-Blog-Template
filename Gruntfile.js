module.exports = function(grunt) {
    grunt.initConfig({
  
  // Load SASS plugin - from SCSS to CSS      
         sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: {
                    "scss/css/skeleton.css": "scss/skeleton.scss",
                    "scss/css/style.css": "scss/style.scss"
                }
            }
        },

// Load Autoprefixer Plugin - autoprefixes all css files
        autoprefixer: {
        	options: {
	    browsers: ['last 6 versions']
	  },
	 skeleton: {
	    expand: true,
	    flatten: true,
	    src: 'scss/css/skeleton.css',
	    dest: 'css/'
	  },
            style: {
                expand: true,
                flatten: true,
                src: 'scss/css/style.css',
                dest: 'css/'
              }

        },

// Load CSSmin plugin - minifies all css files
        cssmin: {
          target: {
            files: [{
              expand: true,
              cwd: 'css',
              src: ['*.css', '!*.min.css'],
              dest: 'css',
              ext: '.min.css'
            }]
          }
        },

// Load uglify plugin - minifies all javascript files
        uglify: {
            build: {
              files: {
                'js/*.min.js': ['js/*.js'],
              }
            }
          },

// Load notify plugin - notifies when everything is built
        notify: {
            sass:{
                options:{
                    title: "SCSS Files built",
                    message: "SCSS files built complete"
                }
            },
            autoprefixer:{
                options:{
                    title: "Autoprefixed Files built",
                    message: "Autoprefixed Files built complete"
                }
            },
            cssmin:{
                options:{
                    title: "CSS Files minified",
                    message: "CSS minified files built complete"
                }
            },
            uglify:{
                options:{
                    title: "jScript Files minified",
                    message: "jScript minified Files built complete"
                }
            }
        },

// Load Watch plugin - watches the files to run all the tasks needed
        watch: {
            options: {
                livereload: false,
            },
            styles: {
                files: ['scss/*.scss', 'js/*.js'], // which files to watch
                tasks: [
                        'sass',
                        'autoprefixer',
                        'cssmin',
                        'uglify:build',
                        'notify:sass',
                        'notify:autoprefixer',
                        'notify:cssmin',
                        'notify:uglify'
                ], // tasks in order to execute
                options: {
                    nospawn: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-notify');
    grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'watch']);
};