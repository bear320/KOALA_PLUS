<template>
    <Header />
    <div class="container">
        <div id="scene">
            <div class="layer" data-depth="0.5" data-friction-x="1">
                <img src="@/assets/images/index/star.png" />
            </div>
            <div class="layer" data-depth="1.5">
                <img src="@/assets/images/index/fireline.png" />
            </div>
            <div class="layer" data-depth="0.1">
                <img src="@/assets/images/index/treeblur.png" alt="" />
            </div>
            <div class="layer" data-depth="1.2" data-friction-x="1">
                <img src="@/assets/images/index/star.png" />
            </div>
            <div class="layer" data-depth="0.7" data-invert-x="false">
                <img src="@/assets/images/index/fireline2.png" />
            </div>
            <div class="layer" data-depth="0.1">
                <img src="@/assets/images/index/cryingkoala.png" />
            </div>
            <div class="layer" data-depth="0.3">
                <img src="@/assets/images/index/tree.png" alt="" />
            </div>
            <div class="layer" data-depth="2">
                <img src="@/assets/images/index/fireline.png" />
            </div>
            <h1 class="layer" data-depth="0.05">
                <img src="@/assets/images/index/logo.svg" />
            </h1>
        </div>
    </div>
    <section class="page">
        <div class="fire">
            <h2>Windfires</h2>
        </div>
        <p>
            森林野火造成成千上萬隻無尾熊喪命、受傷、流離失所。KOALA+致力於救助這些無尾熊，給它們一個能安心養傷、休息的空間。為此，我們需要像您這樣願意一起幫助無尾熊的人加入我們。KOALA+不僅僅是救助團體，更有豐富的教育意義，歡迎您加入我們一起認識無尾熊，幫助無尾熊!
        </p>
    </section>
    <section class="page change">
        <div class="wedo-p">
            <h2>我們能做什麼?</h2>
            <p>
                在KOALA+，我們能領養無尾熊，或捐款幫助無尾熊中心的營運。雖然領養無尾熊沒辦法讓您把她帶回家中一起居住，但這筆費用能讓無尾熊得到好的照顧和環境。另外，KOALA+將發行相應的尤加利葉遊戲幣給您，您可以在<a
                    href="/my-koala"
                    >My Koala遊戲區</a
                >養成無尾熊，陪他們長大。
            </p>
        </div>
        <div class="wedo">
            <h2>What can we do?</h2>
        </div>
    </section>
    <section class="page colorpage">
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
                KOALA+自成立起，已幫助非常多無尾熊度過森林野火的劫難，而這一路走來都是因為有許多善心人士溫暖的幫助，讓我們與所有無尾熊救助機構向您說聲感謝!您的幫助是我們所有救助行動的開端，如您需要領養證明書，可至<a
                    href="/member"
                    >會員中心-認養證明</a
                >免費下載，如您想看一看無尾熊們的生活環境，也可以來<a
                    href="/koala-park"
                    >預約導覽無尾熊園區</a
                >，我們由衷歡迎您的參訪，更別忘了<a href="/shop">周邊商城</a
                >有許多可愛的無尾熊周邊商品，商品售價的利潤將用於無尾熊救助行動，您購買可愛周邊的同時也是在幫助無尾熊!
            </p>
        </div>
    </section>
    <section class="page">
        <div class="wrapper">
            <h2>News</h2>
            <div class="newscards">
                <a
                    class="card article"
                    v-for="article in articles"
                    :key="article"
                >
                    <div
                        class="article-img"
                        :style="{
                            backgroundImage: 'url(' + article.img + ')',
                        }"
                    ></div>
                    <div class="font">
                        <p class="article-title">{{ article.title }}</p>
                        <div class="date">
                            <p class="article-tag">{{ article.tag }}</p>
                            <p class="article-date">{{ article.date }}</p>
                        </div>
                        <p class="article-content">
                            {{ article.content }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <Footer />
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import Parallax from "../../node_modules/parallax-js/src/parallax";
export default {
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            articles: [
                {
                    img: require("../assets/images/about/3.jpg"),
                    title: "一隻無尾熊寶寶出生了",
                    tag: "#最新消息",
                    date: "2022/12/25",
                    content:
                        "每年9到11月是無尾熊開始繁殖的交配季節，當無尾熊歲時就開始邁入性成熟年齡、......",
                },
                {
                    img: require("../assets/images/about/8.jpg"),
                    title: "園區公休通知",
                    tag: "#園區消息",
                    date: "2022/12/13",
                    content:
                        "因應園區大清潔及設施維修工程，KOALA+園區將於112/02/15~112/02/20公休6日......",
                },
                {
                    img: require("../assets/images/about/6.jpg"),
                    title: "寫扣好花錢呢",
                    tag: "#資金運用",
                    date: "2022/12/07",
                    content: "睡不飽就想吃東西，一直吃一直窮一直胖......",
                },
            ],
        };
    },
    mounted() {
        this.intscence();
    },
    methods: {
        intscence() {
            var scene = document.getElementById("scene");
            var parallaxInstance = new Parallax(scene, {
                relativeInput: true,
                clipRelativeInput: true,
            });
        },
    },
    destroyed() {},
};
</script>

<style lang="scss" scoped>
.container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    background-image: url(@/assets/images/index/burning\ forest.jpg);
    background-attachment: fixed;

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
        .layer:nth-child(2) {
            margin-top: 32%;
            @include d() {
                margin-top: 85%;
            }
            @include m() {
                margin-top: 55vh;
            }
            img {
                width: fit-content;
            }
        }
        .layer:nth-of-type(3) {
            margin-left: -300px;
            @include d() {
                height: 100vh;
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
            }
            @include m() {
                margin-top: 65vh;
            }
        }
        .layer:nth-child(6) {
            margin-top: 28%;
            margin-left: 20%;
            width: 300px;
            @include d() {
                margin-top: 50vh;
                margin-left: 30%;
                width: 60vw;
            }
            @include m() {
                margin-top: 60vh;
                width: 50vw;
            }
            img {
                width: inherit;
                filter: drop-shadow(10px 10px 10px rgb(0, 0, 0));
            }
        }
        .layer:nth-child(7) {
            margin-left: -230px;
            @include d() {
                height: 100vh;
                img {
                    height: inherit;
                    margin-left: -300px;
                }
            }
            @include m() {
                margin-left: -150px;
            }
        }
        .layer:nth-child(8) {
            margin-top: 43%;
            margin-left: 10%;
            @include d() {
                margin-top: 150%;
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
            }
            @include m() {
                margin-top: 60%;
                width: 250px;
                img {
                    width: inherit;
                }
            }
        }
    }
}
.page {
    @include size(100vw, 100vh);
    margin-top: 100px;
    display: flex;
    @include d {
        flex-direction: column;
    }

    .fire {
        @include size(50vw, 100vh);
        border-radius: 0 50% 50% 0;
        margin-top: 5vh;
        margin-left: 0;
        background-image: url(@/assets/images/index/forest-fire.jpg);
        // background-attachment: fixed;
        transition: 2s;
        @include bgSetting(cover, bottom);
        @include d {
            @include size(100vw, 80vh);
            margin-top: 0;
        }
        &:hover {
            transform: scale(1.05) translate(-20px, 20px);
            h2 {
                transform: translate(40px, -40px);
            }
        }
        h2 {
            font-size: 8vw;
            font-family: "Inkfree";
            -webkit-text-stroke: 3px #920202;
            -webkit-text-fill-color: #ffffff;
            margin-top: 55%;
            transition: 2s;
            @include d {
                font-size: 20vw;
                -webkit-text-stroke: 2px #920202;
            }
            @include m {
                -webkit-text-stroke: 1px $darkgreen;
            }
        }
    }
    .fire + p {
        margin-top: 80vh;
        width: 30vw;

        @include d {
            margin-top: 20px;
            width: 75vw;
            margin-left: 5vw;
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
        // background-attachment: fixed;
        transition: 2s;
        @include bgSetting(cover, right);
        @include d {
            @include size(100vw, 75vh);
            background-attachment: local;
            @include bgSetting(160%, center left 80%);
        }
        @include m {
            @include bgSetting(240%, center left 70%);
        }
        &:hover {
            transform: scale(1.05) translate(20px, -20px);
            h2 {
                transform: translate(calc(-20vw - 40px), 40px);
            }
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
                -webkit-text-stroke: 2px $darkgreen;
            }
            @include m {
                -webkit-text-stroke: 1px $darkgreen;
            }
        }
    }
    .wedo-p {
        transform: translateX(10vw);
        width: 35vw;
        text-align: left;
        margin-top: 60vh;
        @include d {
            width: 70vw;
            margin-top: 0;
            transform: translateX(5vw);
        }
        @include m {
            width: 90vw;
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
        }
        h2 {
            animation: moving 0.5s 3;
        }
    }
    .wesave-video {
        margin-left: 10vw;
        @include m {
            width: 80%;
            margin-left: 0;
            iframe {
                width: fit-content;
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
.wrapper {
    h2 {
        font-size: 12vw;
        font-family: "Inkfree";
        color: $green;
        @include d {
            margin-top: 20vh;
        }
    }
    .newscards {
        display: flex;
        width: 100%;
        height: 50vh;
        margin-top: 10vh;
        @include d {
            flex-direction: column;
            margin-top: 5vh;
        }

        .article {
            box-sizing: border-box;
            width: calc(33.333333% - 20px);
            height: 40vh;
            text-align: left;
            margin: 10px;
            @include d {
                width: 100%;
                height: 35vh;
                display: flex;
                align-items: center;
                justify-content: space-between;
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
                .article-title {
                    font-size: $h4;
                    @include rwd-h4;
                    width: 90%;
                }
                .date {
                    display: flex;
                    color: $lightgreen;
                    width: 50%;
                    @include m {
                        width: 70%;
                    }
                }
                .article-content {
                    width: 90%;
                    color: $font-color;
                }
            }
        }
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
