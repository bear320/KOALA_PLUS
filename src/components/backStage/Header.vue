<template>
    <Menu
        mode="horizontal"
        v-color="'#fff'"
        v-bg-color="'#2e382e'"
        class="fixed"
    >
        <div class="wrapper navbar">
            <!-- <MenuItem name="1" v-color="'#fff'">
                <router-link to="/bs-index"> 首頁 </router-link>
            </MenuItem> -->
            <Submenu name="1" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-index">首頁</router-link>
                </template>
                <MenuItem name="1-1">
                    <router-link to="/home">前台首頁</router-link>
                </MenuItem>
            </Submenu>
            <Submenu name="2" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-article-list">公告管理</router-link>
                </template>
                <MenuItem name="2-1">
                    <router-link to="/bs-article-add">新增公告</router-link>
                </MenuItem>
            </Submenu>
            <Submenu name="3" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-booking-list">
                        園區導覽管理
                    </router-link>
                </template>
                <MenuItem name="3-1">
                    <router-link to="/bs-booking-dayoff">
                        新增休館日期
                    </router-link>
                </MenuItem>
            </Submenu>
            <Submenu name="4" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-member-list">會員管理</router-link>
                </template>
                <MenuItem name="4-1">
                    <router-link to="/bs-member-blacklist">
                        黑名單
                    </router-link>
                </MenuItem>
            </Submenu>
            <Submenu name="5" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-koala-list">無尾熊管理</router-link>
                </template>
                <MenuItem name="5-1">
                    <router-link to="/bs-koala-add">新增無尾熊</router-link>
                </MenuItem>
            </Submenu>
            <Submenu name="6" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-support-list"
                        >資助認養管理</router-link
                    >
                </template>
                <MenuItem name="6-1">
                    <router-link to="/bs-support-statistic"
                        >數據統計</router-link
                    >
                </MenuItem>
            </Submenu>
            <Submenu name="7" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-product-list">商品管理</router-link>
                </template>
                <MenuItem name="7-1">
                    <router-link to="/bs-product-add">新增商品</router-link>
                </MenuItem>
                <MenuItem name="7-2">
                    <router-link to="/bs-coupon-list">優惠券管理</router-link>
                </MenuItem>
            </Submenu>
            <MenuItem name="8" v-color="'#fff'">
                <router-link to="/bs-order-list">訂單管理</router-link>
            </MenuItem>
            <Submenu name="9" v-color="'#fff'">
                <template #title>
                    <router-link to="/bs-admin-list">權限管理</router-link>
                </template>
                <MenuItem name="9-1">
                    <router-link to="/bs-admin-add">新增管理員</router-link>
                </MenuItem>
            </Submenu>
            <MenuItem name="10" v-color="'#fff'">
                <router-link to="">登出</router-link>
            </MenuItem>
        </div>
    </Menu>
</template>

<script>
export default {
    data() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
.fixed {
    position: fixed;
    width: 100%;
    margin: 0 auto;
    background-color: $darkgreen;
}
.navbar {
    display: flex;
    justify-content: space-between;
    li.ivu-menu-item {
        position: relative;
        &::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 0;
            border-bottom: 2px solid #fff;
            bottom: 3px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
            display: none;
        }
        &:hover {
            border: none;
            &::after {
                display: block;
            }
        }
        a {
            color: #fff;
        }
    }
    li.ivu-menu-submenu {
        position: relative;
        &::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 0;
            border-bottom: 2px solid #fff;
            bottom: 3px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 999;
            display: none;
        }
        &:hover {
            border: none;
            &::after {
                display: block;
            }
        }
        .ivu-menu-submenu-title {
            a {
                color: #fff;
            }
        }
        .ivu-select-dropdown {
            .ivu-menu-drop-list {
                .ivu-menu-item {
                    &:hover {
                        border: none;
                        background: $green;
                        a {
                            color: #fff;
                        }
                        &::after {
                            display: none;
                        }
                    }
                    a {
                        color: lighten(#333, 20%);
                    }
                }
            }
        }
    }
}
</style>

<style lang="scss">
i.ivu-icon.ivu-icon-ios-arrow-down.ivu-menu-submenu-title-icon:hover {
    color: #fff;
}
</style>
