const path = require("path");
const glob = require("glob");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const INCLUDE_PATTERN =
  /<include\s+src=["'](.+?)["']\s*\/?>\s*(?:<\/include>)?/gis;

const processNestedHtml = (content, loaderContext, dir = null) =>
  !INCLUDE_PATTERN.test(content)
    ? content
    : content.replace(INCLUDE_PATTERN, (m, src) => {
        const filePath = path.resolve(dir || loaderContext.context, src);
        loaderContext.dependency(filePath);
        return processNestedHtml(
          loaderContext.fs.readFileSync(filePath, "utf8"),
          loaderContext,
          path.dirname(filePath)
        );
      });

const generateHTMLPlugins = () =>
  glob.sync("./resources/views/**/*.blade.php").map((dir) => {
    return new HtmlWebpackPlugin({
      filename: path.relative("./resources/views", dir),
      template: dir,
      inject: "body",
    });
  });

module.exports = {
  mode: "development",
  entry: "./resources/js/app.js",
  devServer: {
    static: {
      directory: path.join(__dirname, "public/build"),
    },
    compress: true,
    port: 3000,
    hot: true,
    proxy: {
      "/": "http://localhost:8000", // Laravel backend
    },
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [
                  require("autoprefixer")({
                    overrideBrowserslist: ["last 2 versions"],
                  }),
                ],
              },
            },
          },
        ],
      },
      {
        test: /\.(png|svg|jpg|jpeg|gif)$/i,
        type: "asset/resource",
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: "asset/resource",
      },
      {
        test: /\.blade\.php$/,
        loader: "html-loader",
        options: {
          preprocessor: processNestedHtml,
        },
      },
    ],
  },
  plugins: [
    ...generateHTMLPlugins(),
    new MiniCssExtractPlugin({
      filename: "css/app.css",
      chunkFilename: "css/app.css",
    }),
  ],
  output: {
    filename: "resources/views/js/index.js",
    path: path.resolve(__dirname, "public/build"),
    clean: true,
    assetModuleFilename: "assets/[name][ext]",
  },
  target: "web",
  stats: "errors-only",
};
