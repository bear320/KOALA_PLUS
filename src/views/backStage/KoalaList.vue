<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>無尾熊管理</h1>
            <img src="@/assets/images/backstageindex/koalaIcon.png" alt="" />
        </div>
        <div class="action">
            <router-link to="bs-koala-add" target="_blank">
                <img src="@/assets/images/icon/FilePlus.svg" alt="" />
            </router-link>
            <div class="search">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="搜尋無尾熊名字"
                    v-model.trim="search"
                    @change="changeVal"
                />
            </div>
            <select name="sort" id="sort" v-model="sort" @change="changeVal">
                <option value="0">排列：編號（小到大）</option>
                <option value="1">排列：編號（大到小）</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="kNo">編號</h3>
            <h3 class="kName">名字</h3>
            <h3 class="kSex">性別</h3>
            <h3 class="kDOB">出生日期</h3>
            <h3 class="kAge">年齡</h3>
            <h3 class="kListed">上 / 下架</h3>
            <h3 class="kEdit">編輯</h3>
        </div>
        <div class="bs-list" v-for="koala in source" :key="koala.koala_id">
            <p>{{ koala.koala_id }}</p>
            <p>{{ koala.koala_name }}</p>
            <p>
                <span v-if="koala.koala_sex === 'Male'">公</span>
                <span v-if="koala.koala_sex === 'Female'">母</span>
            </p>
            <p>{{ koala.koala_dob }}</p>
            <p>{{ koala.koala_age }}</p>
            <p>
                <Switch
                    size="large"
                    true-color="#337a7d"
                    v-model.number="koala.koala_listed"
                    :true-value="1"
                    :false-value="0"
                >
                    <template #open>
                        <span>上架</span>
                    </template>
                    <template #close>
                        <span>下架</span>
                    </template>
                </Switch>
            </p>
            <p>
                <router-link
                    :to="`/bs-koala-edit/${koala.koala_name}`"
                    target="_blank"
                >
                    <img src="@/assets/images/icon/edit.svg" alt="" />
                </router-link>
            </p>
        </div>
    </section>
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
            sort: 0,
            search: "",
            source: [],
            totalPage: 0,
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
        };
    },
    watch: {
        $route: function () {
            if (!Object.keys(this.$route.query).length) {
                this.currentPage = 1;
                this.getKoalaList(this.$route.query);
            }
            this.getKoalaList(this.$route.query);
        },
    },
    methods: {
        getKoalaList(queryParam) {
            if (!Object.keys(queryParam).length) {
                queryParam.limit = 10;
                queryParam.page = 1;
                queryParam.sort = 0;
                queryParam.search = this.search;
            }
            const apiURL = new URL(`${BASE_URL}/getKoalaList.php`);
            const searchParam = new URLSearchParams(queryParam);
            apiURL.search = searchParam;
            // const apiURL = new URL(
            //     `http://localhost:8888/cgd103_g1/public/api/getKoalaList.php?limit=10&page=${this.currentPage}`
            // );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.koalas.map((item) => {
                        return {
                            koala_id: +item.koala_id,
                            koala_name: item.koala_name,
                            koala_sex: item.koala_sex,
                            koala_dob: item.koala_dob,
                            koala_age: +item.koala_age,
                            koala_listed: +item.koala_listed,
                        };
                    });
                    this.totalPage = Math.ceil(json.koalaCount / 10);
                })
                .catch((error) => {
                    // alert(error);
                });
        },
        prePage() {
            if (this.currentPage == 1) {
                return;
            } else {
                this.currentPage--;
                this.$router.push({
                    path: "/bs-koala-list",
                    query: {
                        limit: `10`,
                        page: this.currentPage,
                        sort: this.sort,
                        search: this.search,
                    },
                });
            }
        },
        nextPage() {
            if (this.currentPage === this.totalPage) {
                return;
            } else {
                this.currentPage++;
                this.$router.push({
                    path: "/bs-koala-list",
                    query: {
                        limit: `10`,
                        page: this.currentPage,
                        sort: this.sort,
                        search: this.search,
                    },
                });
            }
        },
        changePage(page) {
            this.currentPage = page;
            this.$router.push({
                path: "/bs-koala-list",
                query: {
                    limit: `10`,
                    page: this.currentPage,
                    sort: this.sort,
                    search: this.search,
                },
            });
        },
        changeVal() {
            this.$router.push({
                path: "/bs-koala-list",
                query: {
                    limit: `10`,
                    page: this.currentPage,
                    sort: this.sort,
                    search: this.search,
                },
            });
        },
    },
    created() {
        this.$router.push({
            path: "/bs-koala-list",
        });
        this.getKoalaList(this.$route.query);
    },
};
</script>

<style lang="scss" scoped>
.title-n-action {
    margin-bottom: 20px;
    text-align: left;
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
.table {
    .bs-title {
        width: 100%;
        border-radius: 10px;
        background-color: $darkgreen;
        color: white;
        display: flex;
        justify-items: center;
        align-items: center;
        h3 {
            display: block;
            width: calc(100% / 7);
        }
    }
    .bs-list {
        display: flex;
        justify-items: center;
        align-items: center;
        margin: 10px 0;
        padding-bottom: 10px;
        border-bottom: solid 1px $lightgreen;
        p {
            display: block;
            width: calc(100% / 7);
            a {
                display: block;
                width: fit-content;
                height: fit-content;
                margin: 0 auto;
                img {
                    margin: 10px;
                    vertical-align: top;
                }
            }
        }
    }
}
.pagination {
    padding: 30px 0;
    a {
        display: inline-block;
        padding: 10px 18px;
        color: $darkgreen;
        //
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
</style>
