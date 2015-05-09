var JPEGRecompress = require('imagemin-jpeg-recompress');
var PNGCrush = require('imagemin-pngcrush');
var SVGO = require('imagemin-svgo');
var pickFiles = require('broccoli-static-compiler');
var compileSass = require('broccoli-sass');
var cleanCSS = require('broccoli-clean-css');
var concat = require('broccoli-concat');
var autoprefixer = require('broccoli-autoprefixer');
var mergeTrees = require('broccoli-merge-trees');
var uglify = require('broccoli-uglify-js');

module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		broccoli: {
			default: {
				dest: 'dist',
				config: function () {
					var mainCSS = 'src/css';
					mainCSS = pickFiles(mainCSS, {
						srcDir: '/',
						files: ['**/*.scss', '!admin/**/*.scss'],
						destDir: '/css'
					});
					mainCSS = compileSass(['src/css'], 'main.scss', 'css/main.min.css', {outputStyle: 'expanded', sourceComments: true});
					mainCSS = autoprefixer(mainCSS, {
						browsers: ['last 2 versions', 'ie >= 8']
					});
					mainCSS = cleanCSS(mainCSS, {
						keepSpecialComments: '*'
					});

					var js = 'src/js';
					js = pickFiles(js, {
						srcDir: '/',
						destDir: '/js'
					});
					js = concat(js, {
						inputFiles: [
              'js/captcha.js',
							'js/site.js'
						],
						outputFile: '/js/site.min.js'
					});
					js = uglify(js, {});

					return mergeTrees([mainCSS, js]);
				}
			}
		},
		imagemin: {
			default: {
				options: {
	        optimizationLevel: 3,
	        use: [JPEGRecompress(), SVGO()]
	      },
	      files: [{
          expand: true,
          cwd: 'images',
          src: ['**/*.{png,jpg,gif,svg}'],
          dest: 'img/'
        }]
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-broccoli');
	grunt.registerTask('default', ['broccoli:default:build']);
	grunt.registerTask('watch', ['broccoli:default:watch']);
}
