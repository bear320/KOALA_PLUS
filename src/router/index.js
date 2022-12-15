import { createRouter, createWebHistory } from "vue-router";

// 前後台連結頁面
// import IndexView from "../views/IndexView.vue";

// 前台
// import HomeView from "../views/HomeView.vue";
// import About from "../views/About.vue";
// import AboutKoala from "../views/AboutKoala.vue";
// import Support from "../views/Support.vue";
// import Cart1 from "../views/Cart1.vue";
// import Cart2 from "../views/Cart2.vue";
// import KoalaInfo from "../views/KoalaInfo.vue";
// import KoalaPark from "../views/KoalaPark.vue";
// import Login from "../views/Login.vue";
// import Member from "../views/Member.vue";
// import MyKoala from "../views/MyKoala.vue";
// import Product from "../views/Product.vue";
// import Shop from "../views/Shop.vue";

// 後台
// import AdminLogin from "../views/backStage/AdminLogin.vue";
// import BackStageIndex from "../views/backStage/BackStageIndex.vue";
// import AdminList from "../views/backStage/AdminList.vue";
// import AdminAdd from "../views/backStage/AdminAdd.vue";
// import ArticleList from "../views/backStage/ArticleList.vue";
// import ArticleEdit from "../views/backStage/ArticleEdit.vue";
// import BookingList from "../views/backStage/BookingList.vue";
// import BookingDayOff from "../views/backStage/BookingDayOff.vue";
// import BookingEdit from "../views/backStage/BookingEdit.vue";
// import KoalaList from "../views/backStage/KoalaList.vue";
// import KoalaAdd from "../views/backStage/KoalaAdd.vue";
// import KoalaEdit from "../views/backStage/KoalaEdit.vue";
// import MemberList from "../views/backStage/MemberList.vue";
// import MemberBlacklist from "../views/backStage/MemberBlacklist.vue";
// import OrderList from "../views/backStage/OrderList.vue";
// import ProductList from "../views/backStage/ProductList.vue";
// import ProductEdit from "../views/backStage/ProductEdit.vue";
// import SupportList from "../views/backStage/SupportList.vue";
// import SupportInfo from "../views/backStage/SupportInfo.vue";
// import SupportStatistic from "../views/backStage/SupportStatistic.vue";

const routes = [
    {
        path: "/",
        name: "index",
        // component: IndexView,
        component: () => import("@/views/IndexView.vue"),
    },
    {
        path: "/home",
        name: "home",
        // component: HomeView,
        component: () => import("@/views/HomeView.vue"),
    },
    {
        path: "/about",
        name: "about",
        // component: About,
        component: () => import("@/views/About.vue"),
    },
    {
        path: "/about-koala",
        name: "about-koala",
        // component: AboutKoala,
        component: () => import("@/views/AboutKoala.vue"),
    },
    {
        path: "/support",
        name: "support",
        // component: Support,
        component: () => import("@/views/Support.vue"),
    },
    {
        path: "/support/:koala_name",
        name: "koala-info",
        // component: KoalaInfo,
        component: () => import("@/views/KoalaInfo.vue"),
    },
    {
        path: "/cart1",
        name: "cart1",
        // component: Cart1,
        component: () => import("@/views/Cart1.vue"),
    },
    {
        path: "/cart2",
        name: "cart2",
        // component: Cart2,
        component: () => import("@/views/Cart2.vue"),
    },
    {
        path: "/koala-park",
        name: "koala-park",
        // component: KoalaPark,
        component: () => import("@/views/KoalaPark.vue"),
    },
    {
        path: "/login",
        name: "long",
        // component: Login,
        component: () => import("@/views/Login.vue"),
    },
    {
        path: "/member",
        name: "member",
        // component: Member,
        component: () => import("@/views/Member.vue"),
    },
    {
        path: "/my-koala",
        name: "my-koala",
        // component: MyKoala,
        component: () => import("@/views/MyKoala.vue"),
    },
    {
        path: "/shop/:id",
        name: "product",
        // component: Product,
        component: () => import("@/views/Product.vue"),
    },
    {
        path: "/shop",
        name: "shop",
        // component: Shop,
        component: () => import("@/views/Shop.vue"),
    },
    {
        path: "/bs-login",
        name: "adminLogin",
        // component: AdminLogin,
        component: () => import("@/views/backStage/AdminLogin.vue"),
    },
    {
        path: "/bs-index",
        name: "backStageIndex",
        // component: BackStageIndex,
        component: () => import("@/views/backStage/BackStageIndex.vue"),
    },
    {
        path: "/bs-admin-list",
        name: "adminList",
        // component: AdminList,
        component: () => import("@/views/backStage/AdminList.vue"),
    },
    {
        path: "/bs-admin-add",
        name: "adminAdd",
        // component: AdminAdd,
        component: () => import("@/views/backStage/AdminAdd.vue"),
    },
    {
        path: "/bs-article-list",
        name: "articleList",
        // component: ArticleList,
        component: () => import("@/views/backStage/ArticleList.vue"),
    },
    {
        path: "/bs-article-edit",
        name: "articleEdit",
        // component: ArticleEdit,
        component: () => import("@/views/backStage/ArticleEdit.vue"),
    },
    {
        path: "/bs-booking-list",
        name: "bookingList",
        // component: BookingList,
        component: () => import("@/views/backStage/BookingList.vue"),
    },
    {
        path: "/bs-booking-dayoff",
        name: "bookingDayOff",
        // component: BookingDayOff,
        component: () => import("@/views/backStage/BookingDayOff.vue"),
    },
    {
        path: "/bs-booking-edit/:id",
        name: "bookingEdit",
        // component: BookingEdit,
        component: () => import("@/views/backStage/BookingEdit.vue"),
    },
    {
        path: "/bs-koala-list",
        name: "koalaList",
        // component: KoalaList,
        component: () => import("@/views/backStage/KoalaList.vue"),
    },
    {
        path: "/bs-koala-add",
        name: "koalaAdd",
        // component: KoalaAdd,
        component: () => import("@/views/backStage/KoalaAdd.vue"),
    },
    {
        path: "/bs-koala-edit/:id",
        name: "koalaEdit",
        // component: KoalaEdit,
        component: () => import("@/views/backStage/KoalaEdit.vue"),
    },
    {
        path: "/bs-member-list",
        name: "memberList",
        // component: MemberList,
        component: () => import("@/views/backStage/MemberList.vue"),
    },
    {
        path: "/bs-member-blacklist",
        name: "memberBlacklist",
        // component: MemberBlacklist,
        component: () => import("@/views/backStage/MemberBlacklist.vue"),
    },
    {
        path: "/bs-order-list",
        name: "orderList",
        // component: OrderList,
        component: () => import("@/views/backStage/OrderList.vue"),
    },
    {
        path: "/bs-product-list",
        name: "productList",
        // component: ProductList,
        component: () => import("@/views/backStage/ProductList.vue"),
    },
    {
        path: "/bs-product-add",
        name: "productAdd",
        // component: ProductEdit,
        component: () => import("@/views/backStage/ProductAdd.vue"),
    },
    {
        path: "/bs-product-edit",
        name: "productEdit",
        // component: ProductEdit,
        component: () => import("@/views/backStage/ProductEdit.vue"),
    },
    {
        path: "/bs-coupon-list",
        name: "CouponList",
        // component: CouponList,
        component: () => import("@/views/backStage/CouponList.vue"),
    },
    {
        path: "/bs-support-list",
        name: "supportList",
        // component: SupportList,
        component: () => import("@/views/backStage/SupportList.vue"),
    },
    {
        path: "/bs-support-info/:sup_id",
        name: "supportInfo",
        // component: SupportInfo,
        component: () => import("@/views/backStage/SupportInfo.vue"),
    },
    {
        path: "/bs-support-statistic",
        name: "supportStatistic",
        // component: SupportStatistic,
        component: () => import("@/views/backStage/SupportStatistic.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    scrollBehavior(to, from, savedPosition) {
        //切換不同頁面，滾軸永遠在最上面
        if (to.name !== from.name)
            return {
                top: 0,
                left: 0,
                behavior: "smooth",
            };
    },
});

export default router;
