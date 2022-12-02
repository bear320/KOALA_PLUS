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
    </article>
</template>

<script>
import Header from "@/components/header.vue";
import one from "@/components/aboutUs/one.vue";
import two from "@/components/aboutUs/two.vue";
import three from "@/components/aboutUs/three.vue";
import four from "@/components/aboutUs/four.vue";
export default {
    components: {
        Header,
        one,
        two,
        three,
        four,
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
                padding: 20px;

                a {
                    margin: 10px 0;
                    display: block;
                    position: relative;
                }
            }
            .about-content {
                width: 80%;
                vertical-align: middle;
                padding: 20px;
                text-align: left;
            }
        }
        .highLight {
            color: $green;
            font-weight: 700;
            // pointer-events: none;
            @include borderLeft;
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
                width: 250px;
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
    }
}
</style>
