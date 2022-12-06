<template>
    <!-- <Header /> -->
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
// import Header from "@/components/header.vue";
export default {
    // name: "",
    // components: {
    //     Header,
    // },
    created() {
        // 將localStorage中的cart存進cartData中
        let cartData = JSON.parse(localStorage.getItem("cart"));
        // 當localStorage中沒有cart時，cartData為null
        // 呼叫store中的getCart並將空陣列傳遞過去
        if (!cartData) {
            this.$store.commit("getCart", []);
        } else {
            // 反之將cartData傳遞過去
            this.$store.commit("getCart", cartData);
        }
    },
};
</script>
