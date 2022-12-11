<template lang="">
    <li class="mem_adopt content">
        <div class="mem_basic">
            <p>姓名：{{ mem_name }}</p>
            <p>會員ID：{{ mem_id }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 4 筆認養紀錄</p>
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
                            v-for="(item, index) in couponsList"
                            :key="item.sup_id"
                        >
                            <td class="sup_id">{{ item.sup_id }}</td>
                            <td class="sup_date">{{ item.sup_date }}</td>
                            <td class="sup_plan">{{ item.sup_plan }}</td>
                            <td class="koala_name">{{ item.koala_name }}</td>
                            <td class="sup_price">{{ item.sup_price }}</td>
                            <td>
                                <Icon
                                    type="md-download"
                                    size="20"
                                    color="#337a7d"
                                    @click="showcouponsList(index)"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <div class="html2canvas" ref="html2canvas">
                <!-- 轉出來的證書 -->
                <!-- <div class="certificate_img"> -->
                <div class="adopt_certificate">
                    <img
                        class="certificatebg"
                        src="@/assets/images/member/Certificate01.svg"
                        alt="會員頁面的無尾熊左圖"
                    />
                    <p class="certificate_name">{{ mem_name }}</p>

                    <p class="certificate_koala">
                        {{ couponsList[certificate_Index].koala_name }}
                    </p>
                    <p class="certificate_date">
                        {{ couponsList[certificate_Index].sup_date }}
                    </p>
                </div>
                <!-- </div> -->
            </div>
            <img :src="imgUrl" />
        </div>
    </li>
</template>

<script>
import html2canvas from "html2canvas";
export default {
    data() {
        return {
            mem_name: "曾韋翰",
            mem_id: "P00001",
            imgUrl: "",
            certificate_Index: 0,
            couponsList: [
                {
                    sup_id: "S00001",
                    sup_date: "2022/11/15",
                    sup_plan: "認養",
                    koala_name: "jennykoala",
                    sup_price: "$1000",
                },
                {
                    sup_id: "S00002",
                    sup_date: "2022/12/01",
                    sup_plan: "資助",
                    koala_name: "",
                    sup_price: "$300",
                },
                {
                    sup_id: "S00003",
                    sup_date: "2022/12/21",
                    sup_plan: "資助",
                    koala_name: "",
                    sup_price: "$300",
                },
                {
                    sup_id: "S00004",
                    sup_date: "2022/11/19",
                    sup_plan: "認養",
                    koala_name: "Duffy",
                    sup_price: "$1000",
                },
            ],
        };
    },
    mounted() {
        this.toImage();
    },
    methods: {
        toImage() {
            // 這是轉出來的
            html2canvas(this.$refs.html2canvas, {
                width: 600,
                height: 426,
                backgroundColor: null,
                useCORS: true, // 解决文件跨域问题
            }).then((canvas) => {
                const url = canvas.toDataURL("image/png"); // 生成的图片
                // 可以上传后端或者直接显示
                this.imgUrl = url;
            });
        },
        showcouponsList(index) {
            console.log(index);
            this.certificate_Index = index;
        },
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

.adopt_certificate {
    width: 600px;
    height: 426px;
    position: relative;
    // background-color: pink;
    // background-image: url("@/assets/images/member/Certificate01.svg");
    .certificatebg {
        width: 100%;
        height: 100%;
    }
    .certificate_name {
        position: relative;
        width: fit-content;
        background-color: red;
        top: 29%;
        left: 50%;
    }
    .certificate_koala {
        position: relative;
    }

    .certificate_date {
        position: relative;
    }
}

// #capture {
//     margin: 0 auto;
//     width: 100%;
//     height: 100%;
//     overflow: hidden;
// }
// textarea {
//     width: 100%;
//     padding: 2rem 0.5rem;
//     background: transparent;
//     border: 0;
//     text-align: center;
//     color: #fff;
//     // font-family: "Noto Sans", sans-serif;
//     font-weight: 700;
//     font-size: 2rem;
//     resize: none;
//     overflow: hidden;
//     max-height: 100%;
//     min-height: 100%;
// }
</style>
