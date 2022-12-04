<template lang="">
    <Header></Header>
    <main class="nav-space">
        <div>
            <div class="banner-img banner"></div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-4">
                    <h1 class="title">週邊商城</h1>
                    <div class="category-box">
                        <div
                            class="category-item"
                            v-for="(category, index) in categories"
                            :key="index"
                            @click="changeCategory(category.category)"
                        >
                            {{ category.title }}
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <product-card
                            v-for="(item, index) in source"
                            :key="item.id"
                            :proImg="item.images[0]"
                            :proName="item.name"
                            :proPrice="item.price"
                            :proId="item.id"
                            :col="'col-4'"
                        ></product-card>
                    </div>
                    <div class="row">
                        <div class="col-12 pagenation">
                            <Icon
                                type="md-skip-backward"
                                @click="toFirstPage"
                            />
                            <Icon
                                class="bgc"
                                type="ios-arrow-back"
                                @click="previousPage('previous')"
                            />
                            <input class="page" type="text" v-model="curPage" />
                            of {{ pageTotal }} pages
                            <Icon
                                class="bgc"
                                type="ios-arrow-forward"
                                @click="nextPage('next')"
                            />
                            <Icon type="md-skip-forward" @click="toLastPage" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
            source: [],
            categories: [
                { title: "所有分類", category: "" },
                { title: "生活小物", category: "bonbons" },
                { title: "玩具/絨毛娃娃", category: "raw" },
                { title: "服飾", category: "bar" },
            ],
            curPage: 1,
            pageTotal: 0,
        };
    },
    watch: {
        $route: function (q) {
            this.getProduct(q.query);
            this.getPage(q.query);
        },
    },
    methods: {
        changeCategory(category) {
            if (!category) {
                this.$router.push({
                    path: "/shop",
                    query: { sort: `name`, limit: `9`, page: `1` },
                });
            } else {
                this.$router.push({
                    path: "/shop",
                    query: {
                        category: `${category}`,
                        sort: `name`,
                        limit: `9`,
                        page: `1`,
                    },
                });
            }
        },
        getProduct(queryParam) {
            if (!Object.keys(queryParam).length) {
                queryParam.sort = "name";
                queryParam.limit = "9";
                queryParam.page = "1";
            }

            const apiURL = new URL(
                "https://learnnodejs-3s6rmmfxwq-de.a.run.app/api/v1/tours"
            );
            const searchParams = new URLSearchParams(queryParam);
            apiURL.search = searchParams;
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.dtat.tours;
                });
        },
        getPage(queryParam) {
            let apiURL =
                "https://learnnodejs-3s6rmmfxwq-de.a.run.app/api/v1/tours";

            let isHaveCategory = queryParam.category;

            let test = isHaveCategory
                ? `${apiURL}?category=${queryParam.category}`
                : `${apiURL}`;

            this.curPage = queryParam.page ? +queryParam.page : 1;
            fetch(test)
                .then((res) => res.json())
                .then((json) => {
                    this.pageTotal = Math.ceil(json.dtat.tours.length / 9);
                });
        },
        previousPage() {
            if (this.curPage <= 1) return;
            this.curPage -= 1;
            this.changePage();
        },
        nextPage() {
            if (this.curPage >= this.pageTotal) return;
            this.curPage += 1;
            this.changePage();
        },
        toFirstPage() {
            this.curPage = 1;
            this.changePage();
        },
        toLastPage() {
            this.curPage = this.pageTotal;
            this.changePage();
        },
        changePage() {
            const queryParam = { ...this.$route.query };
            queryParam.page = this.curPage;
            if (!this.$route.query.category) {
                this.$router.push({
                    path: "/shop",
                    query: queryParam,
                });
            } else {
                this.$router.push({
                    path: "/shop",
                    query: queryParam,
                });
            }
        },
    },
    created() {
        this.getProduct(this.$route.query);
        this.getPage(this.$route.query);
    },
};
</script>
<style lang="scss" scoped>
.banner-img {
    background: url(@/assets/images/shop/Koalas_2.png) no-repeat center/cover;
    margin-bottom: 100px;
}

.category-box {
    margin: 0 auto;
    .category-item {
        cursor: pointer;
    }
}
.pagenation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    .page {
        width: 32px;
        text-align: center;
    }
    .bgc {
        color: #333;
        background-color: #ccc;
        padding: 3px 5px;
        border-radius: 3px;
    }
}
</style>
