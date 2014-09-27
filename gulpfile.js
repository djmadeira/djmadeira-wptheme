var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var jpegRecompress = require('imagemin-jpeg-recompress');
var newer = require('gulp-newer');
var cssmin = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var pngcrush = require('imagemin-pngcrush');
var critical = require('criticalcss');
var fs = require('fs');

gulp.task('css', function () {
  var stream = gulp.src('build/css/**/*.scss');
  stream
    .pipe(sass({
      outputStyle: 'compressed',
    }))
    .on('error', function (e) { console.log('Problem compiling SCSS:\n' + JSON.stringify(e)) })
    .pipe(autoprefixer())
    .pipe(cssmin())
    .pipe(gulp.dest('css'));
  return stream;
});

gulp.task('critical', function () {
  critical.findCritical('test/home.html', function (err, output) {
    if (err) {
      throw new Error( err );
    } else {
      fs.writeFileSync('css/crit.css', output);
    }
  });
});

gulp.task('js', function () {
  var stream = gulp.src('build/js/**/*.js');
  var streamCopy = stream;
  stream
    .pipe(uglify())
    .pipe(gulp.dest('js'));
  return stream;
});

gulp.task('images', function () {
  var stream = gulp.src('build/images/**/*.{jpg,jpeg,png,gif,svg}');
  stream
    .pipe(newer('images'))
    .pipe(imagemin({
      optimizationLevel: 1,
      interlaced: true,
      use: [
        //jpegRecompress({ progressive: true, quality: 'medium' }),
        pngcrush({ reduce: true })
      ]
    }))
    .pipe(gulp.dest('images'));
  return stream;
});


gulp.task('allimages', function () {
  var stream = gulp.src('../../uploads/**/*.{jpg,jpeg,png,gif,svg}');
  stream
    .pipe(imagemin({
      optimizationLevel: 1,
      interlaced: true,
      progressive: true,
      use: [
        //jpegRecompress({ progressive: true, quality: 'medium' }),
        pngcrush({ reduce: true })
      ]
    })).on('error', function (e) { console.log('Problem optimizing images:\n' + e) })
    .pipe(gulp.dest('../../uploads/'));
  return stream;
});

gulp.task('watch', function () {
  gulp.watch('build/css/**/*.scss', ['css']);
  gulp.watch('build/js/**/*.js', ['js']);
  gulp.watch('build/images/**/*.{jpg,jpeg,png,gif,svg}', ['images']);
  gulp.watch('**/*.php');
  console.log('Watching for changes...');
});
