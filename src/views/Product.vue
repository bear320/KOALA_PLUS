<template lang="">
    <Header></Header>
    <main class="nav-space">
        <div class="wrapper">
            <Row>
                <Col span="24">
                    <ul class="breadcrumbs">
                        <li><router-link to="/home">首頁</router-link></li>
                        <li><router-link to="/shop">週邊商城</router-link></li>
                        <li>
                            <router-link
                                :to="`/shop?category=${source.category}&sort=name&limit=9&page=1`"
                                >生活小物</router-link
                            >
                        </li>
                        <li>
                            <router-link :to="`/shop/${source.id}`"
                                >無尾熊室內拖鞋</router-link
                            >
                        </li>
                    </ul>
                </Col>
            </Row>
            <Row>
                <Col span="12">
                    <image-slider :imgs="images"></image-slider>
                    <!-- <image-slider :imgs="source.images"></image-slider> -->
                </Col>
                <Col span="12">
                    <h1 class="product-name">{{ source.name }}</h1>
                    <p class="product-description">{{ source.description }}</p>
                    <div class="product-additional">
                        <p class="additional-info">購買此商品可獲得$$$$</p>
                        <img
                            class="additional-img"
                            src="../assets/images/product/coin.png"
                            alt=""
                        />
                    </div>
                    <div class="product-price">NTD$&nbsp{{ source.price }}</div>
                    <div class="product-box">
                        <div class="quantity-box">
                            <div class="quantity-text">數量</div>
                            <div class="quantity">
                                <Icon class="md-remove" type="md-remove" />
                                <input type="number" v-model="quantity" />
                                <Icon class="md-add" type="md-add" />
                            </div>
                        </div>
                        <div class="share-box">
                            <div class="share-text">Share</div>
                            <div class="community-group">
                                <img
                                    class="community-item"
                                    src="../assets/images/product/instagram.png"
                                    alt=""
                                />
                                <img
                                    class="community-item"
                                    src="../assets/images/product/facebook.png"
                                    alt=""
                                />
                                <img
                                    class="community-item"
                                    src="../assets/images/product/youtube.png"
                                    alt=""
                                />
                                <img
                                    class="community-item"
                                    src="../assets/images/product/twitter.png"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <div class="btn-paramy">加到購物車</div>
                    </div>
                </Col>
            </Row>

            <Row>
                <Col span="24">
                    <div class="rel-text">相關商品</div>
                </Col>
            </Row>
            <div class="row">
                <product-card
                    v-for="(item, index) in relProd"
                    :key="item.id"
                    :proImg="item.images[0]"
                    :proName="item.name"
                    :proPrice="item.price"
                    :proId="item.id"
                    :col="'col-3'"
                ></product-card>
            </div>
        </div>
    </main>
    <Footer></Footer>
</template>

<script>
import Header from "@/components/header.vue";
import ImageSlider from "@/components/shop/ImageSlider.vue";
import ProductCard from "@/components/shop/ProductCard.vue";
import Footer from "@/components/footer.vue";
export default {
    components: {
        Header,
        ImageSlider,
        ProductCard,
        Footer,
    },
    data() {
        return {
            images: [
                "banner1.jpg",
                "banner2.jpg",
                "banner3.jpg",
                "drawing1.png",
            ],
            source: [],
            relProducts: [],
            quantity: 1,
        };
    },
    computed: {
        relProd() {
            return this.relProducts.filter((prod) => {
                return prod.id !== this.source.id;
            });
        },
    },
    watch: {
        $route: function (q) {
            this.getProductDetail();
        },
    },
    methods: {
        getProductDetail() {
            const productId = this.$route.params.id;
            const apiURL = new URL(
                `https://learnnodejs-3s6rmmfxwq-de.a.run.app/api/v1/tours/${productId}`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.dtat.tour;
                })
                .then(() => {
                    this.getRelProduct(this.source.category);
                });
        },
        getRelProduct(category) {
            fetch(
                `https://learnnodejs-3s6rmmfxwq-de.a.run.app/api/v1/tours?category=${category}&sort=name`
            )
                .then((res) => res.json())
                .then((json) => {
                    this.relProducts = json.dtat.tours;
                });
        },
    },

    created() {
        this.getProductDetail();
    },
    mounted() {
        window.scrollTo({
            top: 200,
            behavior: "instant",
        });
    },
};
</script>

<style lang="scss" scoped>
.breadcrumbs {
    display: flex;
    margin: 100px 0 80px 0;
    li {
        a {
            color: $font_color;
        }
        &::after {
            content: ">";
        }
        &:last-child::after {
            content: "";
        }
        &:last-child a {
            color: $green;
        }
    }
}

.product-description {
    text-align: left;
    padding: 0px 60px;
    line-height: 1.5;
    margin-bottom: 40px;
}
.product-additional {
    display: flex;
    align-items: center;
    padding: 10px 60px;
    gap: 10px;
    margin-bottom: 30px;
    .additional-info {
        font-weight: 700;
        font-size: $h4;
    }
    .additional-img {
        width: 30px;
    }
}
.product-price {
    padding: 0px 60px;
    text-align: left;
    font-weight: 700;
    font-size: $h3;
    margin-bottom: 30px;
}
.product-box {
    padding: 0px 60px;
    display: flex;
    gap: 20px;
    margin-bottom: 50px;
    .quantity-text {
        text-align: left;
        margin-bottom: 10px;
    }
    .quantity {
        position: relative;
        input {
            text-align: center;
            width: 160px;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .md-remove {
            position: absolute;
            top: 50%;
            left: 0%;
            transform: translate(0%, -50%);
            color: $font_color;
            border-right: 1px solid black;
            padding: 5px;
        }
        .md-add {
            position: absolute;
            top: 50%;
            right: 0%;
            transform: translate(0%, -50%);
            color: $font_color;
            border-left: 1px solid black;
            padding: 5px;
        }
    }
    .share-text {
        text-align: left;
        margin-bottom: 10px;
    }
    .community-group {
        img {
            width: 20px;
            margin-right: 10px;
        }
    }
}
.btn-box {
    padding: 0px 60px;
    .btn-paramy {
        font-size: $h3;
        width: 180px;
    }
}
.rel-text {
    margin: 110px 0;
    font-size: $h3;
}
</style>
