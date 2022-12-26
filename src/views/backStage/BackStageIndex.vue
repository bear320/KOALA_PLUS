<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <div class="cards">
            <div>
                <div class="top2">
                    <div class="card">
                        <a href="/bs-support-list">
                            <h2>資助認養管理</h2>
                        </a>
                    </div>
                    <div class="card">
                        <a href="/bs-order-list">
                            <h2>訂單管理</h2>
                        </a>
                        <div>
                            <a href="">
                                <p>月訂單</p>
                                <p class="counts">{{ monthlyOrders }}</p>
                            </a>
                            <a href="">
                                <p>未出貨</p>
                                <p class="counts">{{ orderCount }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <a href="/bs-admin-list">
                        <img
                            src="@/assets/images/backstageindex/adminIcon.png"
                        />
                        <h2>權限管理</h2>
                    </a>
                    <a href="/bs-admin-add" class="detail">新增管理員帳戶</a>
                </div>
                <div class="card">
                    <a href="/bs-koala-list">
                        <img
                            src="@/assets/images/backstageindex/koalaIcon.png"
                            alt=""
                        />
                        <h2>無尾熊管理</h2>
                    </a>
                    <a href="/bs-koala-add" class="detail">新增無尾熊資訊</a>
                </div>
            </div>
            <div>
                <div class="card">
                    <a href="/bs-booking-list-two">
                        <img
                            src="@/assets/images/backstageindex/bookingIcon.png"
                            alt=""
                        />
                        <h2>園區導覽管理</h2>
                    </a>
                    <a href="/bs-booking-dayoff" class="detail">新增休館管理</a>
                </div>
                <div class="card">
                    <a href="/bs-article-list">
                        <img
                            src="@/assets/images/backstageindex/articleIcon.png"
                            alt=""
                        />
                        <h2>公告管理</h2>
                    </a>
                    <a href="/bs-article-add" class="detail">新增公告文章</a>
                </div>
                <div class="card">
                    <a href="/bs-product-list">
                        <img
                            src="@/assets/images/backstageindex/productIcon.png"
                            alt=""
                        />
                        <h2>商品管理</h2>
                    </a>
                    <a href="" class="detail">優惠券管理</a>
                    <a href="/bs-product-edit" class="detail2">新增商品資訊</a>
                </div>
                <div class="card">
                    <a href="/bs-member-list">
                        <img
                            src="@/assets/images/backstageindex/memberIcon.png"
                            alt=""
                        />
                        <h2>會員管理</h2>
                    </a>
                    <a href="/bs-member-blacklist" class="detail">黑名單管理</a>
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
        };
    },
    methods: {
        getOrderCount() {
            const apiURL = new URL(`${BASE_URL}/getOrderCount.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    // console.log(json);
                    this.orderCount = json[0]["all"];
                    this.monthlyOrders = json[1]["m"];
                });
        },
    },
    created() {
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
            }
            .card:first-child {
                background-color: rgba(252, 245, 234, 0.6);
                height: calc(65% - 20px);

                a h2 {
                    padding-left: 20px;
                }
            }
            .card:last-child {
                background-color: rgba(252, 239, 239, 0.6);
                display: flex;
                justify-content: space-between;
                width: 100%;
                height: 35%;

                div {
                    display: flex;

                    a p:last-child {
                        font-size: $h2;
                        color: #f89c26;
                    }
                    a:first-child p:last-child {
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
