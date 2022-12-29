<template>
    <header id="navbar">
        <nav class="wrapper">
            <div>
                <div class="hamburger" @click="toggle = !toggle">
                    <div class="hb"></div>
                    <div class="hb"></div>
                    <div class="hb"></div>
                </div>
                <div class="logo">
                    <router-link to="/home"
                        ><img src="../assets/images/logo.svg" alt="KOALA+"
                    /></router-link>
                </div>
            </div>
            <div>
                <ul class="list" :class="toggle ? 'show' : ''">
                    <li v-for="item in items" :key="item">
                        <router-link :to="`/${item['source']}`">{{
                            item["name"]
                        }}</router-link>
                    </li>
                    <li v-show="showKoala" @click="clickToPlay">
                        <div class="playgame">
                            <img
                                src="../assets/images/header/playgame.svg"
                                alt=""
                            />
                        </div>
                    </li>
                </ul>
                <ul class="icon">
                    <li @click="clickToCart">
                        <a>
                            <Icon type="md-cart" />
                        </a>
                    </li>
                    <li v-if="!$store.state.user">
                        <router-link to="/login">
                            <Icon type="md-log-in" />
                        </router-link>
                    </li>
                    <li v-else>
                        <router-link to="/member">
                            <Icon type="md-person" />
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
const Animations = {
    fadeOut(element) {
        element.classList.add("fadeOut");
        setTimeout(function () {
            element.style.display = "none";
        }, 500);
    },
    fadeIn(element) {
        element.style.display = "block";
        setTimeout(function () {
            element.classList.remove("fadeOut");
        }, 10);
    },
};
export default {
    porps: {},
    data() {
        return {
            items: [
                { name: "資助認養", source: "support" },
                { name: "週邊商城", source: "shop" },
                { name: "無尾熊園區", source: "koala-park" },
                { name: "關於我們", source: "about" },
                { name: "無尾熊百科", source: "about-koala" },
            ],
            toggle: false,
            i: 0,
            curWidth: window.innerWidth,
        };
    },
    mounted() {
        let before = window.scrollY;
        window.addEventListener("scroll", function () {
            let after = window.scrollY;
            if (after - before > 300) {
                Animations.fadeOut(document.querySelector("#navbar"));
                before = after;
            } else if (before - after > 100) {
                Animations.fadeIn(document.querySelector("#navbar"));
                before = after;
            }
        });
    },
    computed: {
        showKoala() {
            if (this.$route.path === "/my-koala") {
                return this.curWidth <= 1200 ? true : false;
            } else return true;
        },
    },
    methods: {
        changeCurWidth() {
            this.curWidth = window.innerWidth;
        },
        clickToCart() {
            if (this.$store.state.user == null) {
                this.open(false, `請登入會員`, ``);
                return;
            } else {
                if (this.$store.state.cart.length > 0) {
                    this.$router.push({ path: "/cart1" });
                } else {
                    this.open(false, `目前購物車是空的唷!`, "");
                }
            }
        },
        clickToPlay() {
            if (this.$store.state.user == null) {
                this.open(
                    false,
                    `請登入會員`,
                    `需先登入會員才可進行遊玩，尚未註冊會員者至登入頁面立即註冊！`
                );
                return;
            } else {
                this.$router.push({ path: "/my-koala" });
            }
        },
        open(nodesc, title, desc) {
            this.$Notice.open({
                title: `${title}`,
                desc: nodesc ? "" : `${desc}`,
            });
        },
    },
    created() {
        window.addEventListener("resize", this.changeCurWidth);
    },
};
</script>

<style lang="scss" scoped>
#navbar {
    transition: opacity 1s ease;
    opacity: 1;
}

#navbar.fadeOut {
    opacity: 0;
}
header {
    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
    z-index: 998;
    position: fixed;
    background-color: #fff;
    width: 100%;
    top: 0;
    nav {
        @include size(100%, 60px);
        box-sizing: border-box;
        display: flex;
        justify-content: space-between;

        .hamburger {
            display: none;
        }
        .logo {
            @include size(100%, 100%);

            img {
                @include size(100%, 100%);
            }
        }
        div {
            display: flex;

            .list {
                display: flex;
                align-items: center;
                li:not(:last-child) {
                    a {
                        font-weight: bold;
                        color: $darkgreen;
                        height: 100%;
                        padding: 20px;

                        &:hover {
                            color: $green;
                        }

                        &.router-link-exact-active {
                            color: $green;

                            &::before {
                                content: "　";
                                width: 30px;
                                background-image: url(../assets/images/header/Leaf.svg);
                                background-size: contain;
                                background-repeat: no-repeat;
                                margin-right: 10px;
                                position: absolute;
                                transform: translate(-25px, 0);
                            }
                        }
                    }
                }
                li:last-child {
                    a {
                        height: 100%;
                        padding: 20px;
                    }
                }
                .playgame {
                    position: fixed;
                    top: 80%;
                    user-select: none;
                    cursor: pointer;
                    left: 85%;
                    @include size(150px, auto);

                    img {
                        width: 100%;
                    }
                }
            }
            .icon {
                display: flex;
                height: 60px;
                li {
                    @include size(40px, 60px);

                    .ivu-icon {
                        margin-top: 50%;
                        transform: scale(2);
                        color: #333;
                        &:hover {
                            color: $green;
                        }
                    }
                }
            }
        }
    }
}

@media screen and (max-width: 1200px) {
    header {
        nav {
            .hamburger {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                @include size(20px, 20px);
                margin: auto 30px;
                .hb {
                    border-top: solid 5px $green;
                }
            }
            .logo {
                @include size(50%, auto);
            }
            div {
                .list {
                    @include size(100vw, 70vh);
                    flex-direction: column;
                    background-color: rgba(190, 214, 213, 0.6);
                    backdrop-filter: blur(10px);
                    @include absolute(60px, 0, 0, 0);
                    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
                    transition: 1s;
                    justify-content: space-around;
                    transform: translate(-200%, 0);

                    li {
                        padding: 10px 0;
                        display: block;
                        width: 100%;

                        .playgame {
                            position: relative;
                            top: auto;
                            left: auto;
                            width: 15vw;
                            margin: 0 30%;

                            img {
                                width: initial;
                            }
                        }
                    }
                }
                .show {
                    transform: translate(0, 0);
                }
            }
        }
    }
}
@media (max-width: 768px) {
    header nav .hamburger {
        margin: auto 15px;
    }
    .playgame {
        margin: 0 15%;
    }
}
</style>
