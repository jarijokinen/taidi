const slug = 'taidi';

const { dest, series, src } = require('gulp');
const plugins = require('gulp-load-plugins')();

function zip() {
  return src('src/**')
    .pipe(plugins.zip(`${slug}.zip`))
    .pipe(dest('.'));
}

exports.default = series(zip);
