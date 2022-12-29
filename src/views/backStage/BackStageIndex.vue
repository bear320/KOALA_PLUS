<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <div class="cards">
            <div>
                <div class="top2">
                    <div class="card">
                        <router-link to="/bs-support-list">
                            <h2>資助認養管理</h2>
                        </router-link>
                        <router-link to="/bs-support-statistic">
                            <Circle
                                :size="120"
                                :trail-width="6"
                                :stroke-width="5"
                                :percent="supSum / 100"
                                stroke-linecap="square"
                                stroke-color="#FD646F"
                            >
                                <div class="demo-Circle-custom">
                                    <p class="sum">{{ supSum }}</p>
                                    <p class="mini">半年累計金額</p>
                                </div>
                            </Circle>
                        </router-link>
                    </div>
                    <router-link to="/bs-order-list" class="card">
                        <h2>訂單管理</h2>
                        <div>
                            <div>
                                <p class="mini">月訂單</p>
                                <p class="counts">
                                    {{ monthlyOrders["m"] }}
                                </p>
                            </div>
                            <div>
                                <p class="mini">未出貨</p>
                                <p class="counts">{{ orderCount["all"] }}</p>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="card">
                    <router-link to="/bs-admin-list">
                        <img
                            src="@/assets/images/backstageindex/adminIcon.png"
                        />
                        <h2>權限管理</h2>
                    </router-link>
                    <router-link to="/bs-admin-add" class="detail"
                        >新增管理員帳戶</router-link
                    >
                </div>
                <div class="card">
                    <router-link to="/bs-koala-list">
                        <img
                            src="@/assets/images/backstageindex/koalaIcon.png"
                        />
                        <h2>無尾熊管理</h2>
                    </router-link>
                    <router-link to="/bs-koala-add" class="detail"
                        >新增無尾熊資訊</router-link
                    >
                </div>
            </div>
            <div>
                <div class="card">
                    <router-link to="/bs-booking-list">
                        <img
                            src="@/assets/images/backstageindex/bookingIcon.png"
                        />
                        <h2>園區導覽管理</h2>
                    </router-link>
                    <router-link to="/bs-booking-dayoff" class="detail"
                        >新增休館管理</router-link
                    >
                </div>
                <div class="card">
                    <router-link to="/bs-article-list">
                        <img
                            src="@/assets/images/backstageindex/articleIcon.png"
                        />
                        <h2>公告管理</h2>
                    </router-link>
                    <router-link to="/bs-article-add" class="detail"
                        >新增公告文章</router-link
                    >
                </div>
                <div class="card">
                    <router-link to="/bs-product-list">
                        <img
                            src="@/assets/images/backstageindex/productIcon.png"
                        />
                        <h2>商品管理</h2>
                    </router-link>
                    <router-link to="/bs-coupon-list" class="detail"
                        >優惠券管理</router-link
                    >
                    <router-link to="/bs-product-add" class="detail2"
                        >新增商品資訊</router-link
                    >
                </div>
                <div class="card">
                    <router-link to="/bs-member-list">
                        <img
                            src="@/assets/images/backstageindex/memberIcon.png"
                            alt=""
                        />
                        <h2>會員管理</h2>
                    </router-link>
                    <router-link to="/bs-member-blacklist" class="detail"
                        >黑名單管理</router-link
                    >
                </div>
            </div>
        </div>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            orderCount: [],
            monthlyOrders: [],
            supSum: [],
        };
    },
    methods: {
        getSupSum() {
            const apiURL = new URL(`${BASE_URL}/getSupportSum.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.supSum = parseInt(json[0]["sum"]);
                });
        },
        getOrderCount() {
            const apiURL = new URL(`${BASE_URL}/getOrderCount.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.orderCount = json[0];
                    this.monthlyOrders = json[1];
                });
        },
    },
    created() {
        this.getSupSum();
        this.getOrderCount();
    },
};
</script>

<style lang="scss" scoped>
article {
    height: 100vh;

    .cards {
        height: 90%;
    }
    .cards > div {
        box-sizing: border-box;
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        .top2 {
            width: calc(50% + 20px);
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            .card {
                width: 100%;
                margin: 0 10px;
                text-align: left;

                .counts {
                    text-align: center;
                }
                .mini {
                    font-size: 10px;
                    color: $green;
                    font-weight: 700;
                }
            }
            .card:first-child {
                background-color: rgba(252, 245, 234, 0.6);
                height: calc(65% - 20px);
                display: flex;

                a:first-child {
                    width: 70%;
                    height: 100%;
                    padding: 50px 20px;
                }
                .sum {
                    color: #fd646f;
                    font-size: $h2;
                }
                .mini {
                    margin-top: 10px;
                }
            }
            .card:last-child {
                background-color: rgba(252, 239, 239, 0.6);
                display: flex;
                justify-content: space-between;
                width: 100%;
                height: 35%;

                h2 {
                    padding: 20px;
                }

                div {
                    display: flex;

                    div {
                        flex-direction: column;
                        margin: 10px 20px;
                    }

                    div p:last-child {
                        font-size: $h2;
                        font-weight: 700;
                        color: #f89c26;
                    }
                    div:first-child p:last-child {
                        color: #ef651c;
                    }
                }
            }
        }
        .card {
            width: 25%;
            height: 100%;
            margin: 0 10px;
            background-color: rgba(241, 254, 244, 0.6);
            position: relative;

            &:active {
                box-shadow: inset 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
            }

            a {
                height: 70%;
                padding: 20px;

                h2 {
                    line-height: 1.5;
                }

                img {
                    height: 110px;
                    margin-top: 10%;
                    margin-right: 10%;
                }
            }
            %detail {
                display: block;
                height: 12%;
                width: 100%;
                padding: 10px;
                position: absolute;
                line-height: 15px;
                color: $font-color;
                box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);

                &:hover {
                    font-weight: 900;
                }
                &:active {
                    box-shadow: inset 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
                }
            }
            .detail {
                @extend %detail;
                background-color: #87cc99;
                bottom: 0;
                border-radius: 0 0 10px 10px;
            }
            .detail2 {
                @extend %detail;
                background-color: #aee0bb;
                bottom: 12%;
            }
        }
    }
}
</style>
