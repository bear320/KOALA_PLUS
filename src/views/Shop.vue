<template lang="">
    <Header></Header>
    <article>
        <div class="banner-img"></div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1 class="title">週邊商城</h1>
                    <div class="category-box">
                        <div class="category-item" @click="test">所有分類</div>
                        <div class="category-item">生活小物</div>
                        <div class="category-item">玩具/絨毛娃娃</div>
                        <div class="category-item">服飾</div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <product-card v-for="item in 9"></product-card>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>
<script>
import Header from "@/components/header.vue";
import ProductCard from "@/components/shop/ProductCard.vue";
export default {
    components: {
        Header,
        ProductCard,
    },
    data() {
        return {
            testUrl: this.$route.query,
        };
    },
    watch: {
        $route: function (q) {
            console.log("網址變化了");
        },
    },
    methods: {
        test() {
            this.$router.push({ path: "/shop", query: { test: "qq" } });
            console.log(this.$route.query);
        },
    },
    created() {
        console.log("create");
    },
};
</script>
<style lang="scss" scoped>
.banner-img {
    background-size: cover;
    background: url(@/assets/images/shop/Koalas_2.png) no-repeat center/cover;
    height: 480px;
    margin-bottom: 100px;
}
.container {
    background-color: #fa0;
}
.category-box {
    // width: 270px;
    background-color: #3cb;
    margin: 0 auto;
    .category-item {
        cursor: pointer;
    }
}
</style>
