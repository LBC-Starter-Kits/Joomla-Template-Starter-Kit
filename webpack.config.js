const path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    mode: "development",
    entry: {
        main: "./src/js/index.js",
        vendors: "./src/js/vendors.js"
    },
    output: {
        filename: "js/[name].js",
        path: path.resolve(__dirname,"dist"),
    },
    watch: true,
    watchOptions:{
        ignored: /node_modules/
    },
    module: {
        rules:[
            {
                test: /\.js$/,                
                exclude:/node_modules/,
                loader: "babel-loader"
            },
            {
                test: /\.scss$/,
                use: [
                    /*"style-loader",*/
                    MiniCssExtractPlugin.loader,  /* Cambiar style-loader por este para tener archivos css */
                    "css-loader",
                    "sass-loader"
                ]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "css/[name].css",
            chunkFilename: "css/[id].css"
        }),
        new CopyPlugin({
            patterns: [
                { from: path.resolve(__dirname,"src","images"), to: "images" },
                { from: path.resolve(__dirname,"src","html"), to: "html" },
                { from: "./src/favicon.ico", to: "favicon.ico" },
                { from: "./src/index.php", to: "index.php" },
                { from: "./src/template_preview.png", to: "template_preview.png" },
                { from: "./src/template_thumbnail.png", to: "template_thumbnail.png" },
                { from: "./src/templateDetails.xml", to: "templateDetails.xml" },                
            ],
        })
    ],
};