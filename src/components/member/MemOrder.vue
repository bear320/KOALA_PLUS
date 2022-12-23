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

            <!-- ============================================ -->

            <div
                class="accordion"
                v-for="(item, index) in orders"
                :key="item.ord_id"
            >
                <label :for="`tab-${item.ord_id}`">
                    <div class="line1">
                        <p>會員編號：{{ item.mem_id }}</p>
                        <p>訂購日期：{{ item.ord_date }}</p>
                        <p>訂單編號：{{ item.ord_id }}</p>
                        <p>
                            訂單狀態：
                            <span v-if="item.ord_ship == '0'">訂單處理中</span>
                            <span v-if="item.ord_ship == '1'">訂單已出貨</span>
                            <span v-if="item.ord_ship == '2'">訂單已完成</span>
                            <span v-if="item.ord_ship == '3'">訂單未完成</span>
                        </p>
                    </div>
                </label>
                <div class="box">
                    <input
                        type="checkbox"
                        name="tab"
                        :id="`tab-${item.ord_id}`"
                    />
                    <div class="con">
                        <div class="con-1">
                            <p>圖片</p>
                            <p>商品名稱</p>
                            <p>商品編號</p>
                            <p>單價</p>
                            <p>數量</p>
                            <p>小計</p>
                        </div>
                        <!-- 訂單內容 -->
                        <div
                            class="con-2"
                            v-for="orderlist in filterResult[item.ord_id]"
                            :key="orderlist.prod_id"
                        >
                            <p class="pic">
                                <!--  <img
                                    :src="`/images/shop/${orderlist.prod_img1}`"
                                    alt=""
                                /> -->
                                <img
                                    :src="
                                        require(`@/assets/images/shop/${orderlist.prod_img1}`)
                                    "
                                    alt=""
                                />
                            </p>
                            <p class="product">
                                {{ orderlist.prod_name }}
                            </p>
                            <p class="pnum">
                                {{ orderlist.prod_id }}
                            </p>
                            <p class="price">{{ orderlist.prod_price }} 元</p>
                            <p class="quantity">
                                {{ orderlist.ord_qty }}
                            </p>
                            <p class="sumtotal">
                                {{ orderlist.prod_price * orderlist.ord_qty }}
                                元
                            </p>
                        </div>

                        <!-- 訂單資訊 -->
                        <div class="con-3">
                            <div class="left">
                                <p class="ord_person">
                                    收件人：{{
                                        item.ord_person
                                    }}
                                    ，收件人電話：{{ item.ord_phone }}
                                </p>

                                <p class="add">寄送地址：{{ item.ord_add }}</p>
                                <p class="btdate">
                                    訂單成立時間：{{ item.ord_date }}
                                </p>
                                <div class="state">
                                    訂單狀態：
                                    <select
                                        id="ord_ship"
                                        name="ord_ship"
                                        v-model="item.ord_ship"
                                        @change="updateStatus(index)"
                                        required
                                    >
                                        <option :value="0">訂單準備中</option>
                                        <option :value="1">訂單已出貨</option>
                                        <option :value="2">訂單已完成</option>
                                        <option :value="3">訂單未完成</option>
                                    </select>
                                </div>
                            </div>
                            <div class="right">
                                <p>折扣：{{ item.ord_disc }} 元</p>
                                <p>
                                    總價：{{ item.ord_sum - item.ord_disc }} 元
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================ -->
            <!--  <div class="mem_order_table">
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
            </div> -->
            <!-- 測試 accordion 訂單清單展開 -->

            <!-- <div class="section">
                <div
                    class="accordion"
                    v-for="(item, index) in order"
                    :key="item.pord_id"
                > -->
            <!-- <label :for="`tab-${item.ord_id}`"> -->
            <!-- <div class="line1">
                        <p>會員編號：{{ item.mem_id }}</p>
                        <p>訂購日期：{{ item.ord_date }}</p>
                        <p>訂單編號：{{ item.ord_id }}</p>
                        <p>
                            訂單狀態：
                            <span v-if="item.ord_ship == '0'">訂單處理中</span>
                            <span v-if="item.ord_ship == '1'">訂單已出貨</span>
                            <span v-if="item.ord_ship == '2'">訂單已完成</span>
                            <span v-if="item.ord_ship == '3'">取消訂單</span>
                        </p>
                    </div>

                    <div class="box">
                        <input
                            type="checkbox"
                            name="tab"
                            :id="`tab-${item.ord_id}`"
                        />
                    </div>
                </div>
            </div> -->
            {{ order }}
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
                {
                    prod_name: "無尾熊乾髮帽",
                    prod_id: "1022",
                    prod_category: "玩具/絨毛娃娃",
                    ord_qty: 1,
                    prod_price: 200,
                },
                {
                    prod_name: "無尾熊乾髮帽2",
                    prod_id: "1023",
                    prod_category: "玩具/絨毛娃娃",
                    ord_qty: 1,
                    prod_price: 200,
                },
                {
                    prod_name: "無尾熊乾髮帽3",
                    prod_id: "1024",
                    prod_category: "玩具/絨毛娃娃",
                    ord_qty: 1,
                    prod_price: 200,
                },
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
        postMemOrders() {},
        postMemOrderLists() {
            // this.postMemOrders(inedx);
            let getCookie = document.cookie;
            if (getCookie) {
                fetch(
                    "http://localhost/cgd103_g1/public/api/postmemOrder.php",
                    {
                        credentials: "include",
                    }
                )
                    .then((res) => res.json())
                    .then((json) => {
                        console.log(json);
                        if (json.status == 10010) {
                            location.href = "/login";
                        }
                        if (json.status) {
                            this.order = json.list;
                            console.log(this.order);
                            this.userid = json.userid;
                            this.username = json.username;
                            return true;
                        }
                        alert("獲取數據失敗1");
                    });
            } else {
                // alert("登入失效");
                //跳轉 login url
                location.href = "/login";
            }
        },
    },
    created() {
        // this.postMemOrders(this.$route.query);
        this.postMemOrderLists();
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
