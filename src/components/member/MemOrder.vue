<template lang="">
    <li class="mem_order content">
        <div class="mem_basic">
            <p>姓名：{{ userid }}</p>
            <p>會員ID：{{ username }}</p>
        </div>
        <!-- 訂單資訊下方內容 -->
        <div class="mem_main">
            <MemUnsubscribe
                v-if="showMemUnsubscribe === true"
                @closeMemUnsubscribe="closeMemUnsubscribe_emit"
            ></MemUnsubscribe>
            <div class="mem_order_table">
                <p>訂單編號: {{ order.ord_id }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>產品名稱</th>
                            <th class="prod_id">商品編號</th>
                            <th class="prod_category">商品類別</th>
                            <th>數量</th>
                            <th class="prod_price">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in order" :key="item.prod_id">
                            <td>{{ item.prod_name }}</td>
                            <td class="prod_id">{{ item.prod_id }}</td>
                            <td class="prod_category">
                                {{ item.prod_category }}
                            </td>
                            <td>{{ item.ord_qty }}</td>
                            <td class="prod_price">{{ item.prod_price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mem_state">
                <button
                    v-show="ord_sts < 1"
                    class="btn-lowest"
                    @click="clickMemUnsubscribe"
                >
                    取消訂單
                </button>
                <p>總額: $800</p>
                <div>訂單狀態:{{ sts_map[ord_sts] }}</div>
            </div>
        </div>
    </li>
</template>
<script>
import MemUnsubscribe from "@/components/member/MemUnsubscribe.vue";
export default {
    components: {
        MemUnsubscribe,
    },
    data() {
        return {
            userid: "",
            username: "",
            showMemUnsubscribe: false,
            ord_sts: 1,
            memindexs: [],
            order: [],
            sts_map: ["訂單準備中", "訂單已出貨", "訂單已完成", "取消訂單"],
            orderList: [
                // {
                //     prod_name: "無尾熊乾髮帽",
                //     prod_id: "1022",
                //     prod_category: "玩具/絨毛娃娃",
                //     ord_qty: 1,
                //     prod_price: 200,
                // },
                // {
                //     prod_name: "無尾熊乾髮帽2",
                //     prod_id: "1023",
                //     prod_category: "玩具/絨毛娃娃",
                //     ord_qty: 1,
                //     prod_price: 200,
                // },
                // {
                //     prod_name: "無尾熊乾髮帽3",
                //     prod_id: "1024",
                //     prod_category: "玩具/絨毛娃娃",
                //     ord_qty: 1,
                //     prod_price: 200,
                // },
            ],
        };
    },
    methods: {
        clickMemUnsubscribe() {
            // console.log(this.showMemUnsubscribe);
            this.showMemUnsubscribe = true;
        },
        closeMemUnsubscribe_emit() {
            this.showMemUnsubscribe = false;
        },
    },
    created() {
        let getCookie = document.cookie;
        if (getCookie) {
            fetch("http://localhost/cgd103_g1/public/api/postmemOrder.php", {
                credentials: "include",
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    if (json.status) {
                        this.order = json.list;
                        this.userid = json.userid;
                        this.username = json.username;
                        return true;
                    }
                    alert("獲取數據失敗");
                });
        } else {
            alert("登入失效");
            //跳轉 login url
        }
    },
};
</script>
<style lang="scss" scoped>
.tabs {
    .wrapper {
        //訂單訊息內容 li
        .mem_order {
            position: relative;
            .mem_basic {
                //會員基本資料
                display: flex;
                p {
                    min-width: 100px;
                    padding: 10px;
                    @include m() {
                        padding: 5px;
                    }
                }
            }
            .mem_main {
                // background-color: beige;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                border-bottom: 1px solid #337a7d;

                .mem_order_table {
                    width: 80%;
                }
                .mem_state {
                    // background-color: burlywood;
                    width: 20%;
                    button {
                        padding: 0 10px;
                        line-height: 30px;
                        height: 30px;
                        @include m() {
                            padding: 0 5px;
                            font-size: 16px;
                        }
                    }
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
        padding: 10px 0;
        line-height: 30px;
        height: 30px;
        th {
            // padding: 10px;
            @include d() {
                padding: 5px;
            }
        }
        .prod_id {
            @include d() {
                display: none;
            }
        }
        .prod_category {
            @include m() {
                display: none;
            }
        }
        .prod_price {
            @include m() {
                display: none;
            }
        }
    }
}
</style>
