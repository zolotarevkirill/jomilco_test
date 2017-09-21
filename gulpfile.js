const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
//const replace = require('gulp-replace');
//const inject = require('gulp-inject');
const cssmin = require('gulp-cssmin');
//const concatCss = require('gulp-concat-css');
const imagemin = require('gulp-imagemin');
const jpegoptim = require('imagemin-jpegoptim');
const imageminSvgo = require('imagemin-svgo');
const imageminOptipng = require('imagemin-optipng');
const uglify = require('gulp-uglify');
//const concat = require('gulp-concat');


var config = {
    url: 'jam.loc',
    php: './*.php',
    js: './js/**/*.js',
    sass: './sass/*.scss',
    img: {
        src: './img/**/*',
        dst: './build/img/'
    },
};


gulp.task('build', ['sass', 'image.minify', 'js'], function (done) {
    done();
});

gulp.task('sass', function () {
    return gulp.src(config.sass)
        .pipe(sass().on('error', sass.logError))
        .pipe(concatCss('template.css'))
        .pipe(cssmin())
        .pipe(gulp.dest('./build/css'))
        .pipe(browserSync.stream());
});

gulp.task('js', function () {
    return gulp.src(config.js)
        .pipe(uglify())
        .pipe(concat('template.js'))
        .pipe(gulp.dest('./build/js'));
});



// Static Server + watching scss/html files
gulp.task('default', ['sass'], function () {

    browserSync.init({
        baseDir: "./",
        proxy: config.url
    });

    gulp.watch(config.sass, ['sass']);
    gulp.watch(config.js, ['js']).on('change', browserSync.reload);
    gulp.watch(config.php).on('change', browserSync.reload);
    gulp.watch(config.js).on('change', browserSync.reload);
});

gulp.task('image.minify', function () {
    return gulp.src(config.img.src)
        .pipe(imagemin([
            jpegoptim({
                max: 90,
                progressive: true,
                stripAll: true
            }),
            imageminSvgo({
                plugins: [{removeTitle: true}]
            }),
            imageminOptipng()
        ]))
        .pipe(gulp.dest(config.img.dst));
});

