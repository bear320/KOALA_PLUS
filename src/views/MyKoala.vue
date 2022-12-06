<template>
    <Header></Header>
    <section class="main_block nav-space wrapper">
        <!-- ==================== 遊戲畫面 ==================== -->
        <!-- ========== 遊戲背景 ========== -->
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
                    <div v-if="(game_exp <= 500)" class="main_block_koala_1">
                    <img src="../assets/images/game/koala_small.png" alt="" />
                </div>
                <div v-else-if="(game_exp <= 1000)" class="main_block_koala_2">
                    <img src="../assets/images/game/koala_middle.png" alt="" />
                </div>
                <div v-else class="main_block_koala_3">
                    <img src="../assets/images/game/koala_large.png" alt="" />
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
        <!-- ========== 遊戲選項列 ========== -->
        <nav class="game_nav">
            <div class="game_nav_money">
                <div class="game_nav_money_left">
                    <img src="../assets/images/game/coin.png" alt="" />
                    <p>{{game_money}}</p>
                </div>
                <div class="game_nav_plus btn-open" @click="plus_talkwindow"><img src="../assets/images/game/pluscircle.png" alt="" /></div>
            </div>
            <div class="game_nav_button">
                <div class="game_nav_shop_button btn-open" @click="shop_talkwindow">
                <img src="../assets/images/game/game_shop.png" alt="" />
                <p>商店</p>
            </div>
            <div class="game_nav_bag_button btn-open" @click="bag_talkwindow">
                <img src="../assets/images/game/bag.png" alt="" />
                <p>倉庫</p>
            </div>
            </div>

            <div v-if="(expWidth <= 100)" class="game_nav_expbar">
                <div class=experience_bar> 
                    <div :style="{'width':expWidth + '%'}" :class={expValue:true}></div>
                </div>
            </div>
            <div v-else class="game_nav_expbar">
                <div class=experience_bar > 
                    <div :style="{'width':100 + '%'}" :class={expValue:true}></div>
                </div>
            </div>
            <div><p>已達到經驗值：{{game_exp}}</p></div>
            <div>
                <div v-if="(500 - game_exp >= 0)"><p>距離下一段經驗值：{{(500 - game_exp)}}</p></div>
                <div v-else-if="(1000 - game_exp >= 0)"><p>距離下一段經驗值：{{(1000 - game_exp)}}</p></div>
                <div v-else-if="(2000 - game_exp >= 0)"><p>距離下一段經驗值：{{(2000 - game_exp)}}</p></div>
                <div v-else-if="(3000 - game_exp >= 0)"><p>距離下一段經驗值：{{(3000 - game_exp)}}</p></div>
            </div>
        </nav>
        <!-- ==================== 談窗畫面 ==================== -->
        <!-- ========== 賺遊戲幣的方式 ========== -->
        <div id="plus_talkwindow" class="plus_talkwindow">
            <div class="plus_talkwindow_block">
                <div class="plus_talkwindow_image">
                    <img src="../assets/images/game/plus_talkwindow_koala.png" alt=""/>
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
        <!-- ========== 虛擬商店 ========== -->
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
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_1}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 20)" @click="addnum_1">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_1_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_1_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_1_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_2}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 50)" @click="addnum_2">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_2_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_2_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_2_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_3}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 125)" @click="addnum_3">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_3_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_3_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_3_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_4}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 225)" @click="addnum_4">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_4_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_4_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_4_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_5}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 350)" @click="addnum_5">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_5_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_5_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_5_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">{{item_6}}</p>
                        <div class="shop_talkwindow_commodity_button">
                            <div v-if="(game_money >= 500)" @click="addnum_6">
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_6_sellingprice}}</p>
                            </div>
                            <div v-else>
                                <img src="../assets/images/game/coin.png" alt="" />
                                <p>{{item_6_sellingprice}}</p>
                            </div>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">可獲得 {{item_6_exp}} 經驗值</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== 遊戲背包 ========== -->
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
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_1}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_1 >= 1)" @click="minnum_1"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_1_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_2}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_2 >= 1)" @click="minnum_2"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_2_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_3}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_3 >= 1)" @click="minnum_3"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_3_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_4}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_4 >= 1)" @click="minnum_4"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_4_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_5}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_5 >= 1)" @click="minnum_5"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_5_exp}} 經驗值</p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">剩餘數量：{{remaining_amount_6}}</p>
                        <div class="bag_talkwindow_commodity_button">
                            <div v-if="(remaining_amount_6 >= 1)" @click="minnum_6"><p>餵食</p></div>
                            <div v-else><p>餵食</p></div>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">可獲得 {{item_6_exp}} 經驗值</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
export default {
    components: {
        Header,
    },
    el: ".game_nav_expbar",
    data() {
        return {
            game_money: 10000,
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
            remaining_amount_1: 0,
            remaining_amount_2: 0,
            remaining_amount_3: 0,
            remaining_amount_4: 0,
            remaining_amount_5: 0,
            remaining_amount_6: 0,
            increment_1:10/20,
            increment_2:20/20,
            increment_3:125/20,
            increment_4:225/20,
            increment_5:350/20,
            increment_6:500/20,
            expWidth:0,
            game_exp:0,
        };
    },
    methods: {
        // ============================== X 關掉彈窗 ============================== //
            removeActive: function() {
            document.getElementById("shop_talkwindow").classList.remove("shop_talkwindow_active");
            document.getElementById("bag_talkwindow").classList.remove("bag_talkwindow_active");
            document.getElementById("plus_talkwindow").classList.remove("plus_talkwindow_active");
        },

        // ============================== 賺遊戲幣的方式 ============================== //
        plus_talkwindow: function() {
            document.getElementById("shop_talkwindow").classList.remove("shop_talkwindow_active");
            document.getElementById("bag_talkwindow").classList.remove("bag_talkwindow_active");
            document.getElementById("plus_talkwindow").classList.remove("plus_talkwindow_active");

            document.getElementById("plus_talkwindow").classList.add("plus_talkwindow_active");
        },

        // ============================== 虛擬商店 ============================== //
        shop_talkwindow: function() {
            document.getElementById("shop_talkwindow").classList.remove("shop_talkwindow_active");
            document.getElementById("bag_talkwindow").classList.remove("bag_talkwindow_active");
            document.getElementById("plus_talkwindow").classList.remove("plus_talkwindow_active");

            document.getElementById("shop_talkwindow").classList.add("shop_talkwindow_active");
        },

        // ============================== 遊戲背包 ============================== //
        bag_talkwindow: function() {
            document.getElementById("shop_talkwindow").classList.remove("shop_talkwindow_active");
            document.getElementById("bag_talkwindow").classList.remove("bag_talkwindow_active");
            document.getElementById("plus_talkwindow").classList.remove("plus_talkwindow_active");

            document.getElementById("bag_talkwindow").classList.add("bag_talkwindow_active");
        },



        // ============================== 經濟實惠的尤加利葉 ============================== //
        addnum_1: function() {
            this.remaining_amount_1 ++;
            this.game_money -= 20;
        },
        minnum_1: function() {
            this.remaining_amount_1 --;
            this.expWidth= this.expWidth + this.increment_1;   // 增加經驗值
            this.game_exp += 10;
        },
        // minnum_1() {
        //     this.remaining_amount_1 --;
        // },   這個寫法也可以

        // ============================== 物美價廉的尤加利葉 ============================== //
        addnum_2: function() {
            this.remaining_amount_2 ++;
            this.game_money -= 50;
        },
        minnum_2: function() {
            this.remaining_amount_2 --;
            this.expWidth= this.expWidth + this.increment_2;   // 增加經驗值
            this.game_exp += 20;
        },

        // ============================== 熱銷第一的尤加利葉 ============================== //
        addnum_3: function() {
            this.remaining_amount_3 ++;
            this.game_money -= 125;
        },
        minnum_3: function() {
            this.remaining_amount_3 --;
            this.expWidth= this.expWidth + this.increment_3;   // 增加經驗值
            this.game_exp += 50;
        },

        // ============================== 經典不敗的尤加利葉 ============================== //
        addnum_4: function() {
            this.remaining_amount_4 ++;
            this.game_money -= 225;
        },
        minnum_4: function() {
            this.remaining_amount_4 --;
            this.expWidth= this.expWidth + this.increment_4;   // 增加經驗值
            this.game_exp += 90;
        },

        // ============================== 通過認證的尤加利葉 ============================== //
        addnum_5: function() {
            this.remaining_amount_5 ++;
            this.game_money -= 350;
        },
        minnum_5: function() {
            this.remaining_amount_5 --;
            this.expWidth= this.expWidth + this.increment_5;   // 增加經驗值
            this.game_exp += 140;
        },

        // ============================== 得過冠軍的尤加利葉 ============================== //
        addnum_6: function() {
            this.remaining_amount_6 ++;
            this.game_money -= 500;
        },
        minnum_6: function() {
            this.remaining_amount_6 --;
            this.expWidth= this.expWidth + this.increment_6;   // 增加經驗值
            this.game_exp += 210;
        },
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

/* ============================== 遊戲主區塊 ============================== */
/* ==================== 遊戲畫面 ==================== */
/* ========== 遊戲背景 ========== */
.main_block {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: #d3fdff;
    display: flex;
}

.main_block_LeftTree {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40%;
    display: flex;
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
    width: 75%;
    position: absolute;
    bottom: 0;
    left: 15%;
}

.main_block_koala_1 {
    position: absolute;
    bottom: 21%;
    left: 39%;
    width: 30%;
}

.main_block_koala_2 {
    position: absolute;
    bottom: 20%;
    left: 35%;
    width: 35%;
}

.main_block_koala_3 {
    position: absolute;
    bottom: 19%;
    left: 33%;
    width: 40%;
}

.main_block_RightTree {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 30%;
    display: flex;
    
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
}

/* ========== 遊戲選項列 ========== */
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

/* ========== expbar ========== */
.experience_bar {
  background-color:grey;
  height:12px;
  margin:10px;
  margin-top: 15%;
}

.expValue {
  background-color:teal;
  height:12px;
  max-width:100%;  
}

.game_nav_expbar {
    cursor: pointer;
}

.btn-open {
    cursor: pointer;
}

/* ==================== 談窗畫面 ==================== */
/* ========== 賺遊戲幣的方式 ========== */
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
    margin: 2% auto;
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

/* ========== 虛擬商店 ========== */
.shop_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 遊戲背包 ========== */
.bag_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 關掉彈窗 ========== */
.btn-close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 15px;
    cursor: pointer;
}

.shop_talkwindow_active,
.bag_talkwindow_active,
.plus_talkwindow_active {
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










// ==================== 768 ~ 1200 ==================== //
@media screen and (max-width: 1200px) {

.main_block {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: #d3fdff;
    display: flex;
}

.main_block_LeftTree {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 45%;
    display: flex;
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
    width: 85%;
    position: absolute;
    bottom: 0;
    left: 13%;
}

.main_block_koala_1 {
    position: absolute;
    bottom: 21%;
    left: 39%;
    width: 30%;
}

.main_block_koala_2 {
    position: absolute;
    bottom: 20%;
    left: 35%;
    width: 35%;
}

.main_block_koala_3 {
    position: absolute;
    bottom: 19%;
    left: 33%;
    width: 40%;
}

.main_block_RightTree {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 35%;
    display: flex;
    
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
}

/* ========== 遊戲選項列 ========== */
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

/* ========== expbar ========== */
.experience_bar {
  background-color:grey;
  height:12px;
  margin:10px;
  margin-top: 15%;
}

.expValue {
  background-color:teal;
  height:12px;
  max-width:100%;  
}

.game_nav_expbar {
    cursor: pointer;
}

.btn-open {
    cursor: pointer;
}

/* ==================== 談窗畫面 ==================== */
/* ========== 賺遊戲幣的方式 ========== */
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
    margin: 10% auto;
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

/* ========== 虛擬商店 ========== */
.shop_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 遊戲背包 ========== */
.bag_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 關掉彈窗 ========== */
.btn-close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 15px;
    cursor: pointer;
}

.shop_talkwindow_active,
.bag_talkwindow_active,
.plus_talkwindow_active {
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










// ==================== 768 以下 ==================== //
@media screen and (max-width: 768px) {

    .main_block {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: #d3fdff;
    display: flex;
}

.main_block_LeftTree {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 45%;
    display: flex;
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
    width: 85%;
    position: absolute;
    bottom: 0;
    left: 13%;
}

.main_block_koala_1 {
    position: absolute;
    bottom: 21%;
    left: 39%;
    width: 30%;
}

.main_block_koala_2 {
    position: absolute;
    bottom: 20%;
    left: 35%;
    width: 35%;
}

.main_block_koala_3 {
    position: absolute;
    bottom: 19%;
    left: 33%;
    width: 40%;
}

.main_block_RightTree {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 35%;
    display: flex;
    
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
}

/* ========== 遊戲選項列 ========== */
.game_nav {
    position: absolute;
    width: 50%;
    margin: 0 auto;
    top: 2%;
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

/* ========== expbar ========== */
.experience_bar {
  background-color:grey;
  height:12px;
  margin:10px;
  margin-top: 15%;
}

.expValue {
  background-color:teal;
  height:12px;
  max-width:100%;  
}

.game_nav_expbar {
    cursor: pointer;
}

.btn-open {
    cursor: pointer;
}

/* ==================== 談窗畫面 ==================== */
/* ========== 賺遊戲幣的方式 ========== */
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
    margin: 10% auto;
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

/* ========== 虛擬商店 ========== */
.shop_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 遊戲背包 ========== */
.bag_talkwindow {
    position: absolute;
    width: 70%;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 5%;
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

/* ========== 關掉彈窗 ========== */
.btn-close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 15px;
    cursor: pointer;
}

.shop_talkwindow_active,
.bag_talkwindow_active,
.plus_talkwindow_active {
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