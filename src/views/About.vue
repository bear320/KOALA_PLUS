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
                        @click="(curView = 'three'), changeBox()"
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
                <Panel name="1">
                    我的捐款可以免稅嗎?
                    <template #content>內容</template>
                </Panel>
                <Panel name="2">
                    我能收到捐款的稅收收據嗎?
                    <template #content>
                        對於正在進行的每月捐款，我們會在財政年度結束時向您發送所有收到的每月捐款的稅收收據。對於單筆捐款，我們會在處理完每筆捐款後立即發送收據。
                        我們接受MasterCard、Visa、JCB信用卡支付，暫不接受行動支付及匯款，造成不便盡請見諒。
                    </template>
                </Panel>
                <Panel name="3">
                    如何更新我的個人資訊?
                    <template #content>內容</template>
                </Panel>
                <Panel name="4">
                    標題
                    <template #content>內容</template>
                </Panel>
            </Collapse>
        </section>
        <section>
            <h2 class="title">News</h2>
            <div class="wrapper articles">
                <select name="category" id="articlesCategory">
                    <option value="all">所有文章</option>
                    <option value="news">最新消息</option>
                    <option value="parkinfo">園區資訊</option>
                    <option value="moneyinfo">資金運用</option>
                </select>
                <h3 class="month">2022/12</h3>
                <div
                    class="oneArticle"
                    v-for="article in articles"
                    :key="article"
                >
                    <div
                        class="article-img"
                        :style="{
                            backgroundImage: 'url(' + article.img + ')',
                        }"
                    ></div>
                    <div class="article">
                        <a class="article-title">{{ article.title }}</a>
                        <div class="tag">
                            <p class="article-tag">{{ article.tag }}</p>
                            <p class="article-date">{{ article.date }}</p>
                        </div>
                        <p class="article-content">{{ article.content }}</p>
                    </div>
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
import Footer from "@/components/footer.vue";
export default {
    components: {
        Header,
        one,
        two,
        three,
        four,
        Footer,
    },
    data() {
        return {
            curView: "one",
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
            articles: [
                {
                    img: require("../assets/images/about/3.jpg"),
                    title: "一隻無尾熊寶寶出生了",
                    tag: "#最新消息",
                    date: "2022/12/25",
                    content:
                        "每年的9到11月是無尾熊開始繁殖的交配季節，當無尾熊長到2歲時就開始邁入性成熟年齡、可以進行傳宗接代的重責大任。無尾熊平均一胎以孕育一隻baby為主，偶爾會有雙胞胎出現，平均壽命為10至12歲。「為了迎接三隻無尾熊寶寶誕生，動物園特別精心打造了育嬰房’」趙明杰笑著說，為讓......",
                },
                {
                    img: require("../assets/images/about/8.jpg"),
                    title: "園區公休通知",
                    tag: "#園區消息",
                    date: "2022/12/13",
                    content:
                        "因應園區大清潔及設施維修工程，KOALA+園區將於112/02/15~112/02/20公休6日，造成不便盡請見諒。",
                },
            ],
        };
    },
    methods: {},
};
</script>

<style lang="scss" scoped>
html {
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
            padding: 5% 0;
            border-bottom: solid 1px $green;

            .article-img {
                width: 20%;
                @include bgSetting(cover, center);
                margin-right: 5%;
            }
            .article {
                width: 80%;

                .article-title {
                    font-size: $h4;
                    @include rwd-h4;
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
