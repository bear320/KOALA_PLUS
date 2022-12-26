<template lang="">
    <div :class="`${col}`">
        <div class="product-card">
            <div class="product-head">
                <router-link class="product-img" :to="`/shop/${proId}`">
                    <img :src="img" @click="scrollToProduct" />
                </router-link>
                <div class="btn-cart">
                    <Icon
                        size="20"
                        class="md-cart"
                        type="md-cart"
                        @click="addToCart"
                    />
                </div>
            </div>
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
    data() {
        return {
            img: `../images/shop/${this.proImg}`,
        };
    },
    methods: {
        addToCart() {
            this.$store.dispatch("addToCart", {
                memId: this.$store.state.user.mem_id,
                prodId: +this.proId,
                cartQty: 1,
            });
        },
        scrollToProduct() {
            window.scrollTo({
                top: 0,
                behavior: "instant",
            });
        },
    },
};
</script>
<style lang="scss" scoped>
.product-card {
    margin-bottom: 50px;
    .product-head {
        position: relative;
        margin-bottom: 25px;
        &:hover img {
            filter: brightness(0.8);
        }
        &:hover .btn-cart {
            opacity: 1;
        }
        .product-img {
            display: block;
            text-decoration: none;

            img {
                width: 100%;
                vertical-align: top;
                transition: all 0.3s ease;
            }
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

    .product-body {
        .product-name {
            font-size: $h4;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: $h3;
            color: $green;
            font-weight: 700;
        }
    }
}
</style>
