<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>園區導覽管理</h1>
            <img src="@/assets/images/backstageindex/articleIcon.png" alt="" />
            <h2>預約總覽</h2>
        </div>
        <div class="action">
            <a href="/bs-article-edit" target="_blank"
                ><img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></a>
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">已預約訂單</option>
                <option value="">休館日訂單</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="bookNum">編號</h3>
            <h3 class="bookName">預約者</h3>
            <h3 class="bookDate">日期</h3>
            <h3 class="bookPpl">人數</h3>
            <h3 class="bookConnect">Email / 電話</h3>
            <h3 class="bookStatus">狀態</h3>
            <h3 class="bookEdit">編輯</h3>
        </div>
        <div
            class="bs-list"
            v-for="list in booklist"
            :key="list.id"
            :style="{
                backgroundColor:
                    list.name === null ? 'rgba(154, 195, 199, 0.2)' : '#D8D8D8',
            }"
        >
            <p>{{ list.num }}</p>
            <p>{{ list.name }}</p>
            <!-- <p>
                <router-link
                    :to="`/bs-support-info/${list.number}`"
                    target="_blank" 
                >
                    {{ list.number }}
                </router-link>
            </p> -->
            <p>{{ list.date }}</p>
            <p>{{ list.ppl }}</p>
            <p>{{ list.email }}<br />{{ list.mobile }}</p>
            <p>{{ list.status }}</p>
            <p>
                <router-link
                    :to="`/bs-support-info/${list.number}`"
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
            booklist: [
                {
                    num: "B221122",
                    name: "Sara",
                    date: "2022-12-01",
                    ppl: 5,
                    email: "sara168@gmail.com",
                    mobile: "0988168168",
                    status: "已預約",
                },
                {
                    num: "B221230",
                    name: "Amy",
                    date: "2022-12-30",
                    ppl: 5,
                    email: "amy888@gmail.com",
                    mobile: "09884433552",
                    status: "已預約",
                },
                {
                    num: "B221231",
                    name: null,
                    date: "2022-12-31",
                    ppl: 0,
                    email: "",
                    mobile: "",
                    status: "休館",
                },
                {
                    num: "B230101",
                    name: null,
                    date: "2023-01-01",
                    ppl: 0,
                    email: "",
                    mobile: "",
                    status: "休館",
                },
                {
                    num: "B230102",
                    name: "Handsome",
                    date: "2023-01-02",
                    ppl: 6,
                    email: "handsome888@gmail.com",
                    mobile: "0988666666",
                    status: "已預約",
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
