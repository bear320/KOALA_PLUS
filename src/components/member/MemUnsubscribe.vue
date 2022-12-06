<template lang="">
    <div class="mem_MemUnsubscribe">
        <div class="inner-container">
            <div class="img MemUnsubscribe_1">
                <img src="@/assets/images/member/MemUnsubscribe_1.png" alt="" />
            </div>

            <div class="Unsubscribe_main">
                <h3 class="maintitle">{{ maintitle }}</h3>
                <p class="subtitle">
                    {{ subtitle }}
                </p>
                <div class="buttons">
                    <!-- {{ showbutton }} -->
                    <button
                        class="btn-lowest"
                        id="unsubscribe"
                        @click="GoUnsubscribe"
                        v-show="showbutton"
                    >
                        取消訂單
                    </button>
                    <button
                        class="btn-paramy"
                        id="cancel"
                        @click="goBack"
                        v-show="showbutton"
                    >
                        回上一步
                    </button>
                    <button
                        class="btn-paramy"
                        id="go-back"
                        v-show="!showbutton"
                        @click="goBackMemOrder"
                    >
                        回訂單資訊
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            // 回傳是否取消訂單
            backmassMemUnsubscribe: false,
            maintitle: "您想取消訂單嗎",
            subtitle:
                "如果您取消訂單，您將不會收到此筆訂單商品，也取消資助無尾熊。",
            showbutton: true,
        };
    },
    methods: {
        goBack() {
            this.maintitle = "感謝您購買無尾熊的周邊！";
            this.subtitle = "您所購買的商品，將會全數用於照顧無尾熊";
            this.showbutton = false;
        },
        GoUnsubscribe() {
            this.maintitle = "很難過您取消了訂單！";
            this.subtitle = "您已經取消訂購無尾熊的周邊";
            this.showbutton = false;
        },
        goBackMemOrder() {
            this.$emit("closeMemUnsubscribe");
        },
    },
};
</script>
<style lang="scss" scoped>
.mem_MemUnsubscribe {
    background-color: #d0e8ea;
    width: 280px;
    position: absolute;
    z-index: 10;
    top: 5%;
    left: 50%;
    transform: translate(-50%, 0);
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);

    .inner-container {
        width: 100%;

        .MemUnsubscribe_1 {
            img {
                width: 100%;
                height: 100%;
            }
        }
    }
}
// svg {
//     max-width: 90%;
//     position: relative;
//     left: 5%;
//     margin: 0 auto;
// }

.Unsubscribe_main {
    text-align: center;
    margin-top: 0em;
    max-width: 70%;
    position: relative;
    margin: 0 auto;
    .buttons {
        width: 100%;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        button {
            padding-left: 10px;
            padding-right: 10px;
            @include m() {
                padding: 5px;
                font-size: 15px;
            }
        }
    }
}
</style>
