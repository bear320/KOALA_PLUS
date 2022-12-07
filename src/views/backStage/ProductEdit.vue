<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>新增/修改商品</h2>
        </div>

        <div>
            <label for="" class="prod-name">商品名稱</label>
            <input type="text" />
        </div>

        <div>
            <label for="" class="prod-category">商品名稱</label>
            <select name="" id="">
                <option value="">生活小物</option>
                <option value="">玩具/絨毛娃娃</option>
                <option value="">服飾</option>
            </select>
        </div>
    </section>
    <section class="wrapper function-wrapper"></section>
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
    // display: flex;
    // justify-content: space-between;
    // align-items: center;
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
    }
}
</style>
