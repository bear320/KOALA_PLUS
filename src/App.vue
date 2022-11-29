<template>
    <router-view />
</template>

<style lang="scss">
@import "../src/assets/layout/reset.css";
@import "../src/assets/layout/grid.css";
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

nav {
    a {
        font-weight: bold;
        color: $darkgreen;
        height: 100%;

        &.router-link-exact-active {
            color: $green;
        }
    }
}
</style>
