var gulp = require('gulp');
var livereload = require('gulp-livereload')
var uglify = require('gulp-uglifyjs');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var phpcs = require('gulp-phpcs');
var phpcbf = require('gulp-phpcbf');
var gutil = require('gutil');
const shell = require('gulp-shell')

gulp.task('changelog', () => {
  return gulp.src('*.js', {read: false})
  .pipe(shell([
    'auto-changelog --commit-limit false --output CHANGELOG.md --template ./static/changelog-template.hbs'
  ]))
})

gulp.task('phpcbf', function () {
  return gulp.src(['.**/*.php', '*.php', '!./vendor/**/*.*','!./tests/**','!./bin/**'])
  .pipe(phpcbf({
    bin: '/Users/mustardmac/utils/phpcs/bin/phpcbf',
    standard: 'WordPress'
  }))
  .on('error', gutil.log)
  .pipe(gulp.dest('src'));
});

gulp.task('php', function () {
    return gulp.src(['.**/*.php', '*.php', '!./vendor/**/*.*','!./tests/**','!./bin/**'])
        .pipe(phpcs({
            bin: '/Users/mustardmac/utils/phpcs/bin/phpcs',
            standard: 'WordPress',
            warningSeverity: 0
        }))
        // Log all problems that was found
        .pipe(phpcs.reporter('log'));
});

gulp.task('imagemin', function () {
    return gulp.src('./images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./images'));
});


gulp.task('sass', function () {
  gulp.src('./sass/*.scss')
    .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('.'));
});

gulp.task('uglify', function() {
  gulp.src('./lib/*.js')
    .pipe(uglify('__themename__.min.js'))
    .pipe(gulp.dest('./js'))
});

gulp.task('watch', function(){
    livereload.listen();
    gulp.watch('./sass/*.scss', ['sass']);
    gulp.watch('./lib/*.js', ['uglify']);
    gulp.watch(['.**/*.php', '*.php'], ['php']);
    gulp.watch(['./*.css', './templates/*.twig', './templates/**/*.twig', './*.php', './js/*.js', './parts/**/*.php'], function (files){
        livereload.changed(files)
    });
});
