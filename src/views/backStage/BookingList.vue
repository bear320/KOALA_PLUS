<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>園區導覽管理</h1>
        <div class="todo">
            <a href="/bs-article-edit" target="_blank"
                ><img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></a>
            <select name="category" id="articlesCategory">
                <option value="all">所有文章</option>
                <option value="news">最新消息</option>
                <option value="parkinfo">園區資訊</option>
                <option value="moneyinfo">資金運用</option>
            </select>
        </div>
        <section>
            <h2>預約總覽</h2>
            <div class="bstitle">
                <h3 class="star">訂單編號</h3>
                <h3 class="article">姓名</h3>
                <h3 class="date">日期</h3>
                <h3 class="tag">分類</h3>
                <h3 class="operator">操作</h3>
            </div>
            <div class="content" v-for="article in articles" :key="article">
                <p class="star"></p>
                <div class="article">
                    <p>{{ article.title }}</p>
                    <p>{{ article.content }}</p>
                </div>
                <div class="pic"><img :src="article.img" alt="" /></div>
                <p class="date">{{ article.date }}</p>
                <p class="tag">{{ article.tag }}</p>
                <div class="operator">
                    <img src="@/assets/images/icon/upload.svg" alt="" />
                    <img src="@/assets/images/icon/edit.svg" alt="" />
                </div>
            </div>
        </section>
        <section>
            <h2>已上傳</h2>
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
            articles: [
                {
                    img: require("@/assets/images/about/3.jpg"),
                    title: "一隻無尾熊寶寶出生了",
                    tag: "#最新消息",
                    date: "2022/12/25",
                    content:
                        "每年的9到11月是無尾熊開始繁殖的交配季節，當無尾熊長到2歲時就開始邁入性成熟年齡、可以進行傳宗接代的重責大任。無尾熊平均一胎以孕育一隻baby為主，偶爾會有雙胞胎出現，平均壽命為10至12歲。「為了迎接三隻無尾熊寶寶誕生，動物園特別精心打造了育嬰房’」趙明杰笑著說，為讓......",
                },
                {
                    img: require("@/assets/images/about/8.jpg"),
                    title: "園區公休通知",
                    tag: "#園區消息",
                    date: "2022/12/13",
                    content:
                        "因應園區大清潔及設施維修工程，KOALA+園區將於112/02/15~112/02/20公休6日，造成不便盡請見諒。",
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
        .star {
            width: 5%;
        }
        .article {
            width: 45%;

            p:first-child {
                font-weight: 700;
                font-size: $h4;
            }
        }
        .pic,
        .date {
            width: 15%;

            img {
                width: 120px;
                height: 120px;
            }
        }

        .tag,
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
        .bstitle {
            display: flex;
            width: 100%;
            background-color: $darkgreen;
            color: white;
            border-radius: 10px;
        }

        .content {
            display: flex;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 10px;
            border-bottom: solid 1px $lightgreen;
        }
    }
}
</style>
