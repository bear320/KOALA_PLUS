<template>
    <Header />
    <div class="member">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' +
                    require('@/assets/images/member/banner2.jpg') +
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
                    ></li>
                </ul>
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
    <div class="ivu-icon">
        <Icon type="md-search" />
    </div>
</template>

<script>
import Header from "@/components/header.vue";
import MemCentre from "@/components/member/MemCentre.vue";
import MemOrder from "@/components/member/MemOrder.vue";
import MemAdopt from "@/components/member/MemAdopt.vue";
import MemCoupons from "@/components/member/MemCoupons.vue";

export default {
    name: "About",
    components: {
        Header,
        MemCentre,
        MemOrder,
        MemCoupons,
        MemAdopt,
    },
    data() {
        return {
            memsliding: ["會員中心", "訂單資訊", "優惠券", "認養紀錄"],
            currentTab: 0,
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
    }
}
.tabs {
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
        li {
            width: 100px;
            padding: 10px 20px;
            text-align: center;
            align-items: center;
            cursor: pointer;
            border-radius: 50px;
            transition: color 0.5s linear;
        }
        li:hover {
            box-shadow: 0 24px 18px -15px rgba(119, 120, 107, 0.65);
        }
        .active {
            color: #ffffff;
        }
        .moving_tab {
            display: block;
            background-color: #337a7d;
            position: absolute;
            bottom: 0;
            left: 0%;
            z-index: -1;
            height: 2.6rem;
            transition: left 0.5s;
        }
    }

    .wrapper {
        margin: 0 auto;
        width: 1000px;
        overflow: hidden;
        border-radius: 10px;
        .tabs_content {
            display: flex;
            position: relative;
            border-radius: 10px;
            transition: left 0.5s linear;
            .content {
                width: 1000px;
                height: 600px;
                // background-color: rgb(110, 158, 110);
                flex-shrink: 0;
                border: solid 2px #337a7d;
                border-radius: 10px;
                transition: 0.9s 0.9s cubic-bezier(0.18, 1.14, 0.5, 1.18);
            }
        }
    }
    // 測試

    // .tabs_content li:nth-child(2).content {
    //     background-color: #faa;
    // }

    // .tabs_content li:nth-child(3).content {
    //     background-color: #aaf;
    // }

    .tabs_content li:nth-child(4).content {
        background-color: #faf;
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
            width: 350px;
            .tabs_content {
                .content {
                    width: 350px;
                }
            }
        }
    }
}
</style>
