
const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync');

function style() { // найти css afk? сделать его конвертацию и положить в нужнуюю дерикторию
    return gulp.src('./#source/scss/**/*.scss')
    // ** - все вложеный * - все файлы*/
       .pipe(sass()) // конвертируем
       .pipe(gulp.dest('./assets/css'))
	   .pipe(browserSync.stream())
}


// Обьединяем файлы скриптов, сжимаем и переменовываем
 function scripts() {
	return gulp.src([
		'./#source/js/**/*.js',
		//'src/wp-content/themes/twentyseventeen/assets/libs/jquery/dist/jquery.min.js', // Connecting my scripts
		//'src/wp-content/themes/twentyseventeen/assets/js/common.js', // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('./assets/js'))
	.pipe(browsersync.reload({ stream: true }))
}

function watch (){ // при изменении будет компилировать
browserSync.init({
	server: {
		baseDir: './'
	}
})
	gulp.watch('./#source/scss/**/*.scss', style);
	gulp.watch('./*/*.html').on('change', browserSync.reload) ;
//    gulp.watch('star-web/wp-content/themes/web-star/**/*.php', browsersync.reload) // Наблюдение за sass файлами php в теме

}

exports.style = style;
exports.watch = watch;