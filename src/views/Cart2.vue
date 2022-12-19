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
                    <div class="card receiv-info">
                        <div class="member-form">
                            <input class="member-equal" type="checkbox" />
                            <label for="">與會員資料相同</label>
                        </div>
                        <form>
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
                                    placeholder="請輸入十位數手機號碼"
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
                            <div class="pay-box">
                                <div class="btn-paramy" @click="test">
                                    前往付款
                                </div>
                                <div class="back-step" @click="goBack">
                                    回上一步
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form
            action="http://localhost/cgd103_g1/public/api/sample_Credit_CreateOrder.php"
            method="post"
        >
            <input
                type="hidden"
                name="mem_id"
                :value="$store.state.user.mem_id"
            />
            <!-- <button type="submit">送出</button> -->
        </form>
    </main>

    <section>
        <div class="tpfield" id="card-number">
            <div class="form-group">
                <label for="number">卡號</label>
                <div class="form-control" ref="number"></div>
                <small>(可填入： 4242 4242 4242 4242)</small>
            </div>
        </div>
        <div class="tpfield" id="card-expiration-date">
            <div class="form-group">
                <label for="cardExpirationDate">卡片到期日</label>
                <div class="form-control" ref="expirationDate"></div>
                <small>(可填入： 01/23)</small>
            </div>
        </div>
        <div class="tpfield" id="card-ccv">
            <div class="form-group">
                <label for="cardCcv">後三碼</label>
                <div class="form-control" ref="ccv"></div>
                <small>(可填入： 123)</small>
            </div>
        </div>
        <buttnon @click="onSubmit">拜託串成功啦QQ</buttnon>
    </section>
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
            /* carts: this.$store.state.cart, */
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
        async test() {
            const res = await fetch(
                "http://localhost/cgd103_g1/public/api/sample_Credit_CreateOrder.php",
                {
                    method: "post",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: new URLSearchParams({ test: "QQ" }),
                }
            );

            /*  const qq = await res.json(); */
            console.log(res);

            /*  window.location.assign(res.url); */
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
        onSubmit() {
            const tappayStatus = TPDirect.card.getTappayFieldsStatus();
            console.log("tset");
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
                // 要把得到的Prime Token 送給後端,
                /*  let payReslut = await apiPayByPrime(prime); */
                let payReslut = await fetch(
                    `http://localhost/cgd103_g1/public/api/tappay.php?prime=${prime}`
                );
                let test = await payReslut.json();
                console.log(test);
                if (payReslut.result.status === 0) {
                    this.$notify({
                        group: "paidSuccess",
                        type: "success",
                        text: "付款成功, （僅為展示頁面,不會進行出貨）",
                    });

                    this.createAnOrder();
                    this.setStep(3);
                } else {
                    this.$notify({
                        group: "paidFail",
                        type: "warn",
                        text: "無法進行付款",
                    });
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
                },
                // Styling ccv field
                "input.cvc": {
                    "font-size": "16px",
                },
                // Styling expiration-date field
                "input.expiration-date": {
                    // 'font-size': '16px'
                },
                // Styling card-number field
                "input.card-number": {
                    // 'font-size': '16px'
                },
                // style focus state
                ":focus": {
                    // 'color': 'black'
                },
                // style valid state
                ".valid": {
                    color: "green",
                },
                // style invalid state
                ".invalid": {
                    color: "red",
                },
                // Media queries
                // Note that these apply to the iframe, not the root window.
                "@media screen and (max-width: 400px)": {
                    input: {
                        color: "orange",
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
