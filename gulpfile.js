'use strict';

const gulp = require('gulp');
const gulplog = require('gulplog');
const webpack = require('webpack');
const notifier = require('node-notifier');
const path = require('path');

// модуль для создания svg-спрайтов
const svgSprite = require('gulp-svg-sprite');
// модуль для склеевания фалов
const concat = require('gulp-concat');
// модуль для переименования фалов
const replace = require('gulp-replace');
// модуль для переименования фалов
const rename = require('gulp-rename');
// Минификация html
const htmlmin = require('gulp-htmlmin');
// Модуль для условного управления потоком
const gulpIf = require('gulp-if');
// плагин для удаления файлов и каталогов
const del = require('del');
// сервер для работы и автоматического обновления страниц
const browserSync = require('browser-sync').create();
// html препроцессор
const pug = require('gulp-pug');
// модуль для компиляции SASS (SCSS) в CSS
const sass = require('gulp-sass');
// модуль для автоматической установки автопрефиксов
const autoprefixer = require('gulp-autoprefixer');
// модуль для построения sourcemap
const sourcemaps = require('gulp-sourcemaps');
// модуль для минификации css
const cssmin = require('gulp-minify-css');
// плагин для сжатия PNG, JPEG, GIF и SVG изображений
const imagemin = require('gulp-imagemin');
// плагин для сжатия jpeg
const jpegrecompress = require('imagemin-jpeg-recompress');
// плагин для сжатия png
const pngquant = require('imagemin-pngquant');

const isDevelopment = !process.env.NODE_ENV || process.env.NODE_ENV === 'development';

const paths = {
  pug: {
    src: "./src/{pugTemplates,pages}/**/*.pug",
    dist: "./dist/",
    watch: "./src/{pugTemplates,pages}/**/*.pug"
  },
  fonts: {
    src: "./src/fonts/**/*.{ttf,otf,woff,woff2}",
    dist: "./dist/fonts/",
    watch: "./src/fonts/**/*.{ttf,otf,woff,woff2}"
  },
  images: {
    src: "./src/{common/img,pages/img}/*.{jpg,jpeg,png,gif,svg}",
    dist: "./dist/img/",
    watch: "./src/{common/img,pages/img}/*.{jpg,jpeg,png,gif,svg}"
  },
  styles: {
    src: "./src/{common,pages}/**/*.scss",
    dist: "./dist/css/",
    watch: "./src/{common,pages}/**/*.scss"
  },
  svgSprite: {
    src: "./src/common/icons/*.svg",
    dist: "./dist/img/common/",
    watch: "./src/common/icons/*.svg"
  }
};

gulp.task('clean', () => {
  return del([
    './dist/**/*',
    './tmp/**/*'
  ]);
});

gulp.task('pug', () => {
  return gulp.src(paths.pug.src)
    .pipe(pug(/*{ pretty: true }*/))
    .pipe(rename({
      dirname: 'pages'
    }))
    .pipe(gulp.dest(paths.pug.dist))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('fonts', () => {
  return gulp.src(paths.fonts.src)
    .pipe(gulp.dest(paths.fonts.dist))
    .pipe(browserSync.stream());
});

gulp.task('images', () => {
  return gulp.src(paths.images.src)
    .pipe(imagemin([
      imagemin.gifsicle({interlaced: true}),
      imagemin.jpegtran({progressive: true}),
      jpegrecompress({
        loops: 5,
        min: 70,
        max: 75,
        quality: 'medium'
      }),
      /*imagemin.svgo({
        plugins: [
          {removeViewBox: false},
          {cleanupIDs: false}
        ]
      }),*/
      imagemin.optipng({optimizationLevel: 3}),
      pngquant({
        quality: [0.7, 0.8],
        speed: 5
      })
    ]))
    .pipe(rename((path) => {
      path.dirname = path.dirname.replace(/pages\\|img/g, '');
    }))
    .pipe(gulp.dest(paths.images.dist))
    .pipe(browserSync.stream());
});

gulp.task('svgSprite', () => {
  return gulp.src(paths.svgSprite.src)
    .pipe(svgSprite({
      //dest: '.',
      mode: {
        /*shape: {
          transform: [
            {svgo: {
                plugins: [
                    {transformsWithOnePath: true},
                    {moveGroupAttrsToElems: false}
                ]
            }}
          ]
        },*/
        symbol: {
          dest: '.',
          sprite: 'icons.svg',
          /*prefix: '%s',*/
          //dimensions: '',
          render: {
            scss: {
              dest: '_icons.scss',
              template: 'src/common/scssSpriteTemplate.mustache'
            }
          },
          example: true,
        }
      }
    }))
    .pipe(gulp.dest((file) => {
      //console.log(path.resolve(__dirname, './srs/common/scssSpriteTemplate.mustache'))

      return file.extname == '.scss' ? './tmp/' : paths.svgSprite.dist;
    }))
    .pipe(browserSync.stream());
});

gulp.task('webpack', function(callback) {
  let options = {
    mode: isDevelopment ? 'development' : 'production',
    entry: {
      main: path.resolve(__dirname, 'src/common/common.js')
    },
    output:  {
      path: path.resolve(__dirname, 'dist/js'),
      publicPath: '/js/'
    },
    watch:   isDevelopment,
    watchOptions: {
      aggregateTimeout: 500,
      ignored: /node_modules/
    },
    devtool: isDevelopment ? 'cheap-module-inline-source-map' : false,
    module:  {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader'
          }
        }
      ]
    },
    plugins: [
      new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery'
      })
    ]
  };

  webpack(options, function(err, stats) {
    if (!err) {
      err = stats.toJson().errors[0];
    }
    if (err) {
      notifier.notify({
        title: 'Webpack',
        message: err
      });
      gulplog.error(err);
    } else {
      gulplog.info(stats.toString({
        colors: true
      }));
    }
    if (!options.watch && err) {
      callback(err);
    } else {
      callback();
    }
  });
});

gulp.task('styles', () => {
  return gulp.src(paths.styles.src)
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulpIf(!isDevelopment, cssmin()))
    .pipe(concat('main.css'))
    .pipe(gulp.dest(paths.styles.dist))
    .pipe(browserSync.stream());
});

gulp.task('webserver', () => {
  browserSync.init({
    server: "./dist/",
    port: 4000
  });

  gulp.watch(paths.pug.watch, gulp.series('pug'));
  gulp.watch(paths.styles.watch, gulp.series('styles'));
  gulp.watch(paths.images.watch, gulp.series('images'));
  gulp.watch(paths.svgSprite.watch, gulp.series('svgSprite'));
  gulp.watch(paths.fonts.watch, gulp.series('fonts'));
});

gulp.task('build',
  gulp.series('clean',
    'svgSprite',
    gulp.parallel(
      'fonts',
      'images',
      'styles',
      'webpack',
      'pug'
    )
  )
);

gulp.task('default', gulp.series(
  'build',
  'webserver'
));