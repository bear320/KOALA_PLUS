<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>資助認養管理</h1>
            <img src="@/assets/images/backstageindex/supportIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>數據統計 - 資助所有無尾熊</h2>
            <div class="chart-wrapper"></div>
        </div>
        <div class="sub-title">
            <h2>數據統計 - 認養單隻無尾熊</h2>
            <div class="chart-wrapper"></div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    components: {
        Header,
    },
};
</script>

<style lang="scss" scoped>
.title-wrapper {
    margin-bottom: 20px;
    text-align: left;
    .title {
        display: flex;
        column-gap: 20px;
        h1 {
            display: block;
            width: fit-content;
        }
        img {
            height: 67.5px;
        }
    }
    .sub-title {
        margin-bottom: 20px;
        h2 {
            color: $green;
            @include borderLeft(30px);
        }
        .chart-wrapper {
            margin-top: 20px;
            width: 100%;
            height: 500px;
            background-color: #fff;
            border: 1px solid $btn-light-color;
            border-radius: 10px;
            box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
        }
    }
    .sub-title + .sub-title {
        margin-top: 50px;
    }
}
</style>
