<template>
    <header id="backStage_navbar">
        <Menu mode="horizontal" active-name="1" class="headernav">
            <MenuItem name="9" class="logoli">
                <router-link to="/my-koala" class="routerlink logo">
                    <img src="@/assets/images/bglogo.svg" alt="KOALA+" />
                </router-link>
            </MenuItem>
            <Submenu name="1">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        公告管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">新增文章</MenuItem>
                </router-link>
            </Submenu>
            <Submenu name="2">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        園區導覽管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">預約管理</MenuItem>
                </router-link>
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">新增休館日</MenuItem>
                </router-link>
            </Submenu>
            <Submenu name="3">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        會員管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">黑名單明細</MenuItem>
                </router-link>
            </Submenu>
            <Submenu name="4">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        無尾熊管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">資訊上架</MenuItem>
                </router-link>
            </Submenu>
            <Submenu name="5">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        認養訂單管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">認養總覽</MenuItem>
                </router-link>
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">資訊統計</MenuItem>
                </router-link>
            </Submenu>
            <Submenu name="6">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        商品管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">商品上架</MenuItem>
                </router-link>
            </Submenu>
            <MenuItem name="7">
                <router-link to="/my-koala" class="routerlink">
                    訂單管理
                </router-link>
            </MenuItem>

            <Submenu name="8" class="Submenu">
                <template #title>
                    <router-link to="/my-koala" class="routerlink">
                        權限管理
                    </router-link></template
                >
                <router-link to="/my-koala" class="routerlink">
                    <MenuItem name="3-1">新增管理員帳戶</MenuItem>
                </router-link>
            </Submenu>
        </Menu>
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
    // #backStage_navbar {
    box-shadow: 0px 4px 4px 0px rgba(130, 130, 130, 0.25);
    z-index: 999;
    position: fixed;
    background-color: $darkgreen;
    width: 100%;

    .headernav {
        // color: #ffffff;
        background-color: $darkgreen;
        @include size(100%, 60px);
        box-sizing: border-box;
        display: flex;
        justify-content: space-around;
        // .logoli {
        // text-align: center;
        // }
        .logo {
            // @include size(100%, 100%);
            text-align: center;

            img {
                @include size(100%, 100%);
            }
        }
        .routerlink {
            color: #ffffff;
        }
        .ivu-menu-item:hover {
            // color: $darkgreen;
            border-bottom: 2px solid #ffffff;
        }
        .ivu-menu-submenu:hover {
            // color: $darkgreen;
            border-bottom: 2px solid #ffffff;
        }

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
            .routerlink {
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
</style>
