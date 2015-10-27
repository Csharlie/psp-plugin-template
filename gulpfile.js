var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function(){
  return gulp
  	.src('./assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('dist/css'))
});

//Default task
gulp.task('default',function() {
    gulp.watch('./assets/sass/**/*.scss',['sass']);
});