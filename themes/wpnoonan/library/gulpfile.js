'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var bourbon    = require("bourbon").includePaths;
var neat    = require("bourbon-neat").includePaths;
var gp_concat = require('gulp-concat');

gulp.task('sass', function () {
    return gulp.src('./sass/style.scss')
        .pipe(sass({
            includePaths: ["styles"].concat(bourbon).concat(neat)
        }).on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('js', function () {
    return gulp.src('./js/*.js')
        .pipe(gp_concat('app.js'))
        .pipe(gulp.dest('../js'));
});

gulp.task('js:watch', function () {
    gulp.watch('./js/**/*.js', ['js']);
});

gulp.task('default', ['js:watch', 'sass:watch']);