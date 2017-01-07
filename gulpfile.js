var gulp = require('gulp'), 
concatCss = require('gulp-concat-css'), 
minifyCss = require('gulp-minify-css'), 
rename = require('gulp-rename'),
autoprefixer = require('gulp-autoprefixer'),
imageminJpegtran = require('imagemin-jpegtran'),
imageminOptipng = require('imagemin-optipng'),
imagemin = require('gulp-imagemin'),
debug = require('gulp-debug'),
gutil = require('gulp-util'),
pngquant = require('imagemin-pngquant');

gulp.task('css', function () {
  return gulp.src('css/defultOne.min.css')
  .pipe(autoprefixer([
      'Android 2.3',
      'Android >= 4',
      'Chrome >= 20',
      'Firefox >= 24', 
      'Explorer >= 8',
      'iOS >= 6',
      'Opera >= 12',
      'Safari >= 5']))
  .pipe(minifyCss())
  .pipe(rename('default.min.css'))
  .pipe(gulp.dest('prodaction/'));
});

gulp.task('watch', function(){
  gulp.watch("css/*.css", ['css']);
});


gulp.task('allAlbumPng', function () {
    return gulp.src('uploads/galery/album/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/galery/album/'));
});

gulp.task('allAlbum', function () {
    return gulp.src('uploads/galery/album/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/galery/album/'));
});

gulp.task('allCategoryPng', function () {
    return gulp.src('uploads/galery/category/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/galery/category/'));
});

gulp.task('allCategoryAlbum', function () {
    return gulp.src('uploads/galery/category/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/galery/category/'));
});

gulp.task('allVideoPng', function () {
    return gulp.src('uploads/video/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/video/'));
});

gulp.task('allVideo', function () {
    return gulp.src('uploads/video/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/video/'));
});


gulp.task('allBodyNewsPng', function () {
    return gulp.src('uploads/newsimages/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/newsimages/'));
});

gulp.task('allBodyNews', function () {
    return gulp.src('uploads/newsimages/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/newsimages/'));
});


gulp.task('allNewsThumbPng', function () {
    return gulp.src('uploads/news/thumb/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/news/thumb/'));
});

gulp.task('allNewsThumb', function () {
    return gulp.src('uploads/news/thumb/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/news/thumb/'));
});

gulp.task('allNewsFullPng', function () {
    return gulp.src('uploads/news/full/*.png')
        .pipe(debug())
        .pipe(imageminOptipng({optimizationLevel: 6})())
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/news/full/'));
});

gulp.task('allNewsFull', function () {
    return gulp.src('uploads/news/full/*')
        .pipe(debug())
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .on('error', gutil.log)
        .pipe(gulp.dest('uploads/news/full/'));
});

gulp.task('default', ['allAlbumPng', 'allAlbum', 'allCategoryAlbum', 'allCategoryPng', 'allVideoPng', 'allVideo', 'allBodyNewsPng', 'allBodyNews', 'allNewsThumbPng', 'allNewsThumb', 'allNewsFullPng', 'allNewsFull']);



















