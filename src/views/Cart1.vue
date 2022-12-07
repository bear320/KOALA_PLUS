<template>
    <Header />
    <img class="bg" src="" alt="" />
    <main class="nav-space">
        <div class="wrapper">
            <Row>
                <Col span="24">
                    <div>
                        <h1>購物車</h1>
                        <h3>您的商品</h3>
                    </div>
                </Col>
            </Row>
            <Row :gutter="40">
                <Col span="15">
                    <div>
                        <div class="card cart-title">
                            <Row>
                                <Col span="9">品項</Col>
                                <Col span="3">單價</Col>
                                <Col span="6">數量</Col>
                                <Col span="6">小計</Col>
                            </Row>
                        </div>
                    </div>
                    <CartItem
                        v-for="cartItem in cartList"
                        :key="cartItem.id"
                        :prodId="cartItem.id"
                        :prodImg="cartItem.image"
                        :prodName="cartItem.name"
                        :prodQuantity="cartItem.quantity"
                        :prodPrice="cartItem.price"
                    ></CartItem>
                </Col>

                <Col span="9">
                    <div class="card create-order">
                        <div class="coupon">
                            <div class="coupon-text">優惠碼</div>
                            <div class="coupon-form">
                                <input
                                    class="coupon-input"
                                    type="text"
                                    placeholder="請輸入優惠碼"
                                    v-model="couponCode"
                                />
                                <div class="btn-lowest coupon-submit">送出</div>
                            </div>
                            <div class="coupon-check">
                                <span class="check-link" @click="openCoupon"
                                    >按這裡</span
                                >查看我的優惠代碼
                            </div>
                            <div class="discount-text">優惠折扣</div>
                            <div class="coupon-detail">
                                <div class="coupon-name">{{ couponName }}</div>
                                <div class="coupon-pric">
                                    x{{ couponDiscount }}
                                </div>
                            </div>
                            <div class="product-total">
                                <div class="total-text">商品總金額</div>
                                <div class="total-pric">${{ sumTotal }}</div>
                            </div>
                            <div class="coupon-discount">
                                <div class="coupon-name">折扣</div>
                                <div class="coupon-pric">-${{ discount }}</div>
                            </div>
                            <div class="sum">
                                <div class="sum-text">總付款金額</div>
                                <div class="sum-price">
                                    NT${{ sumTotal - discount }}
                                </div>
                            </div>
                            <div class="get-coin">
                                獲得{{ sumTotal / 10 }}
                                <img
                                    src="@/assets/images/product/coin.png"
                                    alt=""
                                />
                            </div>
                            <router-link
                                to="/cart2"
                                class="btn-paramy check-order"
                                >確認訂單</router-link
                            >
                        </div>
                        <Coupon
                            v-if="isShowCoupon"
                            :couponArr="coupon"
                            @close="closeCoupon"
                            @updateCoupon="update"
                        ></Coupon>
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
        CartItem,
        Coupon,
    },
    data() {
        return {
            cartList: this.$store.state.cart,
            couponDiscount: 0,
            coupon: [
                {
                    id: "001",
                    name: "85折優惠折扣券",
                    discount: "85折",
                    value: 0.85,
                    deadline: 30,
                    code: "#168168",
                },
                {
                    id: "002",
                    name: "75折優惠折扣券",
                    discount: "75折",
                    value: 0.75,
                    deadline: 30,
                    code: "#787878",
                },
                {
                    id: "003",
                    name: "95折優惠折扣券",
                    discount: "95折",
                    value: 0.95,
                    deadline: 30,
                    code: "#87878",
                },
            ],
            isShowCoupon: false,
            couponDiscount: 0,
            couponCode: "",
            couponName: "",
        };
    },
    computed: {
        sumTotal() {
            let sum = 0;
            this.cartList.map((item) => {
                sum += item.quantity * item.price;
            });
            return sum;
        },
        discount() {
            if (!this.couponDiscount) {
                return 0;
            } else {
                return this.sumTotal - this.sumTotal * this.couponDiscount;
            }
        },
    },
    methods: {
        openCoupon() {
            this.isShowCoupon = true;
        },
        closeCoupon() {
            this.isShowCoupon = false;
        },
        update(coupon) {
            this.couponCode = coupon.code;
            this.couponDiscount = coupon.value;
            this.couponName = coupon.name;
            this.isShowCoupon = false;
        },
    },
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
        padding-bottom: 10vh;
        h1,
        h3 {
            text-align: left;
            padding-left: 10px;
            color: $font_color;
        }
        h1 {
            margin-top: 80px;
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
        .cart-title {
            padding: 20px 0;
            font-size: $h4;
            margin-bottom: 30px;
            border-radius: 10px;
            color: $font_color;
        }

        .coupon {
            padding: 30px 35px;
            border-radius: 10px;
            a {
                display: block;
            }
            .coupon-text {
                margin-bottom: 30px;
                text-align: left;
            }
            .coupon-form {
                display: flex;
                // justify-content: center;
                align-items: center;
                gap: 30px;
                margin-bottom: 20px;
                .coupon-input {
                    border-radius: 0;
                    border: 0;
                    border-bottom: 1px solid #000;
                    background-color: transparent;
                }
                .coupon-submit {
                    font-size: $p;
                    @include btnSize(20px);
                }
            }

            .coupon-check {
                text-align: left;
                margin-bottom: 20px;
                .check-link {
                    font-weight: 700;
                    color: $green;
                    cursor: pointer;
                }
            }
            .discount-text {
                font-size: $h4;
                text-align: left;
                font-weight: 700;
            }
            .coupon-detail {
                display: flex;
                justify-content: space-between;
                padding: 15px 0;
                border-bottom: 1px solid #333;
                margin-bottom: 20px;
            }
            .product-total {
                display: flex;
                justify-content: space-between;
                margin-bottom: 15px;
            }

            .coupon-discount {
                display: flex;
                justify-content: space-between;
                margin-bottom: 30px;
            }
            .sum {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
                .sum-text,
                .sum-price {
                    font-size: $h4;
                    font-weight: 700;
                }
                .sum-price {
                    color: $green;
                }
            }

            .get-coin {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 50px;
                img {
                    width: 30px;
                }
            }
        }

        .create-order {
            position: relative;
        }
    }
}
</style>
