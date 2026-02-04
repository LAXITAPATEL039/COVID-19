"use strict";

//LOAD PLUGINS
const browsersync = require("browser-sync").create();
const del = require("del");
const gulp = require("gulp");
const merge = require("merge-stream");

//BROWSERSYNC
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "./"
    },
    port: 3000
  });
  done();
}

//BROWSERSYNC RELOAD
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

//CLEAN VENDOR
function clean() {
  return del(["./vendor/"]);
}

//BRING THIRD PARTY DEPENDENCIES FROM NODE_MODULES INTO VENDOR DIRECTORY
function modules() {

  //BOOTSTRAP
  var bootstrap = gulp.src('./node_modules/bootstrap/dist/**/*')
    .pipe(gulp.dest('./vendor/bootstrap'));

  //JQUERY
  var jquery = gulp.src([
    './node_modules/jquery/dist/*',
    '!./node_modules/jquery/dist/core.js'
  ])
    .pipe(gulp.dest('./vendor/jquery'));

  //JQUERY EASING
  var jqueryEasing = gulp.src('./node_modules/jquery.easing/*.js')
    .pipe(gulp.dest('./vendor/jquery-easing'));
  return merge(bootstrap, jquery, jqueryEasing);
}

//WATCH FILES
function watchFiles() {
  gulp.watch("./**/*.css", browserSyncReload);
  gulp.watch("./**/*.html", browserSyncReload);
}

//DEFINE COMPLEX TASKS
const vendor = gulp.series(clean, modules);
const build = gulp.series(vendor);
const watch = gulp.series(build, gulp.parallel(watchFiles, browserSync));

//EXPORT TASKS
exports.clean = clean;
exports.vendor = vendor;
exports.build = build;
exports.watch = watch;
exports.default = build;
