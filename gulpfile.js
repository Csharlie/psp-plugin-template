var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function(){
  return gulp
  	.src('./assets/styles/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('dist/styles'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('./assets/styles/**/*.scss',['sass']);
});