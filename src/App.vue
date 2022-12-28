<template>
    <!-- <Header /> -->
    <router-view />
</template>

<style lang="scss">
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
}
</style>

<script>
// import Header from "@/components/header.vue";
export default {
    created() {
        this.$store.dispatch("getMem");
    },
};
</script>
