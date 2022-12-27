<template>
    <Header />
    <section class="nav-space">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' +
                    require('@/assets/images/support/banner.jpg') +
                    ')',
            }"
        ></div>
    </section>
    <section class="why">
        <div class="wrapper">
            <div class="text">
                <h2>為什麼要資助 / 認養無尾熊？</h2>
                <h4>
                    Koala+
                    是一家非營利慈善機構，通過資助、認養的捐款及銷售無尾熊相關周邊商品，為因森林大火而受傷的無尾熊們籌集資金。
                </h4>
                <h4>
                    資助 /
                    領養無尾熊不僅能拯救和治療生病和受傷的無尾熊，並待將來有一天他們能回歸自己的家園；此外，資助認養亦有助於保護無尾熊棲息地、完善無尾熊的研究及宣導無尾熊救援相關教育。
                </h4>
                <h4>
                    雖然你並無法實際擁有一隻真的無尾熊，但透過資助 /
                    認養無尾熊您可以獲得：
                    <br />
                    1. 官方資助/認養證明。
                    <br />
                    2.
                    專屬於您的虛擬無尾熊，您可以餵養無尾熊以協助牠長大，待其長大您將可獲得專屬好禮。
                </h4>
            </div>
            <div class="img">
                <img src="../assets/images/drawing6.png" alt="【裝飾】無尾熊" />
            </div>
        </div>
    </section>
    <section class="wrapper koalas">
        <h2>選擇你要幫助的無尾熊吧！</h2>
        <div class="tab-wrapper">
            <div
                v-for="(tab, index) in koalaTabs"
                :key="index"
                class="btn tab"
                :class="{ selected: isSelected === index }"
                @click="tabSelected(index)"
            >
                <h3>{{ tab }}</h3>
            </div>
        </div>
        <div class="koala-card-wrapper">
            <KoalaCard
                v-for="koala in cache"
                :key="koala.koala_id"
                :kName="koala.koala_name"
                :kSex="koala.koala_sex"
                :kDOB="koala.koala_dob"
                :kAge="koala.koala_age"
                :kCover="koala.koala_img1"
            ></KoalaCard>
        </div>
    </section>
    <section class="wrapper bg-img">
        <img src="../assets/images/drawing7.png" alt="【裝飾】尤加利葉" />
    </section>
    <Footer></Footer>
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import KoalaCard from "@/components/support/KoalaCard.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        Footer,
        KoalaCard,
    },
    data() {
        return {
            koalaTabs: ["所有無尾熊", "成年無尾熊", "幼年無尾熊"],
            isSelected: 0, // 第一個 tab 為 selected
            source: [],
            cache: [],
        };
    },
    methods: {
        tabSelected(i) {
            this.isSelected = i;
            if (i === 0) {
                this.cache = this.source;
            } else if (i === 1) {
                this.cache = this.source.filter((item) => {
                    return item.koala_age >= 3;
                });
            } else if (i === 2) {
                this.cache = this.source.filter((item) => {
                    return item.koala_age < 3;
                });
            }
        },
        getKoalas() {
            const apiURL = new URL(`${BASE_URL}/getKoalas.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json;
                    this.cache = json;
                })
                .catch((error) => {
                    alert(error);
                });
        },
    },
    created() {
        this.getKoalas();
    },
};
</script>

<style lang="scss" scoped>
.wrapper {
    @include m() {
        max-width: calc(100% - 80px);
    }
}

.banner {
    background-position-y: 40px;
    @include m() {
        background-position-y: 60px;
    }
}

.why {
    margin-top: 70px;
    padding-top: 30px;
    background-color: $lightgreen;
    .wrapper {
        display: flex;
        align-items: center;
        @include m() {
            flex-wrap: wrap;
        }
        .text {
            width: 65%;
            line-height: 2;
            @include m() {
                width: 100%;
            }
            h2 {
                text-align: left;
                margin-bottom: 10px;
            }
            h4 {
                text-align: justify;
                margin-bottom: 10px;
            }
            h4:last-child {
                padding-bottom: 30px;
            }
        }
        .img {
            width: 35%;
            @include m() {
                width: 100%;
            }
            img {
                width: 100%;
                vertical-align: top;
                @include m() {
                    width: 50%;
                }
            }
        }
    }
}

.koalas {
    margin-top: 70px;
    padding: 30px 0 0;
    @include m() {
        margin-top: 70px;
        padding: 0;
    }
    .tab-wrapper {
        margin: 50px 0;
        display: flex;
        justify-content: space-around;
        @include m() {
            margin: 25px 0;
            flex-wrap: wrap;
            justify-content: center;
        }
        .tab {
            $tab-h: 60px;
            @include size(30%, $tab-h);
            border-radius: 10px;
            background-color: $btn-light-color;
            box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
            user-select: none;
            &:hover {
                cursor: pointer;
            }
            @include m() {
                margin: 8px 0;
                @include size(75%, $tab-h);
            }
            h3 {
                margin-bottom: 0;
                line-height: $tab-h;
            }
        }
        .selected {
            background-color: $green;
            color: white;
        }
    }
    .koala-card-wrapper {
        margin: 50px 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        row-gap: 60px;
        @include m() {
            justify-content: center;
            row-gap: 40px;
        }
    }
}

.bg-img {
    display: flex;
    justify-content: flex-end;
    user-select: none;
    @include m() {
        justify-content: center;
    }
    img {
        height: 400px;
        @include m() {
            height: 300px;
        }
    }
}
</style>
