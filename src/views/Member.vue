<template>
    <Header />
    <div class="member">
        <div class="mem-banner-img">
            <img src="../assets/images/member/banner.jpg" alt="mem-banner" />
        </div>
        <section>
            <div class="tabs">
                <ul class="tabs_list">
                    <li
                        @click="movingTab(index)"
                        v-for="(item, index) in memsliding"
                        :key="index"
                    >
                        <!-- :style="{ color: `#ffffff` }" 想要移動過去，字體會變成白色-->
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
                        <li class="mem_centre content">
                            <div class="mem_basic">
                                <p>姓氏：Zeng</p>
                                <p>名字：Charmy</p>
                                <p>會員ID：P00001</p>
                            </div>
                            <!-- 會員中心下方內容 -->
                            <div class="mem_main">
                                <!-- 會員中心左邊內容  關於會員帳密內容-->
                                <div class="tabcontent_txt_group">
                                    <div class="subtitle">
                                        <Icon type="ios-create-outline" />
                                        <span>編輯會員資料</span>
                                    </div>
                                    <table class="tabcontent_group">
                                        <tr class="tabcontent_txt">
                                            <td>信箱</td>
                                            <input
                                                type="text"
                                                id="mem_email"
                                                myfield="mem_email"
                                                value="chermy111@gmail.com"
                                            />
                                        </tr>
                                        <tr class="tabcontent_txt">
                                            <td>電話</td>
                                            <input
                                                type="text"
                                                id="mem_tel"
                                                myfield="mem_tel"
                                                value="0988888888"
                                            />
                                        </tr>
                                        <tr class="tabcontent_txt">
                                            <td>信箱</td>
                                            <input
                                                type="text"
                                                id="mem_add"
                                                myfield="mem_add"
                                                value="桃園市復興路46號8樓"
                                            />
                                        </tr>
                                    </table>
                                    <button class="btn-paramy">
                                        編輯會員資料
                                    </button>
                                </div>
                                <!-- 會員中心右邊內容 關於帳號密碼-->
                                <div class="tabcontent_txt_group">
                                    <div class="subtitle">
                                        <Icon type="ios-create-outline" />
                                        <span>重設會員密碼</span>
                                        <p>
                                            為了您的帳戶安全，密碼的長度必須至少為八個字符，並且包含字母和數字字符的任意組合。
                                            密碼區分大小寫。
                                            新密碼不能與舊密碼相同。
                                        </p>
                                    </div>
                                    <table class="tabcontent_group">
                                        <tr class="tabcontent_txt">
                                            <td>帳號</td>
                                            <input
                                                type="text"
                                                id="mem_account"
                                                myfield="mem_email"
                                                value="chermy111"
                                            />
                                        </tr>
                                        <tr class="tabcontent_txt">
                                            <td>密碼</td>
                                            <input
                                                type="password"
                                                id="mem_password1"
                                                myfield="mem_password1"
                                                value="1213456"
                                            />
                                        </tr>
                                        <tr class="tabcontent_txt">
                                            <td>重新輸入密碼</td>
                                            <input
                                                type="password"
                                                id="mem_password_again"
                                                myfield="mem_password_again"
                                                value="123456"
                                            />
                                        </tr>
                                    </table>
                                    <button class="btn-paramy">修改密碼</button>
                                </div>
                            </div>
                        </li>
                        <li class="mem_order content">
                            <div class="mem_basic">
                                <p>姓氏：Zeng</p>
                                <p>名字：Charmy</p>
                                <p>會員ID：P00001</p>
                            </div>

                            訂單資訊
                        </li>
                        <li class="mem_coupons content">
                            <div class="mem_basic">
                                <p>姓氏：Zeng</p>
                                <p>名字：Charmy</p>
                                <p>會員ID：P00001</p>
                            </div>
                            優惠券
                        </li>
                        <li class="mem_adopt content">
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
    <!-- <p>Current slide is {{ swiperSlide.isActive ? "active" : "not active" }}</p> -->
    <div class="ivu-icon">
        <Icon type="md-search" />
    </div>
</template>

<script>
import Header from "@/components/header.vue";
// import { useSwiperSlide } from "swiper/vue";
export default {
    name: "About",
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
// .member
.mem-banner-img {
    width: 100%;
    height: 480px;
    img {
        margin-top: 60px;
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
            width: 100px;
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
            .content {
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

    .tabs_content li:nth-child(2).content {
        background-color: #faa;
    }

    .tabs_content li:nth-child(3).content {
        background-color: #aaf;
    }

    .tabs_content li:nth-child(4).content {
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
    // 會員中心
    .mem_centre {
        .mem_main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            // height: 100%; 會破版
            .tabcontent_txt_group {
                width: 50%;
                .subtitle {
                    margin-top: 20px;
                    // background-color: rgb(71, 55, 28);
                    height: 110px;
                    p {
                        line-height: 1.3;
                        padding: 20px 10px;
                    }
                }
                .tabcontent_group {
                    display: flex;
                    flex-direction: column;
                    tr {
                        display: flex;
                        justify-content: center;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        td:nth-child(1) {
                            padding: 10px;
                            width: 120px;
                        }
                    }
                }
            }

            // 用來確認區域的顏色
            .tabcontent_txt_group,
            div:nth-child(1) {
                // flex-shrink: 0;
                background-color: rgb(132, 186, 155);
            }
            .tabcontent_txt_group,
            div:nth-child(2) {
                // flex-shrink: 0;
                background-color: rgb(69, 69, 107);
            }
        }
    }
}
@media screen and (max-width: 1199px) {
}
</style>
