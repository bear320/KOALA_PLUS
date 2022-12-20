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
                    <input
                        type="search"
                        @input="search_func"
                        name="search_mem_name"
                        id="search_mem_name"
                        placeholder="輸入姓名搜尋"
                        ref="search_mem_name"
                    />
                </div>
                <select v-model="selectName" @change="search_func">
                    <option value="" disabled selected>排列方式</option>
                    <option v-for="list in lists" :value="list.val">
                        {{ list.item }}
                    </option>
                </select>
            </div>
        </div>

        <section>
            <div class="bstitle">
                <h3 class="mem_id">會員編號</h3>
                <h3 class="mem_name">姓名</h3>
                <h3 class="mem_mob">手機</h3>
                <h3 class="mem_validation">email驗證</h3>
                <h3 class="mem_account">Email / 帳號</h3>

                <h3 class="black_switch">黑名單</h3>
            </div>

            <div class="content" v-for="item in memindexs" :key="item.mem_id">
                <p class="mem_id">{{ item.mem_id }}</p>
                <p class="mem_name">
                    {{ item.mem_name }}
                </p>
                <p class="mem_mob">{{ item.mem_mob }}</p>
                <p class="mem_validation">
                    {{ item.mem_validation === 0 ? "未認證" : "已認證" }}
                </p>
                <p class="mem_account">{{ item.mem_account }}</p>
                <p class="black_switch">
                    <Switch
                        size="large"
                        true-color="#337a7d"
                        :true-value="1"
                        :false-value="0"
                        :before-change="handleBeforeChange"
                        v-model="item.mem_state"
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
            memindexs: [],
            selectName: "",
            lists: [
                { val: "1", item: "會員編號（正序）" },
                { val: "2", item: "會員編號（反序）" },
                { val: "3", item: "email（正序）" },
                { val: "4", item: "email（反序）" },
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
                        // console.log(this.$Modal);
                    },
                });
            });
        },
        search_func() {
            const postMemSearch = {
                search_mem_name: this.$refs.search_mem_name.value,
                search_orderby: this.selectName,
            };
            console.log(postMemSearch);
            fetch(
                "http://localhost/cgd103_g1/public/api/getMember.php?type=admin",
                {
                    method: "POST",
                    credentials: "include",
                    body: new URLSearchParams(postMemSearch),
                }
            )
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.memindexs = json;
                });
        },
    },
    components: {
        Header,
    },
    created() {
        fetch(
            "http://localhost/cgd103_g1/public/api/getMember.php?type=admin",
            {
                credentials: "include",
            }
        )
            .then((res) => res.json())
            .then((json) => {
                console.log(json);
                this.memindexs = json;
            });
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

    section {
        text-align: center;
        margin: 10px 0;
        padding-bottom: 10px;
        align-self: center;
        h3 {
            margin-bottom: 0;
            width: calc(100% / 6);
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
            p {
                width: calc(100% / 6);
            }
        }
    }
}
</style>
