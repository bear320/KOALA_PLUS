<template>
    <Header></Header>
    <section class="main_block nav-space">
        <!-- ======================================== 遊戲背景 ======================================== -->
        <div class="main_block_LeftTree">
            <div class="main_block_LeftTree_1">
                <img src="../assets/images/game/LeftTree_1.png" alt="" />
            </div>
            <div class="main_block_LeftTree_2">
                <img src="../assets/images/game/LeftTree_2.png" alt="" />
            </div>
            <div class="main_block_LeftTree_3">
                <img src="../assets/images/game/LeftTree_3.png" alt="" />
            </div>
        </div>
        <div class="main_block_MainTree">
            <div class="main_block_MainTree_0">
                <img src="../assets/images/game/MainTree.png" alt="" />
                <div>
                    <div v-if="game_exp <= 500" class="main_block_koala_1">
                        <img
                            src="../assets/images/game/koala_small.png"
                            alt=""
                        />
                    </div>
                    <div
                        v-else-if="game_exp <= 1000"
                        class="main_block_koala_2"
                    >
                        <img
                            src="../assets/images/game/koala_middle.png"
                            alt=""
                        />
                    </div>
                    <div
                        v-else-if="game_exp <= 2000"
                        class="main_block_koala_3"
                    >
                        <img
                            src="../assets/images/game/koala_large.png"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="main_block_RightTree">
            <div class="main_block_RightTree_1">
                <img src="../assets/images/game/RightTree_1.png" alt="" />
            </div>
            <div class="main_block_RightTree_2">
                <img src="../assets/images/game/RightTree_2.png" alt="" />
            </div>
            <div class="main_block_RightTree_3">
                <img src="../assets/images/game/RightTree_3.png" alt="" />
            </div>
        </div>
        <div class="main_block_grass">
            <img src="../assets/images/game/grass.png" alt="" />
        </div>
        <!-- ======================================== 遊戲選項列 ======================================== -->
        <nav class="game_nav">
            <div class="game_nav_money">
                <div class="game_nav_money_left">
                    <img src="../assets/images/game/coin.png" alt="" />
                    <p id="game_money">{{ game_money }}</p>
                </div>
                <div class="game_nav_plus btn-open" @click="plus_talkwindow">
                    <img src="../assets/images/game/pluscircle.png" alt="" />
                </div>
            </div>
            <div class="game_nav_button">
                <div
                    class="game_nav_shop_button btn-open"
                    @click="shop_talkwindow"
                >
                    <img src="../assets/images/game/game_shop.png" alt="" />
                    <p>商店</p>
                </div>
                <div
                    class="game_nav_bag_button btn-open"
                    @click="bag_talkwindow"
                >
                    <img src="../assets/images/game/bag.png" alt="" />
                    <p>倉庫</p>
                </div>
            </div>
            <!-- v-if -->
            <div class="game_nav_expbar">
                <div v-if="game_exp <= 500" class="experience_bar">
                    <div
                        :style="{ width: expWidth + '%' }"
                        :class="{ expValue1: true }"
                    ></div>
                </div>
                <div v-else-if="game_exp <= 1000" class="experience_bar">
                    <div
                        :style="{ width: expWidth + '%' }"
                        :class="{ expValue2: true }"
                    ></div>
                </div>
                <div v-else-if="game_exp <= 2000" class="experience_bar">
                    <div
                        :style="{ width: expWidth + '%' }"
                        :class="{ expValue3: true }"
                    ></div>
                </div>
            </div>
            <div>
                <div v-if="500 - game_exp >= 0">
                    <p>無尾熊目前階段：1</p>
                    <p>已達成經驗值：{{ game_exp }}</p>
                    <p>距離下一段經驗值：{{ 500 - game_exp }}</p>
                </div>
                <div v-else-if="1000 - game_exp >= 0">
                    <p>無尾熊目前階段：2</p>
                    <p>已達成經驗值：{{ game_exp }}</p>
                    <p>距離下一段經驗值：{{ 1000 - game_exp }}</p>
                </div>
                <div v-else-if="2000 - game_exp >= 0">
                    <p>無尾熊目前階段：3</p>
                    <p>已達成經驗值：{{ game_exp }}</p>
                    <p>距離終點只剩經驗值：{{ 2000 - game_exp }}</p>
                </div>
            </div>
        </nav>
        <!-- ======================================== 彈出賺遊戲幣的方式 ======================================== -->
        <div id="plus_talkwindow" class="plus_talkwindow">
            <div class="plus_talkwindow_block">
                <div class="plus_talkwindow_image">
                    <img
                        src="../assets/images/game/plus_talkwindow_koala.png"
                        alt=""
                    />
                </div>
                <div class="btn-close" @click="removeActive">X</div>
                <div class="plus_talkwindow_content">
                    <p>如何獲取尤加利葉幣?</p>
                    <div class="plus_talkwindow_content_txt">
                        <p>
                            1. 認養/資助無尾熊們!<br />
                            您可以獲得捐助金額的100%尤加利葉幣
                        </p>
                        <p>
                            2. 到周邊商城購買無尾熊周邊商品!<br />
                            您可以獲得商品總金額的10%尤加利葉幣
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================== 彈出虛擬商店 ======================================== -->
        <div id="shop_talkwindow" class="shop_talkwindow">
            <div class="shop_talkwindow_block">
                <div class="shop_talkwindow_title">
                    <img src="../assets/images/game/game_shop.png" alt="" />
                    <p>商店</p>
                </div>
                <div class="btn-close" @click="removeActive">X</div>
                <div class="shop_talkwindow_commodity">
                    <div>
                        <img src="../assets/images/game/item_1.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_1 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 20"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_1"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_1_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_1_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_1_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_2 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 50"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_2"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_2_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_2_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_2_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_3 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 125"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_3"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_3_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_3_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_3_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_4 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 225"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_4"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_4_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_4_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_4_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_5 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 350"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_5"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_5_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_5_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_5_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            {{ item_6 }}
                        </p>
                        <div>
                            <div
                                v-if="game_money >= 500"
                                class="shop_talkwindow_commodity_button"
                                @click="addnum_6"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_6_sellingprice }}</p>
                                </div>
                            </div>
                            <div
                                v-else
                                class="shop_talkwindow_commodity_button"
                            >
                                <div>
                                    <img
                                        src="../assets/images/game/coin.png"
                                        alt=""
                                    />
                                    <p>{{ item_6_sellingprice }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_6_exp }} 經驗值
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================== 彈出遊戲背包 ======================================== -->
        <div id="bag_talkwindow" class="bag_talkwindow">
            <div class="bag_talkwindow_block">
                <div class="bag_talkwindow_title">
                    <img src="../assets/images/game/bag.png" alt="" />
                    <p>倉庫</p>
                </div>
                <div class="btn-close" @click="removeActive">X</div>
                <div class="bag_talkwindow_commodity">
                    <div>
                        <img src="../assets/images/game/item_1.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_1"
                        >
                            剩餘數量：{{ remaining_amount_1 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_1 >= 1"
                                @click="minnum_1"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_1_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_2"
                        >
                            剩餘數量：{{ remaining_amount_2 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_2 >= 1"
                                @click="minnum_2"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_2_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_3"
                        >
                            剩餘數量：{{ remaining_amount_3 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_3 >= 1"
                                @click="minnum_3"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_3_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_4"
                        >
                            剩餘數量：{{ remaining_amount_4 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_4 >= 1"
                                @click="minnum_4"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_4_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_5"
                        >
                            剩餘數量：{{ remaining_amount_5 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_5 >= 1"
                                @click="minnum_5"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_5_exp }} 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p
                            class="bag_talkwindow_commodity_introduce_1"
                            id="remaining_amount_6"
                        >
                            剩餘數量：{{ remaining_amount_6 }}
                        </p>
                        <div>
                            <div
                                class="bag_talkwindow_commodity_button"
                                v-if="remaining_amount_6 >= 1"
                                @click="minnum_6"
                            >
                                <div><p>餵食</p></div>
                            </div>
                            <div class="bag_talkwindow_commodity_button" v-else>
                                <div><p>餵食</p></div>
                            </div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 {{ item_6_exp }} 經驗值
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================== 彈出折價券 ======================================== -->
        <div id="discount_coupon_talkwindow" class="discount_coupon_talkwindow">
            <div class="discount_coupon_talkwindow_block">
                <div
                    class="discount_coupon_talkwindow_block_button"
                    @click="get_discount_coupon"
                >
                    <p>領取</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    el: ".game_nav_expbar",
    data() {
        return {
            game_money: "",

            item_1: "經濟實惠的尤加利葉",
            item_2: "物美價廉的尤加利葉",
            item_3: "熱銷第一的尤加利葉",
            item_4: "經典不敗的尤加利葉",
            item_5: "通過認證的尤加利葉",
            item_6: "得過冠軍的尤加利葉",

            item_1_sellingprice: 20,
            item_2_sellingprice: 50,
            item_3_sellingprice: 125,
            item_4_sellingprice: 225,
            item_5_sellingprice: 350,
            item_6_sellingprice: 500,

            item_1_exp: 10,
            item_2_exp: 20,
            item_3_exp: 50,
            item_4_exp: 90,
            item_5_exp: 140,
            item_6_exp: 210,

            remaining_amount_1: "",
            remaining_amount_2: "",
            remaining_amount_3: "",
            remaining_amount_4: "",
            remaining_amount_5: "",
            remaining_amount_6: "",

            // ======================================== 經驗值滿 2000，因算 100%，2000/100=20  ========================================
            increment_1: 10 / 20,
            increment_2: 20 / 20,
            increment_3: 50 / 20,
            increment_4: 90 / 20,
            increment_5: 140 / 20,
            increment_6: 210 / 20,

            expWidth: 0,
            game_exp: 0,
        };
    },
    // created() {
    //     (function(){
    //         const supportId = this.$route.params.sup_id;
    //         console.log(supportId);
    //         const apiURL = new URL(`${BASE_URL}/postSupportUpdate.php`);
    //         const supportUpdate = {
    //             sup_id: Number(this.source.sup_id),
    //             sup_note: this.source.sup_note,
    //         };
    //         console.log(supportUpdate);

    //         fetch(apiURL, {
    //             method: "POST",
    //             body: new URLSearchParams(supportUpdate),
    //         })
    //             .then((res) => res.json())
    //             .then((status) => {
    //                 alert(status.msg);
    //                 if (confirm("是否關閉此分頁？")) {
    //                     window.close();
    //                 }
    //             });
    //     })(); //IIFE
    // },
    mounted() {
        // ======================================== 把忘記的密碼撈出來  ======================================== //
        let QQ = this; //這裡的QQ指向的Vue實體
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                // console.log('ㄎㄎ');
                showMember(xhr.responseText);
            } else {
                alert(xhr.status);
            }
        };

        // console.log(this.$store.state.user.mem_id);

        // const apiURL = new URL(`${BASE_URL}/getGameValue.php?memId=${this.$store.state.user.mem_id}`);
        var url = `http://localhost/cgd103_g1/public/api/getGameValue.php?memId=${this.$store.state.user.mem_id}`;
        xhr.open("get", url, true);
        xhr.send(null);

        function showMember(json) {
            var xhr = new XMLHttpRequest();
            // console.log(QQ);
            // const apiURL = new URL(`${BASE_URL}/getGameValue.php?memId=${QQ.$store.state.user.mem_id}`);
            var url = `http://localhost/cgd103_g1/public/api/getGameValue.php?memId=${QQ.$store.state.user.mem_id}`;
            xhr.open("get", url, true);
            xhr.send(null);
            let member = JSON.parse(json);

            let game_moey;
            // 這裡的QQ指的是Vue實體
            QQ.game_money = member.mem_point;
            document.getElementById("game_money").innerHTML = game_moey;

            let remaining_amount_1;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_1 = member.mem_food1;
            document.getElementById("remaining_amount_1").innerHTML =
                remaining_amount_1;

            let remaining_amount_2;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_2 = member.mem_food2;
            document.getElementById("remaining_amount_2").innerHTML =
                remaining_amount_2;

            let remaining_amount_3;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_3 = member.mem_food3;
            document.getElementById("remaining_amount_3").innerHTML =
                remaining_amount_3;

            let remaining_amount_4;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_4 = member.mem_food4;
            document.getElementById("remaining_amount_4").innerHTML =
                remaining_amount_4;

            let remaining_amount_5;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_5 = member.mem_food5;
            document.getElementById("remaining_amount_5").innerHTML =
                remaining_amount_5;

            let remaining_amount_6;
            // 這裡的QQ指的是Vue實體
            QQ.remaining_amount_6 = member.mem_food6;
            document.getElementById("remaining_amount_6").innerHTML =
                remaining_amount_6;
        }
    },
    computed: {},
    methods: {
        // ======================================== X 關掉彈窗 ======================================== //
        removeActive: function () {
            document
                .getElementById("shop_talkwindow")
                .classList.remove("shop_talkwindow_active");
            document
                .getElementById("bag_talkwindow")
                .classList.remove("bag_talkwindow_active");
            document
                .getElementById("plus_talkwindow")
                .classList.remove("plus_talkwindow_active");
        },

        // ======================================== 彈出賺遊戲幣的方式 ======================================== //
        plus_talkwindow: function () {
            document
                .getElementById("shop_talkwindow")
                .classList.remove("shop_talkwindow_active");
            document
                .getElementById("bag_talkwindow")
                .classList.remove("bag_talkwindow_active");
            document
                .getElementById("plus_talkwindow")
                .classList.remove("plus_talkwindow_active");

            document
                .getElementById("plus_talkwindow")
                .classList.add("plus_talkwindow_active");
        },

        // ======================================== 彈出虛擬商店 ======================================== //
        shop_talkwindow: function () {
            document
                .getElementById("shop_talkwindow")
                .classList.remove("shop_talkwindow_active");
            document
                .getElementById("bag_talkwindow")
                .classList.remove("bag_talkwindow_active");
            document
                .getElementById("plus_talkwindow")
                .classList.remove("plus_talkwindow_active");

            document
                .getElementById("shop_talkwindow")
                .classList.add("shop_talkwindow_active");
        },

        // ======================================== 彈出遊戲背包 ======================================== //
        bag_talkwindow: function () {
            document
                .getElementById("shop_talkwindow")
                .classList.remove("shop_talkwindow_active");
            document
                .getElementById("bag_talkwindow")
                .classList.remove("bag_talkwindow_active");
            document
                .getElementById("plus_talkwindow")
                .classList.remove("plus_talkwindow_active");

            document
                .getElementById("bag_talkwindow")
                .classList.add("bag_talkwindow_active");
        },

        // ======================================== 經濟實惠的尤加利葉 ======================================== //
        addnum_1: function () {
            this.remaining_amount_1++;
            this.game_money -= 20;
        },
        minnum_1: function () {
            this.remaining_amount_1--;

            if (this.expWidth + 0.5 < 100) {
                this.expWidth = this.expWidth + this.increment_1; // 增加經驗值
            } else if (this.expWidth + 0.5 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 0.5 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 10 <= 2000) {
                this.game_exp += 10;
            } else if (this.game_exp + 10 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去
                let instant = new Date();
                let now =
                    instant.getFullYear() +
                    "-" +
                    (instant.getMonth() + 1) +
                    "-" +
                    instant.getDate();
                console.log(now);
                this.game_exp = 0;
            }
        },

        // ======================================== 物美價廉的尤加利葉 ======================================== //
        addnum_2: function () {
            this.remaining_amount_2++;
            this.game_money -= 50;
        },
        minnum_2: function () {
            this.remaining_amount_2--;

            if (this.expWidth + 1 <= 100) {
                this.expWidth = this.expWidth + this.increment_2; // 增加經驗值
            } else if (this.expWidth + 1 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 1 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 20 <= 2000) {
                this.game_exp += 20;
            } else if (this.game_exp + 20 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去
                let instant = new Date();
                let now =
                    instant.getFullYear() +
                    "-" +
                    (instant.getMonth() + 1) +
                    "-" +
                    instant.getDate();
                console.log(now);
                this.game_exp = 0;
            }
        },

        // ======================================== 熱銷第一的尤加利葉 ======================================== //
        addnum_3: function () {
            this.remaining_amount_3++;
            this.game_money -= 125;
        },
        minnum_3: function () {
            this.remaining_amount_3--;

            if (this.expWidth + 2.5 <= 100) {
                this.expWidth = this.expWidth + this.increment_3; // 增加經驗值
            } else if (this.expWidth + 2.5 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 2.5 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 50 <= 2000) {
                this.game_exp += 50;
            } else if (this.game_exp + 50 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去
                let instant = new Date();
                let now =
                    instant.getFullYear() +
                    "-" +
                    (instant.getMonth() + 1) +
                    "-" +
                    instant.getDate();
                console.log(now);
                this.game_exp = 0;
            }
        },

        // ======================================== 經典不敗的尤加利葉 ======================================== //
        addnum_4: function () {
            this.remaining_amount_4++;
            this.game_money -= 225;
        },
        minnum_4: function () {
            this.remaining_amount_4--;

            if (this.expWidth + 4.5 <= 100) {
                this.expWidth = this.expWidth + this.increment_4; // 增加經驗值
            } else if (this.expWidth + 4.5 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 4.5 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 90 <= 2000) {
                this.game_exp += 90;
            } else if (this.game_exp + 90 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去
                let instant = new Date();
                let now =
                    instant.getFullYear() +
                    "-" +
                    (instant.getMonth() + 1) +
                    "-" +
                    instant.getDate();
                console.log(now);
                this.game_exp = 0;
            }
        },

        // ======================================== 通過認證的尤加利葉 ======================================== //
        addnum_5: function () {
            this.remaining_amount_5++;
            this.game_money -= 350;
        },
        minnum_5: function () {
            this.remaining_amount_5--;

            if (this.expWidth + 7 <= 100) {
                this.expWidth = this.expWidth + this.increment_5; // 增加經驗值
            } else if (this.expWidth + 7 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 7 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 140 <= 2000) {
                this.game_exp += 140;
            } else if (this.game_exp + 140 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去
                let instant = new Date();
                let now =
                    instant.getFullYear() +
                    "-" +
                    (instant.getMonth() + 1) +
                    "-" +
                    instant.getDate();
                console.log(now);
                this.game_exp = 0;
            }
        },

        // ======================================== 得過冠軍的尤加利葉 ======================================== //
        addnum_6: function () {
            this.remaining_amount_6++;
            this.game_money -= 500;
        },
        minnum_6: function () {
            this.remaining_amount_6--;
            if (this.expWidth + 10.5 <= 100) {
                this.expWidth = this.expWidth + this.increment_6; // 增加經驗值
            } else if (this.expWidth + 10.5 == 100) {
                this.expWidth = 100;
            } else if (this.expWidth + 10.5 > 100) {
                this.expWidth = 0;
            }

            if (this.game_exp + 210 < 2000) {
                this.game_exp += 210;
            } else if (this.game_exp + 210 >= 2000) {
                this.game_exp = 2000;
                document
                    .getElementById("discount_coupon_talkwindow")
                    .classList.add("discount_coupon_talkwindow_active");
                // 彈窗禮券   post 進去

                let instant = new Date();
                let year = instant.getFullYear();
                let month = instant.getMonth() + 1;
                let day = instant.getDate();
                let now = year + "-" + month + "-" + day;
                let nextMonth = instant.getMonth() + 2;
                if (nextMonth == 13) {
                    nextMonth = 1;
                }
                let future =
                    instant.getFullYear() +
                    "-" +
                    nextMonth +
                    "-" +
                    instant.getDate();

                console.log(now);
                console.log(future);

                const apiURL = new URL(`${BASE_URL}/postGameCoupon.php`);
                // let url = `http://localhost/cgd103_g1/public/api/postGameCoupon.php`;
                const gameDiscountCoupon = {
                    memId: this.$store.state.user.mem_id,
                    coupon_get_date: now,
                    coupon_exp_date: future,
                };

                fetch(apiURL, {
                    method: "POST",
                    body: new URLSearchParams(gameDiscountCoupon),
                })
                    .then((res) => res.json())
                    .then((json) => console.log(json));
                // .then((result) => {
                //     alert(result.msg);
                // });

                this.game_exp = 0;
            }
        },

        // ======================================== 領取折價券 ======================================== //
        get_discount_coupon: function () {
            document
                .getElementById("discount_coupon_talkwindow")
                .classList.remove("discount_coupon_talkwindow_active");
        },

        // ======================================== 消費及使用時同步更新後台資料 ======================================== //
        // postData() {
        //     // const apiURL = new URL(`${BASE_URL}/postGameValue.php`);
        //     let url = `http://localhost/cgd103_g1/public/api/postGameValue.php`;
        //     const gameValueContent = {
        //         memId: this.$store.state.user.mem_id,
        //         game_money: this.game_money,
        //         remaining_amount_1: this.remaining_amount_1,
        //         remaining_amount_2: this.remaining_amount_2,
        //         remaining_amount_3: this.remaining_amount_3,
        //         remaining_amount_4: this.remaining_amount_4,
        //         remaining_amount_5: this.remaining_amount_5,
        //         remaining_amount_6: this.remaining_amount_6,
        //     };

        //     fetch(url, {
        //         method: "POST",
        //         body: new URLSearchParams(gameValueContent),
        //     })
        //         .then((res) => res.json())
        //         .then((json) => console.log(json))
        // },
    },
    watch: {
        // ======================================== 消費及使用時同步更新後台資料 ======================================== //
        // remaining_amount_1() {
        //     this.postData();
        // },
        // remaining_amount_2() {
        //     this.postData();
        // },
        // remaining_amount_3() {
        //     this.postData();
        // },
        // remaining_amount_4() {
        //     this.postData();
        // },
        // remaining_amount_5() {
        //     this.postData();
        // },
        // remaining_amount_6() {
        //     this.postData();
        // },
    },
    unmounted() {
        // ======================================== 消費及使用時同步更新後台資料 ======================================== //
        // this.postData();
    },
};
</script>

<style lang="scss" scoped>
a {
    text-decoration: none;
    color: #000;
}
img {
    width: 100%;
    display: inline;
}

template {
    background-color: #d3fdff;
}

/* ======================================== 遊戲背景 ======================================== */
.main_block {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: #d3fdff;
    display: flex;
    overflow: hidden;
    user-select: none;
}

.main_block_LeftTree {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40%;
    display: flex;
    align-items: flex-end;
}

.main_block_LeftTree > img {
    vertical-align: bottom;
}

.main_block_LeftTree_1 {
    // position: absolute;
    // left: 10%;
    // bottom: 0;
}

.main_block_LeftTree_2 {
    // position: absolute;
    // left: 20%;
    // bottom: 0;
}

.main_block_LeftTree_3 {
    // position: absolute;
    // left: 30%;
    // bottom: 0;
}

.main_block_MainTree {
    // position: relative;
    // width: 100%;
}

.main_block_MainTree_0 {
    width: 60%;
    position: absolute;
    bottom: 0;
    left: 20%;
}

.main_block_koala_1 {
    position: absolute;
    bottom: 23%;
    left: 42%;
    width: 15%;
}

.main_block_koala_2 {
    position: absolute;
    bottom: 20%;
    left: 39%;
    width: 26%;
    animation-name: rotate_2;
    animation-duration: 10s;
    animation-delay: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

@keyframes rotate_2 {
    0% {
        top: 45%;
        rotate: 5deg;
    }
    5% {
        rotate: 0deg;
    }
    10% {
        rotate: -5deg;
    }
    15% {
        rotate: 0deg;
    }
    20% {
        rotate: 5deg;
    }
    25% {
        top: 30%;
        rotate: 0deg;
    }
    30% {
        rotate: -5deg;
    }
    35% {
        rotate: 0deg;
    }
    40% {
        rotate: 5deg;
    }
    45% {
        rotate: 0deg;
    }
    50% {
        top: 45%;
        rotate: -5deg;
    }
    55% {
        rotate: 0deg;
    }
    60% {
        rotate: 5deg;
    }
    65% {
        rotate: 0deg;
    }
    70% {
        rotate: -5deg;
    }
    75% {
        top: 60%;
        rotate: 0deg;
    }
    80% {
        rotate: 5deg;
    }
    85% {
        rotate: 0deg;
    }
    90% {
        rotate: -5deg;
    }
    95% {
        rotate: 0deg;
    }
    100% {
        top: 45%;
        rotate: 5deg;
    }
}

.main_block_koala_3 {
    position: absolute;
    bottom: 17%;
    left: 35%;
    width: 38%;
    animation-name: rotate_3;
    animation-duration: 10s;
    animation-delay: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

@keyframes rotate_3 {
    0% {
        transform: translate(0, 0) rotate(0deg) translate(0%, 0%) rotate(0deg);
    }
    15% {
        transform: translate(0, 0) rotate(45deg) translate(15%, -50%)
            rotate(45deg);
    }
    38% {
        transform: translate(0, 0) rotate(100deg) translate(50%, -100%)
            rotate(220deg);
    }
    60% {
        transform: translate(0, 0) rotate(90deg) translate(65%, 0%)
            rotate(220deg);
    }
    80% {
        transform: translate(0, 0) rotate(90deg) translate(65%, 0%)
            rotate(270deg);
        rotate: 5deg;
    }
    85% {
        rotate: 0deg;
    }
    90% {
        rotate: -5deg;
    }
    95% {
        rotate: 0deg;
    }
    100% {
        transform: translate(50%, 50%) translate(-50%, -50%);
        rotate: 5deg;
    }
}

.main_block_RightTree {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 30%;
    display: flex;
    align-items: flex-end;
}

.main_block_RightTree_1 {
    // position: absolute;
    right: 10%;
    bottom: 0;
}

.main_block_RightTree_2 {
    // position: absolute;
    right: 20%;
    bottom: 0;
}

.main_block_RightTree_3 {
    // position: absolute;
    right: 30%;
    bottom: 0;
}

.main_block_grass {
    width: 100%;
    position: absolute;
    bottom: 0;
}

.main_block_grass > img {
    width: 100%;
    // position: absolute;
    bottom: 0;
    left: 0;
    vertical-align: bottom;
}

/* ======================================== 遊戲選項列 ======================================== */
.game_nav {
    position: absolute;
    width: 15%;
    top: 7.5%;
    right: 5%;
    bottom: 0;
    left: 80%;
}

.game_nav_money {
    display: flex;
    justify-content: center;
    margin-top: 20%;
}

.game_nav_money_left {
    width: 140px;
    display: flex;
    // border: 1px solid #96bbbd;
    border-radius: 10px;
}

.game_nav_money_left > img {
    margin-top: 3%;
    width: 50px;
    height: 52px;
}

.game_nav_money_left > p {
    padding-left: 5%;
    line-height: 62px;
    font-size: 28px;
    margin: auto;
}

.game_nav_plus {
    margin-left: 5%;
}

.game_nav_plus > img {
    width: 30px;
    height: 30px;
}

.game_nav_shop_button {
    width: 100px;
    margin: auto;
    margin-top: 30px;
    text-align: center;
    border: 1px solid #96bbbd;
    border-radius: 10px;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.game_nav_shop_button > img {
    width: 45px;
    height: 42px;
    margin-top: 10px;
}

.game_nav_shop_button > p {
    margin-top: 10px;
    margin-bottom: 10px;
}

.game_nav_bag_button {
    width: 100px;
    margin: auto;
    margin-top: 30px;
    text-align: center;
    border: 1px solid #96bbbd;
    border-radius: 10px;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.game_nav_bag_button > img {
    width: 45px;
    height: 45px;
    margin-top: 10px;
}

.game_nav_bag_button > p {
    margin-top: 10px;
    margin-bottom: 10px;
}

/* ============================== 經驗條 ============================== */
.experience_bar {
    background-color: grey;
    height: 12px;
    margin: 10px;
    margin-top: 15%;
}

.expValue1 {
    background-color: teal;
    height: 12px;
    max-width: 100%;
}

.expValue2 {
    background-color: orange;
    height: 12px;
    max-width: 100%;
}

.expValue3 {
    background-color: red;
    height: 12px;
    max-width: 100%;
}

.game_nav_expbar {
    cursor: pointer;
}

.btn-open {
    cursor: pointer;
}

/* ======================================== 彈出賺遊戲幣的方式 ======================================== */
.plus_talkwindow {
    position: absolute;
    width: 100%;
    top: 10%;
    right: 0%;
    bottom: 0;
    left: -16%;
    overflow: hidden;
    margin-right: 20%;
    transform: scale(0);
}

.plus_talkwindow_block {
    width: 70%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 50%;
    left: 22%;
    font-size: 30px;
    text-align: center;
    color: white;
    background-color: #ccc;
    background-image: url(../assets/images/game/talk_window_background.png);
    border-radius: 10px;
}

.plus_talkwindow_content {
    position: relative;
    width: 70%;
    margin: -1% auto;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
    padding-top: 5%;
    margin-left: 25%;
}

/* .plus_talkwindow_image {} */

.plus_talkwindow_image > img {
    width: 320px;
    height: 400px;
    position: absolute;
    bottom: 0;
    left: 0;
}

.plus_talkwindow_content > p {
    width: 100%;
    color: #000;
    font-size: 28px;
    margin-left: 10%;
}

.plus_talkwindow_content_txt {
    padding-top: 5%;
    padding-bottom: 10%;
    padding-left: 25%;
}
.plus_talkwindow_content_txt > p {
    color: #000;
    text-align: left;
    line-height: 2.5;
    font-size: 20px;
}

/* ======================================== 彈出虛擬商店 ======================================== */
.shop_talkwindow {
    position: absolute;
    width: 50%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 17%;
    overflow: hidden;
    transform: scale(0);
}

.shop_talkwindow_block {
    position: relative;
    width: 100%;
    font-size: 30px;
    text-align: center;
    color: white;
    background-color: #ccc;
    background-image: url(../assets/images/game/talk_window_background.png);
    border-radius: 10px;
}

.shop_talkwindow_title {
    padding-top: 2%;
    justify-content: center;
    display: flex;
}

.shop_talkwindow_title > img {
    width: 6%;
}

.shop_talkwindow_title > p {
    margin-left: 3%;
    line-height: 41.78px;
}

.shop_talkwindow_commodity {
    width: 85%;
    margin: 2% auto;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
}

.shop_talkwindow_commodity > div {
    width: 26%;
    background-color: #dee8e7;
    margin: auto;
    margin-top: 1.5%;
    margin-bottom: 3%;
    padding: 1.5%;
    border-radius: 10px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

.shop_talkwindow_commodity > div > img {
    width: 60%;
    margin-bottom: 10%;
}

.shop_talkwindow_commodity_introduce_1 {
    color: #000;
    font-size: 14px;
}

.shop_talkwindow_commodity_button {
    width: 65%;
    display: flex;
    margin: 15px auto;
    padding: 10px;
    justify-content: space-around;
    border-radius: 10px;
    background-color: #579194;
    cursor: pointer;
}

.shop_talkwindow_commodity_button > div {
    display: flex;
}

.shop_talkwindow_commodity_button > div > img {
    width: 20px;
    height: 20px;
    margin-top: 8.5%;
}

.shop_talkwindow_commodity_button > div > p {
    margin-right: 30%;
    margin-left: 10%;
    font-size: 20px;
}

.shop_talkwindow_commodity_introduce_2 {
    color: #000;
    font-size: 12px;
}

/* ======================================== 遊戲背包 ======================================== */
.bag_talkwindow {
    position: absolute;
    width: 50%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 17%;
    overflow: hidden;
    transform: scale(0);
}

.bag_talkwindow_block {
    position: relative;
    width: 100%;
    font-size: 30px;
    text-align: center;
    color: white;
    background-color: #ccc;
    background-image: url(../assets/images/game/talk_window_background.png);
    border-radius: 10px;
}

.bag_talkwindow_title {
    padding-top: 2%;
    justify-content: center;
    display: flex;
}

.bag_talkwindow_title > img {
    width: 6%;
}

.bag_talkwindow_title > p {
    margin-left: 3%;
    line-height: 41.78px;
}

.bag_talkwindow_commodity {
    width: 85%;
    margin: 2% auto;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
}

.bag_talkwindow_commodity > div {
    width: 26%;
    background-color: #dee8e7;
    margin: auto;
    margin-top: 1.5%;
    margin-bottom: 3%;
    padding: 1.5%;
    border-radius: 10px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

.bag_talkwindow_commodity > div > img {
    width: 60%;
    margin-bottom: 10%;
}

.bag_talkwindow_commodity_introduce_1 {
    color: #000;
    font-size: 14px;
}

.bag_talkwindow_commodity_button {
    width: 65%;
    display: flex;
    margin: 15px auto;
    padding: 10px;
    justify-content: space-around;
    border-radius: 10px;
    background-color: #579194;
    cursor: pointer;
}

.bag_talkwindow_commodity_button > p {
    font-size: 14px;
}

.bag_talkwindow_commodity_introduce_2 {
    color: #000;
    font-size: 12px;
}

/* ======================================== 彈出折價券 ======================================== */
.discount_coupon_talkwindow {
    position: absolute;
    width: 100%;
    top: 10%;
    right: 0%;
    bottom: 0;
    left: -16%;
    overflow: hidden;
    margin-right: 20%;
    transform: scale(0);
}

.discount_coupon_talkwindow_block {
    width: 47%;
    height: 65%;
    position: absolute;
    top: 5%;
    right: 0;
    bottom: 50%;
    left: 34%;
    font-size: 30px;
    text-align: center;
    color: white;
    background-color: #ccc;
    background-image: url(../assets/images/game/thankyou.png);
    background-size: 100% 100%;
    border-radius: 10px;
}

.discount_coupon_talkwindow_block_button {
    position: absolute;
    top: 70%;
    left: 15%;
    width: 15%;
    display: flex;
    // margin: 45% 15%;
    padding: 10px;
    justify-content: space-around;
    border-radius: 10px;
    background-color: #579194;
    cursor: pointer;
}

.discount_coupon_talkwindow_block_button > p {
    font-size: 24px;
}

/* ======================================== 關掉彈窗 ======================================== */
.btn-close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 15px;
    cursor: pointer;
}

.shop_talkwindow_active,
.bag_talkwindow_active,
.plus_talkwindow_active,
.discount_coupon_talkwindow_active {
    animation: popup 0.5s;
    transform: scale(1);
}

@keyframes popup {
    0% {
        transform: scale(0);
    }
    25% {
        transform: scale(1);
    }
    40% {
        transform: scale(0.95);
    }
    60% {
        transform: scale(1);
    }
    80% {
        transform: scale(0.95);
    }
    100% {
        transform: scale(1);
    }
}

// ======================================== 切 768 ~ 1200 ======================================== //
@media screen and (max-width: 1200px) {
    .main_block {
        position: relative;
        width: 100%;
        height: 100vh;
        background-color: #d3fdff;
        display: flex;
        overflow: hidden;
    }

    .main_block_LeftTree {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 45%;
        display: flex;
        align-items: flex-end;
    }

    .main_block_LeftTree_1 {
        // position: absolute;
        // left: 10%;
        // bottom: 0;
    }

    .main_block_LeftTree_2 {
        // position: absolute;
        // left: 20%;
        // bottom: 0;
    }

    .main_block_LeftTree_3 {
        // position: absolute;
        // left: 30%;
        // bottom: 0;
    }

    .main_block_LeftTree > img {
        vertical-align: bottom;
    }

    .main_block_MainTree {
        // position: relative;
        // width: 100%;
    }

    .main_block_MainTree_0 {
        width: 85%;
        position: absolute;
        bottom: 0;
        left: 13%;
    }

    .main_block_koala_1 {
        position: absolute;
        bottom: 23%;
        left: 42%;
        width: 15%;
    }

    .main_block_koala_2 {
        position: absolute;
        bottom: 20%;
        left: 39%;
        width: 26%;
    }

    .main_block_koala_3 {
        position: absolute;
        bottom: 17%;
        left: 36%;
        width: 38%;
    }

    .main_block_RightTree {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 35%;
        display: flex;
        align-items: flex-end;
    }

    .main_block_RightTree_1 {
        // position: absolute;
        right: 10%;
        bottom: 0;
    }

    .main_block_RightTree_2 {
        // position: absolute;
        right: 20%;
        bottom: 0;
    }

    .main_block_RightTree_3 {
        // position: absolute;
        right: 30%;
        bottom: 0;
    }

    .main_block_grass {
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    .main_block_grass > img {
        width: 100%;
        // position: absolute;
        bottom: 0;
        left: 0;
        vertical-align: bottom;
    }

    /* ======================================== 遊戲選項列 ======================================== */
    .game_nav {
        position: absolute;
        width: 20%;
        top: 7.5%;
        right: 5%;
        bottom: 0;
        left: 77.5%;
    }

    .game_nav_money {
        display: flex;
        justify-content: center;
        margin-top: 20%;
    }

    .game_nav_money_left {
        width: 140px;
        display: flex;
        // border: 1px solid #96bbbd;
        border-radius: 10px;
    }

    .game_nav_money_left > img {
        margin-top: 3%;
        width: 50px;
        height: 52px;
    }

    .game_nav_money_left > p {
        padding-left: 5%;
        line-height: 62px;
        font-size: 28px;
        margin: auto;
    }

    .game_nav_plus {
        margin-left: 5%;
    }

    .game_nav_plus > img {
        width: 30px;
        height: 30px;
    }

    .game_nav_shop_button {
        width: 100px;
        margin: auto;
        margin-top: 30px;
        text-align: center;
        border: 1px solid #96bbbd;
        border-radius: 10px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    .game_nav_shop_button > img {
        width: 45px;
        height: 42px;
        margin-top: 10px;
    }

    .game_nav_shop_button > p {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .game_nav_bag_button {
        width: 100px;
        margin: auto;
        margin-top: 30px;
        text-align: center;
        border: 1px solid #96bbbd;
        border-radius: 10px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    .game_nav_bag_button > img {
        width: 45px;
        height: 45px;
        margin-top: 10px;
    }

    .game_nav_bag_button > p {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    /* ============================== 經驗條 ============================== */
    .experience_bar {
        background-color: grey;
        height: 12px;
        margin: 10px;
        margin-top: 15%;
    }

    .expValue1 {
        background-color: teal;
        height: 12px;
        max-width: 100%;
    }

    .expValue2 {
        background-color: orange;
        height: 12px;
        max-width: 100%;
    }

    .expValue3 {
        background-color: red;
        height: 12px;
        max-width: 100%;
    }

    .game_nav_expbar {
        cursor: pointer;
    }

    .btn-open {
        cursor: pointer;
    }

    /* ======================================== 彈出賺遊戲幣的方式 ======================================== */
    .plus_talkwindow {
        position: absolute;
        width: 100%;
        top: 10%;
        right: 0%;
        bottom: 0;
        left: -16%;
        overflow: hidden;
        margin-right: 20%;
        transform: scale(0);
    }

    .plus_talkwindow_block {
        width: 70%;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 50%;
        left: 19.5%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .plus_talkwindow_content {
        position: relative;
        width: 70%;
        margin: 3% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
        padding-top: 5%;
        margin-left: 25%;
    }

    /* .plus_talkwindow_image {} */

    .plus_talkwindow_image > img {
        width: 240px;
        height: 300px;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .plus_talkwindow_content > p {
        width: 100%;
        color: #000;
        font-size: 24px;
        margin-left: 10%;
    }

    .plus_talkwindow_content_txt {
        padding-top: 5%;
        padding-bottom: 10%;
        padding-left: 25%;
    }
    .plus_talkwindow_content_txt > p {
        color: #000;
        text-align: left;
        line-height: 2.5;
        font-size: 16px;
    }

    /* ======================================== 彈出虛擬商店 ======================================== */
    .shop_talkwindow {
        position: absolute;
        width: 60%;
        top: 10%;
        right: 30%;
        bottom: 0;
        left: 10%;
        overflow: hidden;
        transform: scale(0);
    }

    .shop_talkwindow_block {
        position: relative;
        width: 100%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .shop_talkwindow_title {
        padding-top: 2%;
        justify-content: center;
        display: flex;
    }

    .shop_talkwindow_title > img {
        width: 6%;
    }

    .shop_talkwindow_title > p {
        margin-left: 3%;
        line-height: 41.78px;
    }

    .shop_talkwindow_commodity {
        width: 100%;
        margin: 2% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
    }

    .shop_talkwindow_commodity > div {
        width: 30%;
        background-color: #dee8e7;
        margin: auto;
        margin-top: 1.5%;
        margin-bottom: 3%;
        padding: 1.5%;
        border-radius: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .shop_talkwindow_commodity > div > img {
        width: 60%;
        margin-bottom: 10%;
    }

    .shop_talkwindow_commodity_introduce_1 {
        color: #000;
        font-size: 14px;
    }

    .shop_talkwindow_commodity_button {
        width: 65%;
        display: flex;
        margin: 15px auto;
        padding: 10px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;
    }

    .shop_talkwindow_commodity_button > div {
        display: flex;
    }

    .shop_talkwindow_commodity_button > div > img {
        width: 20px;
        height: 20px;
        margin-top: 8.5%;
    }

    .shop_talkwindow_commodity_button > div > p {
        margin-right: 30%;
        margin-left: 10%;
        font-size: 20px;
    }

    .shop_talkwindow_commodity_introduce_2 {
        color: #000;
        font-size: 12px;
    }

    /* ======================================== 彈出遊戲背包 ======================================== */
    .bag_talkwindow {
        position: absolute;
        width: 60%;
        top: 10%;
        right: 30%;
        bottom: 0;
        left: 10%;
        overflow: hidden;
        transform: scale(0);
    }

    .bag_talkwindow_block {
        position: relative;
        width: 100%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .bag_talkwindow_title {
        padding-top: 2%;
        justify-content: center;
        display: flex;
    }

    .bag_talkwindow_title > img {
        width: 6%;
    }

    .bag_talkwindow_title > p {
        margin-left: 3%;
        line-height: 41.78px;
    }

    .bag_talkwindow_commodity {
        width: 100%;
        margin: 2% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
    }

    .bag_talkwindow_commodity > div {
        width: 30%;
        background-color: #dee8e7;
        margin: auto;
        margin-top: 1.5%;
        margin-bottom: 3%;
        padding: 1.5%;
        border-radius: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .bag_talkwindow_commodity > div > img {
        width: 60%;
        margin-bottom: 10%;
    }

    .bag_talkwindow_commodity_introduce_1 {
        color: #000;
        font-size: 14px;
    }

    .bag_talkwindow_commodity_button {
        width: 65%;
        display: flex;
        margin: 15px auto;
        padding: 10px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;
    }

    .bag_talkwindow_commodity_button > p {
        font-size: 14px;
    }

    .bag_talkwindow_commodity_introduce_2 {
        color: #000;
        font-size: 12px;
    }

    /* ======================================== 彈出折價券 ======================================== */
    .discount_coupon_talkwindow {
        position: absolute;
        width: 100%;
        top: 10%;
        right: 0%;
        bottom: 0;
        left: -16%;
        overflow: hidden;
        margin-right: 20%;
        transform: scale(0);
    }

    .discount_coupon_talkwindow_block {
        width: 65%;
        height: 65%;
        position: absolute;
        top: 5%;
        right: 0;
        bottom: 50%;
        left: 23.5%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/thankyou.png);
        background-size: 100% 100%;
        border-radius: 10px;
    }

    .discount_coupon_talkwindow_block_button {
        position: absolute;
        top: 70%;
        left: 15%;
        width: 15%;
        display: flex;
        // margin: 45% 15%;
        padding: 10px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;
    }

    .discount_coupon_talkwindow_block_button > p {
        font-size: 24px;
    }

    /* ======================================== 關掉彈窗 ======================================== */
    .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 15px;
        cursor: pointer;
    }

    .shop_talkwindow_active,
    .bag_talkwindow_active,
    .plus_talkwindow_active,
    .discount_coupon_talkwindow_active {
        animation: popup 0.5s;
        transform: scale(1);
    }

    @keyframes popup {
        0% {
            transform: scale(0);
        }
        25% {
            transform: scale(1);
        }
        40% {
            transform: scale(0.95);
        }
        60% {
            transform: scale(1);
        }
        80% {
            transform: scale(0.95);
        }
        100% {
            transform: scale(1);
        }
    }
}

// ======================================== 切 768 以下 ======================================== 切 //
@media screen and (max-width: 768px) {
    .main_block {
        position: relative;
        width: 100%;
        height: 100vh;
        background-color: #d3fdff;
        display: flex;
        overflow: hidden;
    }

    .main_block_LeftTree {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 45%;
        display: flex;
        align-items: flex-end;
    }

    .main_block_LeftTree_1 {
        // position: absolute;
        // left: 10%;
        // bottom: 0;
    }

    .main_block_LeftTree_2 {
        // position: absolute;
        // left: 20%;
        // bottom: 0;
    }

    .main_block_LeftTree_3 {
        // position: absolute;
        // left: 30%;
        // bottom: 0;
    }

    .main_block_LeftTree > img {
        vertical-align: bottom;
    }

    .main_block_MainTree {
        // position: relative;
        // width: 100%;
    }

    .main_block_MainTree_0 {
        width: 90%;
        position: absolute;
        bottom: 0;
        left: 10%;
    }

    .main_block_koala_1 {
        position: absolute;
        bottom: 23%;
        left: 42%;
        width: 15%;
    }

    .main_block_koala_2 {
        position: absolute;
        bottom: 20%;
        left: 39%;
        width: 26%;
    }

    .main_block_koala_3 {
        position: absolute;
        bottom: 17%;
        left: 35%;
        width: 38%;
    }

    .main_block_RightTree {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 35%;
        display: flex;
        align-items: flex-end;
    }

    .main_block_RightTree_1 {
        // position: absolute;
        right: 10%;
        bottom: 0;
    }

    .main_block_RightTree_2 {
        // position: absolute;
        right: 20%;
        bottom: 0;
    }

    .main_block_RightTree_3 {
        // position: absolute;
        right: 30%;
        bottom: 0;
    }

    .main_block_grass {
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    .main_block_grass > img {
        width: 100%;
        // position: absolute;
        bottom: 0;
        left: 0;
        vertical-align: bottom;
    }

    /* ======================================== 遊戲選項列 ======================================== */
    .game_nav {
        position: absolute;
        width: 50%;
        margin: 0 auto;
        top: 7.5%;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .game_nav_money {
        display: flex;
        justify-content: center;
        margin-top: 20%;
    }

    .game_nav_money_left {
        width: 140px;
        display: flex;
        // border: 1px solid #96bbbd;
        border-radius: 10px;
    }

    .game_nav_money_left > img {
        margin-top: 3%;
        width: 50px;
        height: 52px;
    }

    .game_nav_money_left > p {
        padding-left: 5%;
        line-height: 62px;
        font-size: 28px;
        margin: auto;
    }

    .game_nav_plus {
        margin-left: 5%;
    }

    .game_nav_plus > img {
        width: 30px;
        height: 30px;
    }

    .game_nav_button {
        display: flex;
    }

    .game_nav_shop_button {
        width: 100px;
        margin: auto;
        margin-top: 30px;
        text-align: center;
        border: 1px solid #96bbbd;
        border-radius: 10px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    .game_nav_shop_button > img {
        width: 45px;
        height: 42px;
        margin-top: 10px;
    }

    .game_nav_shop_button > p {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .game_nav_bag_button {
        width: 100px;
        margin: auto;
        margin-top: 30px;
        text-align: center;
        border: 1px solid #96bbbd;
        border-radius: 10px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
    }

    .game_nav_bag_button > img {
        width: 45px;
        height: 45px;
        margin-top: 10px;
    }

    .game_nav_bag_button > p {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    /* ============================== 經驗條 ============================== */
    .experience_bar {
        background-color: grey;
        height: 12px;
        margin: 10px;
        margin-top: 15%;
    }

    .expValue1 {
        background-color: teal;
        height: 12px;
        max-width: 100%;
    }

    .expValue2 {
        background-color: orange;
        height: 12px;
        max-width: 100%;
    }

    .expValue3 {
        background-color: red;
        height: 12px;
        max-width: 100%;
    }

    .game_nav_expbar {
        cursor: pointer;
    }

    .btn-open {
        cursor: pointer;
    }

    /* ======================================== 彈出賺遊戲幣的方式 ======================================== */
    .plus_talkwindow {
        position: absolute;
        width: 100%;
        top: 10%;
        right: 0%;
        bottom: 0;
        left: -16%;
        overflow: hidden;
        margin-right: 20%;
        transform: scale(0);
    }

    .plus_talkwindow_block {
        width: 70%;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 50%;
        left: 30%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .plus_talkwindow_content {
        position: relative;
        width: 70%;
        margin: 0% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
        padding-top: 5%;
        margin-left: 25%;
    }

    /* .plus_talkwindow_image {} */

    .plus_talkwindow_image > img {
        width: 240px;
        height: 300px;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .plus_talkwindow_content > p {
        width: 100%;
        color: #000;
        font-size: 24px;
        margin-left: 10%;
    }

    .plus_talkwindow_content_txt {
        padding-top: 0%;
        padding-bottom: 10%;
        padding-left: 25%;
    }
    .plus_talkwindow_content_txt > p {
        color: #000;
        text-align: left;
        line-height: 2.5;
        font-size: 16px;
    }

    /* ======================================== 彈出虛擬商店 ======================================== */
    .shop_talkwindow {
        position: absolute;
        width: 85%;
        top: 10%;
        right: 10%;
        bottom: 0;
        left: 7.5%;
        overflow: hidden;
        transform: scale(0);
    }

    .shop_talkwindow_block {
        position: relative;
        width: 100%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .shop_talkwindow_title {
        padding-top: 2%;
        justify-content: center;
        display: flex;
    }

    .shop_talkwindow_title > img {
        width: 10%;
        height: 100%;
        margin-top: 3%;
    }

    .shop_talkwindow_title > p {
        margin-left: 3%;
        line-height: 41.78px;
    }

    .shop_talkwindow_commodity {
        width: 95%;
        margin: 2% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .shop_talkwindow_commodity > div {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        background-color: #dee8e7;
        margin: auto;
        margin-top: 1.5%;
        margin-bottom: 3%;
        padding: 1.5%;
        border-radius: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .shop_talkwindow_commodity > div > img {
        width: 7%;
        margin-bottom: 0;
    }

    .shop_talkwindow_commodity_introduce_1 {
        color: #000;
        font-size: 14px;
    }

    .shop_talkwindow_commodity_button {
        width: 20%;
        display: flex;
        margin: 0;
        padding: 5px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;

        align-items: center;
    }

    .shop_talkwindow_commodity_button > div {
        display: flex;
        align-items: center;
    }

    .shop_talkwindow_commodity_button > div > img {
        width: 20px;
        height: 20px;
        margin-top: 8.5%;
    }

    .shop_talkwindow_commodity_button > div > p {
        margin: 0;
        font-size: 20px;
    }

    .shop_talkwindow_commodity_introduce_2 {
        color: #000;
        font-size: 12px;
    }

    /* ======================================== 彈出遊戲背包 ======================================== */

    .bag_talkwindow {
        position: absolute;
        width: 85%;
        top: 10%;
        right: 10%;
        bottom: 0;
        left: 7.5%;
        overflow: hidden;
        transform: scale(0);
    }

    .bag_talkwindow_block {
        position: relative;
        width: 100%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/talk_window_background.png);
        border-radius: 10px;
    }

    .bag_talkwindow_title {
        padding-top: 2%;
        justify-content: center;
        display: flex;
    }

    .bag_talkwindow_title > img {
        width: 10%;
        height: 100%;
        margin-top: 3%;
    }

    .bag_talkwindow_title > p {
        margin-left: 3%;
        line-height: 64px;
        font-size: 18px;
        color: #579194;
    }

    .bag_talkwindow_commodity {
        width: 95%;
        margin: 2% auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .bag_talkwindow_commodity > div {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        background-color: #dee8e7;
        margin: auto;
        margin-top: 1.5%;
        margin-bottom: 3%;
        padding: 1.5%;
        border-radius: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .bag_talkwindow_commodity > div > img {
        width: 7%;
        margin-bottom: 0;
    }

    .bag_talkwindow_commodity_introduce_1 {
        color: #000;
        font-size: 14px;
    }

    .bag_talkwindow_commodity_button {
        width: 100%;
        display: flex;
        margin: 0;
        padding: 5px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;

        align-items: center;
    }

    .bag_talkwindow_commodity_button > div {
        display: flex;
        align-items: center;
    }

    .bag_talkwindow_commodity_button > div > img {
        width: 20px;
        height: 20px;
        margin-top: 8.5%;
    }

    .bag_talkwindow_commodity_button > div > p {
        margin: 0;
        font-size: 12px;
    }

    .bag_talkwindow_commodity_introduce_2 {
        color: #000;
        font-size: 12px;
    }

    /* ======================================== 彈出折價券 ======================================== */
    .discount_coupon_talkwindow {
        position: absolute;
        width: 100%;
        top: 10%;
        right: 0%;
        bottom: 0;
        left: -5%;
        overflow: hidden;
        margin-right: 20%;
        transform: scale(0);
    }

    .discount_coupon_talkwindow_block {
        width: 100%;
        height: 65%;
        position: absolute;
        top: 5%;
        right: 0;
        bottom: 50%;
        left: 10%;
        font-size: 30px;
        text-align: center;
        color: white;
        background-color: #ccc;
        background-image: url(../assets/images/game/thankyou.png);
        background-size: 100% 100%;
        border-radius: 10px;
    }

    .discount_coupon_talkwindow_block_button {
        position: absolute;
        top: 70%;
        left: 15%;
        width: 15%;
        display: flex;
        // margin: 45% 15%;
        padding: 10px;
        justify-content: space-around;
        border-radius: 10px;
        background-color: #579194;
        cursor: pointer;
    }

    .discount_coupon_talkwindow_block_button > p {
        font-size: 24px;
    }

    /* ======================================== 關掉彈窗 ======================================== */
    .btn-close {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 15px;
        cursor: pointer;
    }

    .shop_talkwindow_active,
    .bag_talkwindow_active,
    .plus_talkwindow_active,
    .discount_coupon_talkwindow_active {
        animation: popup 0.5s;
        transform: scale(1);
    }

    @keyframes popup {
        0% {
            transform: scale(0);
        }
        25% {
            transform: scale(1);
        }
        40% {
            transform: scale(0.95);
        }
        60% {
            transform: scale(1);
        }
        80% {
            transform: scale(0.95);
        }
        100% {
            transform: scale(1);
        }
    }
}
</style>
