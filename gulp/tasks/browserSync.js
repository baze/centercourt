'use strict';

var browserSync = require('browser-sync');
var gulp        = require('gulp');

gulp.task('browserSync', ['build'], function() {
    browserSync.init(["public/css/**", "public/js/**", "resources/views/**"], {
        //server: {
        //    baseDir: 'public'
        //}
        host: "cc-app.dev",
        proxy: "cc-app.dev"
    });
});
