<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <div class="title">
            <h1>會員管理</h1>
            <img src="@/assets/images/backstageindex/memberIcon.png" alt="" />
            <h2>黑名單</h2>
        </div>

        <section>
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
                        true-color="#337a7d"
                        :true-value="1"
                        :false-value="0"
                        v-model.number="item.mem_state"
                        :disabled="disabled"
                    >
                        <template #open>
                            <span>封鎖</span>
                        </template>
                        <template #close>
                            <span>正常</span>
                        </template>
                    </Switch>
                </p>
            </div>
        </section>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            disabled: true,
            memindexs: [],
        };
    },
    methods: {
        postmemberBlacklist() {
            const apiURL = new URL(`${BASE_URL}/getMemberBg.php?type=admin`);
            console.log(apiURL);
            fetch(apiURL, { credentials: "include" })
                .then((res) => res.json())
                .then((json) => {
                    // console.log(json);
                    this.memindexs = json.prodRows.filter((item) => {
                        item.mem_state = parseInt(item.mem_state);
                        // if (item.mem_state == 1) return true;
                        if (item.mem_state != 0) return true;
                        // return item.mem_state == "1";
                    });

                    // console.log(this.memindexs);
                });
        },
    },

    created() {
        this.postmemberBlacklist();
    },
};
</script>

<style lang="scss" scoped>
html article {
    text-align: left;
    .title {
        width: 400px;
        display: flex;
        column-gap: 20px;
        flex-wrap: wrap;
        h1 {
            display: block;
        }
        img {
            margin-left: 5px;
            height: 67.5px;
        }

        h2 {
            // text-align: left;

            // @include borderLeft(30px);
            color: #07617d;
            position: relative;
            padding-left: 30px;
            margin: 10px 0;
            transform: translate(-30px, 0);
        }
        h2::before {
            content: "";
            border-left: solid 5px #07617d;
            position: absolute;
            left: 0;
            height: 100%;
        }
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
            border-bottom: solid 1px rgb(190, 214, 213);
            p {
                width: calc(100% / 6);
            }
        }
        .content {
            height: 56px;
            padding: 10px 0;
        }
    }
}
</style>
