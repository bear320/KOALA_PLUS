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
    <div></div>
</template>

<script>
import Header from "@/components/header.vue";
import Parallax from "../../node_modules/parallax-js/src/parallax";
export default {
    components: {
        Header,
    },
    data() {
        return {};
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
            padding-top: 32%;
            @include d() {
                padding-top: 85%;
            }
            @include m() {
                padding-top: 55vh;
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
            margin-top: 35%;
            margin-left: -200px;
            @include d() {
                margin-top: 100%;
            }
            @include m() {
                margin-top: 65vh;
            }
        }
        .layer:nth-child(6) {
            margin-top: 32%;
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
            @include d() {
                margin-top: 110%;
            }
            @include m() {
                margin-top: 75vh;
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
</style>
