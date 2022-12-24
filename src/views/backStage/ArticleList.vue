<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>公告管理</h1>
        <div class="todo">
            <router-link to="bs-article-add" target="_blank"
                ><img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></router-link>
            <select name="category" id="artclesCategory">
                <option value="none" selected>所有文章</option>
                <option value="最新消息">最新消息</option>
                <option value="園區資訊">園區資訊</option>
                <option value="資金運用">資金運用</option>
            </select>
        </div>
        <Tabs>
            <TabPane label="已上傳">
                <section>
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
                        v-for="(article, index) in uploaded"
                        :key="index"
                    >
                        <label
                            :class="
                                article.news_star == 1 ? 'starmark' : 'star'
                            "
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
                                    style="fill: currentColor,stoke: currentColor;"
                                    d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"
                                />
                            </svg>
                            <input
                                type="checkbox"
                                style="display: none"
                                :true-value="1"
                                :false-value="0"
                                @change="marked(index)"
                                v-model.number="article.news_star"
                            />
                        </label>

                        <div class="article">
                            <p>{{ article.news_title }}</p>
                            <p class="article-content">
                                {{ article.news_content }}
                            </p>
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
                            <router-link
                                :to="`/bs-article-edit/${article.news_id}`"
                                target="_blank"
                                ><img src="@/assets/images/icon/edit.svg"
                            /></router-link>
                            <span @click="deleteArticle(index)">
                                <img
                                    src="@/assets/images/icon/delete.svg"
                                    alt=""
                            /></span>
                        </div>
                    </div>
                </section>
            </TabPane>
            <TabPane label="草稿">
                <section>
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
                        v-for="(article, index) in draft"
                        :key="index"
                    >
                        <label
                            :class="
                                article.news_star == 1 ? 'starmark' : 'star'
                            "
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
                                    style="fill: currentColor,stoke: currentColor;"
                                    d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757
	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042
	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685
	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528
	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956
	C22.602,0.567,25.338,0.567,26.285,2.486z"
                                />
                            </svg>
                            <input
                                type="checkbox"
                                style="display: none"
                                :true-value="1"
                                :false-value="0"
                                @change="marked(index)"
                                v-model.number="article.news_star"
                            />
                        </label>
                        <div class="article">
                            <p>{{ article.news_title }}</p>
                            <p class="article-content">
                                {{ article.news_content }}
                            </p>
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
                            <router-link
                                :to="`/bs-article-edit/${article.news_id}`"
                                target="_blank"
                                ><img
                                    src="@/assets/images/icon/edit.svg"
                                    alt=""
                            /></router-link>
                            <span @click="deleteArticle(index)">
                                <img
                                    src="@/assets/images/icon/delete.svg"
                                    alt=""
                            /></span>
                        </div>
                    </div>
                </section>
            </TabPane>
        </Tabs>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            articles: [],
            uploaded: [],
            draft: [],
        };
    },
    methods: {
        getArticleList() {
            // const apiURL = new URL(`${BASE_URL}/getArticleList.php`);
            const apiURL = new URL(
                `http://localhost/cgd103_g1/public/api/getArticleList.php`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.articles = json;
                    this.uploaded = this.articles.filter((article) => {
                        return article.news_status == "1";
                    });
                    this.draft = this.articles.filter((article) => {
                        return article.news_status == "0";
                    });
                    console.log(this.articles);
                });
        },
        marked(index) {
            // const apiURL = new URL(`${BASE_URL}/editArticle.php`);
            const apiURL = new URL(
                `http://localhost/cgd103_g1/public/api/editArticle.php`
            );
            const news_id = this.articles[index].news_id;
            const news_star = this.articles[index].news_star;

            console.log(this.articles[index].news_id);
            console.log(this.articles[index].news_star);

            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams({ news_id, news_star }),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.resDate = json;
                });
        },
        deleteArticle(index) {
            console.log(this.articles[index].news_id);
            // const apiURL = new URL(`${BASE_URL}/deleteArticle.php`);
            const apiURL = new URL(
                `http://localhost/cgd103_g1/public/api/deleteArticle.php`
            );
            if (confirm("確定要刪除文章?")) {
                fetch(apiURL, {
                    method: "POST",
                    body: new URLSearchParams({
                        news_id: this.articles[index].news_id,
                    }),
                })
                    .then((res) => res.json())
                    .then((result) => {
                        console.log(result);

                        // alert(result);
                        location.reload();
                    });
            }
        },
    },
    created() {
        this.getArticleList();
    },
};
</script>

<style lang="scss" scoped>
.ivu-tabs-tab-active {
    color: $green !important;
}
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

    section {
        %star {
            width: 5%;
            cursor: pointer;
            user-select: none;
        }

        %starsvg {
            width: 25px;
            margin-left: 10px;
        }
        .star {
            @extend %star;
            svg {
                @extend %starsvg;
                fill: rgb(212, 211, 211);
            }
        }
        .starmark {
            @extend %star;
            svg {
                @extend %starsvg;
                fill: #ed8a19;
            }
        }
        .article {
            width: 45%;
            margin-right: 20px;

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
