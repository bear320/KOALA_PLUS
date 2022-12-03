<template>
    <Header />
    <section class="nav-space">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' + require('@/assets/images/koalas/banner.jpg') + ')',
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
                <img src="../assets/images/drawing6.png" alt="" />
            </div>
        </div>
    </section>
    <section class="koalas wrapper">
        <h2>選擇你要幫助的無尾熊吧！</h2>
        <div class="tab-wrapper">
            <div class="tab selected"><h3>所有無尾熊</h3></div>
            <div class="tab"><h3>成年無尾熊</h3></div>
            <div class="tab"><h3>幼年無尾熊</h3></div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
export default {
    components: {
        Header,
    },
};
</script>

<style lang="scss" scoped>
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
            }
            h4 {
                text-align: justify;
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
    padding: 30px 0;
    @include m() {
        margin-top: 70px;
        padding: 0;
    }
    .tab-wrapper {
        margin: 50px 0;
        display: flex;
        justify-content: space-between;
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
}
</style>
