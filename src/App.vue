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
    // name: "",
    // components: {
    //     Header,
    // },
    created() {
        // 如果存在會員資訊，存取他的會員資料
        if (this.$store.state.user) {
            this.$store.dispatch("getMemCart");
        }
    },
    watch: {
        // 監測登入狀態，若有會員登入則執行程式
        "$store.state.user"(newValue) {
            // 待補中
            console.log(newValue);
            // 更新購物車的資訊
            // this.$store.dispatch("getMemCart");
        },
    },
};
</script>
