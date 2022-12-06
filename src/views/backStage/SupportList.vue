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
            <p>{{ order.number }}</p>
            <!-- <p>
                <router-link
                    :to="`/bs-support-info/${order.number}`"
                    target="_blank"
                >
                    {{ order.number }}
                </router-link>
            </p> -->
            <p>{{ order.date }}</p>
            <p>{{ order.plan }}</p>
            <p>{{ order.koala }}</p>
            <p>NT$ {{ order.price }}</p>
            <p>
                <router-link
                    :to="`/bs-support-info/${order.number}`"
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
                    number: "S00001",
                    date: "2022-12-01",
                    plan: "adopt",
                    koala: "Gabriel",
                    price: 1000,
                },
                {
                    donator: "Jim Hopper",
                    number: "S00002",
                    date: "2022-12-02",
                    plan: "adopt",
                    koala: "Camille",
                    price: 1000,
                },
                {
                    donator: "Dustin Henderson",
                    number: "S00003",
                    date: "2022-12-03",
                    plan: "support",
                    koala: "全部",
                    price: 300,
                },
                {
                    donator: "Lucas Sinclair",
                    number: "S00004",
                    date: "2022-12-04",
                    plan: "adopt",
                    koala: "全部",
                    price: 300,
                },
                {
                    donator: "Nancy Wheeler",
                    number: "S00005",
                    date: "2022-12-05",
                    plan: "adopt",
                    koala: "Lucien",
                    price: 1000,
                },
                {
                    donator: "Steve Harrington",
                    number: "S00006",
                    date: "2022-12-06",
                    plan: "adopt",
                    koala: "Emily",
                    price: 1000,
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
        column-gap: 15px;
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
