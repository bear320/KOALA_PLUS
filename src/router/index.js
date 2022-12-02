import { createRouter, createWebHistory } from "vue-router";
import IndexView from "../views/IndexView.vue";
import HomeView from "../views/HomeView.vue";
import BackendView from "../views/BackendView.vue";
import About from "../views/About.vue";
import AboutKoala from "../views/AboutKoala.vue";
import AllKoalas from "../views/AllKoalas.vue";
import Cart1 from "../views/Cart1.vue";
import Cart2 from "../views/Cart2.vue";
import KoalaInfo from "../views/KoalaInfo.vue";
import KoalaPark from "../views/KoalaPark.vue";
import Login from "../views/Login.vue";
import Member from "../views/Member.vue";
import MyKoala from "../views/MyKoala.vue";
import Product from "../views/Product.vue";
import Shop from "../views/Shop.vue";

//後台
import IndexBackstage from "../views/backStage/IndexBackstage.vue";
// import Article from "../views/backStage/Article.vue";
// import ArticleNew from "../views/backStage/ArticleNew.vue";

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
        path: "/all-koalas",
        name: "all-koalas",
        component: AllKoalas,
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
        path: "/koala-info",
        name: "koala-info",
        component: KoalaInfo,
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
        path: "/product",
        name: "product",
        component: Product,
    },
    {
        path: "/shop",
        name: "shop",
        component: Shop,
    },
    {
        path: "/backend",
        name: "backend",
        component: BackendView,
    },
    {
        path: "/src/views/backStage/IndexBackstage.vue",
        name: "indexbackstage",
        component: IndexBackstage,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
