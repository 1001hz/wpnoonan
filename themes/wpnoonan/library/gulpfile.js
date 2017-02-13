'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var bourbon    = require("bourbon").includePaths;
var neat    = require("bourbon-neat").includePaths;

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