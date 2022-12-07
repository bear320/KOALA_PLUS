<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
        </div>
        <div class="action">
            <router-link to="bs-product-edit" target="_blank">
                <img src="@/assets/images/icon/FilePlus.svg" alt="" />
            </router-link>
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">名字（正序）</option>
                <option value="">名字（反序）</option>
                <option value="">編號（反序）</option>
                <option value="">編號（反序）</option>
                <option value="">價格（大到小）</option>
                <option value="">價格（小到大）</option>
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
        <div class="bs-list" v-for="koala in koalas" :key="koala.id">
            <p>{{ koala.id }}</p>
            <p>{{ koala.name }}</p>
            <img class="proImg" src="https://fakeimg.pl/300x200/200" />
            <p>{{ koala.sex }}</p>
            <p>$300</p>
            <p>
                <Switch
                    size="large"
                    true-color="#337a7d"
                    v-model="koala.listed"
                >
                    <template #open>
                        <span>ON</span>
                    </template>
                    <template #close>
                        <span>OFF</span>
                    </template>
                </Switch>
            </p>
            <p>
                <router-link :to="`/bs-koala-edit/${koala.id}`" target="_blank">
                    <img src="@/assets/images/icon/edit.svg" alt="" />
                </router-link>
            </p>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    components: {
        Header,
    },
    data() {
        return {
            koalas: [
                {
                    name: "無尾熊室內拖鞋",
                    id: "K001",
                    dob: "2020-03-22",
                    sex: "生活小物",
                    listed: true,
                },
                {
                    name: "無尾熊娃娃",
                    id: "K002",
                    dob: "2019-05-20",
                    sex: "玩具/絨毛娃娃",
                    listed: true,
                },
                {
                    name: "無尾熊室內拖鞋",
                    id: "K003",
                    dob: "2019-10-15",
                    sex: "生活小物",
                    listed: true,
                },
                {
                    name: "無尾熊衣服",
                    id: "K004",
                    dob: "2018-04-08",
                    sex: "服飾",
                    listed: true,
                },
                {
                    name: "無尾熊室內拖鞋",
                    id: "K005",
                    dob: "2017-07-10",
                    sex: "生活小物",
                    listed: true,
                },
                {
                    name: "無尾熊衣服",
                    id: "K006",
                    dob: "2015-01-16",
                    sex: "服飾",
                    listed: false,
                },
            ],
        };
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
        .proImg {
            width: calc(100% / 7);
        }
    }
}
</style>
