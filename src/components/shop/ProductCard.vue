<template lang="">
    <div class="col-4">
        <div class="product-card">
            <a class="product-img">
                <img src="@/assets/images/shop/product_img.png" />
            </a>
            <div class="product-body">
                <div class="product-name">{{ proName }}</div>
                <div class="product-price">NT.{{ proPrice }}</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["proImg", "proName", "proPrice"],
};
</script>
<style lang="scss" scoped>
.product-img {
    img {
        width: 100%;
        vertical-align: top;
    }
}
</style>
