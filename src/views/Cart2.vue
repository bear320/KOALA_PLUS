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
                    <div class="order-detail">
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
                        <div class="receiv-info">
                            <Row>
                                <Col span="24">
                                    <div class="ship-form">
                                        <input type="checkbox" />
                                        <label for="">與會員資料相同</label>
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">收件人姓名:</label>
                                        <input type="text" name="" id="" />
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">手機號碼:</label>
                                        <input type="text" name="" id="" />
                                    </div>
                                </Col>
                                <Col span="24">
                                    <div class="ship-form">
                                        <label for="">收件地址:</label>
                                        <input type="text" name="" id="" />
                                    </div>
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
    opacity: 0.5;
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
            background-color: #ffffffdd;
            padding: 30px 35px;
            border-radius: 10px;

            .order-item {
                img {
                    width: 75px;
                    height: 75px;
                }
            }
        }

        .receiv-info {
            background-color: #ffffffdd;
            padding: 20px 0;
            font-size: $h4;
            margin-bottom: 30px;
            border-radius: 10px;
            color: $font_color;

            .ship-form {
                display: flex;
                justify-content: start;
                align-items: center;

                label {
                    width: 120px;
                    text-align: left;
                }
            }
        }
    }
}
</style>
