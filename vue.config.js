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
});
