<template>
    <Header />
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
}
</style>

<script>
import Header from "@/components/header.vue";
export default {
    name: "",
    components: {
        Header,
    },
};
</script>
