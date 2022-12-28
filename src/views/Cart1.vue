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
            <Row :gutter="40" justify="center">
                <Col :xl="15" :lg="24" :md="24" span="24">
                    <div class="card-cart cart-title">
                        <Row>
                            <Col span="9">品項</Col>
                            <Col span="3">單價</Col>
                            <Col span="8" :xl="6" :lg="6">數量</Col>
                            <Col span="4" :xl="6" :lg="6">小計</Col>
                        </Row>
                    </div>
                    <CartItem
                        v-for="cartItem in $store.state.cart"
                        :key="cartItem.prod_id"
                        :prodId="+cartItem.prod_id"
                        :prodImg="cartItem.prod_img1"
                        :prodName="cartItem.prod_name"
                        :prodQuantity="+cartItem.cart_qty"
                        :prodPrice="+cartItem.prod_price"
                    ></CartItem>
                </Col>

                <Col :xl="9" :lg="24" :md="24" span="24">
                    <div class="card-cart create-order">
                        <div class="coupon">
                            <div class="coupon-text">優惠碼</div>
                            <div class="coupon-form">
                                <input
                                    class="coupon-input"
                                    type="text"
                                    placeholder="請輸入優惠碼"
                                    v-model="couponCode"
                                    @input="checkCoupon"
                                />
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
                                    x{{ $store.state.discount.coupon_discount }}
                                </div>
                            </div>
                            <div class="product-total">
                                <div class="total-text">商品總金額</div>
                                <div class="total-pric">
                                    ${{ productTotal }}
                                </div>
                            </div>
                            <div class="coupon-discount">
                                <div class="coupon-name">折扣</div>
                                <div class="coupon-pric">
                                    -${{ totalDiscount }}
                                </div>
                            </div>
                            <div class="sum">
                                <div class="sum-text">總付款金額</div>
                                <div class="sum-price">NT${{ payTotal }}</div>
                            </div>
                            <div class="get-coin">
                                獲得{{ getCoin }}
                                <img
                                    src="@/assets/images/product/coin.png"
                                    alt=""
                                />
                            </div>
                            <div
                                v-if="!cartItemLength"
                                to="/shop"
                                class="btn-paramy check-order"
                                @click="checkOrder(`shop`)"
                            >
                                前往購物
                            </div>
                            <div
                                v-else
                                to="/cart2"
                                class="btn-paramy check-order"
                                @click="checkOrder(`cart2`)"
                            >
                                確認訂單
                            </div>
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
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        Footer,
        CartItem,
        Coupon,
    },
    data() {
        return {
            coupon: [],
            isShowCoupon: false,
            couponCode: "",
            couponName: "",
        };
    },
    computed: {
        productTotal() {
            return this.$store.getters.productTotal;
        },
        totalDiscount() {
            return this.$store.getters.totalDiscount;
        },
        payTotal() {
            return this.$store.getters.payTotal;
        },
        getCoin() {
            return this.$store.getters.getCoin;
        },
        cartItemLength() {
            return this.$store.state.cart.length;
        },
    },
    methods: {
        checkCoupon() {
            let haveCoupon = this.coupon.find(
                (item) => item.coupon_code === this.couponCode
            );

            if (!haveCoupon) {
                this.$store.state.discount = {};
            } else {
                this.$store.state.discount = haveCoupon;
            }
        },
        openCoupon() {
            this.isShowCoupon = true;
        },
        closeCoupon() {
            this.isShowCoupon = false;
        },
        update(coupon) {
            this.couponCode = coupon.coupon_code;
            this.couponName = coupon.name;
            this.$store.state.coupon = coupon;
            this.isShowCoupon = false;
        },
        async getMemCoupons() {
            if (!this.$store.state.user) return;
            const res = await fetch(
                `${BASE_URL}/getMemCoupon.php?memId=${this.$store.state.user.mem_id}`
            );

            let temp = await res.json();

            this.coupon = temp.map((item) => {
                return {
                    mem_id: item.mem_id,
                    coupon_id: item.coupon_id,
                    coupon_code: item.coupon_code,
                    coupon_get_date: item.coupon_get_date,
                    coupon_exp_date: item.coupon_exp_date,
                    coupon_status: item.coupon_status,
                    coupon_discount: +(`0.` + item.coupon_code.slice(-2)),
                };
            });
        },
        checkOrder(to) {
            this.$router.push({ name: to });
        },
    },
    mounted() {
        this.getMemCoupons();
        let isChoiceCoupon = Object.keys(this.$store.state.discount).length > 0;
        this.couponCode = isChoiceCoupon
            ? this.$store.state.discount.coupon_code
            : "";
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
        margin-bottom: 180px;
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
            @include m() {
                display: none;
            }
        }

        .coupon {
            padding: 30px 35px;
            border-radius: 10px;
            @include d() {
                padding: 60px 65px;
            }
            @include m() {
                padding: 10px 15px;
            }
            a {
                display: block;
            }
            .coupon-text {
                font-size: $h3;
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
