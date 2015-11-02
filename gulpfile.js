var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var minify = require('gulp-minify-css');
var rename = require("gulp-rename");
var concat = require('gulp-concat');
var uglify = require('gulp-uglifyjs');

var config = {

	// Stylesheets
	sassSrc: './assets/sass',
	cssDest: './dist/css',

	// Javascripts
	jsSrc: './assets/js',
	jsDest: './dist/js',

	// Bower
	bowerDir: './bower_components'
}

/*
 * Gulp Sass, Minify, Autoprefix & Rename
 */

gulp.task('styles', function() {
  return gulp.src(config.sassSrc + '/**/*.scss')
    .pipe(sass({
    	outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(prefix('last 2 versions'))
    .pipe(gulp.dest(config.cssDest))
    .pipe(minify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(config.cssDest));
});

/*
 * Gulp Concat
 */

gulp.task('concat', function(){
  return gulp
  	.src(config.jsSrc + '/**/*.js')
  	.pipe(concat('all.js'))
  	.pipe(gulp.dest(config.jsDest))
});

/*
 * Gulp UglifyJS
 */

gulp.task('minify-js', function() {
  return gulp
  	.src(config.jsSrc + '/**/*.js')
    .pipe(uglify('all.min.js'))
    .pipe(gulp.dest(config.jsDest));
});

//Watch task
gulp.task('watch',function() {
    gulp.watch(config.sassSrc + '/**/*.scss',['styles']);
    gulp.watch(config.jsSrc + '/**/*.js',['concat', 'minify-js']);
});