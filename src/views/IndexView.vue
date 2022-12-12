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
            <div
                class="layer frontDesk link"
                data-depth="0.5"
                data-friction-x="1"
            >
                <router-link to="/home">前台</router-link>
            </div>
            <div class="layer Backstage link" data-depth="0.5">
                <router-link to="/bs-login"> 後台 </router-link>
            </div>

            <h1 class="layer logo" data-depth="1.5">
                <img src="@/assets/images/index/logo.svg" />
            </h1>
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
        this.calculateSectionOffsets();
        window.addEventListener("mousewheel", this.handleMouseWheel, {
            passive: false,
        });

        window.addEventListener("touchstart", this.touchStart, {
            passive: false,
        }); // 手機
        window.addEventListener("touchmove", this.touchMove, {
            passive: false,
        }); // 手機
    },
    methods: {
        intscence() {
            var scene = document.getElementById("scene");
            var parallaxInstance = new Parallax(scene, {
                relativeInput: true,
                clipRelativeInput: true,
            });
        },
        calculateSectionOffsets() {
            let sections = document.getElementsByTagName("section");
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

            document.getElementsByTagName("section")[id].scrollIntoView({
                behavior: "smooth",
            });

            setTimeout(() => {
                this.inMove = false;
            }, this.inMoveDelay);
        },
        handleMouseWheel: function (e) {
            if (e.wheelDelta < 30 && !this.inMove) {
                this.moveUp();
            } else if (e.wheelDelta > 30 && !this.inMove) {
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
        touchStart(e) {
            e.preventDefault();

            this.touchStartY = e.touches[0].clientY;
        },
        touchMove(e) {
            if (this.inMove) return false;
            e.preventDefault();

            const currentY = e.touches[0].clientY;

            if (this.touchStartY < currentY) {
                this.moveDown();
            } else {
                this.moveUp();
            }

            this.touchStartY = 0;
            return false;
        },
    },
    destroyed() {
        window.removeEventListener("mousewheel", this.handleMouseWheel, {
            passive: false,
        });
        window.removeEventListener("touchstart", this.touchStart); // 手機
        window.removeEventListener("touchmove", this.touchMove); //手機
    },
};
</script>

<style lang="scss" scoped>
.container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    background-image: url(@/assets/images/member/indexkoalabgimg.jpeg);
    @include bgSetting(cover, bottom 20%);
    #scene {
        height: 100vh;
        user-select: none;
        .layer {
            position: absolute;
            // width: 100%;
            @include d() {
            }
            @include m() {
            }
        }
        .logo {
            margin-top: 5%;
            margin: 0 auto;
            filter: drop-shadow(5px 5px 1px rgba(7, 97, 125, 1));
        }
        .frontDesk {
            margin-top: 5%;
            margin: 0 auto;
        }
        .backstage {
            margin-top: 43%;
        }
    }
}
.sections-menu {
    position: fixed;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    z-index: 997;
}
.sections-menu .menu-point {
    width: 10px;
    height: 10px;
    background-color: $section-green;
    display: block;
    margin: 1rem 0;
    opacity: 0.6;
    transition: 0.4s ease all;
}
.sections-menu .menu-point.active {
    opacity: 1;
    transform: scale(1.5);
}

.link {
    color: #337a7d;
    background-color: #fbfafa;
    opacity: 0.7;
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
</style>
