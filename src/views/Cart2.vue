<template>
    <Header />
    <img class="bg" src="" alt="" />
    <main class="nav-space">
        <div class="wrapper">
            <h1>結帳</h1>
            <div class="checkout-box">
                <div class="order">
                    <h3>訂單詳情</h3>
                    <div class="card-cart order-detail">
                        <div
                            class="order-item"
                            v-for="item in $store.state.cart"
                            :key="item.prod_id"
                        >
                            <div class="item-box">
                                <div class="item-img">
                                    <img
                                        :src="
                                            require(`@/assets/images/shop/${item.prod_img1}`)
                                        "
                                    />
                                </div>
                                <div class="item-name">
                                    {{ item.prod_name }}
                                </div>
                            </div>
                            <div class="item-quantity">
                                x{{ item.cart_qty }}
                            </div>
                            <div class="item-total">
                                ${{ item.cart_qty * item.prod_price }}
                            </div>
                        </div>
                        <div class="total-box">
                            <div class="pay-text">總付款金額</div>
                            <div class="pay-total">NT${{ payTotal }}</div>
                        </div>
                    </div>
                </div>
                <div class="receiv">
                    <h3>收件資訊</h3>
                    <div class="card-cart receiv-info">
                        <div class="member-form">
                            <input class="member-equal" type="checkbox" />
                            <label for="">與會員資料相同</label>
                        </div>
                        <form>
                            <div class="ship-form">
                                <label for="">收件人姓名：</label>
                                <input
                                    type="text"
                                    name="ord_person"
                                    placeholder="請輸入真實姓名"
                                    v-model="ordPerson"
                                />
                            </div>
                            <div class="ship-form">
                                <label for="">手機號碼：</label>
                                <input
                                    type="tel"
                                    name="ord_phone"
                                    placeholder="請輸入十位數手機號碼"
                                    v-model="ordPhone"
                                />
                            </div>
                            <div class="ship-form">
                                <label for="">收件地址：</label>
                                <input
                                    type="text"
                                    name="ord_add"
                                    placeholder="請輸入完整收件地址"
                                    v-model="ordAdd"
                                />
                            </div>
                            <div class="tappay-wrapper">
                                <h4 class="test">信用卡卡號：</h4>
                                <div
                                    class="tpfield"
                                    id="card-number"
                                    ref="number"
                                ></div>
                                <h4 for="card-number" class="test">
                                    卡片到期日：
                                </h4>
                                <div
                                    class="tpfield"
                                    id="card-expiration-date"
                                    ref="expirationDate"
                                ></div>
                                <h4 for="card-number" class="test">
                                    卡片安全碼(CCV)：
                                </h4>
                                <div
                                    class="tpfield"
                                    id="card-ccv"
                                    ref="ccv"
                                ></div>
                                <div class="btn-wrapper">
                                    <!-- 這是 TapPay 原生按鈕 -->
                                    <div class="tappay-btn" @click="onSubmit">
                                        前往付款
                                    </div>
                                    <div class="back-step" @click="goBack">
                                        回上一步
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="pay-box">
                                <div class="btn-paramy" @click="test">
                                    前往付款
                                </div>
                                <div class="back-step" @click="goBack">
                                    回上一步
                                </div>
                            </div> -->
                        </form>
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
import CartItem from "@/components/cart/CartItem.vue";
import Coupon from "@/components/cart/Coupon.vue";
export default {
    components: {
        Header,
        Footer,
    },

    data() {
        return {
            ordPerson: "品儒北七",
            ordPhone: "0987168168",
            ordAdd: "火車站旁邊的某棟四樓",
        };
    },
    computed: {
        payTotal() {
            return this.$store.getters.payTotal;
        },
    },
    methods: {
        goBack() {
            window.history.go(-1);
        },
        updateStatus(field) {
            switch (field) {
                case 0:
                    //欄位已填好，並且沒有問題
                    // console.log("field is ok");
                    break;
                case 1:
                    //欄位還沒有填寫
                    // console.log("field is empty");
                    break;
                case 2:
                    //欄位有錯誤，此時在 CardView 裡面會用顯示 errorColor
                    // console.log("field has error");
                    break;
                case 3:
                    //使用者正在輸入中
                    // console.log("usertyping");
                    break;
                default:
                // console.log("error!");
            }
        },

        // 觸發去取得狀態
        // 之後記得砍async
        async onSubmit() {
            const tappayStatus = TPDirect.card.getTappayFieldsStatus();
            if (tappayStatus.canGetPrime === false) {
                // can not get prime
                return;
            }
            console.log("有執行這行唷");

            // Get prime
            TPDirect.card.getPrime((result) => {
                if (result.status !== 0) {
                    // get prime error
                    console.log(result.msg);
                    return;
                }

                let prime = result.card.prime;
                console.log(prime);
                this.submitPrime(prime);
            });
        },

        async submitPrime(prime) {
            try {
                const mem_id = this.$store.state.user.mem_id;
                const coupon_id = this.$store.state.discount.coupon_id
                    ? this.$store.state.discount.coupon_id
                    : "null";

                // 要把得到的Prime Token 送給後端,
                console.log("交易進行中");
                let payReslut = await fetch(
                    `http://localhost/cgd103_g1/public/api/tappay.php?prime=${prime}`,
                    {
                        method: "post",
                        body: new URLSearchParams({
                            mem_id,
                            coupon_id,
                            ord_person: this.ordPerson,
                            ord_phone: this.ordPhone,
                            ord_add: this.ordAdd,
                        }),
                    }
                );

                // 不明白為何回傳的是字串
                let resText = await payReslut.json();
                // 這邊再把他轉為json物件
                let payStatus = JSON.parse(resText);
                console.log(payStatus);

                if (payStatus.status === 0) {
                    console.log("付款成功");
                } else {
                    console.log("付款失敗");
                }
            } catch (err) {
                console.log(err);
            }
        },
    },
    mounted() {
        TPDirect.setupSDK(
            126868,
            "app_DW5s6l3IyRtBeiHXgHJ1zWvEIl3gC6Dzb38wl1f4mPHSTMvvha462aLYzU1X",
            "sandbox"
        );
        const fields = {
            number: {
                element: this.$refs.number,
                placeholder: "**** **** **** ****",
            },
            expirationDate: {
                element: this.$refs.expirationDate,
                placeholder: "MM/YY",
            },
            ccv: {
                element: this.$refs.ccv,
                placeholder: "後三碼",
            },
        };

        TPDirect.card.setup({
            fields: fields,
            styles: {
                // Style all elements
                input: {
                    color: "gray",
                    "font-size": "18px",
                    "line-height": "1.5",
                },
                // Styling ccv field
                "input.cvc": {
                    "font-size": "18px",
                    height: "10px",
                },
                // Styling expiration-date field
                "input.expiration-date": {
                    "font-size": "18px",
                },
                // Styling card-number field
                "input.card-number": {
                    "font-size": "18px",
                },
                // Styling placeholder
                "::placeholder": {
                    color: "#c4cdd4",
                },
                // style focus state
                ":focus": {
                    color: "#33717d",
                },
                // style valid state
                ".valid": {
                    color: "#33717d",
                },
                // style invalid state
                ".invalid": {
                    color: "IndianRed",
                },
                // Media queries
                // Note that these apply to the iframe, not the root window.
                "@media screen and (max-width: 400px)": {
                    input: {
                        color: "#33717d",
                    },
                },
            },
        });

        TPDirect.card.onUpdate((update) => {
            if (update.canGetPrime) {
                //全部欄位皆為正確 可以呼叫 getPrime
                this.disabledBtnPay = false;
            } else {
                this.disabledBtnPay = false;
            }

            this.updateStatus(update.status.number);
            this.updateStatus(update.status.expiry);
            this.updateStatus(update.status.number);
        });
    },
};
</script>

<style lang="scss" scoped>
.test {
    text-align: left;
}
.tpfield {
    height: 40px;
    width: 385px;
    margin: 5px 0 30px;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid $btn-light-color;
    background-color: #fff;
}
.btn-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    .tappay-btn {
        padding: 5px 20px;
        border-radius: 10px;
        border: solid 0.5px $btn-color;
        font-size: 1.2rem;
        color: $bg-color;
        background-color: $btn-color;
        box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
        cursor: pointer;
        user-select: none;
        &:hover {
            font-weight: 700;
        }
        &:active {
            box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2),
                inset 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
        }
    }
    .back-step {
        padding: 5px 20px;
        font-size: 1.2rem;
        cursor: pointer;
    }
}

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
            @include m() {
                margin-top: 80px;
            }
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
                        .item-box {
                            display: flex;
                            flex-wrap: wrap;
                            align-items: center;
                            justify-content: center;
                            width: calc(100% / 2);

                            .item-img {
                                width: 50%;
                                @include m() {
                                    width: 100%;
                                }
                                img {
                                    width: 75px;
                                    height: 75px;
                                }
                            }
                            .item-name {
                                width: 50%;
                                @include m() {
                                    width: 100%;
                                }
                            }
                        }

                        .item-quantity {
                            width: calc(100% / 4);
                        }
                        .item-total {
                            width: calc(100% / 4);
                        }
                    }
                    .total-box {
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
                        flex-wrap: wrap;
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
                    .pay-box {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        .btn-paramy {
                            @include btnSize(20px);
                        }
                        .back-step {
                            cursor: pointer;
                        }
                    }
                }
            }
        }
    }
}
</style>
