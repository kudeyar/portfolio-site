'use strict';

var gulp = require('gulp'),
    connect = require('gulp-connect');

// server connect 
gulp.task('connect', function() {
  connect.server({
    root: 'app',
    livereload: true
  });
  require('opn')('http://localhost:8080');
});

// css
gulp.task('css', function () {
    gulp.src('app/styles/*.css')
    .pipe(connect.reload());
});

// html
gulp.task('html', function () {
    gulp.src('app/*.html')
    .pipe(connect.reload());
})

// watch
gulp.task('watch', function () {
    gulp.watch('app/styles/*.css', ['css'])
    gulp.watch('app/*.html', ['html'])
})

// default
gulp.task('default', ['connect', 'html', 'css', 'watch']);

