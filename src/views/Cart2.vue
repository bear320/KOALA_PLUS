<template>
    <Header />
    <img class="bg" src="" alt="" />
    <main class="nav-space">
        <div class="wrapper">
            <h1>結帳</h1>
            <div class="checkout-box">
                <div class="order">
                    <h3>訂單詳情</h3>
                    <div class="card order-detail">
                        <div
                            class="order-item"
                            v-for="item in carts"
                            :key="item.id"
                        >
                            <div class="item-img">
                                <img src="https://fakeimg.pl/300x200/200" />
                            </div>
                            <div class="item-name">{{ item.name }}</div>
                            <div class="item-quantity">
                                x{{ item.quantity }}
                            </div>
                            <div class="item-total">
                                ${{ item.quantity * item.price }}
                            </div>
                        </div>
                        <div class="pay-box">
                            <div class="pay-text">總付款金額</div>
                            <div class="pay-total">NT${{ pay }}</div>
                        </div>
                    </div>
                </div>
                <div class="receiv">
                    <h3>收件資訊</h3>
                    <div class="card receiv-info">
                        <div class="member-form">
                            <input class="member-equal" type="checkbox" />
                            <label for="">與會員資料相同</label>
                        </div>
                        <div class="ship-form">
                            <label for="">收件人姓名:</label>
                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="請輸入真實姓名"
                            />
                        </div>
                        <div class="ship-form">
                            <label for="">手機號碼:</label>
                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="請輸入十位數手機號碼，不須輸入標點符號"
                            />
                        </div>
                        <div class="ship-form">
                            <label for="">收件地址:</label>
                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="請輸入完整收件地址"
                            />
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
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
            pay: localStorage.getItem("pay"),
        };
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

        .checkout-box {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            .order {
                width: calc(50% - 10px);
                @include d() {
                    width: 100%;
                }
                box-sizing: border-box;
                .order-detail {
                    padding: 30px 35px;
                    border-radius: 10px;
                    @include m() {
                        padding: 15px 35px;
                    }
                    .order-item {
                        margin-bottom: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        .item-img {
                            width: calc(100% / 4);

                            img {
                                width: 75px;
                                height: 75px;
                            }
                        }
                        .item-name {
                            width: calc(100% / 4);
                        }
                        .item-quantity {
                            width: calc(100% / 4);
                        }
                        .item-total {
                            width: calc(100% / 4);
                        }
                    }
                    .pay-box {
                        display: flex;
                        justify-content: space-between;
                        .pay-text {
                            font-size: $h4;
                            font-weight: 700;
                            width: calc(100% / 3);
                        }
                        .pay-total {
                            font-size: $h4;
                            color: $green;
                            width: calc(100% / 3);
                        }
                    }
                }
            }

            .receiv {
                width: calc(50% - 10px);
                @include d() {
                    width: 100%;
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
                    .pay {
                        width: 200px;
                    }
                }
            }
        }
    }
}
</style>
