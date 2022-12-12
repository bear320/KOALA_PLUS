<template>
    <div class="sections-menu">
        <span
            class="menu-point"
            v-bind:class="{ active: activeSection == index }"
            v-on:click="scrollToSection(index)"
            v-for="(offset, index) in offsets"
            v-bind:key="index"
            v-title="'Go to section ' + (index + 1)"
        >
        </span>
    </div>
    <div class="container">
        <div id="scene">
            <div class="bg" data-depth="0.2"></div>
            <h1 class="layer logo" data-depth="0.5">
                <img src="@/assets/images/index/logo.svg" />
            </h1>
        </div>
        <div class="link_group">
            <div class="frontDesk link">
                <router-link to="/home">前台</router-link>
            </div>
            <div class="Backstage link">
                <router-link to="/bs-login"> 後台 </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import Parallax from "../../node_modules/parallax-js/src/parallax";
export default {
    components: {
        // Header,
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

        destroyed() {},
    },
};
</script>

<style lang="scss" scoped>
.container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    background-image: url(@/assets/images/member/indexkoalabgimg.jpeg);
    @include bgSetting(cover, bottom 10%);
    #scene {
        height: 30vh;
        user-select: none;
        .layer {
            position: absolute;
            @include d() {
            }
            @include m() {
            }
        }
        .logo {
            margin-top: 3% !important;
            left: 33% !important;
            margin: 0 auto;
            filter: drop-shadow(5px 5px 1px rgba(7, 97, 125, 1));
        }
        .bg {
            width: 100%;
            height: 100vh;
            margin-top: 5%;
            overflow: hidden;
            background-image: url(@/assets/images/member/transparentFog03.png);
            @include bgSetting(cover, bottom 10%);
        }
    }

    .link_group {
        display: flex;
        justify-content: space-around;
        .link {
            color: #337a7d;
            background-color: #fbfafa;
            opacity: 0.61;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            text-align: center;
            position: relative;
            a {
                display: inline-block;
                position: absolute;
                font-size: 50px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    }
}
</style>
