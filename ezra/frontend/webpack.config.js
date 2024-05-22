const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  entry: {
    index: './src/index.js',
  },
  devServer: {
    static: './dist',
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: './src/index.html',
    }),
    new HtmlWebpackPlugin({
      title: 'Chef Auth',
      filename: 'chef-auth.html',
      template: './src/chef-auth.html',
    }),
    new HtmlWebpackPlugin({
      title: 'Seeker Auth',
      filename: 'seeker-auth.html',
      template: './src/seeker-auth.html',
    }),
    new HtmlWebpackPlugin({
      title: 'Recipes List',
      filename: 'recipes-list.html',
      template: './src/recipes-list.html',
    }),
    new HtmlWebpackPlugin({
      title: 'Recipe Detail Page',
      filename: 'recipe-detail.html',
      template: './src/recipe-detail.html'
    }),
    new HtmlWebpackPlugin({
      title: 'Profile Page',
      filename: 'profile.html',
      template: './src/profile.html',
    }),
    // new HtmlWebpackPlugin({
    //   template: './src/chef-auth.html',
    // }),
  ],
  output: {
    filename: '[name].bundle.js',
    path: path.resolve(__dirname, 'dist'),
    clean: true,
  },
  optimization: {
    runtimeChunk: 'single',
  },
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: ['style-loader', 'css-loader'],
      },
      {
        test: /\.html$/i,
        loader: 'html-loader',
      },
    ],
  },
};