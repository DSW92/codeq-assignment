const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
    mode: 'none',
    watch: true,
    entry: {
        app: ["./src/app.scss", "./src/app.js"],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css"
        }),
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"]
            },
        ]
    },
    optimization: {
        minimizer: [
          new CssMinimizerPlugin(),
          new TerserPlugin(),
        ],
        minimize: true,
      },
}