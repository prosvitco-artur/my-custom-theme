const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    entry: {
        admin: './static/admin/js/header-footer.js',
        main: './static/admin/js/main.js',
        switchDark: './static/public/js/switch-dark.js',
        bootstrap: './static/public/js/bootstrap.js',
        styles: './static/public/js/styles.js',
    },
    output: {
        filename: (pathData) => {
            if (pathData.chunk.name === 'admin') {
                return 'admin/js/[name].js';
            }
            return 'public/js/[name].js';
        },
        path: path.resolve(__dirname, 'build'),
        publicPath: '/',
    },
    mode: 'production',
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: (resourcePath, context) => {
                                return path.relative(path.dirname(resourcePath), context) + '/';
                            },
                        },
                    },
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env', '@babel/preset-react']
                    }
                }
            }
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: (pathData) => {
                if (pathData.chunk.name === 'admin') {
                    return 'admin/css/[name].css';
                }
                return 'public/css/[name].css';
            },
        }),
    ],
};
