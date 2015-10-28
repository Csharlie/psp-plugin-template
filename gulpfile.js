var gulp = require('gulp');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
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
 * Gulp Sass
 */

gulp.task('sass', function(){
  return gulp
  	.src(config.sassPath + '/**/*.scss')
    .pipe(sass({
    	outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(gulp.dest(config.cssDest))
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

gulp.task('compress', function() {
  return gulp
  	.src(config.jsSrc + '/**/*.js')
    .pipe(uglify('all.min.js'))
    .pipe(gulp.dest(config.jsDest));
});

//Watch task
gulp.task('watch',function() {
    gulp.watch('./assets/sass/**/*.scss',['sass']);
});