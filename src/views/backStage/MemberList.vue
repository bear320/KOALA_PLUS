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
                        v-model="searchMemName"
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

            <div
                class="content"
                v-for="(item, index) in memindexs"
                :key="item.mem_id"
            >
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
                        @on-change="blackSwitchChange(index)"
                        v-model.number="item.mem_state"
                    >
                        <template #open>
                            <span>屏蔽</span>
                        </template>
                        <template #close>
                            <span>正常</span>
                        </template>
                    </Switch>
                </p>
            </div>
        </section>
    </article>
    <section class="pagination">
        <ul>
            <a @click="prePage"><li>&lt;</li></a>
            <a
                v-for="i in totalPage"
                :class="{ 'is-active': currentPage == i }"
                :key="i"
                href="#"
                @click="changePage(i)"
                ><li>{{ i }}</li></a
            >
            <a @click="nextPage"><li>></li></a>
        </ul>
    </section>
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
            memindexs: [],
            selectName: "",
            // 後台會員排序明細陣列
            lists: [
                { val: "1", item: "會員編號（正序）" },
                { val: "2", item: "會員編號（反序）" },
                { val: "3", item: "email（正序）" },
                { val: "4", item: "email（反序）" },
            ],
            searchMemName: "",
            totalPage: 0,
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
        };
    },
    methods: {
        // switch滑塊設定
        blackSwitchChange(index) {
            const mem_id = this.memindexs[index].mem_id;
            const black_state = this.memindexs[index].mem_state;

            console.log(this.memindexs[index].mem_state);
            console.log(this.memindexs[index].mem_id);
            const apiURL = new URL(`${BASE_URL}/postMemberChangeBlacklist.php`);
            fetch(apiURL, {
                method: "post",
                body: new URLSearchParams({
                    mem_id,
                    black_state,
                }),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.resDate = json;
                });
        },
        // switch滑塊設定 跳出提醒是否真的要切換?
        handleBeforeChange() {
            return new Promise((resolve) => {
                this.$Modal.confirm({
                    title: "黑名單確認",
                    content: "您確定要切換開關狀態嗎？",
                    onOk: () => {
                        resolve();
                        console.log(this.$Modal);
                    },
                });
            });
        },
        // 後臺會員 搜尋功能
        search_func() {
            this.getMemInfo();
        },
        getMemInfo() {
            const apiURL = new URL(`${BASE_URL}/getMemberBg.php`);
            // const apiURL = new URL(
            //     "http://localhost/cgd103_g1/public/api/getMember.php?"
            // );

            if (!Object.keys(this.$route.query).length) {
                this.$route.query.search_orderby = this.selectName;
                this.$route.query.search_mem_name = this.searchMemName;
                this.$route.query.type = "admin";
                this.$route.query.limit = 10;
                this.$route.query.page = 1;
            }

            this.$route.query.search_orderby = this.selectName;
            this.$route.query.search_mem_name = this.searchMemName;
            this.$route.query.type = "admin";
            this.$route.query.limit = 10;
            this.$route.query.page = this.currentPage;

            const searchParam = new URLSearchParams(this.$route.query);

            apiURL.search = searchParam;

            fetch(apiURL, {
                credentials: "include",
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log("test", json.prodRows);
                    // this.memindexs = json.prodRows;
                    this.memindexs = json.prodRows.map((item) => {
                        return {
                            mem_id: +item.mem_id,
                            mem_name: item.mem_name,
                            mem_account: item.mem_account,
                            mem_psw: item.mem_psw,
                            mem_mob: item.mem_mob,
                            mem_add: item.mem_add,
                            ord_sum: +item.ord_sum,
                            support_sum: +item.support_sum,
                            mem_exp: +item.mem_exp,
                            mem_point: +item.mem_point,
                            mem_food1: +item.mem_food1,
                            mem_food2: +item.mem_food2,
                            mem_food3: +item.mem_food3,
                            mem_food4: +item.mem_food4,
                            mem_food5: +item.mem_food5,
                            mem_food6: +item.mem_food6,
                            mem_validation: +item.mem_validation,
                            mem_state: +item.mem_state,
                        };
                    });
                    console.log(json.count);
                    this.totalPage = Math.ceil(json.count / 10);
                });
        },
        // 頁尾 分頁以及頁碼的切換nextPage、prePage、changePage
        nextPage() {
            if (this.currentPage === this.totalPage) {
                return;
            } else {
                this.currentPage += 1;
                this.getMemInfo();
            }
        },
        prePage() {
            if (this.currentPage == 1) {
                return;
            } else {
                this.currentPage--;
                this.getMemInfo();
            }
        },
        changePage(page) {
            this.currentPage = page;
            this.getMemInfo();
        },
    },
    // 取得會員明細清單
    created() {
        this.getMemInfo();
    },
};
</script>

<style lang="scss" scoped>
.pagination {
    padding: 30px 0;
    a {
        display: inline-block;
        padding: 10px 18px;
        color: $darkgreen;
        width: 40px;
        height: 40px;
        line-height: 40px;
        padding: 0;
        text-align: center;
        &:hover {
            color: $darkgreen;
        }
        &:focus {
            color: #fff;
        }
    }
    a.is-active {
        background-color: $darkgreen;
        border-radius: 100%;
        color: #fff;
    }
}
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
                width: 45px;
                height: 40px;
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
