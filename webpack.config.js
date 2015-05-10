var autoprefixer = require('autoprefixer-core');
var lost = require('lost');

module.exports = {
    entry: "./app/main.js",
    output: {
        path: __dirname,
        filename: "js/main.js"
    },
    module: {
        loaders: [
            { test: /\.coffee$/, loader: 'coffee-loader' },
            { test: /\.js$/, loader: 'jsx-loader?harmony' },
            { test: /\.css$/, loader: "style!css" },
            { test: /\.scss$/, loader: "style!css!postcss!sass" },
            { test: /\.jpg$/, loader: "file-loader" },
            { test: /\.png$/, loader: "file-loader" }
        ]
    },
    postcss: [autoprefixer, lost],
    resolve: {
      extensions: ['', '.js', '.json', '.coffee', 'scss', '.jpg']
    }
};
