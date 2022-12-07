<template>
    <Header />
    <img class="bg" src="" alt="" />
    <main class="nav-space">
        <div class="wrapper">
            <h1>結帳</h1>
            <Row :gutter="40">
                <Col span="10">
                    <div>
                        <h3>訂單詳情</h3>
                    </div>
                </Col>
                <Col span="14">
                    <div>
                        <h3>收件資訊</h3>
                    </div>
                </Col>
            </Row>
            <Row :gutter="40">
                <Col span="10">
                    <div class="card order-detail">
                        <div
                            class="order-item"
                            v-for="item in carts"
                            :key="item.id"
                        >
                            <Row justify="center" align="middle">
                                <Col span="6">
                                    <div class="item-img">
                                        <img
                                            src="https://fakeimg.pl/300x200/200"
                                        />
                                    </div>
                                </Col>
                                <Col span="8">
                                    <div class="item-name">{{ item.name }}</div>
                                </Col>
                                <Col span="4">
                                    <div class="item-quantity">
                                        x{{ item.quantity }}
                                    </div>
                                </Col>
                                <Col span="6">
                                    <div class="item-total">
                                        ${{ item.quantity * item.price }}
                                    </div>
                                </Col>
                            </Row>
                        </div>
                    </div>
                </Col>
                <Col span="14">
                    <div>
                        <div class="card receiv-info">
                            <Row>
                                <Col span="24">
                                    <div class="member-form">
                                        <input
                                            class="member-equal"
                                            type="checkbox"
                                        />
                                        <label for="">與會員資料相同</label>
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">收件人姓名:</label>
                                        <input
                                            type="text"
                                            name=""
                                            id=""
                                            placeholder="請輸入真實姓名"
                                        />
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">手機號碼:</label>
                                        <input
                                            type="text"
                                            name=""
                                            id=""
                                            placeholder="請輸入十位數手機號碼，不須輸入標點符號"
                                        />
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">收件地址:</label>
                                        <input
                                            type="text"
                                            name=""
                                            id=""
                                            placeholder="請輸入完整收件地址"
                                        />
                                    </div>
                                </Col>
                            </Row>
                            <Row justify="center" align="middle" :gutter="200">
                                <Col>
                                    <div class="btn-paramy">前往付款</div>
                                </Col>
                                <Col>
                                    <router-link to="/cart1"
                                        >回上一步</router-link
                                    >
                                </Col>
                            </Row>
                        </div>
                    </div>
                </Col>
            </Row>
        </div>
    </main>
    <Footer></Footer>
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import CartItem from "@/components/cart/CartItem.vue";
import Coupon from "@/components/cart/Coupon.vue";
export default {
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            carts: this.$store.state.cart,
        };
    },
    methods: {},
};
</script>

<style lang="scss" scoped>
.bg {
    background: url(@/assets/images/backgroundleaf.jpg) no-repeat center/cover;
    width: 100%;
    height: 100%;
    opacity: 0.3;
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
}
main {
    .wrapper {
        h1,
        h3 {
            text-align: left;
            padding-left: 10px;
            color: $font_color;
        }
        h1 {
            margin-top: 170px;
        }
        h3 {
            color: $green;
            position: relative;
            &::before {
                content: "";
                width: 5px;
                height: 75%;
                position: absolute;
                top: 50%;
                left: 0%;
                transform: translate(0%, -50%);
                background-color: $green;
            }
        }

        .order-detail {
            padding: 30px 35px;
            border-radius: 10px;

            .order-item {
                margin-bottom: 30px;

                img {
                    width: 75px;
                    height: 75px;
                }
            }
        }

        .receiv-info {
            font-size: $h4;
            margin-bottom: 30px;
            border-radius: 10px;
            padding: 50px;
            color: $font_color;

            .member-form {
                display: flex;
                justify-content: start;
                align-items: center;
                margin-bottom: 30px;
                position: relative;
                .member-equal {
                    position: absolute;
                    top: 50%;
                    left: -5%;
                    transform: translate(0%, -50%);
                }
            }
            .ship-form {
                display: flex;
                justify-content: start;
                align-items: center;
                margin-bottom: 30px;

                label {
                    width: 120px;
                    text-align: left;
                }

                input {
                    width: 385px;
                }
            }
            .btn-paramy {
                @include btnSize(20px);
            }
        }
    }
}
</style>
