'use strict';

var gulp = require('gulp');

var inputDir = './resources/assets';
var appDir = 'app';

gulp.task('watch', ['browserSync'], function() {
	gulp.watch(inputDir + '/sass/**/*.scss', ['css']);
    gulp.watch(inputDir + '/js/**/*.js', ['js']);
	gulp.watch(inputDir + '/img/**', ['images']);
    //gulp.watch(inputDir + '/htdocs/**', ['copy']);
    //gulp.watch(appDir + '/**/*.php', ['phpunit']);
});
