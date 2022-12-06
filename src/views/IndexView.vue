<template>
    <!-- <Header /> -->
    <section>
        <router-link to="/home">前台</router-link>
        <router-link to="/bs-login">後台</router-link>
        <router-link to="/about">關於</router-link>
        <router-link to="/about-koala">無尾熊百科</router-link>
        <router-link to="/support">資助認養</router-link>
        <router-link to="/cart1">購物車1</router-link>
        <router-link to="/cart2">購物車2</router-link>
        <!-- <router-link to="/koala-info">無尾熊詳情頁</router-link> -->
        <router-link to="/koala-park">園區資訊</router-link>
        <router-link to="/login">登入註冊</router-link>
        <router-link to="/member">會員專區</router-link>
        <router-link to="/my-koala">我的無尾熊</router-link>
        <!-- <router-link to="/product">產品詳情</router-link> -->
        <router-link to="/shop">周邊商城</router-link>
    </section>
</template>

<script>
// import Header from "@/components/header.vue";
export default {
    components: {
        // Header,
    },
};
</script>

<style lang="scss" scoped>
a {
    display: block;
}
</style>
