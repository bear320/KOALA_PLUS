<template lang="">
    <li class="mem_adopt content">
        <div class="mem_basic">
            <p>名字：{{ mem_name }}</p>
            <p>會員ID：{{ mem_id }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 4 筆認養紀錄</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>無尾熊名字</th>
                            <th class="koala_id">無尾熊編號</th>
                            <th class="sup_date">資助認養時間</th>
                            <th class="sup_price">資助認養金額</th>
                            <th>下載領養證明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in couponsList"
                            :key="item.koala_id"
                        >
                            <td>{{ item.koala_name }}</td>
                            <td class="koala_id">{{ item.koala_id }}</td>
                            <td class="sup_date">{{ item.sup_date }}</td>
                            <td class="sup_price">{{ item.sup_price }}</td>
                            <td>
                                <Icon
                                    type="md-download"
                                    size="20"
                                    color="#337a7d"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <p class="certificate_date">{{ couponsList.sup_date }}</p> -->

        <div>
            <div class="html2canvas" ref="html2canvas">
                <!-- 轉出來的證書 -->
                <div class="adopt_certificate">
                    <p class="certificate_name">{{ mem_name }}</p>
                    <!-- <div  v-for="(item, index) in couponsList" 
                    :key="item.koala_name>
                        <p class="certificate_koala">
                        {{ item.koala_name }}
                    </p>
                    </div> -->
                </div>
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
            mem_name: "Charmy",
            mem_id: "P00001",
            imgUrl: "",
            couponsList: [
                {
                    koala_name: "Susan",
                    koala_id: "#KOALA0001",
                    sup_date: "2022/12/01",
                    sup_price: "$1000",
                },
                {
                    koala_name: "Alen",
                    koala_id: "#KOALA0002",
                    sup_date: "2022/12/21",
                    sup_price: "$1000",
                },
                {
                    koala_name: "Duffy",
                    koala_id: "#KOALA0003",
                    sup_date: "2022/11/19",
                    sup_price: "$300",
                },
                {
                    koala_name: "jenny",
                    koala_id: "#KOALA0004",
                    sup_date: "2022/11/15",
                    sup_price: "$300",
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
        .koala_id {
            @include m() {
                display: none;
            }
        }
        .sup_date {
            @include m() {
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
    position: relative;
    width: 600px;
    height: 426px;
    // background-color: pink;
    background-image: url("@/assets/images/member/Certificate01.png");
    .certificate_name {
        position: relative;
    }
}
#capture {
    margin: 0 auto;
    width: 100%;
    height: 400px;
    overflow: hidden;
}
textarea {
    width: 100%;
    padding: 2rem 0.5rem;
    background: transparent;
    border: 0;
    text-align: center;
    color: #fff;
    font-family: "Noto Sans", sans-serif;
    font-weight: 700;
    font-size: 2rem;
    resize: none;
    overflow: hidden;
    max-height: 100%;
    min-height: 100%;
}
</style>
