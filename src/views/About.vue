<template>
    <Header />

    <article class="nav-space">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' + require('@/assets/images/about/banner.jpg') + ')',
            }"
        ></div>
        <section>
            <h1>About Us</h1>
            <div class="wrapper about">
                <div class="about-btn">
                    <a
                        @click="curView = 'one'"
                        :class="{ highLight: curView === 'one' }"
                        >關於我們</a
                    >
                    <a
                        @click="curView = 'two'"
                        :class="{ highLight: curView === 'two' }"
                        >資金運用</a
                    >
                    <a
                        @click="curView = 'three'"
                        :class="{ highLight: curView === 'three' }"
                        >創始初衷</a
                    >
                    <a
                        @click="curView = 'four'"
                        :class="{ highLight: curView === 'four' }"
                        >合作夥伴</a
                    >
                </div>
                <keep-alive class="about-content">
                    <component :is="curView"></component>
                </keep-alive>
            </div>
            <div class="slider">
                <div class="slide-track">
                    <div class="slide" v-for="cc in imgs" :key="cc">
                        <img :src="cc.url" />
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h2 class="title">FAQS</h2>
            <Collapse v-model="value">
                <Panel v-for="FAQ in FAQS" :key="FAQ">
                    {{ FAQ.title }}
                    <template #content>{{ FAQ.content }}</template>
                </Panel>
            </Collapse>
        </section>
        <section>
            <h2 class="title">News</h2>
            <div class="wrapper articles">
                <p>選了啥:{{ selectedCategory }}</p>
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
                <div
                    class="oneArticle"
                    v-for="(article, idx) in articles"
                    :key="article"
                >
                    <div
                        class="article-img"
                        :style="{
                            backgroundImage:
                                'url(' +
                                require(`@/assets/images/about/${article.news_img}`) +
                                ')',
                        }"
                    ></div>
                    <div class="article">
                        <button
                            @click="openLightbox(idx)"
                            class="article-title"
                        >
                            {{ article.news_title }}
                        </button>
                        <div class="tag">
                            <p class="article-tag">
                                {{ article.news_category }}
                            </p>
                            <p class="article-date">{{ article.news_date }}</p>
                        </div>
                        <div class="article-content">
                            {{ article.news_content }}
                        </div>
                    </div>
                    <lightbox ref="lightbox">
                        <template #img>
                            <img
                                :src="
                                    require(`@/assets/images/about/${article.news_img}`)
                                "
                            />
                        </template>
                        <template #article-title>
                            <h3>{{ article.news_title }}</h3>
                        </template>
                        <template #article-tag>
                            <p>{{ article.news_category }}</p>
                        </template>
                        <template #article-date>
                            <p>{{ article.news_date }}</p>
                        </template>
                        <template #article-content>
                            <p>{{ article.news_content }}</p>
                        </template>
                    </lightbox>
                </div>
            </div>
        </section>
    </article>
    <Footer />
</template>

<script>
import Header from "@/components/header.vue";
import one from "@/components/aboutUs/one.vue";
import two from "@/components/aboutUs/two.vue";
import three from "@/components/aboutUs/three.vue";
import four from "@/components/aboutUs/four.vue";
import lightbox from "@/components/aboutUs/lightbox.vue";
import Footer from "@/components/footer.vue";
export default {
    components: {
        Header,
        one,
        two,
        three,
        four,
        Footer,
        lightbox,
    },
    data() {
        return {
            curView: "one",
            FAQS: [
                {
                    title: "為什麼捐款很重要？",
                    content:
                        "捐款可以幫助KOALA+提供必要的資金，以支持我們進行重要的工作，例如幫助有需要的無尾熊、保護環境、改善社會、進行環境教育等。",
                },
                {
                    title: "我該如何捐款？",
                    content:
                        "您可以通過KOALA+網站捐款，或購買KOALA+相關週邊產品，或者與捐款接收組織聯繫以索取更多信息。",
                },
                {
                    title: "捐款是否有扣稅優惠？",
                    content:
                        "是的，在大多數情況下，捐款是可以抵扣稅的。請聯繫您的稅務顧問或捐款接收組織，了解更多相關信息。",
                },
                {
                    title: "捐款是否會收到收據?",
                    content:
                        "是的，如果您捐款給KOALA+，您可以下載領養證明，作為您的捐款收據，通常可以使用捐款收據作為抵稅的證明。",
                },
                {
                    title: "捐款可以退款嗎?",
                    content:
                        "很遺憾，捐款無法退款，如有任何疑問請聯繫客服人員。",
                },
            ],
            imgs: [
                {
                    url: require("../assets/images/about/1.jpg"),
                },
                {
                    url: require("../assets/images/about/2.jpg"),
                },
                {
                    url: require("../assets/images/about/3.jpg"),
                },
                {
                    url: require("../assets/images/about/4.jpg"),
                },
                {
                    url: require("../assets/images/about/5.jpg"),
                },
                {
                    url: require("../assets/images/about/6.jpg"),
                },
                {
                    url: require("../assets/images/about/7.jpg"),
                },
                {
                    url: require("../assets/images/about/8.jpg"),
                },
                {
                    url: require("../assets/images/about/1.jpg"),
                },
                {
                    url: require("../assets/images/about/2.jpg"),
                },
                {
                    url: require("../assets/images/about/3.jpg"),
                },
                {
                    url: require("../assets/images/about/4.jpg"),
                },
                {
                    url: require("../assets/images/about/5.jpg"),
                },
                {
                    url: require("../assets/images/about/6.jpg"),
                },
                {
                    url: require("../assets/images/about/7.jpg"),
                },
                {
                    url: require("../assets/images/about/8.jpg"),
                },
            ],
            articles: [],
            selectedCategory: undefined,
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
        openLightbox(idx) {
            this.$refs.lightbox[idx].isShow = true;
        },
    },
    created() {
        this.getArticleList();
    },
    watch: {
        selectedCategory: function (value) {
            let oneArticle = document.querySelector("oneArticle");
            let category = document.getElementById("artclesCategory").value;
        },
    },
};
</script>

<style lang="scss" scoped>
html {
    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    h1,
    h2 {
        font-family: "Inkfree";
        font-size: 30vh;
        color: $lightgreen;
    }
    section {
        .about {
            border-top: solid 1px $lightgreen;
            border-bottom: solid 1px $lightgreen;
            padding: 50px 10%;
            display: flex;
            justify-content: center;

            .about-btn {
                border-right: solid 1px $lightgreen;
                width: 20%;
                // padding: 20px;

                a {
                    margin: 10px 0;
                    display: block;
                    position: relative;
                    color: $font-color;
                    &:hover {
                        color: $btn-color;
                    }
                }
                .highLight {
                    color: $green;
                    pointer-events: none;
                    @include borderLeft(0);
                    @include m {
                        &::before {
                            opacity: 0;
                        }
                    }
                }
            }
            .about-content {
                width: 80%;
                vertical-align: middle;
                padding: 20px;
                text-align: left;
            }
        }

        .slider {
            height: 100%;
            margin: 20px 0;
            overflow: hidden;
            position: relative;

            &::before,
            &::after {
                background: linear-gradient(
                    to right,
                    white 0%,
                    rgba(255, 255, 255, 0) 100%
                );
                content: "";
                height: 450px;
                position: absolute;
                width: 150px;
                z-index: 2;
            }

            &::after {
                right: 0;
                top: 0;
                transform: rotateZ(180deg);
            }
            &::before {
                left: 0;
                top: 0;
            }

            .slide-track {
                animation: scroll 40s linear infinite;
                display: flex;
                width: calc(360px * 16);
                justify-content: space-between;

                &:hover {
                    animation-play-state: paused;
                }
            }
            .slide {
                height: 450px;
                width: 350px;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }
        }
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-360px * 8));
            }
        }
        .title {
            display: inline-block;
            width: 100%;
            text-align: center;
            background-image: url(@/assets/images/drawing1.png);
            @include bgSetting(contain, left);
        }
    }
    section:nth-of-type(3) {
        .title {
            background-image: url(@/assets/images/drawing7.png);
            background-position: right;
        }
        .articles {
            text-align: left;
            padding: 50px 10%;

            select {
                padding: 5px 20px;
            }
        }
        h3 {
            @include borderLeft(30px);
        }
        .oneArticle {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            border-bottom: solid 1px $green;
            height: 20vh;
            @include d {
                height: 15vh;
            }

            .article-img {
                width: 15%;
                @include bgSetting(cover, center);
                margin-right: 5%;
            }
            .article {
                width: 85%;

                .article-title {
                    font-size: $h4;
                    @include rwd-h4;
                    cursor: pointer;
                    font-weight: 700;
                    background-color: transparent;
                    border: 0;
                    color: $btn-color;
                    &:hover {
                        color: $green;
                    }
                }
                .tag {
                    display: flex;
                    width: 25%;
                    justify-content: space-between;

                    .article-date,
                    .article-tag {
                        color: $lightgreen;
                        font-weight: 700;
                    }
                }
                .article-content {
                    display: -webkit-inline-box;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    -webkit-line-clamp: 3;

                    @include m {
                        -webkit-line-clamp: 2;
                    }
                }
            }
        }
    }
}
@media screen and (max-width: 1200px) {
    html {
        h1,
        h2 {
            font-size: 20vw;
        }
        section {
            .slider {
                .slide-track {
                    width: calc(155px * 16);
                }
                .slide {
                    height: 200px;
                    width: 150px;
                }
                &::before,
                &::after {
                    display: none;
                }
            }
            @keyframes scroll {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-155px * 8));
                }
            }
        }
    }
    html section:nth-of-type(3) {
        .articles {
            padding: 0;

            .oneArticle {
                .article-img {
                    width: 35%;
                    margin-right: 3%;
                }
                .tag {
                    width: 65%;
                }
            }
        }
    }
}
@media screen and (max-width: 768px) {
    html section {
        .about {
            flex-direction: column;
            border-right: solid 1px $lightgreen;
            border-left: solid 1px $lightgreen;
            border-top: none;
            border-bottom: none;
            padding: 0;

            .about-btn,
            .about-content {
                width: 100%;
            }
            .about-btn {
                display: flex;
                justify-content: space-evenly;
                border-right: none;
                border-bottom: solid 1px $lightgreen;
            }
            .highLight {
                &::before {
                    border-left: solid 3px #07617d;
                    left: -5px;
                    height: 80%;
                }
            }
        }
    }
    html section:nth-of-type(3) {
        .articles {
            .oneArticle {
                .article-img {
                    width: 40%;
                    margin-right: 3%;
                }

                .tag {
                    width: 60%;
                }
            }
        }
    }
}
</style>
