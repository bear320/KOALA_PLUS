<template>
    <Header />
    <article class="bs-nav-spcae wrapper">
        <h1>會員管理</h1>

        <section>
            <h2>黑名單</h2>
            <div class="bstitle">
                <h3 class="mem_id">會員編號</h3>
                <h3 class="mem_last_name">姓氏</h3>
                <h3 class="mem_first_name">名字</h3>
                <h3 class="mem_mob">手機</h3>
                <h3 class="mem_validation">email驗證</h3>
                <h3 class="mem_account">Email / 帳號</h3>

                <h3 class="black_switch">黑名單</h3>
            </div>

            <div class="content" v-for="item in memindexs" :key="item.mem_id">
                <p class="mem_id">{{ item.mem_id }}</p>
                <p class="mem_last_name">
                    {{ item.mem_last_name }}
                </p>
                <p class="mem_first_name">
                    {{ item.mem_last_name }}
                </p>
                <p class="mem_mob">{{ item.mem_mob }}</p>
                <p class="mem_validation">{{ item.mem_validation }}</p>
                <p class="mem_account">{{ item.mem_account }}</p>
                <p class="black_switch">
                    <Switch
                        size="large"
                        true-color="#337a7d"
                        v-model="item.black_switch"
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
                    mem_last_name: "zeng",
                    mem_first_name: "#charmy111",
                    mem_mob: "0988777688",
                    mem_validation: "已認證",
                    mem_account: "12312321@gmail.com",
                    black_switch: false,
                },
                {
                    mem_id: "P00002",
                    mem_last_name: "zeng",
                    mem_first_name: "#charmy222",
                    mem_mob: "0988777688",
                    mem_validation: "已認證",
                    mem_account: "123222@gmail.com",
                    black_switch: true,
                },
                {
                    mem_id: "P00003",
                    mem_last_name: "zeng",
                    mem_first_name: "#charmy333",
                    mem_mob: "0988777688",
                    mem_validation: "未認證",
                    mem_account: "123333@gmail.com",
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
    .todo {
        float: right;
        display: flex;
        a {
            text-align: center;
            img {
                margin: auto;
            }
        }
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
        p {
            padding-left: 10px;
        }
        .bstitle,
        .content {
            display: flex;
            justify-content: space-around;
            line-height: 1.5;
            margin: 10px auto;
        }
        .mem_id {
            width: 15%;
        }
        .mem_last_name,
        .mem_first_name {
            width: 10%;
        }
        .mem_mob {
            width: 15%;
        }
        .mem_validation {
            width: 15%;
        }
        .mem_account {
            width: 25%;
        }
        .black_switch {
            width: 10%;
        }
    }
}
</style>
