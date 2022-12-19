<template>
    <Header />
    <article class="nav-space wrapper">
        <h1>訂單管理</h1>
        <div class="todo">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
        </div>
        <section>
            <!-- 會員編號、訂單號碼 -->

            <div class="accordion" v-for="item in orders" :key="item.ord_id">
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
        </section>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    data() {
        return {
            orders: [],
            orderlists: [],
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
        getAllOrders() {
            const apiURL = new URL(
                "http://localhost:8888/cgd103_g1/public/api/getAllOrders.php"
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.orders = json;
                });
        },
        getOrderLists() {
            const apiURL = new URL(
                "http://localhost:8888/cgd103_g1/public/api/getOrderLists.php"
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    console.log("orderlist");
                    console.log(json);
                    this.orderlists = json;
                });
        },
    },
    created() {
        this.getAllOrders();
        this.getOrderLists();
    },
    components: {
        Header,
    },
};
</script>

<style lang="scss" scoped>
section {
    margin-bottom: 50px;
}
.accordion {
    margin-top: 30px;
    width: 1200px;
    label {
        width: 100%;
        display: block;
        border: 10px;
        background-color: $darkgreen;
        color: #fff;
        border-radius: 10px;
        box-shadow: 3px 3px 3px 3px rgb(190, 190, 190);
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

input[type="checkbox"]:checked + .con {
    display: block;
    background-color: #fff;
    box-shadow: 3px 3px 8px 3px rgb(163, 163, 163);
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
        height: 150px;
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
        height: 150px;
        display: flex;
        justify-content: space-between;
        margin: 10px 50px 25px;
        p,
        div {
            margin: 10px;
        }
        .right {
            margin-right: 50px;
        }
    }
}
.search {
    margin-top: 50px;
}
h1 {
    margin-top: 50px;
}
html article {
    text-align: left;

    h1 {
        display: inline-block;
        width: 25%;
        background-image: url(@/assets/images/backstageindex/orderIcon.png);
        @include bgSetting(contain, right);
    }
    .todo {
        float: right;
        display: flex;
    }
    h2 {
        color: $green;
        @include borderLeft(30px);
    }
    section {
        h3 {
            margin-bottom: 0;
            padding-left: 10px;
        }

        .pic,
        .date {
            img {
                width: 100px;
                height: 100px;
                border-radius: 10px;
            }
        }
        .bstitle {
            display: flex;
            justify-content: center;
            width: 100%;
            background-color: $darkgreen;
            color: white;
            border-radius: 10px;
            h3 {
                width: 20%;
            }
        }

        .content {
            margin: 0px 50px;
            align-items: center;
        }
    }
}
.num {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
}
.card {
    border-radius: 10px;
}
.d-card {
    background-color: #fff;
    border-bottom: 1px solid #eee;
    margin: 0px 50px;
}
.pro {
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.titleall {
    display: flex;
    font-weight: 700;
    margin-top: 20px;
    padding: 20px;
    .title {
        margin-left: 300px;
        width: 30%;
    }
    .pnumtitle {
        width: 25%;
    }
    .pricetitle {
        width: 25%;
    }
    .quantitytitle {
        width: 20%;
    }
    .total {
        width: 15%;
    }
}
.bottom {
    display: flex;
    justify-content: space-between;
    margin: 50px 50px;
}
.bottom {
    padding-bottom: 50px;
}
</style>
