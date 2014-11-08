'use strict';

var gulp = require('gulp'),
    livereload = require('gulp-livereload');

// css
gulp.task('css', function () {
    livereload.changed();
});

// php
gulp.task('php', function () {
    livereload.changed();
})

// watch
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('app/styles/*.css', ['css'])
    gulp.watch('app/*.php', ['php'])
})

// default
gulp.task('default', ['watch']);
