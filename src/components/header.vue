<template>
    <header>
        <nav class="container">
            <div class="hamburger" @click="toggle = !toggle">
                <div class="hb"></div>
                <div class="hb"></div>
                <div class="hb"></div>
            </div>
            <div class="logo">
                <router-link :to="{ path: '/home' }"
                    ><img src="../img/logo.svg" alt="KOALA+"
                /></router-link>
            </div>
            <div>
                <ul class="list" :class="toggle ? 'show' : ''">
                    <li v-for="item in items" :key="item">
                        <router-link :to="{ path: item['sourc'] }">{{
                            item["name"]
                        }}</router-link>
                    </li>
                    <li>
                        <router-link :to="{ path: 'MyKoala' }" class="playgame">
                            <img src="../img/playgame.svg" alt="" />
                        </router-link>
                    </li>
                </ul>
                <ul class="icon">
                    <li>
                        <router-link :to="{ path: '/Cart1' }">
                            <Icon type="md-cart" />
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ path: '/Member' }">
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
                { name: "資助認養", sourc: "AllKoalas" },
                { name: "周邊商城", sourc: "Shop" },
                { name: "無尾熊園區", sourc: "KoalaPark" },
                { name: "關於", sourc: "About" },
                { name: "無尾熊百科", sourc: "AboutKoala" },
            ],
            toggle: false,
        };
    },
};
</script>

<style lang="scss" scoped>
header {
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    z-index: 999;
    nav {
        @include size(100%, 60px);
        box-sizing: border-box;
        display: flex;
        justify-content: space-between;

        .hamburger {
            display: none;
        }
        .logo {
            @include size(12%, auto);
            margin-left: 5%;

            img {
                @include size(100%, 100%);
            }
        }
        div {
            display: flex;

            .list {
                display: flex;
                li {
                    padding: 20px;
                    a {
                        font-size: 1.2rem;

                        &:hover {
                            color: $green;
                        }
                    }
                }
                .playgame {
                    position: fixed;
                    top: 80%;
                    left: 80%;
                    @include size(120px, auto);

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

@media screen and (max-width: 1199px) {
    header {
        nav {
            .hamburger {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                @include size(20px, 20px);
                .hb {
                    border-top: solid 5px $green;
                }
            }
            .list {
                @include size(100%, 70%);
                flex-direction: column;
                background-color: #fff;
            }
        }
    }
}
</style>
