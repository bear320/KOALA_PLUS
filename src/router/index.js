import { createRouter, createWebHistory } from "vue-router";
import IndxView from "../views/IndxView.vue";
import HomeView from "../views/HomeView.vue";
import BackEndView from "../views/BackEndView.vue";

const routes = [
    {
            path: "/",
            name: "index",
        component: IndxView,
    },
    {
        path: "/home",
        name: "home",
        component: HomeView,
    },
    {
        path: "/backend",
        name: "backend",
        component: BackEndView,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
