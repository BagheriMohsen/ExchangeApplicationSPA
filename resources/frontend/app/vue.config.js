module.exports = {
    "transpileDependencies": [
        "vuetify"
    ],
    // proxy API requests to Valet during development
    // devServer: {
    //     proxy: 'http://localhost:8000'
    // },

    // output built static files to Laravel's public dir.
    // note the "build" script in package.json needs to be modified as well.
    outputDir: '../../../public/',

    publicPath: process.env.NODE_ENV === 'production' ?
        '/' :
        '/',

    // modify the location of the generated HTML file.
    indexPath: process.env.NODE_ENV === 'production' ?
        '../resources/views/app.blade.php' :
        'index.html',
    // pwa : {
    //   workboxPluginMode : 'InjectManifest',
    //   workboxOptions: {
    //     exclude : [/\.*$/ ]
    //   }
    // }
}
