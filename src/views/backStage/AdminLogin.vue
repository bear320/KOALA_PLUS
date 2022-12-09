<template>
    <h1>後台登入頁</h1>

    <section></section>



    <section class="tidy_list">
        <div class="tidy_list_block">
            <router-link to="/bs-index">後台首頁</router-link>
            <router-link to="/bs-admin-list">權限管理</router-link>
            <router-link to="/bs-admin-add">新增管理員</router-link>
            <router-link to="/bs-article-list">公告管理</router-link>
            <router-link to="/bs-article-edit">新增／編輯公告</router-link>
            <router-link to="/bs-booking-list">導覽預約管理</router-link>
            <router-link to="/bs-booking-dayoff">新增休館日期</router-link>
            <router-link to="/bs-booking-edit">修改預約</router-link>
            <router-link to="/bs-koala-list">無尾熊管理</router-link>
            <router-link to="/bs-koala-add">新增無尾熊</router-link>
            <router-link to="/bs-koala-edit">編輯無尾熊</router-link>
            <router-link to="/bs-member-list">會員管理</router-link>
            <router-link to="/bs-member-blacklist">會員黑名單</router-link>
            <router-link to="/bs-order-list">訂單管理</router-link>
            <router-link to="/bs-product-list">周邊商品管理</router-link>
            <router-link to="/bs-product-edit">新增／編輯周邊商品</router-link>
            <router-link to="/bs-coupon-list">優惠券管理</router-link>
            <router-link to="/bs-support-list">資助認養管理</router-link>
            <router-link to="/bs-support-info">資助認養詳情</router-link>
            <router-link to="/bs-support-statistic">資助認養數據</router-link>
        </div>
    </section>
</template>

<script>
export default {
};
</script>

<style lang="scss" scoped>

a {
    display: block;
}

.tidy_list{
    position: relative;
}

.tidy_list_block {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
}


</style>






































































<!-- <template>
    <h1>後台登入頁</h1>
    <section class="tidy_list">
        <div class="tidy_list_block"></div>
        <router-link to="/bs-index">後台首頁</router-link>
        <router-link to="/bs-admin-list">權限管理</router-link>
        <router-link to="/bs-admin-add">新增管理員</router-link>
        <router-link to="/bs-article-list">公告管理</router-link>
        <router-link to="/bs-article-edit">新增／編輯公告</router-link>
        <router-link to="/bs-booking-list">導覽預約管理</router-link>
        <router-link to="/bs-booking-dayoff">新增休館日期</router-link>
        <router-link to="/bs-booking-edit">修改預約</router-link>
        <router-link to="/bs-koala-list">無尾熊管理</router-link>
        <router-link to="/bs-koala-add">新增無尾熊</router-link>
        <router-link to="/bs-koala-edit">編輯無尾熊</router-link>
        <router-link to="/bs-member-list">會員管理</router-link>
        <router-link to="/bs-member-blacklist">會員黑名單</router-link>
        <router-link to="/bs-order-list">訂單管理</router-link>
        <router-link to="/bs-product-list">周邊商品管理</router-link>
        <router-link to="/bs-product-edit">新增／編輯周邊商品</router-link>
        <router-link to="/bs-coupon-list">優惠券管理</router-link>
        <router-link to="/bs-support-list">資助認養管理</router-link>
        <router-link to="/bs-support-info">資助認養詳情</router-link>
        <router-link to="/bs-support-statistic">資助認養數據</router-link>
    </section>
</template>

<script>
// @ is an alias to /src
/* import HelloWorld from "@/components/HelloWorld.vue"; */

export default {
    /* name: "HomeView",
    components: {
        HelloWorld,
    }, */
};
</script>

<style lang="scss" scoped>
a {
    display: block;
}
</style> -->