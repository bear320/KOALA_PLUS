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
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">名字（正序）</option>
                <option value="">名字（反序）</option>
                <option value="">編號（反序）</option>
                <option value="">編號（反序）</option>
                <option value="">年齡（大到小）</option>
                <option value="">年齡（小到大）</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="kName">名字</h3>
            <h3 class="kNo">編號</h3>
            <h3 class="kDOB">出生日期</h3>
            <h3 class="kSex">性別</h3>
            <h3 class="kAge">年齡</h3>
            <h3 class="kListed">上 / 下架</h3>
            <h3 class="kEdit">編輯</h3>
        </div>
        <div class="bs-list" v-for="koala in koalas" :key="koala.id">
            <p>{{ koala.name }}</p>
            <p>{{ koala.id }}</p>
            <p>{{ koala.dob }}</p>
            <p>{{ koala.sex }}</p>
            <p>X歲</p>
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
                    name: "Emily",
                    id: "K001",
                    dob: "2020-03-22",
                    sex: "母",
                    listed: true,
                    desc: "I'm Emily.",
                },
                {
                    name: "Gabriel",
                    id: "K002",
                    dob: "2019-05-20",
                    sex: "公",
                    listed: true,
                    desc: "I'm Gabriel.",
                },
                {
                    name: "Lucien",
                    id: "K003",
                    dob: "2019-10-15",
                    sex: "公",
                    listed: true,
                    desc: "I'm Lucien.",
                },
                {
                    name: "Camille",
                    id: "K004",
                    dob: "2018-04-08",
                    sex: "母",
                    listed: true,
                    desc: "I'm Camille.",
                },
                {
                    name: "Mindy",
                    id: "K005",
                    dob: "2017-07-10",
                    sex: "母",
                    listed: true,
                    desc: "I'm Mindy.",
                },
                {
                    name: "Antoine",
                    id: "K006",
                    dob: "2015-01-16",
                    sex: "公",
                    listed: false,
                    desc: "I'm Antoine.",
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
    }
}
</style>
