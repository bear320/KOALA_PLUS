<template>
    <Header />
    <section class="bs-nav-space wrapper">
        <h1>無尾熊管理</h1>
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
section {
    text-align: left;
    h1 {
        display: inline-block;
        width: 30%;
        background-image: url(@/assets/images/backstageindex/koalaIcon.png);
        @include bgSetting(contain, right);
    }
}
</style>
