<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>資助認養管理</h1>
            <img src="@/assets/images/backstageindex/supportIcon.png" alt="" />
        </div>
        <div class="action">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">日期（近到遠）</option>
                <option value="">日期（遠到近）</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="dSupporter">捐助者</h3>
            <h3 class="dNum">編號</h3>
            <h3 class="dDate">日期</h3>
            <h3 class="dPlan">方案</h3>
            <h3 class="dKoala">無尾熊</h3>
            <h3 class="dPrice">價格</h3>
            <h3 class="dEdit">編輯</h3>
        </div>
        <div class="bs-list" v-for="order in donateOrders" :key="order.id">
            <p>{{ order.donator }}</p>
            <p>{{ order.id }}</p>
            <p>{{ order.date }}</p>
            <p>
                <span v-if="order.plan === 0">認養</span>
                <span v-if="order.plan === 1">資助</span>
            </p>
            <p>{{ order.koala }}</p>
            <p>NT$ {{ order.price }}</p>
            <p>
                <router-link
                    :to="`/bs-support-info/${order.id}`"
                    target="_blank"
                >
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
            donateOrders: [
                {
                    donator: "Joyce Byers",
                    id: "S00001",
                    date: "2022-12-01",
                    plan: 0,
                    koala: "Gabriel",
                    price: 1000,
                    desc: "Joyce Byers 在 2022-12-01 時，領養了無尾熊 Gabriel。",
                },
                {
                    donator: "Jim Hopper",
                    id: "S00002",
                    date: "2022-12-02",
                    plan: 0,
                    koala: "Camille",
                    price: 1000,
                    desc: "",
                },
                {
                    donator: "Dustin Henderson",
                    id: "S00003",
                    date: "2022-12-03",
                    plan: 1,
                    koala: "",
                    price: 300,
                    desc: "",
                },
                {
                    donator: "Lucas Sinclair",
                    id: "S00004",
                    date: "2022-12-04",
                    plan: 1,
                    koala: "",
                    price: 300,
                    desc: "",
                },
                {
                    donator: "Nancy Wheeler",
                    id: "S00005",
                    date: "2022-12-05",
                    plan: 0,
                    koala: "Lucien",
                    price: 1000,
                    desc: "",
                },
                {
                    donator: "Steve Harrington",
                    id: "S00006",
                    date: "2022-12-06",
                    plan: 0,
                    koala: "Emily",
                    price: 1000,
                    desc: "",
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
