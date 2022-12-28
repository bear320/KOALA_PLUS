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
    props: ["proImg", "proName", "proPrice", "proId", "col", "path"],
    data() {
        return {
            img: `${this.path}${this.proImg}`,
        };
    },
    methods: {
        async addToCart() {
            let prodIndex = this.$store.state.cart.findIndex(
                (item) => item.prod_id === this.proId
            );

            if (prodIndex < 0) {
                await this.$store.dispatch("addToCart", {
                    memId: this.$store.state.user.mem_id,
                    prodId: this.proId,
                    cartQty: 1,
                });
                this.open(true, "已新增商品至購物車");
            } else {
                await this.$store.dispatch("addToCart", {
                    memId: this.$store.state.user.mem_id,
                    prodId: this.proId,
                    cartQty: (this.$store.state.cart[prodIndex].cart_qty += 1),
                });
                this.open(true, "已更新商品數量");
            }
        },
        open(nodesc, title) {
            this.$Notice.open({
                title: `✔　${title}`,
            });
        },
        scrollToProduct() {
            setTimeout(() => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth",
                });
            }, 100);
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
            box-shadow: 0px 0px 10px rgb(0 0 0 / 25%);
        }
        &:hover .btn-cart {
            opacity: 1;
        }
        .product-img {
            display: block;
            text-decoration: none;
            border: solid 0.5px transparent;
            border-radius: 10px;

            img {
                width: 100%;
                vertical-align: top;
                transition: all 0.3s ease;
                border-radius: 10px;
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
