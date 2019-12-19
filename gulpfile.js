'use strict';

const gulp = require('gulp');
const gulplog = require('gulplog');
const webpack = require('webpack');
const notifier = require('node-notifier');
const path = require('path');
const buffer = require('vinyl-buffer');
const merge = require('merge-stream');

// модуль для создания растровых спрайтов
const spritesmith = require('gulp.spritesmith');
// модуль для форматирования
const prettier = require('@bdchauvette/gulp-prettier');
// модуль для форматирования html
const htmlbeautify = require('gulp-html-beautify');
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
  btxPug: {
    src: "./src/www/**/*.pug",
    dist: "./dist/www/",
    watch: "./src/www/**/*.pug"
  },
  fonts: {
    src: "./src/fonts/**/*.{ttf,otf,woff,woff2}",
    dist: "./dist/fonts/",
    watch: "./src/fonts/**/*.{ttf,otf,woff,woff2}"
  },
  styles: {
    src: ["./src/pages/**/*.scss", "./src/common/img/*.scss"],
    dist: "./dist/www/local/assets/css/",
    watch: ["./src/pages/**/*.scss", "./src/common/img/*.scss"]
  },
  templStyles: {
    src: "./src/common/common.scss",
    dist: "./dist/www/local/templates/euroFortochka/",
    watch: "./src/common/common.scss"
  },
  images: {
    src: "./src/{common/img,pages/*/img}/*.{jpg,jpeg,png,gif,svg}",
    dist: "./dist/www/local/assets/img/",
    watch: "./src/{common/img,pages/*/img}/*.{jpg,jpeg,png,gif,svg}"
  },
  rastrSprite: {
    src: "./src/common/icons/*.{png,jpg,jpeg}",
    dist: "./dist/www/local/assets/img/common/",
    watch: "./src/common/icons/*.{png,jpg,jpeg}"
  },
  svgSprite: {
    src: "./src/common/icons/*.svg",
    dist: "./dist/www/local/assets/img/common/",
    watch: ["./src/common/icons/*.svg", "./src/common/scssSpriteTemplate.mustache"]
  },
  btxTemplate: {
    src: ["./src/www/**", "!./src/www/**/*.pug"],
    dist: "./dist/www/",
    watch: ["./src/www/**", "!./src/www/**/*.pug"],
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
    .pipe(prettier({
      htmlWhitespaceSensitivity: 'ignore'
    }))
    .pipe(gulp.dest(paths.pug.dist))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('btxPug', () => {
  return gulp.src(paths.btxPug.src)
    .pipe(pug())
    /*.pipe(prettier({
      printWidth: 120,
      //parser: "php",
      //plugins: ["./node_modules/@prettier/plugin-php"]
    }))*/
    .pipe(rename({
      extname: '.php'
    }))
    .pipe(gulp.dest(paths.btxPug.dist))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('styles', () => {
  return gulp.src(paths.styles.src)
    .pipe(sass({
      includePaths: [
        process.cwd()
      ]
    }))
    .pipe(autoprefixer())
    .pipe(gulpIf(!isDevelopment, cssmin()))
    .pipe(rename({
      dirname: ''
    }))
    .pipe(gulp.dest(paths.styles.dist))
    .pipe(browserSync.stream());
});

gulp.task('templStyles', () => {
  return gulp.src(paths.templStyles.src)
    .pipe(sass({
      includePaths: [
        process.cwd()
      ]
    }))
    .pipe(autoprefixer())
    .pipe(gulpIf(!isDevelopment, cssmin()))
    .pipe(rename('template_styles.css'))
    .pipe(gulp.dest(paths.templStyles.dist))
});

gulp.task('btxTemplate', () => {
  return gulp.src(paths.btxTemplate.src, {
    dot: true
  })
    .pipe(gulpIf(/.*\.scss$/, sass({
      includePaths: [
        process.cwd()
      ]
    })))
    .pipe(gulp.dest(paths.btxTemplate.dist))
    .pipe(browserSync.stream());
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
      imagemin.svgo({
        plugins: [
          {removeViewBox: false},
          {cleanupIDs: false}
        ]
      }),
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
    //.pipe(gulp.dest("./dist/www/local/assets/img/"))
    .pipe(browserSync.stream());
});

gulp.task('rastrSprite', () => {
  let spriteData = gulp.src(paths.rastrSprite.src)
    .pipe(spritesmith({
      imgName: 'sprite.png',
      imgPath: paths.rastrSprite.dist.replace('./dist/www', '') + 'sprite.png',
      cssName: '_sprite.scss',
      padding: 5,
      cssVarMap: (sprite) => {
        sprite.name = 'icon-r-' + sprite.name;
      }
    }));

  let imgStream = spriteData.img
    .pipe(buffer())
    .pipe(imagemin([
      imagemin.jpegtran({progressive: true}),
      jpegrecompress({
        loops: 5,
        min: 70,
        max: 75,
        quality: 'medium'
      }),
      imagemin.optipng({optimizationLevel: 3}),
      pngquant({
        quality: [0.7, 0.8],
        speed: 5
      })
    ]))
    .pipe(gulp.dest(paths.rastrSprite.dist));

  let cssStream = spriteData.css
    .pipe(gulp.dest('./tmp/'));

  return merge(imgStream, cssStream);
});

gulp.task('svgSprite', () => {
  return gulp.src(paths.svgSprite.src)
    .pipe(svgSprite({
      mode: {
        symbol: {
          dest: '.',
          sprite: 'icons.svg',
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
      return file.extname == '.svg' ?  paths.svgSprite.dist : './tmp/';
    }))
    //.pipe(gulp.dest("./dist/www/local/assets/img/common/"))
    .pipe(browserSync.stream());
});

gulp.task('webpack', function(callback) {
  let options = {
    mode: isDevelopment ? 'development' : 'production',
    entry: {
      main: path.resolve(__dirname, 'src/common/common.js')
    },
    output:  {
      path: path.resolve(__dirname, 'dist/www/local/assets/js'),
      //publicPath: '/js/'
    },
    watch:   isDevelopment,
    watchOptions: {
      aggregateTimeout: 500,
      ignored: /node_modules/
    },
    devtool: isDevelopment ? 'cheap-module-inline-source-map' : false,
    resolve: {
      modules: [path.resolve(__dirname, 'src')]
    },
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
    /*plugins: [
      new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        Popper: ['popper.js', 'default']
      })
    ]*/
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

gulp.task('webserver', () => {
  browserSync.init({
    server: "./dist/",
    port: 4000,
    middleware: [
      function(req, res, next) {
        if (/(^\/local\/)/.test(req.url)) {
          req.url = '/www' + req.url;
        } else if (!/(^\/assets\/)|(^\/img\/)/.test(req.url)) {
          req.url = '/pages' + req.url;
        }
        next();
      }
    ]
  });

  gulp.watch(paths.pug.watch, gulp.series('pug'));
  gulp.watch(paths.btxPug.watch, gulp.series('btxPug'));
  gulp.watch(paths.templStyles.watch, gulp.series('templStyles'));
  gulp.watch(paths.styles.watch, gulp.series('styles'));
  gulp.watch(paths.images.watch, gulp.series('images'));
  gulp.watch(paths.rastrSprite.watch, gulp.series('rastrSprite', 'templStyles'));
  gulp.watch(paths.svgSprite.watch, gulp.series('svgSprite', 'templStyles'));
  gulp.watch(paths.fonts.watch, gulp.series('fonts'));
  gulp.watch(paths.btxTemplate.watch, gulp.series('btxTemplate'));
});

gulp.task('build',
  gulp.series('clean',
    gulp.parallel(
      'svgSprite',
      'rastrSprite',
    ),    
    gulp.parallel(
      'fonts',
      'images',
      'templStyles',
      'styles',
      'webpack',
      'pug',
      'btxPug',
      'btxTemplate'
    )
  )
);

gulp.task('default', gulp.series(
  'build',
  'webserver'
));
