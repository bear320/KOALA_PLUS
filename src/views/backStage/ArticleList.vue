<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>公告管理</h1>
        <div class="todo">
            <a href="/bs-article-edit" target="_blank"
                ><img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></a>
            <select
                name="category"
                id="artclesCategory"
                v-model="selectedCategory"
            >
                <option value="undefined" selected>所有文章</option>
                <option
                    :value="article.news_category"
                    v-for="article in articles"
                    :key="article"
                >
                    {{ article.news_category }}
                </option>
            </select>
        </div>
        <section>
            <h2>草稿</h2>
        </section>
        <section>
            <h2>已上傳</h2>
            <div class="bstitle">
                <h3 class="star"></h3>
                <h3 class="article">文章</h3>
                <h3 class="pic">圖片</h3>
                <h3 class="date">日期</h3>
                <h3 class="tag">分類</h3>
                <h3 class="operator">操作</h3>
            </div>
            <div
                class="content"
                v-for="(article, index) in articles"
                :key="index"
            >
                <div
                    :class="`star star${index}`"
                    @click="article.news_star = !article.news_star"
                >
                    <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px"
                        y="0px"
                        viewBox="0 0 47.94 47.94"
                        style="enable-background: new 0 0 47.94 47.94"
                        xml:space="preserve"
                    >
                        <path
                            style="fill: currentColor,stoke: black;"
                            :class="[
                                `${index}`,
                                { starmark: article.news_star },
                            ]"
                            d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"
                        />
                    </svg>
                </div>
                <div class="article">
                    <p>{{ article.news_title }}</p>
                    <p class="article-content">{{ article.news_content }}</p>
                </div>
                <div class="pic">
                    <img
                        :src="
                            require(`@/assets/images/about/${article.news_img}`)
                        "
                        alt=""
                    />
                </div>
                <p class="date">{{ article.news_date }}</p>
                <p class="tag">{{ article.news_category }}</p>
                <div class="operator">
                    <router-link :to="`/bs-article-edit/${article.news_id}`"
                        ><img src="@/assets/images/icon/edit.svg" alt=""
                    /></router-link>
                </div>
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
            articles: [],
        };
    },
    methods: {
        getArticleList() {
            fetch("http://localhost/cgd103_g1/public/api/getArticleList.php")
                .then((res) => res.json())
                .then((json) => {
                    this.articles = json;
                    console.log(this.articles);
                });
        },
    },
    created() {
        this.getArticleList();
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
        .star {
            width: 5%;
            cursor: pointer;
            user-select: none;

            svg {
                width: 25px;
                margin-left: 10px;
                fill: transparent;
                stroke: black;
            }
        }
        .starmark {
            fill: #ed8a19;
            stroke: #ed8a19;
        }
        .article {
            width: 45%;

            p:first-child {
                font-weight: 700;
                font-size: $h4;
            }

            .article-content {
                display: -webkit-inline-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
                -webkit-line-clamp: 3;
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
