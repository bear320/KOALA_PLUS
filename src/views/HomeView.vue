<template>
    <!-- <Header /> -->
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
            <div class="layer" data-depth="0.05">
                <img src="@/assets/images/index/logo.svg" />
            </div>
        </div>
    </div>
    <div>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Necessitatibus voluptate quod ducimus iste voluptatem dolorem
            asperiores similique! Adipisci reprehenderit minus modi corrupti
            voluptatum impedit placeat, rerum, cum enim totam voluptas! Lorem
            ipsum dolor sit, amet consectetur adipisicing elit. Dicta eius ipsam
            voluptate laudantium nostrum fuga facilis fugiat cumque asperiores
            architecto eligendi veritatis ad cum labore rerum, assumenda
            aspernatur? Voluptatibus, illo? Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Necessitatibus voluptate quod ducimus
            iste voluptatem dolorem asperiores similique! Adipisci reprehenderit
            minus modi corrupti voluptatum impedit placeat, rerum, cum enim
            totam voluptas! Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Dicta eius ipsam voluptate laudantium nostrum fuga facilis
            fugiat cumque asperiores architecto eligendi veritatis ad cum labore
            rerum, assumenda aspernatur? Voluptatibus, illo?Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Necessitatibus voluptate quod
            ducimus iste voluptatem dolorem asperiores similique! Adipisci
            reprehenderit minus modi corrupti voluptatum impedit placeat, rerum,
            cum enim totam voluptas! Lorem ipsum dolor sit, amet consectetur
            adipisicing elit. Dicta eius ipsam voluptate laudantium nostrum fuga
            facilis fugiat cumque asperiores architecto eligendi veritatis ad
            cum labore rerum, assumenda aspernatur? Voluptatibus, illo?Lorem
            ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus
            voluptate quod ducimus iste voluptatem dolorem asperiores similique!
            Adipisci reprehenderit minus modi corrupti voluptatum impedit
            placeat, rerum, cum enim totam voluptas! Lorem ipsum dolor sit, amet
            consectetur adipisicing elit. Dicta eius ipsam voluptate laudantium
            nostrum fuga facilis fugiat cumque asperiores architecto eligendi
            veritatis ad cum labore rerum, assumenda aspernatur? Voluptatibus,
            illo?Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Necessitatibus voluptate quod ducimus iste voluptatem dolorem
            asperiores similique! Adipisci reprehenderit minus modi corrupti
            voluptatum impedit placeat, rerum, cum enim totam voluptas! Lorem
            ipsum dolor sit, amet consectetur adipisicing elit. Dicta eius ipsam
            voluptate laudantium nostrum fuga facilis fugiat cumque asperiores
            architecto eligendi veritatis ad cum labore rerum, assumenda
            aspernatur? Voluptatibus, illo?Lorem ipsum dolor sit amet
            consectetur adipisicing elit. Necessitatibus voluptate quod ducimus
            iste voluptatem dolorem asperiores similique! Adipisci reprehenderit
            minus modi corrupti voluptatum impedit placeat, rerum, cum enim
            totam voluptas! Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Dicta eius ipsam voluptate laudantium nostrum fuga facilis
            fugiat cumque asperiores architecto eligendi veritatis ad cum labore
            rerum, assumenda aspernatur? Voluptatibus, illo?Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Necessitatibus voluptate quod
            ducimus iste voluptatem dolorem asperiores similique! Adipisci
            reprehenderit minus modi corrupti voluptatum impedit placeat, rerum,
            cum enim totam voluptas! Lorem ipsum dolor sit, amet consectetur
            adipisicing elit. Dicta eius ipsam voluptate laudantium nostrum fuga
            facilis fugiat cumque asperiores architecto eligendi veritatis ad
            cum labore rerum, assumenda aspernatur? Voluptatibus, illo?Lorem
            ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus
            voluptate quod ducimus iste voluptatem dolorem asperiores similique!
            Adipisci reprehenderit minus modi corrupti voluptatum impedit
            placeat, rerum, cum enim totam voluptas! Lorem ipsum dolor sit, amet
            consectetur adipisicing elit. Dicta eius ipsam voluptate laudantium
            nostrum fuga facilis fugiat cumque asperiores architecto eligendi
            veritatis ad cum labore rerum, assumenda aspernatur? Voluptatibus,
            illo?
        </p>
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
        .layer {
            position: absolute;
            width: 100%;
        }
        .layer:first-child {
            margin-top: -50px;
        }
        .layer:nth-child(2) {
            padding-top: 32%;
            img {
                width: fit-content;
            }
        }
        .layer:nth-of-type(3) {
            margin-left: -300px;
        }
        .layer:nth-of-type(4) {
            margin-top: 35%;
            margin-left: -200px;
        }
        .layer:nth-child(5) {
            margin-top: 32%;
            margin-left: 20%;
            width: 300px;
            img {
                width: inherit;
            }
        }
        .layer:nth-child(6) {
            margin-left: -230px;
        }
        .layer:nth-child(7) {
            margin-top: 43%;
        }
        .layer:nth-child(8) {
            margin-top: 15%;
            margin-left: 20%;
            filter: drop-shadow(5px 5px 1px rgba(7, 97, 125, 1));
        }
    }
}
</style>
