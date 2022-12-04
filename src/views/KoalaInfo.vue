<template>
    <Header></Header>
    <section class="wrapper nav-space breadcrumb">
        <p>我是麵包屑</p>
    </section>
    <section class="wrapper info">
        <div class="img">
            <ImageSlider :imgs="images"></ImageSlider>
        </div>
        <div class="text"></div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
import ImageSlider from "@/components/shop/ImageSlider.vue";
export default {
    components: {
        Header,
        ImageSlider,
    },
    data() {
        return {
            images: [
                "banner1.jpg",
                "banner2.jpg",
                "banner3.jpg",
                "drawing1.png",
            ],
        };
    },
};
</script>

<style lang="scss" scoped></style>
