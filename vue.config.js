const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
    transpileDependencies: true,
    css: {
        loaderOptions: {
            // by default the `sass` option will apply to both syntaxes
            // because `scss` syntax is also processed by sass-loader underlyingly
            // but when configuring the `prependData` option
            // `scss` syntax requires an semicolon at the end of a statement, while `sass` syntax requires none
            // in that case, we can target the `scss` syntax separately using the `scss` option
            sass: {
                additionalData: `@import "@/assets/sass/style.scss";`,
            },
        },
    },
    devServer: {
        proxy: {
            "/api_server": {
                target: "http://localhost/api/",
                changeOrigin: true,
                pathRewrite: {
                    "^/api_server": "",
                },
            },
        },
    },
    publicPath: process.env.NODE_ENV === "production" ? "/cgd103/g1/" : "/",
});
// module.exports = {
//     publicPath: process.env.NODE_ENV === "production" ? "/cgd103/g1/" : "/",
// };
