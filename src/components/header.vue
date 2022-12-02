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
                    <router-link :to="{ path: '/home' }"
                        ><img src="../assets/images/logo.svg" alt="KOALA+"
                    /></router-link>
                </div>
            </div>
            <div>
                <ul class="list" :class="toggle ? 'show' : ''">
                    <li v-for="item in items" :key="item">
                        <router-link :to="{ path: item['sourc'] }">{{
                            item["name"]
                        }}</router-link>
                    </li>
                    <li>
                        <router-link
                            :to="{ path: 'my-koala' }"
                            class="playgame"
                        >
                            <img
                                src="../assets/images/header/playgame.svg"
                                alt=""
                            />
                        </router-link>
                    </li>
                </ul>
                <ul class="icon">
                    <li>
                        <router-link :to="{ path: '/cart1' }">
                            <Icon type="md-cart" />
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ path: '/member' }">
                            <Icon type="md-person" />
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    porps: {},
    data() {
        return {
            items: [
                { name: "資助認養", sourc: "all-koalas" },
                { name: "周邊商城", sourc: "shop" },
                { name: "無尾熊園區", sourc: "koala-park" },
                { name: "關於我們", sourc: "about" },
                { name: "無尾熊百科", sourc: "about-koala" },
            ],
            toggle: true,
            i: 0,
        };
    },
};
</script>

<style lang="scss" scoped>
header {
    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
    z-index: 999;
    position: fixed;
    background-color: #fff;
    width: 100vw;
    nav {
        @include size(100%, 60px);
        box-sizing: border-box;
        display: flex;
        justify-content: space-between;

        .hamburger {
            display: none;
        }
        .logo {
            @include size(100%, auto);

            img {
                @include size(100%, 100%);
            }
        }
        div {
            display: flex;

            .list {
                display: flex;
                align-items: center;
                li {
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
                .playgame {
                    position: fixed;
                    top: 80%;
                    user-select: none;
                    @include size(180px, auto);

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
                margin: auto 20%;
                .hb {
                    border-top: solid 5px $green;
                }
            }
            .logo {
                @include size(50%, auto);
            }
            div {
                .list {
                    @include size(100vw, 40vh);
                    flex-direction: column;
                    background-color: rgba(190, 214, 213, 0.6);
                    backdrop-filter: blur(10px);
                    @include absolute(60px, 0, 0, 0);
                    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
                    transition: 1s;
                    justify-content: space-around;

                    li {
                        transform: translate(0, 50%);

                        .playgame {
                            position: relative;
                            top: auto;
                            left: auto;
                            width: 15vw;
                            margin: auto;
                            transform: translate(0, -20%);

                            img {
                                width: fit-content;
                            }
                        }
                    }
                }
                .show {
                    transform: translate(-200%, 0);
                }
            }
        }
    }
}
@media (max-width: 768px) {
    header nav .hamburger {
        margin: auto 10%;
    }
}
</style>
