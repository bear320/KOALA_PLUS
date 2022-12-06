<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>園區導覽管理</h1>
        <div class="todo">
            <a href="#" target="_blank"
                ><img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></a>
            <select name="category" id="articlesCategory">
                <option value="all">預約訂單</option>
                <option value="day-off">休館訂單</option>
            </select>
        </div>
        <section>
            <h2>預約總覽</h2>
            <div class="bstitle">
                <h3 class="ord-no">訂單編號</h3>
                <h3 class="name">姓名</h3>
                <h3 class="date">預約日期</h3>
                <h3 class="ppl">人數</h3>
                <h3 class="connect">Email/電話</h3>
                <h3 class="status">備註</h3>
                <h3 class="operator">編輯</h3>
            </div>
            <div class="content" v-for="list in orders" :key="list">
                <p class="ord-no">{{ list.number }}</p>
                <p class="name">
                    {{ list.name }}
                </p>
                <p class="date">{{ list.date }}</p>
                <p class="ppl">{{ list.ppl }}</p>
                <p class="connect">
                    <span class="email"> {{ list.email }}</span>
                    <span class="moible"> {{ list.mobile }}</span>
                </p>
                <p class="status">{{ list.status }}</p>
                <p class="operator">
                    <img src="@/assets/images/icon/edit.svg" alt="" />
                </p>
            </div>
        </section>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    components: {
        Header,
    },
    data() {
        return {
            orders: [
                {
                    number: 1122,
                    name: "Sara",
                    ppl: 5,
                    date: "2022-12-25",
                    status: "已預約",
                    email: "sara168@gmail.comn",
                    mobile: "0928168168",
                },
                {
                    number: 1125,
                    name: "Amy",
                    ppl: 15,
                    date: "2022-12-13",
                    email: "amy888@gmail.comn",
                    mobile: "0928888888",
                    status: "已預約",
                },
                {
                    number: 1231,
                    name: "休館",
                    ppl: 0,
                    date: "2022-12-31",
                    email: "",
                    mobile: "",
                    status: "休館",
                },
            ],
        };
    },
};
</script>

<style lang="scss" scoped>
html article {
    text-align: left;

    h1 {
        display: inline-block;
        width: 25%;
        background-image: url(@/assets/images/backstageindex/articleIcon.png);
        @include bgSetting(contain, right);
    }
    .todo {
        float: right;
        display: flex;
        img {
            margin-right: 15px;
        }
    }
    h2 {
        color: $green;
        @include borderLeft(30px);
    }
    section {
        h3 {
            margin-bottom: 0;
            padding-left: 10px;
        }
        .ord-no {
            width: 10%;
        }
        .name {
            width: 10%;

            p:first-child {
                font-weight: 700;
                font-size: $h4;
            }
        }

        .date {
            width: 15%;

            img {
                width: 120px;
                height: 120px;
            }
        }

        .ppl,
        .operator {
            width: 10%;
            display: flex;

            img {
                margin: 10px;

                &:hover {
                    stroke: $green;
                }
            }
        }
        .connect {
            width: 20%;
            display: flex;
            flex-direction: column;
        }
        .status {
            width: 10%;
        }
        .bstitle {
            display: flex;
            width: 100%;
            background-color: $darkgreen;
            color: white;
            border-radius: 10px;
        }

        .content {
            text-align: center;
            display: flex;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 10px;
            border-bottom: solid 1px $lightgreen;
            p {
                text-align: center;
            }
        }
    }
}
</style>
