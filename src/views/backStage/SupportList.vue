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
            <h3 class="dNum">編號</h3>
            <h3 class="dSupporter">捐助者</h3>
            <h3 class="dDate">日期</h3>
            <h3 class="dPlan">方案</h3>
            <h3 class="dKoala">無尾熊</h3>
            <h3 class="dPrice">價格</h3>
            <h3 class="dEdit">編輯</h3>
        </div>
        <div class="bs-list" v-for="order in source" :key="order.id">
            <p>{{ order.sup_id }}</p>
            <p>{{ order.mem_name }}</p>
            <p>{{ order.sup_date }}</p>
            <p>
                <span v-if="order.sup_plan === 0">認養</span>
                <span v-if="order.sup_plan === 1">資助</span>
            </p>
            <p>{{ order.koala_name }}</p>
            <p>NT$ {{ order.sup_price }}</p>
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
            source: [],
        };
    },
    methods: {
        getSupportList() {
            // const apiURL = new URL(`${BASE_URL}/getSupportList.php`);
            const apiURL = new URL(
                "http://localhost:8888/cgd103_g1/public/api/getSupportList.php"
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.map((item) => {
                        return {
                            sup_id: +item.sup_id,
                            mem_name: item.mem_name,
                            sup_date: item.sup_date,
                            koala_name: item.koala_name,
                            sup_plan: +item.sup_plan,
                            sup_price: item.sup_price,
                        };
                    });
                })
                .catch((error) => {
                    alert(error);
                });
        },
    },
    created() {
        this.getSupportList();
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
    margin-bottom: 60px;
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
