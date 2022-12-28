<template lang="">
    <li class="mem_adopt content">
        <div class="mem_basic">
            <p>會員ID：{{ userid }}</p>
            <p>姓名：{{ username }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 {{ couponsLists.length }} 筆認養紀錄</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sup_id">資助認養編號</th>
                            <th class="sup_date">資助認養日期</th>
                            <th class="sup_plan">資助認養方案</th>
                            <th class="koala_name">無尾熊名字</th>
                            <th class="sup_price">資助認養金額</th>
                            <th>下載領養證明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(couponsLists, index) in couponsLists"
                            :key="index"
                        >
                            <td class="sup_id">{{ couponsLists.sup_id }}</td>
                            <td class="sup_date">
                                {{ couponsLists.sup_date }}
                            </td>
                            <td class="sup_plan">
                                {{ couponsLists.sup_plan }}
                            </td>
                            <td class="koala_name">
                                {{ couponsLists.koala_name }}
                            </td>
                            <td class="sup_price">
                                {{ couponsLists.sup_price }}
                            </td>
                            <td>
                                <Icon
                                    type="md-download"
                                    size="20"
                                    color="#337a7d"
                                    @click="
                                        showcouponsList(
                                            couponsLists.mem_name,
                                            couponsLists.sup_date
                                        )
                                    "
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="html-group">
            <div class="html2canvas" ref="html2canvas">
                <!-- 轉出來的證書 -->
                <!-- <div class="certificate_img"> -->
                <div class="adopt_certificate">
                    <!-- <img
                        class="certificatebg"
                        src="@/assets/images/member/Certificate02.svg"
                        alt="會員頁面的無尾熊左圖"
                    /> -->
                    <p class="certificate_name">{{ tempName }}</p>

                    <!-- <p class="certificate_koala">
                        {{ couponsList[certificate_Index].koala_name }}
                    </p> -->
                    <p class="certificate_date">
                        {{ tempDate }}
                    </p>
                </div>
                <!-- </div> -->
            </div>
            <!-- <img :src="imgUrl" class="return_img" /> -->
            <a
                ref="downloadBtn"
                :href="imgUrl"
                download="koala_adoption_certificate.png"
            ></a>
        </div>
    </li>
</template>

<script>
import html2canvas from "html2canvas";
import { BASE_URL } from "@/assets/js/common.js";

export default {
    data() {
        return {
            userid: "",
            username: "",
            imgUrl: "",
            tempName: "",
            tempDate: "",
            certificate_Index: 0,
            memindexs: [],
            couponsLists: [],
        };
    },
    mounted() {},
    methods: {
        postmemAdopt() {
            let getCookie = document.cookie;
            const apiURL = new URL(`${BASE_URL}/postmemAdopt.php`);
            if (getCookie) {
                fetch(apiURL, {
                    credentials: "include",
                })
                    .then((res) => res.json())
                    .then((json) => {
                        // if (json.status == 10010) {
                        //     location.href = "/login";
                        // }
                        console.log(json);
                        if (json.status) {
                            this.couponsLists = json.list;
                            this.userid = json.userid;
                            this.username = json.username;
                            return true;
                        }
                        // alert("獲取數據失敗");
                    });
            } else {
                // location.href = "/login";
                // alert("登入失效");
                //跳轉 login url
            }
        },
        toImage() {
            // 這是轉出來的
            this.imgUrl = "";
            html2canvas(this.$refs.html2canvas, {
                width: 600,
                height: 485,
                backgroundColor: null,
                useCORS: true, // 解决文件跨域问题
            }).then((canvas) => {
                const url = canvas.toDataURL("image/png"); // 生成的图片
                // 可以上傳后端或者直接显示
                this.imgUrl = url;
                this.$nextTick(function () {
                    this.$refs.downloadBtn.click();
                });
            });
        },
        showcouponsList(name, date) {
            // console.log(name, date);
            this.tempName = name;
            this.tempDate = date;
            /*  this.certificate_Index = index; */
            this.$nextTick(function () {
                this.toImage();
            });
        },
    },

    created() {
        this.postmemAdopt();
    },
};
</script>

<style lang="scss" scoped>
.tabs {
    .wrapper {
        .mem_adopt {
            .mem_basic {
                //會員基本資料
                display: flex;
                p {
                    min-width: 100px;
                    padding: 10px;
                }
            }
        }
    }
}
table {
    border-spacing: 0;
    width: 100%;
    tr {
        text-align: center;
        line-height: 30px;
        height: 30px;
        th {
            padding: 10px;
        }
        .sup_id {
            @include m() {
                display: none;
            }
        }
        .sup_date {
            @include d() {
                display: none;
            }
        }
        .sup_price {
            @include m() {
                display: none;
            }
        }
    }
}
// 這是SHOW出來的圖片
.html-group {
    display: flex;
    justify-content: center;
}
.html2canvas {
    padding: 10px 0;
    .adopt_certificate {
        width: 600px;
        height: 425px;
        position: relative;
        background-color: pink;
        background-image: url("@/assets/images/member/Certificate02.svg");
        background-size: contain;
        // .certificatebg {
        //     width: 100%;
        //     height: 100%;
        // }
        @include d() {
            // width: 300px;
            // height: 283px;
            width: 100%;
            aspect-ratio: 3 / 5;
        }
        @include m() {
            // width: 300px;
            // height: 283px;
            width: 100%;
            height: 200px;
            aspect-ratio: 2 / 6;
        }

        .certificate_name {
            position: relative;
            top: 65%;
            left: 39%;
            transform: translate(-65%, -50%);
            @include d() {
                top: 63%;
                left: 40%;
            }
            @include m() {
                top: 65%;
                left: 40%;
            }
        }

        .certificate_date {
            position: relative;
            top: 75%;
            left: 42%;
            transform: translate(-65%, -50%);
            @include d() {
                top: 75%;
                left: 43%;
            }
            @include m() {
                top: 72%;
                left: 43%;
            }
        }
    }
}
.return_img {
    width: 550px;
    height: 444px;
    @include d() {
        width: 550px;
        height: 444px;
    }
    @include m() {
        width: 275px;
        height: 222px;
    }
}
</style>
