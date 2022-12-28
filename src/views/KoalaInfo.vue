<template>
    <Header></Header>
    <section class="wrapper nav-space">
        <div class="breadcrumb">
            <router-link to="/home">Home</router-link>
            <router-link to="/support">資助認養</router-link>
            <router-link :to="`/support/${source.koala_name}`">
                {{ source.koala_name }}
            </router-link>
        </div>
    </section>
    <section class="wrapper">
        <div class="koala-info">
            <div class="img">
                <ImageSlider :imgs="this.source.koala_images"></ImageSlider>
            </div>
            <div class="text">
                <div class="paragraph">
                    <h1>{{ source.koala_name }}</h1>
                    <h2 class="sex-sign">
                        <Icon
                            v-if="source.koala_sex === 'Male'"
                            type="md-male"
                        />
                        <Icon
                            v-if="source.koala_sex === 'Female'"
                            type="md-female"
                        />
                    </h2>
                </div>
                <div class="paragraph">
                    <h3>
                        類別：
                        <span v-if="parseInt(source.koala_age) >= 3">成年</span>
                        <span v-if="parseInt(source.koala_age) < 3">幼年</span>
                    </h3>
                    <h3>生日： {{ source.koala_dob }}</h3>
                    <h3>年齡： {{ source.koala_age }}</h3>
                </div>
                <div class="paragraph">
                    <p>{{ source.koala_info }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="plans" id="plans">
        <div class="wrapper">
            <h2>該如何幫助受災的無尾熊呢？</h2>
            <h3>我們提供了兩種幫助無尾熊的方案</h3>
            <div class="plan-wrapper">
                <PlanCard
                    v-for="(plan, index) in plans"
                    :key="plan.id"
                    :pName="plan.pName"
                    :pPrice="plan.pPrice"
                    :pPoint="plan.pPoint"
                    :pGift1="plan.pGift1"
                    :pGift2="plan.pGift2"
                    :pDesc="plan.pDesc"
                    :pBtn="plan.pBtn"
                    :index="index"
                    :supKoalaId="this.source.koala_id"
                    @show-pay-box="showPayBox"
                ></PlanCard>
            </div>
        </div>
    </section>
    <section class="wrapper faqs">
        <h2>認養 FAQs</h2>
        <Collapse v-model="value" class="collapse">
            <Panel name="1">
                我捐助的費用將用於何處？
                <template #content>
                    <p>
                        根據您支持的方案不同，您捐助的費用也會用於不同的用途，詳細用途可參考上述
                        <a href="#plans">方案說明</a> 。
                    </p>
                </template>
            </Panel>
            <Panel name="2">
                資助 / 認養有條件限制嗎？
                <template #content>
                    <p>
                        沒有，任何人在任何地方、任何時候都可以資助 /
                        認養無尾熊！
                    </p>
                    <p>
                        除了鮮花之外，領養無尾熊也是生日、紀念日和任何特殊場合的絕佳禮物，它也可作為獎勵、籌款和紀念禮物。你的領養證書可在會員專區中下載，就算遺失也不用害怕，這是算是一種快速而簡單的送禮方式。
                    </p>
                </template>
            </Panel>
            <Panel name="3">
                資助 / 認養後我會獲得什麼？
                <template #content>
                    <p>
                        根據你所支持的方案不同，您所獲得的東西也會有所不同，詳細說明可參考上述
                        <a href="#plans">方案說明</a> 。
                    </p>
                </template>
            </Panel>
            <Panel name="4">
                可以把認養的無尾熊帶回家嗎？
                <template #content>
                    <p>
                        很抱歉，您並不能將您認養的無尾熊帶回家！領養是一種象徵性的行為，表達你對受災無尾熊的支援。
                    </p>
                </template>
            </Panel>
            <Panel name="5">
                多久能收到我的資助 / 認養證明呢？
                <template #content>
                    <p>
                        通常情況下，只要您資助 /
                        認養成功後，就可以至會員專區中下載屬於您的資助 /
                        認養證明，若您的證明資訊有誤，請與我們進行聯繫！
                    </p>
                </template>
            </Panel>
            <Panel name="6">
                我想詢問其他資助 / 認養的問題呢？
                <template #content>
                    <p>
                        您可以在園區營業時間內透過下列方式與我們進行聯繫：<br />
                        電話｜
                        <a href="tel:+12025550156">+1 202 555 0156</a><br />
                        信箱｜
                        <a href="mailto:koalaplus@koalaplus.com"
                            >koalaplus@koalaplus.com</a
                        ><br />
                    </p>
                </template>
            </Panel>
        </Collapse>
    </section>
    <section
        class="pay-box"
        ref="closeBtn"
        style="display: none"
        @submit.prevent
    >
        <div class="tappay-wrapper">
            <div class="close" @click="closePayBox">×</div>
            <h4 class="payLabel">信用卡卡號：</h4>
            <div class="tpfield" id="card-number" ref="number"></div>
            <h4 for="card-number" class="payLabel">卡片到期日：</h4>
            <div
                class="tpfield"
                id="card-expiration-date"
                ref="expirationDate"
            ></div>
            <h4 for="card-number" class="payLabel">卡片安全碼(CCV)：</h4>
            <div class="tpfield" id="card-ccv" ref="ccv"></div>
            <div class="btn-wrapper">
                <button type="submit" class="tappay-btn" @click="onSubmit">
                    現在付款
                </button>
            </div>
        </div>
    </section>
    <ModalForTrading
        :style="{ display: isTrading ? 'flex' : 'none' }"
    ></ModalForTrading>
    <ModalForSuccess
        :style="{ display: isDone ? 'flex' : 'none' }"
    ></ModalForSuccess>
    <Footer></Footer>
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import ImageSlider from "@/components/support/ImageSlider.vue";
import PlanCard from "@/components/koalaInfo/PlanCard.vue";
import ModalForTrading from "@/components/ModalForTrading.vue";
import ModalForSuccess from "@/components/ModalForSuccess.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        Footer,
        ImageSlider,
        PlanCard,
        ModalForTrading,
        ModalForSuccess,
    },
    data() {
        return {
            source: [],
            plans: [
                {
                    pName: "資助所有無尾熊",
                    pPrice: 300,
                    pPoint: 300,
                    pGift1: "經濟實惠的尤加利葉",
                    pGift2: "物美價廉的尤加利葉",
                    pDesc: "資助園區內所有無尾熊，捐贈之款項將會用於維護園區設備、採購醫療用品、種植尤加利樹及支持無尾熊相關之研究計畫等。",
                    pBtn: "立即資助",
                },
                {
                    pName: "認養單隻無尾熊",
                    pPrice: 1000,
                    pPoint: 1000,
                    pGift1: "物美價廉的尤加利葉",
                    pGift2: "熱銷第一的尤加利葉",
                    pDesc: "領養單隻無尾熊，可自行選擇欲幫助之無尾熊，捐贈之款項將會專款專用，用於該隻無尾熊醫療、照護等相關費用。",
                    pBtn: "立即認養",
                },
            ],
            supType: 0,
            koalaId: 0,
            isTrading: false,
            isDone: false,
        };
    },
    methods: {
        getKoalaInfo() {
            const koalaName = this.$route.params.koala_name;
            const apiURL = new URL(
                `${BASE_URL}/getKoalaInfo.php?koalaName=${koalaName}`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.koalaInfo;
                })
                .catch((error) => {
                    // alert(error);
                });
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

        // 觸發取得狀態
        async onSubmit() {
            // this.$refs["closeBtn"].style.display = "none";
            const tappayStatus = TPDirect.card.getTappayFieldsStatus();
            if (tappayStatus.canGetPrime === false) {
                // can not get prime
                this.open(false);
                // this.$refs["closeBtn"].style.display = "none";
                return;
            }
            this.$refs["closeBtn"].style.display = "none";
            this.isTrading = true;

            // Get prime
            TPDirect.card.getPrime((result) => {
                if (result.status !== 0) {
                    // get prime error
                    // console.log(result.msg);
                    return;
                }

                let prime = result.card.prime;
                // console.log(prime);
                this.submitPrime(prime);
            });
        },

        async submitPrime(prime) {
            try {
                const mem_id = this.$store.state.user.mem_id;

                // 要把得到的Prime Token 送給後端,
                // console.log("交易進行中");
                let payReslut = await fetch(
                    `${BASE_URL}/tappaySupport.php?prime=${prime}`,
                    {
                        method: "post",
                        body: new URLSearchParams({
                            mem_id,
                            type: this.supType,
                            koala_id: this.koalaId,
                        }),
                    }
                );

                // 不明白為何回傳的是字串
                let resText = await payReslut.json();
                // 這邊再把他轉為json物件
                let payStatus = JSON.parse(resText);
                // console.log(payStatus);

                if (payStatus.status === 0) {
                    // console.log("付款成功");
                    this.isTrading = false;
                    this.isDone = true;
                } else {
                    // console.log("付款失敗");
                }
            } catch (err) {
                // console.log(err);
            }
        },
        showPayBox({ type, id }) {
            this.$refs["closeBtn"].style.display = "flex";
            this.supType = type;
            this.koalaId = id;
        },
        closePayBox() {
            this.$refs["closeBtn"].style.display = "none";
        },
        open(nodesc) {
            this.$Notice.open({
                title: "付款資訊填寫有誤／不完整",
                desc: nodesc ? "" : "請確認付款資訊欄位是否正確且完整填寫！",
            });
        },
    },
    created() {
        this.getKoalaInfo();
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
                required: true,
            },
            expirationDate: {
                element: this.$refs.expirationDate,
                placeholder: "MM/YY",
                required: true,
            },
            ccv: {
                element: this.$refs.ccv,
                placeholder: "後三碼",
                required: true,
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
                // console.log("付款資訊完整且正確");
                this.CardInfoFilled = true;
            } else {
                // console.log("付款資訊不完整或有誤");
                this.CardInfoFilled = false;
            }
        });
    },
};
</script>

<style lang="scss" scoped>
.wrapper {
    max-width: calc(100% - 80px);
}
.breadcrumb {
    max-width: 1000px;
    margin: 15px auto 0;
    text-align: left;
    font-family: font-EL;
    a {
        color: lighten(#515a6e, 20%);
        padding-right: 20px;
    }
    a:last-child {
        color: $btn-color;
        font-family: font-R;
    }
    a + a::before {
        content: "›";
        color: lighten(#515a6e, 20%);
        margin-right: 20px;
    }
}
.koala-info {
    max-width: 1000px;
    margin: 15px auto 50px;
    display: flex;
    justify-content: space-around;
    @include m() {
        flex-wrap: wrap;
    }
    .img {
        width: 45%;
        display: flex;
        justify-content: center;
        align-items: center;
        @include m() {
            width: 100%;
            margin-bottom: 30px;
        }
    }
    .text {
        box-sizing: border-box;
        padding: 0 5%;
        flex-grow: 1;
        text-align: left;
        @include m() {
            width: 100%;
        }
        .paragraph {
            margin: 15px 0;
            h1 {
                @include media(900) {
                    font-size: 36px;
                }
            }
            h3 {
                @include media(900) {
                    font-size: 18px;
                }
            }
            h3 + h3 {
                margin-top: 10px;
            }
            p {
                font-size: 18px;
                text-align: justify;
                line-height: 2;
            }
        }
        .paragraph:first-child {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            column-gap: 10px;
            .sex-sign {
                .ivu-icon-md-male {
                    color: LightSkyBlue;
                    &:hover {
                        color: LightSkyBlue;
                        cursor: default;
                    }
                }
                .ivu-icon-md-female {
                    color: LightPink;
                    &:hover {
                        color: LightPink;
                        cursor: default;
                    }
                }
            }
        }
    }
}
.plans {
    background-color: $lightgreen;
    .wrapper {
        padding: 30px 0;
        .plan-wrapper {
            max-width: 800px;
            margin: 30px auto 0;
            display: flex;
            justify-content: space-around;
            @include m() {
                flex-wrap: wrap;
                row-gap: 30px;
            }
        }
    }
}
.faqs {
    padding: 30px 0;
    .collapse {
        font: font-R;
        a {
            text-decoration: underline;
        }
        @include m() {
            width: 100%;
        }
    }
}

.pay-box {
    width: 100%;
    height: 100%;
    background-color: #0005;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;

    .tappay-wrapper {
        box-sizing: border-box;
        padding: 30px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.2);
        position: relative;

        .close {
            font-size: 20px;
            color: $font_color;
            position: absolute;
            top: 5px;
            right: 10px;

            &:hover {
                cursor: pointer;
            }
        }

        .payLabel {
            text-align: left;
        }

        .tpfield {
            height: 40px;
            width: 100%;
            margin: 5px 0 30px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid $btn-light-color;
            background-color: #fff;

            iframe {
                font: font-R 18px;
            }
        }

        .btn-wrapper {
            display: flex;
            justify-content: center;
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
        }
    }
}
</style>
<style lang="scss">
.ivu-collapse-header {
    height: fit-content !important;
    line-height: 2.5 !important;
    font-size: 18px;
    @include m() {
        font-size: 15px;
    }
}
</style>
