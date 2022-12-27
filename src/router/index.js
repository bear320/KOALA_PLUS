import store from "@/store";
import { createRouter, createWebHistory } from "vue-router";

// 前後台連結頁面
// import IndexView from "../views/IndexView.vue";

// 前台
/* import HomeView from "../views/HomeView.vue";
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
import Shop from "../views/Shop.vue"; */

// 後台
/* import AdminLogin from "../views/backStage/AdminLogin.vue";
import BackStageIndex from "../views/backStage/BackStageIndex.vue";
import AdminList from "../views/backStage/AdminList.vue";
import AdminAdd from "../views/backStage/AdminAdd.vue";
import ArticleList from "../views/backStage/ArticleList.vue";
import ArticleEdit from "../views/backStage/ArticleEdit.vue";
import BookingList from "../views/backStage/BookingListTwo.vue";
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
import SupportStatistic from "../views/backStage/SupportStatistic.vue"; */

const routes = [
    {
        path: "/",
        name: "index",
        // component: IndexView,
        component: () => import("@/views/IndexView.vue"),
        meta: { title: "KOALA+" },
    },
    {
        path: "/home",
        name: "home",
        // component: HomeView,
        component: () => import("@/views/HomeView.vue"),
        meta: { title: "KOALA+" },
    },
    {
        path: "/about",
        name: "about",
        // component: About,
        component: () => import("@/views/About.vue"),
        meta: { title: "關於我們" },
    },
    {
        path: "/about-koala",
        name: "about-koala",
        // component: AboutKoala,
        component: () => import("@/views/AboutKoala.vue"),
        meta: { title: "無尾熊百科" },
    },
    {
        path: "/support",
        name: "support",
        // component: Support,
        component: () => import("@/views/Support.vue"),
        meta: { title: "資助認養" },
    },
    {
        path: "/support/:koala_name",
        name: "koala-info",
        // component: KoalaInfo,
        component: () => import("@/views/KoalaInfo.vue"),
        meta: { title: "無尾熊詳情" },
    },
    {
        path: "/cart1",
        name: "cart1",
        // component: Cart1,
        component: () => import("@/views/Cart1.vue"),
        meta: { title: "購物車" },
    },
    {
        path: "/cart2",
        name: "cart2",
        // component: Cart2,
        component: () => import("@/views/Cart2.vue"),
        meta: { title: "結帳" },
    },
    {
        path: "/koala-park",
        name: "koala-park",
        // component: KoalaPark,
        component: () => import("@/views/KoalaPark.vue"),
        meta: { title: "無尾熊園區" },
    },
    {
        path: "/login",
        name: "login",
        // component: Login,
        component: () => import("@/views/Login.vue"),
        meta: { title: "登入／註冊" },
    },
    {
        path: "/member",
        name: "member",
        // component: Member,
        component: () => import("@/views/Member.vue"),
        meta: { title: "會員中心" },
    },
    {
        path: "/my-koala",
        name: "my-koala",
        // component: MyKoala,
        component: () => import("@/views/MyKoala.vue"),
        meta: { title: "我的無尾熊" },
    },
    {
        path: "/shop/:id",
        name: "product",
        // component: Product,
        component: () => import("@/views/Product.vue"),
        meta: { title: "商品詳情" },
    },
    {
        path: "/shop",
        name: "shop",
        // component: Shop,
        component: () => import("@/views/Shop.vue"),
        meta: { title: "週邊商城" },
    },
    {
        path: "/bs-login",
        name: "adminLogin",
        // component: AdminLogin,
        component: () => import("@/views/backStage/AdminLogin.vue"),
        meta: { title: "管理者登錄" },
    },
    {
        path: "/bs-index",
        name: "backStageIndex",
        // component: BackStageIndex,
        component: () => import("@/views/backStage/BackStageIndex.vue"),
        meta: { title: "後台首頁" },
    },
    {
        path: "/bs-admin-list",
        name: "adminList",
        // component: AdminList,
        component: () => import("@/views/backStage/AdminList.vue"),
        meta: { title: "權限管理" },
    },
    {
        path: "/bs-admin-add",
        name: "adminAdd",
        // component: AdminAdd,
        component: () => import("@/views/backStage/AdminAdd.vue"),
        meta: { title: "新增管理者" },
    },
    {
        path: "/bs-article-list",
        name: "articleList",
        // component: ArticleList,
        component: () => import("@/views/backStage/ArticleList.vue"),
        meta: { title: "公告管理" },
    },
    {
        path: "/bs-article-edit/:news_id",
        name: "articleEdit",
        // component: ArticleEdit,
        component: () => import("@/views/backStage/ArticleEdit.vue"),
        meta: { title: "編輯公告" },
    },
    {
        path: "/bs-article-add",
        name: "articleAdd",
        // component: ArticleAdd,
        component: () => import("@/views/backStage/ArticleAdd.vue"),
        meta: { title: "新增公告" },
    },
    {
        path: "/bs-booking-list-two",
        name: "bookingListTwo",
        // component: BookingListTwo,
        component: () => import("@/views/backStage/BookingListTwo.vue"),
        meta: { title: "園區導覽管理" },
    },
    // {
    //     path: "/bs-booking-list-two",
    //     name: "bookingListTwo",
    //     // component: BookingList,
    //     component: () => import("@/views/backStage/BookingListTwo.vue"),
    // },
    {
        path: "/bs-booking-dayoff",
        name: "bookingDayOff",
        // component: BookingDayOff,
        component: () => import("@/views/backStage/BookingDayOff.vue"),
        meta: { title: "新增休館日期" },
    },
    {
        path: "/bs-booking-edit/:id",
        name: "bookingEdit",
        // component: BookingEdit,
        component: () => import("@/views/backStage/BookingEdit.vue"),
        meta: { title: "修改預約" },
    },
    {
        path: "/bs-koala-list",
        name: "koalaList",
        // component: KoalaList,
        component: () => import("@/views/backStage/KoalaList.vue"),
        meta: { title: "無尾熊管理" },
    },
    {
        path: "/bs-koala-add",
        name: "koalaAdd",
        // component: KoalaAdd,
        component: () => import("@/views/backStage/KoalaAdd.vue"),
        meta: { title: "新增無尾熊" },
    },
    {
        path: "/bs-koala-edit/:koala_name",
        name: "koalaEdit",
        // component: KoalaEdit,
        component: () => import("@/views/backStage/KoalaEdit.vue"),
        meta: { title: "編輯無尾熊" },
    },
    {
        path: "/bs-member-list",
        name: "memberList",
        // component: MemberList,
        component: () => import("@/views/backStage/MemberList.vue"),
        meta: { title: "會員管理" },
    },
    {
        path: "/bs-member-blacklist",
        name: "memberBlacklist",
        // component: MemberBlacklist,
        component: () => import("@/views/backStage/MemberBlacklist.vue"),
        meta: { title: "黑名單" },
    },
    {
        path: "/bs-order-list",
        name: "orderList",
        // component: OrderList,
        component: () => import("@/views/backStage/OrderList.vue"),
        meta: { title: "訂單管理" },
    },
    {
        path: "/bs-product-list",
        name: "productList",
        // component: ProductList,
        component: () => import("@/views/backStage/ProductList.vue"),
        meta: { title: "商品管理" },
    },
    {
        path: "/bs-product-add",
        name: "productAdd",
        // component: ProductEdit,
        component: () => import("@/views/backStage/ProductAdd.vue"),
        meta: { title: "新增商品" },
    },
    {
        path: "/bs-product-edit/:id",
        name: "productEdit",
        // component: ProductEdit,
        component: () => import("@/views/backStage/ProductEdit.vue"),
        meta: { title: "編輯商品" },
    },
    {
        path: "/bs-coupon-list",
        name: "CouponList",
        // component: CouponList,
        component: () => import("@/views/backStage/CouponList.vue"),
        meta: { title: "優惠券管理" },
    },
    {
        path: "/bs-support-list",
        name: "supportList",
        // component: SupportList,
        component: () => import("@/views/backStage/SupportList.vue"),
        meta: { title: "資助認養管理" },
    },
    {
        path: "/bs-support-info/:sup_id",
        name: "supportInfo",
        // component: SupportInfo,
        component: () => import("@/views/backStage/SupportInfo.vue"),
        meta: { title: "編輯資助認養" },
    },
    {
        path: "/bs-support-statistic",
        name: "supportStatistic",
        // component: SupportStatistic,
        component: () => import("@/views/backStage/SupportStatistic.vue"),
        meta: { title: "數據統計" },
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
