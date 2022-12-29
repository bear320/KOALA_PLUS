<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
            <h2>優惠券管理</h2>
        </div>
        <div class="action">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">期限排序</option>
                <option value="">折扣數排序</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="couponDate">使用期限</h3>
            <h3 class="couponId">優惠代碼</h3>
            <h3 class="couponOff">折扣數</h3>
            <h3 class="couponName">名稱</h3>
        </div>
        <div class="bs-list" v-for="list in couponlist" :key="list.id">
            <p>{{ list.date }}</p>
            <p>{{ list.id }}</p>
            <p>{{ list.discount }}</p>
            <p>{{ list.name }}</p>
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
            couponlist: [
                {
                    name: "95折優惠券",
                    date: "60天",
                    id: "#koala95",
                    discount: "95折",
                },
                {
                    name: "9折優惠券",
                    date: "60天",
                    id: "#koala90",
                    discount: "9折",
                },
                {
                    name: "85折優惠券",
                    date: "60天",
                    id: "#koala85",
                    discount: "85折",
                },
                {
                    name: "6折優惠券",
                    date: "360天",
                    id: "#koala60",
                    discount: "6折",
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
        width: 400px;
        display: flex;
        column-gap: 20px;
        flex-wrap: wrap;
        h1 {
            display: block;
        }
        h2 {
            padding-left: 500px;
            color: $green;
            @include borderLeft(30px);
        }
        img {
            margin-left: 5px;
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
        padding-bottom: 10px;
        border-bottom: solid 1px $lightgreen;
        border-radius: 5px;

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
