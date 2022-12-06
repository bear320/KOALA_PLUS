<template>
    <header id="backStage_navbar">
        <nav class="wrapper">
            <div>
                <div class="hamburger" @click="toggle = !toggle">
                    <div class="hb"></div>
                    <div class="hb"></div>
                    <div class="hb"></div>
                </div>
                <div class="logo">
                    <router-link to="/bs-index">
                        <!-- src="../assets/images/LogobackStagelogo.svg" -->
                        <img
                            alt="KOALA+"
                            src="@/assets/images/LogobackStagelogo.svg"
                        />
                    </router-link>
                </div>
            </div>
            <div>
                <ul class="list" :class="toggle ? 'show' : ''">
                    <li v-for="item in items" :key="item">
                        <router-link :to="`/${item['source']}`">{{
                            item["name"]
                        }}</router-link>
                    </li>
                    <!-- <li>
                        <router-link to="/my-koala" class="playgame"> -->
                    <!-- <img
                                src="../assets/images/header/playgame.svg"
                                alt=""
                            /> -->
                    <!-- </router-link>
                    </li> -->
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    data() {
        return {
            items: [
                { name: "公告管理", source: "bs-article-list" },
                { name: "園區導覽管理", source: "bs-booking-list" },
                { name: "會員管理", source: "bs-member-list" },
                { name: "無尾熊管理", source: "bs-koala-list" },
                { name: "資助認養管理", source: "bs-support-list" },
                { name: "商品管理", source: "bs-product-list" },
                { name: "訂單管理", source: "bs-order-list" },
                { name: "權限管理", source: "bs-admin-list" },
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
    background-color: $darkgreen;
    width: 100%;

    nav {
        @include size(100%, 60px);
        box-sizing: border-box;
        display: flex;
        justify-content: space-around;
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
                    &:hover {
                        color: $darkgreen;
                    }

                    a {
                        font-weight: bold;
                        color: #ffffff;
                        padding: 20px;
                        height: 60px;
                        vertical-align: top;
                        display: inline-block;

                        &:hover {
                            color: $darkgreen;
                            background-color: #ffffff;
                        }

                        &.router-link-exact-active {
                            color: $darkgreen;
                            background-color: #ffffff;
                            &::before {
                                content: "　";
                                width: 30px;
                                // background-image: url(../assets/images/header/Leaf.svg);
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
</style>
