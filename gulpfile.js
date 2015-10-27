var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

var config = {
	sassSrc: './assets/sass',
	cssDest: './dist/css',
	jsSrc: './assets/js',
	jsDest: './dist/js',
	bowerDir: './bower_components'
}

gulp.task('sass', function(){
  return gulp
  	.src(config.sassPath + '/**/*.scss')
    .pipe(sass({
    	outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(gulp.dest(config.cssDest))
});

gulp.task('concat', function(){
  return gulp
  	.src(config.jsSrc + '/**/*.js')
  	.pipe(concat('all.js'))
  	.pipe(gulp.dest(config.jsDest))
});

//Watch task
gulp.task('watch',function() {
    gulp.watch('./assets/sass/**/*.scss',['sass']);
});