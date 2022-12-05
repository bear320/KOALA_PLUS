<template>
    <Header />
    <article class="nav-space wrapper">
        <h1>會員管理</h1>
        <div class="todo">
            <a class="blacklist" href="/bs-article-edit" target="_blank"
                ><img src="@/assets/images/icon/black.svg" alt="" />

                <div>查看黑名單</div>
            </a>
        </div>
        <section>
            <h2>會員總覽</h2>
            <div class="bstitle">
                <h3 class="mem_id">會員編號</h3>
                <h3 class="mem_last_name">姓氏</h3>
                <h3 class="mem_first_name">名字</h3>
                <h3 class="mem_mob">手機</h3>
                <h3 class="mem_validation">email驗證</h3>
                <h3 class="mem_account">Email / 帳號</h3>

                <h3 class="black_switch">黑名單</h3>
            </div>
            <div class="content">
                <p class="mem_id">P00001</p>
                <p class="mem_last_name">姓氏</p>
                <p class="mem_first_name">名字</p>
                <p class="mem_mob">0988777688</p>
                <p class="mem_validation">已驗證</p>
                <p class="mem_account">12312321@gmail.com</p>

                <p class="black_switch">
                    <Switch size="large" true-color="#337a7d">
                        <template #open>
                            <span>ON</span>
                        </template>
                        <template #close>
                            <span>OFF</span>
                        </template>
                    </Switch>
                </p>
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
                <div class="black_switch">
                    <Switch
                        size="large"
                        true-color="#13ce66"
                        v-model="item.black_switch"
                    >
                        <template #open>
                            <span>ON</span>
                        </template>
                        <template #close>
                            <span>OFF</span>
                        </template>
                    </Switch>
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
            memindexs: [
                {
                    mem_id: "P00001",
                    mem_last_name: "zeng",
                    mem_first_name: "#charmy",
                    mem_mob: "0988777688",
                    mem_validation: true,
                    mem_account: "12312321@gmail.com",
                    black_switch: false,
                },
                {
                    mem_id: "P00002",
                    mem_last_name: "zeng",
                    mem_first_name: "#charmy",
                    mem_mob: "0988777688",
                    mem_validation: true,
                    mem_account: "123@gmail.com",
                    black_switch: true,
                },
            ],
        };
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
            width: 10%;
        }
        .mem_last_name,
        .mem_first_name {
            width: 10%;
        }
        .mem_mob {
            width: 20%;
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
