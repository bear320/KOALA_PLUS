<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>會員管理</h1>

        <section>
            <h2>黑名單</h2>
            <div class="bstitle">
                <h3 class="mem_id">會員編號</h3>
                <h3 class="mem_name">姓氏</h3>
                <h3 class="mem_mob">手機</h3>
                <h3 class="mem_account">Email / 帳號</h3>
                <h3 class="mem_add">地址</h3>
                <h3 class="black_switch">黑名單</h3>
            </div>

            <div class="content" v-for="item in memindexs" :key="item.mem_id">
                <p class="mem_id">{{ item.mem_id }}</p>
                <p class="mem_name">
                    {{ item.mem_name }}
                </p>
                <p class="mem_mob">{{ item.mem_mob }}</p>
                <p class="mem_account">{{ item.mem_account }}</p>
                <p class="mem_add">{{ item.mem_add }}</p>
                <p class="black_switch">
                    <!-- true-color="#337a7d" -->
                    <Switch
                        size="large"
                        v-model="item.black_switch"
                        loading
                        :model-value="false"
                    >
                        <template #open>
                            <span>ON</span>
                        </template>
                        <template #close>
                            <span>OFF</span>
                        </template>
                    </Switch>
                </p>
            </div>
        </section>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    data() {
        return {
            memindexs: [
                {
                    mem_id: "P00001",
                    mem_name: "曾韋翰",
                    mem_mob: "0988777688",
                    mem_account: "charmy111@gmail.com",
                    mem_add: "桃園市復興路46號8樓",
                    black_switch: false,
                },
                {
                    mem_id: "P00002",
                    mem_name: "韋禮安",
                    mem_mob: "0988777688",
                    mem_account: "charmy222@gmail.com",
                    mem_add: "桃園市復興路46號9樓",
                    black_switch: true,
                },
                {
                    mem_id: "P00003",
                    mem_name: "王以太",
                    mem_mob: "0988777688",
                    mem_account: "charmy333@gmail.com",
                    mem_add: "桃園市復興路46號10樓",
                    black_switch: false,
                },
            ],
        };
    },
    methods: {
        handleBeforeChange() {
            return new Promise((resolve) => {
                this.$Modal.confirm({
                    title: "切換確認",
                    content: "您確定要切換開關狀態嗎？",
                    onOk: () => {
                        resolve();
                    },
                });
            });
        },
    },
    components: {
        Header,
    },
};
</script>

<style lang="scss" scoped>
html article {
    text-align: left;

    h1 {
        display: inline-block;
        width: 25%;
        background-image: url(@/assets/images/backstageindex/memberIcon.png);
        @include bgSetting(contain, right);
    }

    h2 {
        text-align: left;
        color: $green;
        @include borderLeft(30px);
    }
    section {
        text-align: center;
        h3 {
            margin-bottom: 0;
            width: calc(100% / 6);
        }

        .bstitle,
        .content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            line-height: 1.5;
            width: 100%;
            margin: 0 50px;
            padding: 10px 0;
            border-bottom: solid 1px rgb(190, 214, 213);
            p {
                width: calc(100% / 6);
            }
        }
    }
}
</style>
