<template lang="">
    <Header></Header>
    <main class="nav-space">
        <div class="banner banner-img"></div>
        <div class="wrapper">
            <div class="shop-head">
                <div class="breadcrumb">
                    <router-link to="/home">Home</router-link>
                    <router-link to="/shop">週邊商城</router-link>
                    <router-link
                        :to="`/shop?category=${this.$route.query.category}&order=prod_name&limit=9&page=1`"
                        v-if="this.$route.query.category"
                    >
                        {{ curCategory }}
                    </router-link>
                </div>

                <div class="search-box">
                    <input
                        type="text"
                        placeholder="搜尋"
                        v-model="searchText"
                        @change.lazy="searchProduct"
                    />
                    <Icon size="24" type="md-search" class="md-search" />
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <h1 class="title">週邊商城</h1>
                    <div class="category-box card">
                        <div
                            class="category-item"
                            v-for="(category, index) in categories"
                            :key="index"
                            :class="{
                                active:
                                    category.category ===
                                    this.$route.query.category,
                            }"
                            @click="changeCategory(category.category)"
                        >
                            {{ category.title }}
                        </div>
                        <img
                            class="side-img"
                            src="../assets/images/drawing2.png"
                            alt=""
                        />
                        <div class="price-range">
                            <div class="range-text">價格區間</div>
                            <div class="range-box">
                                <input
                                    class="input-range"
                                    type="text"
                                    v-model.number="lowerLimit"
                                />
                                <span>~</span>
                                <input
                                    class="input-range"
                                    type="text"
                                    v-model.number="upperLimit"
                                />
                                <div>$NTD</div>
                            </div>
                            <div
                                class="btn-paramy search-price"
                                @click="priceRange"
                            >
                                搜尋
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                    <div class="row">
                        <product-card
                            v-for="(item, index) in source"
                            :key="item.prod_id"
                            :proImg="item.prod_img1"
                            :proName="item.prod_name"
                            :proPrice="item.prod_price"
                            :proId="item.prod_id"
                            :col="'col-xl-4 col-lg-4 col-md-6 col-6'"
                        ></product-card>
                    </div>
                    <div class="row row-box">
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
    <Footer></Footer>
</template>
<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import ProductCard from "@/components/shop/ProductCard.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        Footer,
        ProductCard,
    },
    data() {
        return {
            source: [],
            categories: [
                { title: "所有分類", category: undefined },
                { title: "生活小物", category: "daily" },
                { title: "玩具/絨毛娃娃", category: "doll" },
                { title: "服飾", category: "apparel" },
            ],
            curPage: +this.$route.query.page ? +this.$route.query.page : 1,
            pageTotal: 0,
            searchText: "",
            lowerLimit: "",
            upperLimit: "",
        };
    },
    watch: {
        $route: function (q) {
            this.getProduct(q.query);
        },
    },
    computed: {
        curCategory() {
            if (this.$route.query.category === "daily") {
                return "生活小物";
            } else if (this.$route.query.category === "doll") {
                return "玩具/絨毛娃娃";
            } else if (this.$route.query.category === "apparel") {
                return "服飾";
            }
        },
    },
    methods: {
        priceRange() {
            if (this.upperLimit && this.lowerLimit) {
                console.log("GG");
                this.$router.push({
                    path: "/shop",
                    query: {
                        gte: this.upperLimit,
                        lte: this.lowerLimit,
                        order: `prod_name`,
                        limit: `9`,
                        page: `1`,
                    },
                });
            } else if (this.upperLimit || this.lowerLimit) {
                if (this.lowerLimit) {
                    this.$router.push({
                        path: "/shop",
                        query: {
                            gte: this.lowerLimit,
                            order: `prod_name`,
                            limit: `9`,
                            page: `1`,
                        },
                    });
                } else {
                    this.$router.push({
                        path: "/shop",
                        query: {
                            lte: this.upperLimit,
                            order: `prod_name`,
                            limit: `9`,
                            page: `1`,
                        },
                    });
                }
            }
            this.curPage = 1;
        },
        searchProduct() {
            if (!this.searchText) return;
            this.$router.push({
                path: "/shop",
                query: {
                    search: this.searchText,
                    order: `prod_name`,
                    limit: `9`,
                    page: `1`,
                },
            });
            this.curPage = 1;
            this.lowerLimit = "";
            this.upperLimit = "";
        },
        changeCategory(category) {
            if (!category) {
                this.$router.push({
                    path: "/shop",
                    query: { order: `prod_name`, limit: `9`, page: `1` },
                });
            } else {
                this.$router.push({
                    path: "/shop",
                    query: {
                        category: `${category}`,
                        order: `prod_name`,
                        limit: `9`,
                        page: `1`,
                    },
                });
            }
            this.curPage = 1;
            this.lowerLimit = "";
            this.upperLimit = "";
        },
        getProduct(queryParam) {
            if (!Object.keys(queryParam).length) {
                queryParam.order = "prod_name";
                queryParam.limit = "9";
                queryParam.page = "1";
            }

            /*  const apiURL = new URL(`${BASE_URL}/getProducts.php`); */
            /*  const apiURL = new URL(
                `http://localhost/cgd103_g1/public/api/getProducts.php`
            ); */
            const apiURL = new URL(`${BASE_URL}/getProducts.php`);
            const searchParams = new URLSearchParams(queryParam);
            apiURL.search = searchParams;
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.prods;
                    this.pageTotal = Math.ceil(json.prodCount / 9);
                    if (!this.source.length) {
                        throw new Error("查無相關結果");
                    }
                })
                .catch((error) => {
                    /* alert(error); */
                });
        },

        previousPage() {
            if (this.curPage <= 1) return;
            this.curPage -= 1;
            this.changePage();
            window.scrollTo({
                top: 500,
                behavior: "instant",
            });
        },
        nextPage() {
            if (this.curPage >= this.pageTotal) return;
            this.curPage += 1;
            this.changePage();
            window.scrollTo({
                top: 500,
                behavior: "instant",
            });
        },
        toFirstPage() {
            if (this.curPage <= 1) return;
            this.curPage = 1;
            this.changePage();
            window.scrollTo({
                top: 500,
                behavior: "instant",
            });
        },
        toLastPage() {
            if (this.curPage >= this.pageTotal) return;
            this.curPage = this.pageTotal;
            this.changePage();
            window.scrollTo({
                top: 500,
                behavior: "instant",
            });
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
    },
};
</script>
<style lang="scss" scoped>
.banner-img {
    background-image: url(@/assets/images/banner1.jpg);
    @include bgSetting(cover, center);
    margin-bottom: 100px;
    @include m() {
        margin-bottom: 15px;
    }
}

.shop-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 75px;
    @include m() {
        display: block;
        margin-bottom: 30px;
    }
    .search-box {
        display: inline-block;
        position: relative;
        input {
            border: 1px solid #333;
            padding: 10px;
            width: 300px;
        }
        .md-search {
            position: absolute;
            top: 50%;
            right: 3%;
            transform: translate(0%, -50%);
        }
    }
}

.breadcrumb {
    max-width: 1000px;
    // margin: 15px auto 0;
    margin-left: 50px;
    text-align: left;
    font-family: font-EL;
    color: #515a6e;
    @include m() {
        margin: 0 auto 30px auto;
    }
    a {
        color: #515a6e;
        padding-right: 20px;
    }
    a:last-child {
        color: $btn-color;
        font-family: font-R;
    }
    a + a::before {
        content: "›";
        color: #44514b;
        margin-right: 20px;
    }
}

.row-box {
    margin-bottom: 150px;
}

.title {
    margin-bottom: 30px;
}

.category-box {
    margin: 0 auto;
    width: 270px;
    padding: 35px;
    text-align: left;
    position: relative;
    @include m() {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .category-item {
        cursor: pointer;
        font-size: $h4;
        margin-bottom: 25px;
        color: $font_color;
        @include m() {
            font-size: $h4;
            width: calc(100% / 4 - 30px);
            margin-bottom: 0;
            text-align: center;
        }

        @include media(500) {
            width: calc(100% / 2 - 30px);
            text-align: center;
        }
        &:nth-child(1) {
            font-size: $h3;
            margin-bottom: 45px;
            @include m() {
                font-size: $h4;
                margin-bottom: 0;
            }
        }
        &:nth-child(4) {
            margin-bottom: 90px;
            @include m() {
                margin-bottom: 0;
            }
        }
    }
    .active {
        color: $green;
    }

    .price-range {
        color: $font_color;
        .range-text {
            text-align: left;
            margin-bottom: 5px;
        }
        .range-box {
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 20px;
            .input-range {
                width: 55px;
                margin-bottom: 10px;
            }
        }
        .search-price {
            text-align: center;
            cursor: pointer;
        }
    }
    .side-img {
        width: 250px;
        position: absolute;
        top: 0;
        left: -80%;
        @include d() {
            display: none;
        }
    }
}

.pagenation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-bottom: 60px;
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
