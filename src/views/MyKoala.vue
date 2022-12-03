<template>
    <Header></Header>

    <!-- ============================== 遊戲主區塊 ============================== -->
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
                <div class="main_block_koala">
                    <img src="../assets/images/game/koala.png" alt="" />
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
                    <p
                        class="game_money_1 game_money_2 game_money_3 game_money_4 game_money_5 game_money_6"
                    >
                        1,000
                    </p>
                </div>
                <div class="game_nav_plus btn-open" onclick="plus_talkwindow()">
                    <img src="../assets/images/game/pluscircle.png" alt="" />
                </div>
            </div>
            <div
                class="game_nav_shop_button btn-open"
                onclick="shop_talkwindow()"
            >
                <img src="../assets/images/game/game_shop.png" alt="" />
                <p>商店</p>
            </div>
            <div
                class="game_nav_bag_button btn-open"
                onclick="bag_talkwindow()"
            >
                <img src="../assets/images/game/bag.png" alt="" />
                <p>倉庫</p>
            </div>
        </nav>
        <!-- ==================== 談窗畫面 ==================== -->
        <!-- ========== 賺遊戲幣的方式 ========== -->
        <div id="plus_talkwindow" class="plus_talkwindow">
            <div class="plus_talkwindow_block">
                <div class="plus_talkwindow_image">
                    <img
                        src="../assets/images/game/plus_talkwindow_koala.png"
                        alt=""
                    />
                </div>
                <div class="btn-close" onclick="removeActive()">X</div>
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
                <div class="btn-close" onclick="removeActive()">X</div>
                <div class="shop_talkwindow_commodity">
                    <div>
                        <img src="../assets/images/game/item_1.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_1()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_2()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_3()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_4()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_5()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p class="shop_talkwindow_commodity_introduce_1">
                            經濟實惠的尤加利葉
                        </p>
                        <div
                            class="shop_talkwindow_commodity_button"
                            onclick="addnum_6()"
                        >
                            <img src="../assets/images/game/coin.png" alt="" />
                            <p>20</p>
                        </div>
                        <p class="shop_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
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
                <div class="btn-close" onclick="removeActive()">X</div>
                <div class="bag_talkwindow_commodity">
                    <div>
                        <img src="../assets/images/game/item_1.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：<span id="addtext">0</span>
                        </p>
                        <div
                            class="bag_talkwindow_commodity_button"
                            onclick="minnum_1()"
                        >
                            <p>餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_2.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：
                        </p>
                        <div
                            class="bag_talkwindow_commodity_button"
                            onclick="minnum_2()"
                        >
                            <p>餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_3.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：
                        </p>
                        <div
                            class="bag_talkwindow_commodity_button"
                            onclick="minnum_3()"
                        >
                            <p>餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_4.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：
                        </p>
                        <div class="bag_talkwindow_commodity_button">
                            <p onclick="minnum_4()">餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_5.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：
                        </p>
                        <div class="bag_talkwindow_commodity_button">
                            <p onclick="minnum_5()">餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                    <div>
                        <img src="../assets/images/game/item_6.png" alt="" />
                        <p class="bag_talkwindow_commodity_introduce_1">
                            剩餘數量：
                        </p>
                        <div class="bag_talkwindow_commodity_button">
                            <p onclick="minnum_6()">餵食</p>
                        </div>
                        <p class="bag_talkwindow_commodity_introduce_2">
                            可獲得 10 經驗值
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
import game from "@/game.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            numinnerHTML: 0,
            game_money_1: 1000,
            game_money_2: 1000,
            game_money_3: 1000,
            game_money_4: 1000,
            game_money_5: 1000,
            game_money_6: 1000,
        };
    },
    methods: {
        // ============================== 賺遊戲幣的方式 ============================== //
        plus_talkwindow() {
            removeActive();
            document
                .getElementById("plus_talkwindow")
                .classList.add("plus_talkwindow_active");
        },

        // ============================== 虛擬商店 ============================== //
        shop_talkwindow() {
            removeActive();
            document
                .getElementById("shop_talkwindow")
                .classList.add("shop_talkwindow_active");
        },

        // ============================== 遊戲背包 ============================== //
        bag_talkwindow() {
            removeActive();
            document
                .getElementById("bag_talkwindow")
                .classList.add("bag_talkwindow_active");
        },

        // ============================== 關掉彈窗 ============================== //
        removeActive() {
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

        addnum_1() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_1");
            game_money_1 -= 20;
            game_money.innerHTML = game_money_1;
        },
        minnum_1() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
        },

        addnum_2() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_2");
            game_money_2 -= 50;
            game_money.innerHTML = game_money_2;
        },
        minnum_2() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
        },

        addnum_3() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_3");
            game_money_3 -= 20;
            game_money.innerHTML = game_money_3;
        },

        minnum_3() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
        },

        addnum_4() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_4");
            game_money_4 -= 20;
            game_money.innerHTML = game_money_4;
        },
        minnum_4() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
        },

        addnum_5() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_5");
            game_money_5 -= 20;
            game_money.innerHTML = game_money_5;
        },
        minnum_5() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
        },

        addnum_6() {
            let num = document.getElementById("addtext");
            numinnerHTML++;
            num.innerHTML = numinnerHTML;
            let game_money = document.querySelector(".game_money_6");
            game_money_6 -= 200;
            game_money.innerHTML = game_money_6;
        },
        minnum_6() {
            let num = document.getElementById("addtext");
            if (num.innerHTML == 0) {
                return;
            } else {
                numinnerHTML--;
                num.innerHTML = numinnerHTML;
            }
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
    width: 100%;
    height: 98vh;
    background-color: #d3fdff;
    display: flex;
}

.main_block_LeftTree {
    position: relative;
    width: 40%;
}

.main_block_LeftTree_1 {
    position: absolute;
    left: 10%;
    bottom: 0;
}

.main_block_LeftTree_2 {
    position: absolute;
    left: 20%;
    bottom: 0;
}

.main_block_LeftTree_3 {
    position: absolute;
    left: 30%;
    bottom: 0;
}

.main_block_MainTree {
    position: relative;
    width: 100%;
}

.main_block_MainTree_0 {
    width: 100%;
    position: absolute;
    bottom: 0;
}

.main_block_koala {
    position: absolute;
    bottom: 21%;
    left: 39%;
    width: 30%;
}

.main_block_RightTree {
    position: relative;
    width: 40%;
}

.main_block_RightTree_1 {
    position: absolute;
    right: 10%;
    bottom: 0;
}

.main_block_RightTree_2 {
    position: absolute;
    right: 20%;
    bottom: 0;
}

.main_block_RightTree_3 {
    position: absolute;
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
    position: absolute;
    bottom: 0;
}

/* ========== 遊戲選項列 ========== */
.game_nav {
    position: absolute;
    right: 5%;
    top: 10%;
}

.game_nav_money {
    display: flex;
    justify-content: center;
}

.game_nav_money_left {
    width: 160px;
    display: flex;
    border: 1px solid #96bbbd;
    border-radius: 10px;
}

/* .game_nav_money_left > img {} */

.game_nav_money_left > p {
    padding-left: 15%;
    margin-right: 15%;
    line-height: 62px;
    font-size: 28px;
}

/* .game_nav_plus {} */

.game_nav_plus > img {
    width: 30px;
    height: 30px;
}

.game_nav_shop_button {
    width: 120px;
    margin: auto;
    margin-top: 30px;
    text-align: center;
    border: 1px solid #96bbbd;
    border-radius: 10px;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.game_nav_shop_button > img {
    width: 75px;
    height: 70px;
    margin-top: 10px;
}

.game_nav_shop_button > p {
    margin-top: 10px;
    margin-bottom: 10px;
}

.game_nav_bag_button {
    width: 120px;
    margin: auto;
    margin-top: 30px;
    text-align: center;
    border: 1px solid #96bbbd;
    border-radius: 10px;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.game_nav_bag_button > img {
    width: 75px;
    height: 75px;
    margin-top: 10px;
}

.game_nav_bag_button > p {
    margin-top: 10px;
    margin-bottom: 10px;
}

.btn-open {
    cursor: pointer;
}

/* ==================== 談窗畫面 ==================== */
/* ========== 賺遊戲幣的方式 ========== */
.plus_talkwindow {
    position: absolute;
    top: 10%;
    right: 0;
    bottom: 0;
    left: 10%;
    overflow: hidden;
    margin-right: 20%;
    transform: scale(0);
}

.plus_talkwindow_block {
    width: 90%;
    position: absolute;
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
    margin-left: 20%;
}

/* .plus_talkwindow_image {} */

.plus_talkwindow_image > img {
    width: 389.5px;
    height: 500px;
    position: absolute;
    bottom: 0;
    left: 0;
}

.plus_talkwindow_content > p {
    color: #000;
}

.plus_talkwindow_content_txt {
    padding-top: 5%;
    padding-bottom: 10%;
    padding-left: 25%;
}
.plus_talkwindow_content_txt > p {
    color: #000;
    text-align: left;
    line-height: 1.5;
}

/* ========== 虛擬商店 ========== */
.shop_talkwindow {
    position: absolute;
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 20%;
    overflow: hidden;
    transform: scale(0);
}

.shop_talkwindow_block {
    position: absolute;
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
    width: 84%; /* 85以上底圖高度不夠 */
    margin: 2% auto;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
}

.shop_talkwindow_commodity > div {
    width: 25%;
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

.shop_talkwindow_commodity_button > img {
    width: 20px;
    height: 20px;
    margin-left: 30%;
}

.shop_talkwindow_commodity_button > p {
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
    top: 10%;
    right: 30%;
    bottom: 0;
    left: 20%;
    overflow: hidden;
    transform: scale(0);
}

.bag_talkwindow_block {
    position: absolute;
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
    width: 84%; /* 85以上底圖高度不夠 */
    margin: 2% auto;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
}

.bag_talkwindow_commodity > div {
    width: 25%;
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
</style>
