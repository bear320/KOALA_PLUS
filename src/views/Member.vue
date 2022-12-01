<template>
    <Header />
    <article>
        <div>能方便移動整個區塊到對應位置</div>
        <p>能方便移動整個區塊到對應位置</p>
        <h1>能方便移動整個區塊到對應位置</h1>
        <h2>能方便移動整個區塊到對應位置</h2>
        <h3>能方便移動整個區塊到對應位置</h3>
        <h4>能方便移動整個區塊到對應位置</h4>
        <div class="member">
            <div class="mem-banner-img">
                <img src="https://fakeimg.pl/1600x480/200" alt="mem-banner" />
                <!-- <img src="../assets/Koala-banner.jpg" alt="mem-banner" /> -->
            </div>
            <section>
                <div class="tabs">
                    <ul class="tabs_list">
                        <li
                            @click="movingTab(index)"
                            v-for="(item, index) in memsliding"
                            :key="index"
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
                            <li class="mem_centre">
                                <div class="mem_basic">
                                    <p>姓氏：Zeng</p>
                                    <p>名字：Charmy</p>
                                    <p>會員ID：P00001</p>
                                </div>
                                <div class="mem_main">
                                    <div>左邊</div>
                                    <div>右邊</div>
                                </div>
                            </li>
                            <li class="mem_order">
                                <div class="mem_basic">
                                    <p>姓氏：Zeng</p>
                                    <p>名字：Charmy</p>
                                    <p>會員ID：P00001</p>
                                </div>

                                訂單資訊
                            </li>
                            <li class="mem_coupons">
                                <div class="mem_basic">
                                    <p>姓氏：Zeng</p>
                                    <p>名字：Charmy</p>
                                    <p>會員ID：P00001</p>
                                </div>
                                優惠券
                            </li>
                            <li class="mem_adopt">
                                <div class="mem_basic">
                                    <p>姓氏：Zeng</p>
                                    <p>名字：Charmy</p>
                                    <p>會員ID：P00001</p>
                                </div>
                                認養紀錄
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </article>
</template>

<script>
import Header from "@/components/header.vue";
export default {
    components: {
        Header,
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
.mem-banner-img {
    width: 100%;
    height: 480px;
    img {
        height: 100%;
        width: 100%;
        vertical-align: middle;
        object-fit: cover;
        object-position: center center;
    }
}
//tab
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
            width: 80px;
            padding: 10px 20px;
            text-align: center;
            align-items: center;
            cursor: pointer;
            border-radius: 50px;

            a {
                text-decoration: none;
                color: #333;
                vertical-align: baseline;
            }
        }
        li:hover {
            box-shadow: 0 24px 18px -15px rgba(119, 120, 107, 0.65);
        }
    }

    .moving_tab {
        display: block;
        background-color: #337a7d;
        position: absolute;
        bottom: 0;
        left: 0%;
        z-index: -1;
        height: 1rem;
        transition: left 0.5s;
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
            li {
                width: 1000px;
                height: 600px;
                background-color: rgb(110, 158, 110);
                flex-shrink: 0;

                border-radius: 10px;
                transition: 0.9s 0.9s cubic-bezier(0.18, 1.14, 0.5, 1.18);
            }
        }
    }
    // 測試
    .tabs_content li:nth-child(2) {
        background-color: #faa;
    }
    .tabs_content li:nth-child(3) {
        background-color: #aaf;
    }
    .tabs_content li:nth-child(4) {
        background-color: #faf;
    }
}
.member {
    .mem_basic {
        //會員基本資料
        display: flex;
        p {
            min-width: 100px;
            padding: 10px;
        }
    }
    .mem_centre {
        .mem_main {
            display: flex;
            height: 100%;
            div {
                width: 50%;
                height: 100%;
            }
            div:nth-child(1) {
                flex-shrink: 0;
                background-color: #aaf;
            }
            div:nth-child(2) {
                flex-shrink: 0;
                background-color: #aff;
            }
        }
    }
}
</style>
