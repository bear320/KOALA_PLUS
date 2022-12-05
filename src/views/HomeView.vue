<template>
    <Header />
    <div class="container">
        <ul id="scene">
            <li class="layer">
                <img src="" alt="" />
            </li>
        </ul>
    </div>
</template>

<script>
// @ is an alias to /src
/* import HelloWorld from "@/components/HelloWorld.vue"; */

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
}
</style>
