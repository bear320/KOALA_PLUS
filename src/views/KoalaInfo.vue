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
                    <h3>性別： {{ source.koala_sex }}</h3>
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
    <ModalForTrading style="display: none"></ModalForTrading>
    <ModalForSuccess></ModalForSuccess>
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
                    pName: "認養單隻無尾熊",
                    pPrice: 1000,
                    pPoint: 1000,
                    pGift1: "物美價廉的尤加利葉",
                    pGift2: "熱銷第一的尤加利葉",
                    pDesc: "領養單隻無尾熊，可自行選擇欲幫助之無尾熊，捐贈之款項將會專款專用，用於該隻無尾熊醫療、照護等相關費用。",
                    pBtn: "立即認養",
                },
                {
                    pName: "資助所有無尾熊",
                    pPrice: 300,
                    pPoint: 300,
                    pGift1: "經濟實惠的尤加利葉",
                    pGift2: "物美價廉的尤加利葉",
                    pDesc: "資助園區內所有無尾熊，捐贈之款項將會用於維護園區設備、採購醫療用品、種植尤加利樹及支持無尾熊相關之研究計畫等。",
                    pBtn: "立即資助",
                },
            ],
        };
    },
    methods: {
        getKoalaInfo() {
            const koalaName = this.$route.params.koala_name;
            const apiURL = new URL(
                `${BASE_URL}/getKoalaInfo.php?koalaName=${koalaName}`
            );
            // const apiURL = new URL(
            //     `http://localhost:8888/cgd103_g1/public/api/getKoalaInfo.php?koalaName=${koalaName}`
            // );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.koalaInfo;
                })
                .catch((error) => {
                    // alert(error);
                });
        },
    },
    created() {
        this.getKoalaInfo();
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
