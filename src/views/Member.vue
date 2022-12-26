<template>
    <Header />
    <div class="member">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' +
                    require('@/assets/images/member/koalamem.jpg') +
                    ')',
            }"
        ></div>

        <section>
            <h1>Member</h1>
            <div class="tabs">
                <ul class="tabs_list">
                    <li
                        @click="movingTab(index)"
                        v-for="(item, index) in memsliding"
                        :key="index"
                        :class="{ active: currentTab === index }"
                    >
                        {{ item }}
                    </li>
                    <li
                        :style="{ left: `${currentTab * 25}%` }"
                        class="moving_tab"
                    >
                        {{ liTab }}
                    </li>
                </ul>

                <img
                    class="memleftimg"
                    width="343"
                    height="514"
                    src="@/assets/images/drawing2.png"
                    alt="會員頁面的無尾熊左圖"
                />

                <div class="wrapper">
                    <ul
                        class="tabs_content"
                        :style="{ left: `${currentTab * -100}%` }"
                    >
                        <!-- 會員中心內容 -->
                        <MemCentre></MemCentre>
                        <MemOrder></MemOrder>
                        <MemCoupons></MemCoupons>
                        <MemAdopt></MemAdopt>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <Footer />
</template>

<script>
import Header from "@/components/header.vue";
import MemCentre from "@/components/member/MemCentre.vue";
import MemOrder from "@/components/member/MemOrder.vue";
import MemAdopt from "@/components/member/MemAdopt.vue";
import MemCoupons from "@/components/member/MemCoupons.vue";
import Footer from "@/components/footer.vue";
export default {
    name: "Member",
    liTab: "  ",
    components: {
        Header,
        MemCentre,
        MemOrder,
        MemCoupons,
        MemAdopt,
        Footer,
    },
    data() {
        return {
            memsliding: ["會員中心", "訂單資訊", "優惠券", "認養紀錄"],
            currentTab: 3,
        };
    },
    methods: {
        movingTab(index) {
            this.currentTab = index;
        },
    },
};
</script>

<style lang="scss" scoped>
// .member
.member {
    h1 {
        font-family: "Inkfree";
        font-size: 30vh;
        color: $lightgreen;
        position: relative;
        @include m() {
            font-size: 20vh;
        }
        @include m() {
            font-size: 15vh;
        }
    }
}
.tabs {
    position: relative;
    .tabs_list {
        width: fit-content;
        display: flex;
        justify-content: center;
        margin: 0px auto;
        border-radius: 50px;
        background-color: #ffffff;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        outline: #337a7d 1px solid;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        height: 41px;
        @include d() {
            // height: 26px;
            height: 31px;
        }
        @include m() {
            // height: 18px;
            height: 24px;
        }
        li {
            width: 120px;
            padding: 10px 10px;
            text-align: center;
            align-items: center;
            cursor: pointer;
            border-radius: 50px;
            transition: color 0.5s linear;
            @include d() {
                width: 110px;
                padding: 5px 5px;
            }
            @include m() {
                width: 80px;
                font-size: 12px;
                padding: 3px 3px;
            }
        }
        li:hover {
            box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
        }
        .active {
            color: #ffffff;
        }
        .moving_tab {
            display: block;
            // background-color: #337a7d;
            background: linear-gradient(
                257.94deg,
                #337a7d 35.19%,
                #579194 68.15%
            );
            position: absolute;
            bottom: 0;
            left: 0%;
            z-index: -1;
            height: 36px;
            height: 41px;

            transition: left 0.5s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            @include d() {
                // height: 26px;
                height: 31px;
            }
            @include m() {
                // height: 18px;
                height: 24px;
            }
        }
    }

    .wrapper {
        margin: 30px auto;
        width: 1000px;
        overflow: hidden;
        border-radius: 10px;
        @include m() {
            margin: 5px auto;
        }
        .tabs_content {
            display: flex;
            position: relative;
            border-radius: 10px;
            transition: left 0.5s linear;

            .content {
                width: 1000px;
                min-height: 300px;
                flex-shrink: 0;
                border: solid 2px #337a7d;
                border-radius: 10px;
                transition: 0.9s 0.9s cubic-bezier(0.18, 1.14, 0.5, 1.18);
            }
        }
    }

    .memleftimg {
        width: 168px;
        height: 252px;
        position: absolute;
        left: -20px;
        top: 100px;
        z-index: 3;
        overflow: hidden;
        @include d() {
            width: 112px;
            height: 168px;
            left: 0px;
            top: 100px;
        }
        @include m() {
            width: 84px;
            height: 126px;
            left: 0px;
            top: 300px;
        }
    }
}

@media screen and (max-width: 1200px) {
    .tabs {
        .wrapper {
            width: 600px;
            .tabs_content {
                .content {
                    width: 600px;
                }
            }
        }
    }
}
@media screen and (max-width: 768px) {
    .tabs {
        .wrapper {
            width: 296px;
            .tabs_content {
                .content {
                    width: 296px;
                }
            }
        }
    }
}
</style>
