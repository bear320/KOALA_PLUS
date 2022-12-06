import { createRouter, createWebHistory } from "vue-router";

// 前後台連結頁面
import IndexView from "../views/IndexView.vue";

// 前台
import HomeView from "../views/HomeView.vue";
import About from "../views/About.vue";
import AboutKoala from "../views/AboutKoala.vue";
import Support from "../views/Support.vue";
import Cart1 from "../views/Cart1.vue";
import Cart2 from "../views/Cart2.vue";
import KoalaInfo from "../views/KoalaInfo.vue";
import KoalaPark from "../views/KoalaPark.vue";
import Login from "../views/Login.vue";
import Member from "../views/Member.vue";
import MyKoala from "../views/MyKoala.vue";
import Product from "../views/Product.vue";
import Shop from "../views/Shop.vue";

// 後台
import AdminLogin from "../views/backStage/AdminLogin.vue";
import BackStageIndex from "../views/backStage/BackStageIndex.vue";
import AdminList from "../views/backStage/AdminList.vue";
import AdminAdd from "../views/backStage/AdminAdd.vue";
import ArticleList from "../views/backStage/ArticleList.vue";
import ArticleEdit from "../views/backStage/ArticleEdit.vue";
import BookingList from "../views/backStage/BookingList.vue";
import BookingDayOff from "../views/backStage/BookingDayOff.vue";
import BookingEdit from "../views/backStage/BookingEdit.vue";
import KoalaList from "../views/backStage/KoalaList.vue";
import KoalaAdd from "../views/backStage/KoalaAdd.vue";
import KoalaEdit from "../views/backStage/KoalaEdit.vue";
import MemberList from "../views/backStage/MemberList.vue";
import MemberBlacklist from "../views/backStage/MemberBlacklist.vue";
import OrderList from "../views/backStage/OrderList.vue";
import ProductList from "../views/backStage/ProductList.vue";
import ProductEdit from "../views/backStage/ProductEdit.vue";
import SupportList from "../views/backStage/SupportList.vue";
import SupportInfo from "../views/backStage/SupportInfo.vue";
import SupportStatistic from "../views/backStage/SupportStatistic.vue";

const routes = [
    {
        path: "/",
        name: "index",
        component: IndexView,
    },
    {
        path: "/home",
        name: "home",
        component: HomeView,
    },
    {
        path: "/about",
        name: "about",
        component: About,
    },
    {
        path: "/about-koala",
        name: "about-koala",
        component: AboutKoala,
    },
    {
        path: "/support",
        name: "support",
        component: Support,
    },
    {
        path: "/support/:name",
        name: "koala-info",
        component: KoalaInfo,
    },
    {
        path: "/cart1",
        name: "cart1",
        component: Cart1,
    },
    {
        path: "/cart2",
        name: "cart2",
        component: Cart2,
    },
    {
        path: "/koala-park",
        name: "koala-park",
        component: KoalaPark,
    },
    {
        path: "/login",
        name: "long",
        component: Login,
    },
    {
        path: "/member",
        name: "member",
        component: Member,
    },
    {
        path: "/my-koala",
        name: "my-koala",
        component: MyKoala,
    },
    {
        path: "/shop/:id",
        name: "product",
        component: Product,
    },
    {
        path: "/shop",
        name: "shop",
        component: Shop,
    },
    {
        path: "/bs-login",
        name: "adminLogin",
        component: AdminLogin,
    },
    {
        path: "/bs-index",
        name: "backStageIndex",
        component: BackStageIndex,
    },
    {
        path: "/bs-admin-list",
        name: "adminList",
        component: AdminList,
    },
    {
        path: "/bs-admin-add",
        name: "adminAdd",
        component: AdminAdd,
    },
    {
        path: "/bs-article-list",
        name: "articleList",
        component: ArticleList,
    },
    {
        path: "/bs-article-edit",
        name: "articleEdit",
        component: ArticleEdit,
    },
    {
        path: "/bs-booking-list",
        name: "bookingList",
        component: BookingList,
    },
    {
        path: "/bs-booking-dayoff",
        name: "bookingDayOff",
        component: BookingDayOff,
    },
    {
        path: "/bs-booking-edit",
        name: "bookingEdit",
        component: BookingEdit,
    },
    {
        path: "/bs-koala-list",
        name: "koalaList",
        component: KoalaList,
    },
    {
        path: "/bs-koala-add",
        name: "koalaAdd",
        component: KoalaAdd,
    },
    {
        path: "/bs-koala-edit",
        name: "koalaEdit",
        component: KoalaEdit,
    },
    {
        path: "/bs-member-list",
        name: "memberList",
        component: MemberList,
    },
    {
        path: "/bs-member-blacklist",
        name: "memberBlacklist",
        component: MemberBlacklist,
    },
    {
        path: "/bs-order-list",
        name: "orderList",
        component: OrderList,
    },
    {
        path: "/bs-product-list",
        name: "productList",
        component: ProductList,
    },
    {
        path: "/bs-product-edit",
        name: "productEdit",
        component: ProductEdit,
    },
    {
        path: "/bs-support-list",
        name: "supportList",
        component: SupportList,
    },
    {
        path: "/bs-support-info",
        name: "supportInfo",
        component: SupportInfo,
    },
    {
        path: "/bs-support-statistic",
        name: "supportStatistic",
        component: SupportStatistic,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            top: 0,
        };
    },
});

export default router;
