<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
        </div>
        <div class="action">
            <router-link to="bs-product-add" target="_blank">
                <img src="@/assets/images/icon/FilePlus.svg" alt="" />
            </router-link>
            <div class="search">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="搜尋商品編號"
                    v-model.trim="search"
                    @input="changeVal"
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
            <h3 class="kName">商品名稱</h3>
            <h3 class="kDOB">商品首圖</h3>
            <h3 class="kSex">商品分類</h3>
            <h3 class="kAge">單價</h3>
            <h3 class="kListed">上 / 下架</h3>
            <h3 class="kEdit">編輯</h3>
        </div>
        <div class="bs-list" v-for="prod in prods" :key="prod.prod_id">
            <p>{{ prod.prod_id }}</p>
            <p>{{ prod.prod_name }}</p>
            <img class="proImg" :src="`/images/shop/${prod.prod_img1}`" />
            <p>{{ prod.prod_category }}</p>
            <p>{{ prod.prod_price }}</p>
            <p>
                <Switch
                    size="large"
                    true-color="#337a7d"
                    v-model.number="prod.prod_listed"
                    :true-value="1"
                    :false-value="0"
                    @on-change="switchListed(index)"
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
                    :to="`/bs-product-edit/${prod.prod_id}`"
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
                :class="{ 'is-active': page == i }"
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
            prods: [],
            search: "",
            totalPage: 0,
            page: 1,
        };
    },
    methods: {
        prePage() {
            if (this.page == 1) {
                return;
            } else {
                this.page--;
                this.getProductList({
                    search: this.search,
                    sort: this.sort,
                    page: this.page,
                });
            }
        },
        nextPage() {
            if (this.page === this.totalPage) {
                return;
            } else {
                this.page++;
                this.getProductList({
                    search: this.search,
                    sort: this.sort,
                    page: this.page,
                });
            }
        },
        changePage(i) {
            this.page = i;
            this.getProductList({
                search: this.search,
                sort: this.sort,
                page: this.page,
            });
        },
        changeVal() {
            this.getProductList({
                search: this.search,
                sort: this.sort,
                page: this.page,
            });
        },
        getProductList(payload) {
            const apiURL = new URL(`${BASE_URL}/getProductsList.php`);

            const quertParam = new URLSearchParams(payload);
            console.log(payload);
            apiURL.search = quertParam;
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.prods = json.prod;
                    this.totalPage = Math.ceil(json.prodCount / 10);
                });
        },
    },
    created() {
        this.getProductList({
            search: this.search,
            sort: this.sort,
            page: this.page,
        });
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
        .proImg {
            width: calc(100% / 7);
        }
    }
}
</style>
