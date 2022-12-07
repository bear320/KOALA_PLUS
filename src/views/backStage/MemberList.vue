<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <div class="title-n-action">
            <div class="title">
                <h1>會員管理</h1>
                <img
                    src="@/assets/images/backstageindex/memberIcon.png"
                    alt=""
                />
            </div>
            <div class="action">
                <router-link to="bs-member-blacklist" target="_blank">
                    <img src="@/assets/images/icon/black.svg" alt="" />
                </router-link>
                <div class="search">
                    <input type="search" name="" id="" placeholder="搜尋" />
                </div>
                <select name="" id="">
                    <option value="" selected>排列方式</option>
                    <option value="">會員編號（正序）</option>
                    <option value="">會員編號（反序）</option>
                    <option value="">email（反序）</option>
                    <option value="">email（反序）</option>
                </select>
            </div>
        </div>

        <section>
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
                    {{ item.mem_first_name }}
                </p>
                <p class="mem_mob">{{ item.mem_mob }}</p>
                <p class="mem_validation">{{ item.mem_validation }}</p>
                <p class="mem_account">{{ item.mem_account }}</p>
                <p class="black_switch">
                    <Switch
                        size="large"
                        true-color="#337a7d"
                        :before-change="handleBeforeChange"
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
                    mem_first_name: "charmy111",
                    mem_mob: "0988777688",
                    mem_validation: "已認證",
                    mem_account: "12312321@gmail.com",
                    black_switch: false,
                },
                {
                    mem_id: "P00002",
                    mem_last_name: "zeng",
                    mem_first_name: "charmy222",
                    mem_mob: "0988777688",
                    mem_validation: "已認證",
                    mem_account: "123222@gmail.com",
                    black_switch: true,
                },
                {
                    mem_id: "P00003",
                    mem_last_name: "zeng",
                    mem_first_name: "charmy333",
                    mem_mob: "0988777688",
                    mem_validation: "未認證",
                    mem_account: "123333@gmail.com",
                    black_switch: false,
                },
                {
                    mem_id: "P00004",
                    mem_last_name: "zeng",
                    mem_first_name: "charmy444",
                    mem_mob: "0988777688",
                    mem_validation: "未認證",
                    mem_account: "123444@gmail.com",
                    black_switch: true,
                },
            ],
        };
    },
    methods: {
        handleBeforeChange() {
            return new Promise((resolve) => {
                this.$Modal.confirm({
                    title: "黑名單確認",
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
    .title-n-action {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        .title {
            display: flex;
            column-gap: 20px;
            h1 {
                display: block;
                width: fit-content;
            }
            img {
                height: 67.5px;
            }
        }
        .action {
            display: flex;
            align-items: center;
            column-gap: 15px;
            img {
                vertical-align: top;
            }
        }
    }
    // h1 {
    //     display: inline-block;
    //     width: 25%;
    //     background-image: url(@/assets/images/backstageindex/memberIcon.png);
    //     @include bgSetting(contain, right);
    // }
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

    section {
        text-align: center;
        margin: 10px 0;
        padding-bottom: 10px;
        // align-items: center;
        align-self: center;
        h3 {
            margin-bottom: 0;
        }

        .bstitle,
        .content {
            height: 56px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            line-height: 1.5;
            width: 100%;
            margin: 10px 0;
            padding: 10px 0;
            border-bottom: solid 1px rgb(190, 214, 213);
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
