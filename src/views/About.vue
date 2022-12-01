<template>
    <Header />
    <article>
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' + require('@/assets/images/about/banner.jpg') + ')',
            }"
        ></div>
        <section>
            <h1>About Us</h1>
            <div class="container about">
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
                padding: 10px;

                a {
                    margin: 10px 0;
                    display: block;
                    position: relative;
                }
            }
            .about-content {
                width: 80%;
                vertical-align: middle;
                padding: 40px;
                text-align: left;
            }
        }
        .highLight {
            color: $green;
            font-weight: 700;
            // pointer-events: none;
            @include borderLeft;
        }
    }
}
</style>
