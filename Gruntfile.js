module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // This will compile all scripts in the JS directory into one file
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['_assets_dev/js/*.js'],
        dest: '_assets_production/js/site.min.js'
      }
    },
    // Run this before deployement to live, it will minify all scripts
    uglify: {
      my_target: {
        files: {
          '_assets_production/js/site.min.js': ['_assets_production/js/site.min.js']
        }
      }
    },
    // Baked into the Watch command to compress all new images
    smushit: {
      mygroup: {
        src: ['_assets_dev/images/**/*.png','_assets_dev/images/**/*.jpg'],
        dest: '_assets_production/images/'
      }
    },
    // This will compile all SCSS and minify it to a single CSS file
    compass: {
      dist: {
        options: {
          environment: 'production',
          outputStyle: 'compressed',
          imagesDir: '../images',
          fontsDir: '../fonts',
          sassDir: '_assets_dev/scss',
          cssDir: '_assets_production/css',
          raw: 'preferred_syntax = :scss\n' // Use `raw` since it's not directly available
        }
      }
    },
    // Creates CSS for SVGs - May remove and place SVGs inline
    grunticon: {
    	myIcons: {
    		files: [{
    			expand: true,
    			cwd: '_assets_dev/icons',
    			src: ['*.svg', '*.png'],
    			dest: "_assets_production/icons"
    		}],
		}
    },
    // Watches files and runs appropriate tasks upon changes
    watch: {
      scripts: {
          files: ['_assets_dev/js/*.js'],
          tasks: ['concat', 'uglify'],
          options: {
            livereload: 1377,
          }
      },
      styles: {
        files: ['_assets_dev/scss/*.scss', '_assets_dev/scss/libs/*.scss'],
        tasks: ['compass'],
        options: {
          livereload: 1377,
        }
      },
      imgs: {
        files: ['_assets_dev/images/**/*.png','_assets_dev/images/**/*.jpg'],
        task: ['smushit'],
        options: {
          livereload: 1377,
        }
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-grunticon');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-smushit');

  grunt.registerTask('default', ['concat', 'compass', 'uglify']);
  grunt.registerTask('min', ['uglify']);

};