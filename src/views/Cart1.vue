<template>
    <Header />
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
                        <div class="cart-title">
                            <Row>
                                <Col span="9">品項</Col>
                                <Col span="3">單價</Col>
                                <Col span="6">數量</Col>
                                <Col span="6">小計</Col>
                            </Row>
                        </div>

                        <div class="qq" v-for="i in 5">
                            <Row align="middle">
                                <Col span="9">
                                    <Row
                                        class="gap"
                                        justify="center"
                                        align="middle"
                                    >
                                        <img
                                            class="product-img"
                                            src="https://fakeimg.pl/300x200/200"
                                        />
                                        <div class="product-name">
                                            無尾熊乾髮帽
                                        </div>
                                    </Row>
                                </Col>
                                <Col span="3">
                                    <div class="product-price">$350</div>
                                </Col>
                                <Col span="6"
                                    ><div class="quantity">
                                        <Icon
                                            class="md-remove"
                                            type="md-remove"
                                        />
                                        <input
                                            type="number"
                                            v-model="quantity"
                                        />
                                        <Icon
                                            class="md-add"
                                            type="md-add"
                                        /></div
                                ></Col>
                                <Col span="6">$350</Col>
                            </Row>
                        </div>
                    </div>
                </Col>

                <Col span="9">
                    <div class="create-order">
                        <div class="coupon">
                            <div class="coupon-text">優惠碼</div>
                            <div class="coupon-form">
                                <input
                                    class="coupon-input"
                                    type="text"
                                    placeholder="請輸入優惠碼"
                                />
                                <div class="btn-lowest coupon-submit">送出</div>
                            </div>
                            <div class="coupon-check">
                                <span class="check-link">按這裡</span
                                >查看我的優惠代碼
                            </div>
                            <div class="discount-text">優惠折扣</div>
                            <div class="coupon-detail">
                                <div class="coupon-name">85折優惠折扣券</div>
                                <div class="coupon-pric">-$285</div>
                            </div>
                            <div class="product-total">
                                <div class="total-text">商品總金額</div>
                                <div class="total-pric">-$1900</div>
                            </div>
                            <div class="coupon-discount">
                                <div class="coupon-name">折扣</div>
                                <div class="coupon-pric">-$285</div>
                            </div>
                            <div class="sum">
                                <div class="sum-text">總付款金額</div>
                                <div class="sum-price">NT$1615</div>
                            </div>
                            <div class="get-coin">
                                獲得190
                                <img
                                    src="@/assets/images/product/coin.png"
                                    alt=""
                                />
                            </div>
                            <div class="btn-paramy check-order">確認訂單</div>
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
export default {
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            quantity: 1,
        };
    },
};
</script>

<style lang="scss" scoped>
main {
    background: url(@/assets/images/backgroundleaf.jpg) no-repeat center/cover;
    object-fit: cover;

    h1,
    h3 {
        text-align: left;
        padding-left: 10px;
        color: $font_color;
    }
    h3 {
        color: $green;
    }
    .cart-title {
        background-color: #ffffff60;
        padding: 20px 0;
        font-size: $h4;
        margin-bottom: 30px;
        border-radius: 10px;
        color: $font_color;
    }

    .qq {
        background-color: #ffffff80;
        font-size: $p;
        padding: 20px 0;
        color: $font_color;
        margin-bottom: 30px;
        border-radius: 10px;
    }

    .gap {
        gap: 20px;
    }

    .product-img {
        width: 100px;
        height: 100px;
    }

    .product-price {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .quantity {
        position: relative;
        display: inline-block;
        input {
            text-align: center;
            width: 100px;
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

    .coupon {
        background-color: #ffffff60;
        padding: 30px 35px;
        border-radius: 10px;
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
                padding: 0 20px;
            }
        }

        .coupon-check {
            text-align: left;
            margin-bottom: 60px;
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
        .check-order {
        }
    }
}
</style>
