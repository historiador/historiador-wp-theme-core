/*
 * Available tasks
 * ===============
 */

// gulp style (convert SCSS to main WordPress style.css)
// gulp postcss (apply PostCSS rules to SCSS style sheets)
// gulp webfonts (minify and concatenate font styles into webfonts.min.css)
// gulp js (minify and concatenate scripts into main.min.js)
// gulp img (minify and optimise images)


/*
 * Task functions
 * ==============
 */
// TODO add the following tasks
// Watch files for changes
// Browsersync (?)


// NOTE on conventions
// Use `const` for global definitions
// These apply to multiple tasks
//
// Use `var` for local definitions inside tasks
// 
// Always declare one per line, ending with `;`
//
// The idea is to be able to add/remove tasks easily
const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const replace = require('gulp-replace');

// SCSS => CSS
// -----------
// All partials added with the `@import` directive in `src/scss/style.scss`
// We do not use a glob, because the order of `@import` matters
// Example of a glob:
// gulp.src('src/scss/**/*.scss')
gulp.task('style', function() {
    gulp.src('src/scss/style.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(replace('/*!', '/*'))
		.pipe(replace('*/html', '*/\nhtml'))
		.pipe(gulp.dest('.'));
});

// NOTE has not been tested yet.
///// // PostCSS
///// // -------
///// // Parsing of scss partials for vendor prefixes, style and flexbox fixes
///// // Also see `.stylelintrc` at the root directory of this project
///// gulp.task('postcss', function () {
///// 	var postcss = require('gulp-postcss');
///// 	var scss = require('postcss-scss');
///// 	var flexbugs = require('postcss-flexbugs-fixes');
///// 	var autoprefixer = require('autoprefixer');
///// 	var stylelint = require('stylelint');
///// 	var stylefmt = require('stylefmt');
///// 
///// 	var plugins = [flexbugs(), autoprefixer(), stylelint(), stylefmt()];
///// 
/////     return gulp.src('src/scss/**/*.scss')
///// 		.pipe(postcss(plugins, {syntax: scss}))
/////         .pipe(gulp.dest('src/scss'));
///// });

// NOTE Are we going to enqueue minified scripts?  The default is to add
// each script separately.
//// // Prepare JS
//// // ----------
//// // gulp-jshint requires jshint
//// // Already installed with the rest of the dependencies
//// gulp.task('js', function() {
//// 	var jshint = require('gulp-jshint');
//// 	var uglify = require('gulp-uglify');
//// 
//// 	return gulp.src('assets/js/**/*.js')
//// 		.pipe(jshint())
//// 		.pipe(jshint.reporter('default'))
//// 		.pipe(uglify())
//// 		.pipe(concat('main.js'))
//// 		.pipe(rename({suffix: '.min'}))
////         .pipe(gulp.dest('.'));
//// });

// Prepare Webfonts CSS
// --------------------
gulp.task('webfonts', function() {
	var cleanCSS = require('gulp-clean-css');

	return gulp.src('src/webfonts/**/*.css')
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(concat('webfonts.css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('.'));
});

// NOTE has not been tested yet
//// // Minify images
//// // -------------
//// gulp.task('img', function() {
//// 	var imagemin = require('gulp-imagemin');
//// 
////     return gulp.src('assets/images/**/*')
//// 		.pipe(imagemin([
//// 			imagemin.jpegtran({progressive: true}),
//// 			imagemin.optipng({optimizationLevel: 5}),
//// 			imagemin.svgo({
//// 				plugins: [
//// 					{removeViewBox: true},
//// 					{cleanupIDs: false}
//// 				]
//// 			})
//// 		]))
////         .pipe(gulp.dest('assets/images'));
//// });

// TODO develop this
// // Watch task
// gulp.task('default',function() {
// 	gulp.watch('src/scss/**/*.scss',['style']);
// });
