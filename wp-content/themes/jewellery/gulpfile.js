var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    watch = require('glob-watcher'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    minify = require('gulp-minify'),
    babel = require("gulp-babel"),
    fileSync = require('gulp-file-sync');

var autoprefixerOptions = {
    browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};

var vendor_js = [
    'node_modules/swiper/swiper-bundle.js'
];

var vendor_styles = [
    'node_modules/swiper/swiper-bundle.css'
];

gulp.task('script', async function() {
    gulp.src('./assets/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(rename('scripts.min.js'))
        .pipe(babel({
            presets: ["@babel/preset-env"]
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./dist/js'))
});

gulp.task('lib-script',async function() {
    gulp.src(vendor_js)
        .pipe(concat('libs-scripts.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(rename('libs-scripts.min.js'))
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('lib-style',async function() {
    gulp.src(vendor_styles)
        .pipe(concat('libs-styles.css'))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('images',async function() {
    gulp.src(['./assets/images/**/*.*'])
        .pipe(gulp.dest('./dist/images'));
});

gulp.task('fonts',async function() {
    gulp.src(['./assets/fonts/**/*.*'])
        .pipe(gulp.dest('./dist/fonts', {overwrite: true}))
});

gulp.task('scss', function () {
    return gulp.src('./assets/scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(rename('main.css'))
        .pipe(autoprefixer({
            browsers: ['>1%', 'last 5 versions'],
            cascade: false
        }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('prebuild', gulp.series('lib-script', 'lib-style',  (done) => {
    gulp.series('lib-script');
    gulp.series('lib-style');
    done();
}));

gulp.task('watch', gulp.series('scss', 'script',  (done) => {

    gulp.watch("./assets/scss/**/*.scss", gulp.series('scss'));
    gulp.watch("./assets/js/**/*.js", gulp.series('script'));
    gulp.watch("./assets/images/**/*.*", gulp.series('images'));
    gulp.watch("./assets/fonts/**/*.*", gulp.series('fonts'));

    done();
}));

