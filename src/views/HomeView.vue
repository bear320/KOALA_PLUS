<template>
    <Header />
    <div @mousewheel="handleMouseWheel">
        <div class="sections-menu">
            <span
                class="menu-point"
                :class="{ active: activeSection === index }"
                @click="scrollToSection(index)"
                v-for="(offset, index) in offsets"
                :key="index"
                v-title="'Go to section ' + (index + 1)"
            >
            </span>
        </div>
        <div class="page">
            <div class="container">
                <div id="scene">
                    <div class="layer" data-depth="0.5" data-friction-x="1">
                        <img
                            src="@/assets/images/index/star.png"
                            alt="火災中的無尾熊視差滾動互動圖"
                        />
                    </div>
                    <div class="layer" data-depth="1.5">
                        <img src="@/assets/images/index/fireline.png" />
                    </div>
                    <div class="layer" data-depth="0.1">
                        <img src="@/assets/images/index/treeblur.png" />
                    </div>
                    <div class="layer">
                        <img src="@/assets/images/index/star.png" />
                    </div>
                    <div class="layer" data-depth="0.7" data-invert-x="false">
                        <img src="@/assets/images/index/fireline2.png" />
                    </div>
                    <div class="layer">
                        <img src="@/assets/images/index/cryingkoala.png" />
                    </div>
                    <div class="layer" data-depth="0.3">
                        <img src="@/assets/images/index/tree.png" />
                    </div>
                    <div class="layer" data-depth="2">
                        <img src="@/assets/images/index/fireline.png" />
                    </div>
                    <h1 class="layer" data-depth="0.05">
                        <img src="@/assets/images/index/logo.svg" />
                    </h1>
                </div>
            </div>
        </div>
        <div class="page">
            <div class="fire">
                <h2>Windfires</h2>
            </div>
            <p>
                森林野火造成成千上萬隻無尾熊喪命、受傷、流離失所。KOALA+致力於救助這些無尾熊，給它們一個能安心養傷、休息的空間。為此，我們需要像您這樣願意一起幫助無尾熊的人加入我們。KOALA+不僅僅是救助團體，更有豐富的教育意義，歡迎您加入我們一起認識無尾熊，幫助無尾熊!
            </p>
        </div>
        <div class="page change">
            <div class="wedo-p">
                <h2>我們能做什麼?</h2>
                <p>
                    在KOALA+，我們能領養無尾熊，或捐款幫助無尾熊中心的營運。雖然領養無尾熊沒辦法讓您把她帶回家中一起居住，但這筆費用能讓無尾熊得到好的照顧和環境。另外，KOALA+將發行相應的尤加利葉遊戲幣給您，您可以在<router-link
                        to="/my-koala"
                        >My Koala遊戲區</router-link
                    >養成無尾熊，陪他們長大。
                </p>
            </div>
            <div class="wedo">
                <h2>What can we do?</h2>
            </div>
        </div>
        <div class="page colorpage">
            <div class="wesave-video">
                <iframe
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/yVnV2ejyYYo"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
            <div class="wesave-p">
                <h2>我們能幫助他們!</h2>
                <p>
                    KOALA+自成立起，已幫助非常多無尾熊度過森林野火的劫難，而這一路走來都是因為有許多善心人士溫暖的幫助，讓我們與所有無尾熊救助機構向您說聲感謝!您的幫助是我們所有救助行動的開端，如您需要領養證明書，可至<router-link
                        to="/member"
                        >會員中心-認養證明</router-link
                    >免費下載，如您想看一看無尾熊們的生活環境，也可以來<router-link
                        to="/koala-park"
                        >預約導覽無尾熊園區</router-link
                    >，我們由衷歡迎您的參訪，更別忘了<router-link to="/shop"
                        >周邊商城</router-link
                    >有許多可愛的無尾熊周邊商品，商品售價的利潤將用於無尾熊救助行動，您購買可愛周邊的同時也是在幫助無尾熊!
                </p>
            </div>
        </div>
        <div class="page">
            <div class="wrapper">
                <h2>News</h2>
                <div class="newscards">
                    <div
                        class="card article"
                        v-for="(article, idx) in uploaded"
                        :key="article"
                    >
                        <teleport to="body">
                            <lightbox ref="lightbox">
                                <template #img>
                                    <img
                                        :src="
                                            require(`@/assets/images/about/${article.news_img}`)
                                        "
                                        alt="公告圖片"
                                    />
                                </template>
                                <template #article-title>
                                    <h3>{{ article.news_title }}</h3>
                                </template>
                                <template #article-tag>
                                    <p>#{{ article.news_category }}</p>
                                </template>
                                <template #article-date>
                                    <p>{{ article.news_date }}</p>
                                </template>
                                <template #article-content>
                                    <p>{{ article.news_content }}</p>
                                </template>
                            </lightbox>
                        </teleport>
                        <div @click="openLightbox(idx)">
                            <div
                                class="article-img"
                                :style="{
                                    backgroundImage:
                                        'url(' +
                                        require(`@/assets/images/about/${article.news_img}`) +
                                        ')',
                                }"
                            ></div>
                            <div class="font">
                                <p class="article-title">
                                    {{ article.news_title }}
                                </p>
                                <div class="date">
                                    <p class="article-tag">
                                        #{{ article.news_category }}
                                    </p>
                                    <p class="article-date">
                                        {{ article.news_date }}
                                    </p>
                                </div>
                                <p class="article-content">
                                    {{ article.news_content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page footer">
            <Footer />
        </div>
    </div>
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import Parallax from "../../node_modules/parallax-js/src/parallax";
import lightbox from "@/components/aboutUs/lightbox.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        Footer,
        lightbox,
    },
    data() {
        return {
            inMove: false,
            inMoveDelay: 2000,
            activeSection: 0,
            offsets: [],
            touchStartY: 0,
            articles: [],
            uploaded: [],
        };
    },
    mounted() {
        this.intscence();
        this.calculateSectionOffsets();
    },
    methods: {
        getArticleList() {
            const apiURL = new URL(`${BASE_URL}/getArticleList.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.articles = json;
                    this.uploaded = this.articles
                        .filter((article) => {
                            return article.news_status == "1";
                        })
                        .sort((a, b) => b.news_date - a.news_date)
                        .slice(0, 3); //取得最新三筆
                });
        },

        intscence() {
            var scene = document.getElementById("scene");
            var parallaxInstance = new Parallax(scene, {
                relativeInput: true,
                clipRelativeInput: true,
            });
        },
        calculateSectionOffsets() {
            let sections = document.getElementsByClassName("page");
            let length = sections.length;

            for (let i = 0; i < length; i++) {
                let sectionOffset = sections[i].offsetTop;
                this.offsets.push(sectionOffset);
            }
        },
        scrollToSection(id, force = false) {
            if (this.inMove && !force) return false;

            this.activeSection = id;
            this.inMove = true;

            document.getElementsByClassName("page")[id].scrollIntoView({
                behavior: "smooth",
            });

            setTimeout(() => {
                this.inMove = false;
            }, this.inMoveDelay);
        },
        handleMouseWheel: function (e) {
            if (e.wheelDelta < 120 && !this.inMove) {
                this.moveUp();
            } else if (e.wheelDelta > 120 && !this.inMove) {
                this.moveDown();
            }

            e.preventDefault();
            return false;
        },
        moveDown() {
            this.inMove = true;
            this.activeSection--;

            if (this.activeSection < 0)
                this.activeSection = this.offsets.length - 1;

            this.scrollToSection(this.activeSection, true);
        },
        moveUp() {
            this.inMove = true;
            this.activeSection++;

            if (this.activeSection > this.offsets.length - 1)
                this.activeSection = 0;

            this.scrollToSection(this.activeSection, true);
        },

        openLightbox(idx) {
            this.$refs.lightbox[idx].isShow = true;
        },
    },

    created() {
        this.getArticleList();
    },
};
</script>

<style lang="scss" scoped>
body {
    @include m {
        overflow-x: hidden;
    }
}
.sections-menu {
    position: fixed;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    z-index: 999;
    @include d {
        display: none;
    }

    .menu-point {
        width: 10px;
        height: 10px;
        background-color: $section-green;
        display: block;
        margin: 1rem 0;
        opacity: 0.6;
        transition: 0.4s ease all;
        cursor: pointer;
    }
    .menu-point.active {
        opacity: 1;
        transform: scale(1.5);
    }
}

.container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    background-image: url(@/assets/images/index/burning\ forest.jpg);
    @include bgSetting(cover, bottom);

    #scene {
        height: 100vh;
        user-select: none;
        .layer {
            position: absolute;
            width: 100%;
            @include d() {
            }
            @include m() {
            }
        }
        .layer:first-child {
            @include d {
                animation: layer 3s alternate infinite;
            }
        }
        .layer:nth-child(2) {
            margin-top: 32%;

            @include d() {
                margin-top: 85%;
                animation: layer2 3s alternate infinite;
            }
            @include m() {
                margin-top: 50vh;
            }
            img {
                width: fit-content;
            }
        }
        .layer:nth-of-type(3) {
            margin-left: -300px;

            @include d() {
                height: 100vh;
                animation: layer3 3s alternate-reverse infinite;

                img {
                    height: inherit;
                }
            }
            @include m() {
            }
        }
        .layer:nth-of-type(4) {
            margin-left: 200px;
            margin-top: -100px;
            animation: layer3 2s alternate-reverse infinite;
            @include d() {
                height: 100vh;

                img {
                    height: inherit;
                }
            }
            @include m() {
            }
        }
        .layer:nth-of-type(5) {
            margin-top: 32%;
            margin-left: -200px;

            @include d() {
                margin-top: 100%;
                margin-left: 250px;
                animation: layer 2s alternate-reverse infinite;
            }
            @include m() {
                margin-top: 65vh;
            }
        }
        .layer:nth-child(6) {
            margin-top: 28%;
            margin-left: 20%;
            width: 300px;
            animation: layer3 4s alternate infinite;
            @include d() {
                margin-top: 50vh;
                margin-left: 30%;
                width: 60vw;
            }
            @include m() {
                margin-top: 65vh;
                width: 50vw;
            }
            img {
                width: inherit;
                filter: drop-shadow(10px 10px 10px rgb(0, 0, 0));
            }
        }
        .layer:nth-child(7) {
            margin-left: -230px;
            margin-top: -20px;

            @include d() {
                height: 100vh;
                animation: layer2 5s alternate infinite;
                img {
                    height: inherit;
                    margin-left: -300px;
                }
            }
            @include m() {
                margin-left: -150px;
                margin-top: 0px;
            }
        }
        .layer:nth-child(8) {
            margin-top: 43%;
            margin-left: 10%;

            @include d() {
                margin-top: 150%;
                animation: layer 2s alternate infinite;
            }
            @include m() {
                margin-top: 65vh;
            }
        }
        .layer:nth-child(9) {
            margin-top: 15%;
            margin-left: 20%;
            filter: drop-shadow(5px 5px 1px rgba(7, 97, 125, 1));
            @include d() {
                margin-top: 20%;
                margin-left: 10%;
                text-align: left;
                animation: layer3 2s alternate infinite;
            }
            @include m() {
                margin-top: 60%;
                width: 250px;
                img {
                    width: inherit;
                }
            }
        }
        @keyframes layer {
            0% {
                transform: translate(45.5px, -3.5px);
            }
            100% {
                transform: translate(-45.5px, 3.5px);
            }
        }
        @keyframes layer2 {
            0% {
                transform: translate(15.5px, -2.5px);
            }
            100% {
                transform: translate(-15.5px, 2.5px);
            }
        }
        @keyframes layer3 {
            0% {
                transform: translate(-5px, 1.5px);
            }
            100% {
                transform: translate(5px, -1.5px);
            }
        }
    }
}
.page {
    @include size(100vw, 100vh);
    margin-top: 60px;
    display: flex;
    overflow-x: hidden;
    @include d {
        flex-direction: column;
    }

    .fire {
        @include size(50vw, 100vh);
        border-radius: 0 50% 50% 0;
        margin-top: 5vh;
        margin-left: 0;
        background-image: url(@/assets/images/index/forest-fire.jpg);
        transition: 2s;
        @include bgSetting(cover, bottom);
        @include d {
            @include size(100vw, 80vh);
            margin-top: 0;
        }
        @include m {
            @include size(100vw, 55%);
        }
        &:hover {
            transform: scale(1.05) translate(-20px, 20px);
            @include d {
                transform: scale(1.005) translate(-10px, 10px);
            }
            h2 {
                transform: translate(calc(85% + 40px), -40px);
                @include d {
                    transform: translate(10px, 10px);
                }
            }
        }
        h2 {
            font-size: 8vw;
            font-family: "Inkfree";
            -webkit-text-stroke: 3px #920202;
            -webkit-text-fill-color: #ffffff;
            margin-top: 35%;
            transform: translate(85%, 0);
            transition: 2s;
            @include d {
                font-size: 20vw;
                -webkit-text-stroke: 2px #920202;
                transform: translate(0, 30%);
            }
            @include m {
                -webkit-text-stroke: 1px $darkgreen;
                transform: translate(0, 50%);
            }
        }
    }
    .fire + p {
        margin-top: 65vh;
        width: 35vw;
        margin-left: 50px;

        @include d {
            margin-top: 20px;
            width: 75vw;
            margin-left: 5vw;
        }
        @include m {
            @include size(85vw, 45%);
        }
    }

    p {
        width: 35vw;
        text-align: left;
        font-size: $h4;
        line-height: 28px;
        @include rwd-h4;
        a {
            font-size: $h4;
        }

        @include d {
            width: 100%;
        }
    }
    .wedo {
        @include size(55vw, 95vh);
        border-radius: 0 0 0 50%;
        margin-left: 10vw;
        background-image: url(@/assets/images/index/koalahelping.jpg);
        transition: 2s;
        @include bgSetting(cover, right);
        @include d {
            @include size(100vw, 75%);
            background-attachment: local;
            @include bgSetting(cover, center left 80%);
        }
        @include m {
            @include bgSetting(240%, center left 70%);
            @include size(100vw, 55%);
        }

        h2 {
            font-family: "Inkfree";
            font-size: 8vw;
            -webkit-text-stroke: 3px $darkgreen;
            -webkit-text-fill-color: #ffffff;
            transform: translateX(-20vw);
            width: 120%;
            margin-top: 5%;
            transition: 2s;
            @include d {
                font-size: 13vw;
                margin-top: 15%;
                -webkit-text-stroke: 2px $darkgreen;
            }
            @include m {
                margin-top: 75%;
                -webkit-text-stroke: 1px $darkgreen;
            }
        }
        &:hover {
            transform: scale(1.05) translate(20px, -20px);
            @include d {
                transform: scale(1.005) translate(-10px, 10px);
            }
            h2 {
                transform: translate(calc(-20vw - 40px), 40px);
                @include d {
                    transform: translate(calc(-20vw), -20px);
                }
            }
        }
    }
    .wedo-p {
        transform: translateX(10vw);
        width: 35vw;
        text-align: left;
        margin-top: 60vh;
        @include d {
            @include size(70vw, 25%);
            margin-top: 0;
            transform: translateX(5vw);
        }
        @include m {
            width: 90vw;
            @include size(90vw, 45%);
        }

        p {
            margin-top: 0;
            a {
                font-size: $h4;
            }
        }
    }
}
.colorpage {
    width: 100vw;
    border-radius: 10%;
    background-color: $lightgreen;
    align-items: center;
    justify-content: center;

    .wesave-p {
        width: 50%;
        text-align: left;
        margin-left: 30px;
        @include d {
            width: 70%;
            margin-top: 50px;
            margin-left: 5vw;
        }
        @include m {
            width: 90%;
            margin-top: 20px;
            padding-bottom: 30px;
        }
        h2 {
            animation: moving 0.5s 3;
        }
    }
    .wesave-video {
        margin-left: 10vw;
        @include m {
            width: 80%;
            margin: 10px auto;
            iframe {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
        }
    }
}
.change {
    @include d {
        display: flex;
        flex-direction: column-reverse;
    }
}
.lightbox {
    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
}
.wrapper {
    margin-top: auto;
    margin-bottom: auto;
    h2 {
        font-size: 12vw;
        font-family: "Inkfree";
        color: $green;
    }
    .newscards {
        display: flex;
        width: 100%;
        height: 50vh;
        @include d {
            flex-direction: column;
            margin-bottom: 5vh;
        }

        .article {
            box-sizing: border-box;
            width: calc(33.333333% - 20px);
            height: 40vh;
            text-align: left;
            margin: 10px;
            cursor: pointer;
            @include d {
                width: 100%;
                height: 35vh;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            @include m {
                height: 15vh;
            }

            &:hover {
                box-shadow: 0px 0px 20px rgba(51, 113, 125, 0.45);
                .article-img {
                    transform: translate(65%, -20%) rotate(5deg);
                    @include d {
                        transform: translate(-10%, 0) rotate(5deg);
                    }
                }
            }

            p {
                font-size: $p;
                @include rwd-p;
                @include m {
                    line-height: 18px;
                }
            }
            .article-img {
                width: 55%;
                height: 25vh;
                transform: translate(65%, -20%);
                border-radius: 5%;
                background-size: cover;
                @include d {
                    height: 80%;
                    width: 25%;
                    transform: translate(-10%, 0);
                }
            }

            .font {
                margin-left: 20px;
                transform: translateY(-15%);
                @include d {
                    transform: translateY(0);
                    width: 75%;
                    margin-left: 10px;
                }
                @include m {
                    width: 95%;
                }
                .article-title {
                    font-size: $h4;
                    @include rwd-h4;
                    width: 90%;
                    color: $green;
                    font-weight: 700;
                }
                .date {
                    display: flex;
                    color: $lightgreen;
                    width: 50%;
                    @include m {
                        width: 40%;
                    }
                }
                .article-content {
                    width: 90%;
                    color: $font-color;
                    display: -webkit-inline-box;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    -webkit-line-clamp: 2;
                }
            }
        }
    }
}
.footer {
    background-color: $darkgreen;

    #footer {
        margin-top: auto;
    }
}
@keyframes moving {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-10px);
    }
}
</style>
