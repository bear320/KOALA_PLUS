<template lang="">
    <div class="container">
        <div class="inner-container">
            <img src="@/assets/images/member/MemUnsubscribe_1.png" alt="" />

            <div class="Unsubscribe_main">
                <h3 class="maintitle">{{ maintitle }}</h3>
                <p class="subtitle">
                    {{ subtitle }}
                </p>
                <div class="buttons">
                    <button
                        class="btn-lowest"
                        id="unsubscribe"
                        @click="GoUnsubscribe"
                        v-show="showbutton"
                    >
                        是的，取消訂單
                    </button>
                    <button
                        class="btn-paramy"
                        id="cancel"
                        @click="goBack"
                        v-show="showbutton"
                    >
                        否，回上一步驟
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
            this.$emit("closeMem");
        },
    },
};
</script>
<style lang="scss" scoped>
.container {
    width: 500px;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    margin: 0;
    position: absolute;
    background: #fefefe;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-direction: column;
    padding-bottom: 30px;
    box-shadow: 5px 10px 40px 0 rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

.inner-container {
    width: 100%;
}

svg {
    max-width: 90%;
    position: relative;
    left: 5%;
    margin: 0 auto;
}

.Unsubscribe_main {
    text-align: center;
    margin-top: 0em;
    max-width: 70%;
    position: relative;
    margin: 0 auto;
}
.buttons {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
    button {
        padding-left: 10px;
        padding-right: 10px;
    }
}

@media (max-width: 699px) {
    .container {
        width: 90%;
    }
    .Unsubscribe_main {
        margin-top: 1em;
        max-width: 90%;
    }
}
@media (max-width: 399px) {
    .container {
        padding: 20px;
    }
    .Unsubscribe_main {
        // margin-top: 0em;
        // max-width: 90%;
        h2 {
            font-size: 24px;
        }
    }
    .buttons {
        flex-direction: column;
        button {
            margin-right: 0;
        }
    }
    svg {
        padding-top: 0;
    }
}
</style>
