<template lang="">
    <div :class="col">
        <div class="product-card">
            <router-link class="product-img" :to="`/shop/${proId}`">
                <img src="@/assets/images/shop/product_img.png" />
                <div class="btn-cart">
                    <Icon
                        size="20"
                        class="md-cart"
                        type="md-cart"
                        @click="addToCart"
                    />
                </div>
            </router-link>
            <div class="product-body">
                <div class="product-name">{{ proName }}</div>
                <div class="product-price">NT.{{ proPrice }}</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["proImg", "proName", "proPrice", "proId", "col"],
    methods: {
        addToCart() {
            console.log(this.proId);
        },
    },
};
</script>
<style lang="scss" scoped>
.product-img {
    display: block;
    text-decoration: none;
    position: relative;
    &:hover .btn-cart {
        opacity: 1;
    }
    &:hover img {
        filter: brightness(0.8);
    }
    img {
        width: 100%;
        vertical-align: top;
        transition: all 0.3s ease;
    }
    .btn-cart {
        width: 40px;
        height: 40px;
        background-color: $btn-disable;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 1px solid $green;
        position: absolute;
        bottom: 2%;
        right: 2%;
        opacity: 0;
        transition: opacity 0.3s ease;
        .md-cart {
            color: $green;
        }
    }
}
</style>
