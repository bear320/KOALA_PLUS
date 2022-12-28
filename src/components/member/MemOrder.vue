<template lang="">
    <li class="mem_order content">
        <div class="mem_basic">
            <p>會員ID：{{ userid }}</p>
            <p>姓名：{{ username }}</p>
        </div>
        <!-- 訂單資訊下方內容 -->
        <div class="mem_main">
            <MemUnsubscribe
                v-if="showMemUnsubscribe === true"
                @closeMemUnsubscribe="closeMemUnsubscribe_emit"
                @reRenderOrders="cancelOrder"
            ></MemUnsubscribe>
            <p class="orderTotal">合計 {{ order.length }} 筆訂單紀錄</p>
            <!-- ============================================ -->
            <div
                class="accordion"
                v-for="(item, index) in order"
                :key="item.ord_id"
            >
                <label :for="`tab-${item.ord_id}`">
                    <div class="line1">
                        <p>訂購日期：{{ item.ord_date }}</p>
                        <p>訂單編號：{{ item.ord_id }}</p>
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
                            <p>商品名稱</p>
                            <p>商品編號</p>
                            <p>單價</p>
                            <p>數量</p>
                            <p>小計</p>
                        </div>

                        <div
                            class="con-2"
                            v-for="orderlist in filterResult[item.ord_id]"
                            :key="orderlist.prod_id"
                        >
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
                        <div class="con-3">
                            <div class="left">
                                <p class="ord_person">
                                    收件人：{{ item.ord_person }}
                                </p>
                                <p class="ord_phone">
                                    收件人電話：{{ item.ord_phone }}
                                </p>
                                <p class="add">寄送地址：{{ item.ord_add }}</p>
                                <p class="btdate">
                                    訂單成立時間：{{ item.ord_date }}
                                </p>
                                <div class="state">
                                    訂單狀態：{{ sts_map[item.ord_ship] }}
                                </div>
                                <button
                                    v-show="item.ord_ship < 1"
                                    class="btn-lowest"
                                    @click="clickMemUnsubscribe(index)"
                                >
                                    取消訂單
                                </button>
                            </div>
                            <div class="right">
                                <p>折扣：{{ item.ord_disc }} 元</p>
                                <p>
                                    總價：{{ item.ord_sum - item.ord_disc }}
                                    元
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================ -->

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
        </div>
    </li>
</template>
<script>
import MemUnsubscribe from "@/components/member/MemUnsubscribe.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        MemUnsubscribe,
    },
    data() {
        return {
            userid: "",
            username: "",
            showMemUnsubscribe: false,
            // ord_sts: 1,
            memindexs: [],
            order: [],
            sts_map: ["訂單準備中", "訂單已出貨", "訂單已完成", "訂單已取消"],
            orderlists: [],
            tmpOrder: "",
            // orderList: []
        };
    },
    computed: {
        filterResult() {
            return this.orderlists.reduce(function (results, org) {
                (results[org.ord_id] = results[org.ord_id] || []).push(org);
                return results;
            }, {});
        },
    },
    methods: {
        cancelOrder() {
            console.log("即將取消的訂單為");
            console.log(this.tmpOrder);

            fetch(`${BASE_URL}/postUpdateOrderState.php`, {
                method: "post",
                credentials: "include",
                body: new URLSearchParams({
                    ord_ship: 3,
                    ord_id: this.tmpOrder,
                    mem_id: this.$store.state.user.mem_id,
                }),
            })
                .then((res) => res.json())
                .then((json) => this.postMemOrders());
        },
        clickMemUnsubscribe(index) {
            // console.log(this.showMemUnsubscribe);
            this.tmpOrder = this.order[index].ord_id;
            // console.log(this.order[index].ord_id);
            this.showMemUnsubscribe = true;
            const ord_ship = {
                search_orderby: iconorderby,
            };
        },
        closeMemUnsubscribe_emit() {
            this.showMemUnsubscribe = false;
        },

        // 抓取訂單標題
        postMemOrders() {
            // this.postMemOrders(inedx);

            let getCookie = document.cookie;
            if (getCookie) {
                fetch(`${BASE_URL}/postmemOrder.php`, {
                    credentials: "include",
                })
                    .then((res) => res.json())
                    .then((json) => {
                        // console.log(json);
                        // if (json.status == 10010) {
                        //     location.href = "/login";
                        // }
                        if (json.status) {
                            this.order = json.list;
                            // console.log(this.order);
                            this.userid = json.userid;
                            this.username = json.username;
                            return true;
                        }
                        // alert("獲取數據失敗1");
                    });
            } else {
                // alert("登入失效");
                //跳轉 login url
                // location.href = "/login";
            }
        },
        // 抓取訂單內容
        postMemOrderLists() {
            // this.postMemOrders(inedx);
            let getCookie = document.cookie;
            if (getCookie) {
                fetch(`${BASE_URL}/postmemOrderlists.php`, {
                    credentials: "include",
                })
                    .then((res) => res.json())
                    .then((json) => {
                        // console.log(json);
                        // if (json.status == 10010) {
                        //     location.href = "/login";
                        // }
                        if (json.status) {
                            // console.log("qq", json);
                            this.orderlists = json.list;
                            // console.log(this.orderlists);
                            return true;
                        }
                        // alert("獲取數據失敗1");
                    });
            } else {
                // location.href = "/login";
            }
        },
    },
    created() {
        // this.postMemOrders(this.$route.query);
        this.postMemOrders();
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
                .orderTotal {
                    margin: 0 auto;
                }
                .accordion {
                    margin-top: 30px;
                    width: 100%;
                    label {
                        width: 100%;
                        display: block;
                        border: 10px;
                        background-color: #2e382e;
                        color: #fff;
                        border-radius: 10px;
                        box-shadow: 0px 2px 3px 1px rgb(190, 190, 190);
                        padding: 10px 50px;
                        cursor: pointer;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -o-user-select: none;
                        user-select: none;
                        text-align: center;

                        .line1 {
                            display: flex;
                            p {
                                width: calc(100% / 3);
                            }
                        }
                    }
                }
            }
        }
    }
}

// =======================

input[type="checkbox"]:checked + .con {
    display: block;
    background-color: #fff;
    box-shadow: 0px 2px 3px 1px rgb(190, 190, 190);
    height: fit-content;
}
input[type="checkbox"] + .con {
    display: none;
}
input[type="checkbox"] {
    display: none;
}
.con {
    height: 0px;
    overflow: hidden;
    transition: 0.5s;
    margin-top: 10px;
    border-radius: 10px;

    .con-1 {
        height: 30px;
        display: flex;
        margin: 10px 50px;
        text-align: center;
        border-bottom: 0.5px solid gray;

        p {
            width: calc(100% / 6);
            margin-bottom: 10px;
        }
    }
    .con-2 {
        height: fit-content;
        display: flex;
        margin: 10px 50px;
        text-align: center;
        align-items: center;
        border-bottom: 0.5px solid gray;
        p {
            width: calc(100% / 6);
            padding: 10px 0px;
        }
    }
    .con-3 {
        // height: 150px;
        display: flex;
        justify-content: space-between;
        margin: 10px 50px 25px;
        p,
        div {
            margin: 10px;
        }
        .left {
            p {
                text-align: left;
            }
            .state {
                font-weight: 600;
            }
        }
        .right {
            margin-right: 50px;
        }
        button {
            padding: 0 10px;
            line-height: 30px;
            // height: 30px;
            @include m() {
                padding: 0 5px;
                font-size: 16px;
            }
        }
    }
}
</style>
