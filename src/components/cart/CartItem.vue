<template lang="">
    <div class="card cart-item" will-change>
        <Row align="middle">
            <Col span="9">
                <Row justify="center" align="middle">
                    <Col :xl="12" :lg="24" :md="24" span="24">
                        <img
                            class="product-img"
                            :src="`./images/shop/${itemImage}`"
                        />
                    </Col>
                    <Col :xl="12" :lg="24" :md="24" span="24">
                        <div class="product-name">{{ itemName }}</div>
                    </Col>
                </Row>
            </Col>
            <Col span="3">
                <div class="product-price">${{ itemPrice }}</div>
            </Col>
            <Col span="8" :xl="6" :lg="6"
                ><div class="quantity">
                    <Icon
                        class="md-remove"
                        type="md-remove"
                        @click="changeQuantity('-')"
                    />
                    <input type="number" v-model="itemQuantity" />
                    <Icon
                        class="md-add"
                        type="md-add"
                        @click="changeQuantity('+')"
                    /></div
            ></Col>
            <Col span="4" :xl="6" :lg="6">${{ itemTotal }}</Col>
            <div class="md-close">
                <Icon type="md-close" color="#333" @click="deleteItem" />
            </div>
        </Row>
    </div>
</template>
<script>
export default {
    props: ["prodId", "prodImg", "prodName", "prodQuantity", "prodPrice"],
    data() {
        return {
            itemId: this.prodId,
            itemImage: this.prodImg,
            itemName: this.prodName,
            itemQuantity: this.prodQuantity,
            itemPrice: this.prodPrice,
        };
    },
    computed: {
        itemTotal() {
            return this.itemQuantity * this.itemPrice;
        },
    },
    methods: {
        changeQuantity(operator) {
            let cartIndex = this.$store.state.cart.findIndex((item) => {
                return item.id === this.itemId;
            });
            if (operator === "-") {
                if (this.itemQuantity === 1) return;
                this.itemQuantity -= 1;
            } else {
                this.itemQuantity += 1;
            }
            this.$store.dispatch("addToCart", {
                memId: this.$store.state.user.mem_id,
                prodId: +this.itemId,
                cartQty: this.itemQuantity,
            });
        },
        deleteItem() {
            this.$store.dispatch("deleteCartItem", {
                memId: this.$store.state.user.mem_id,
                prodId: +this.itemId,
            });
        },
    },
};
</script>
<style lang="scss" scoped>
.cart-item {
    background-color: #ffffffdd;
    font-size: $p;
    padding: 20px 0;
    color: $font_color;
    margin-bottom: 30px;
    border-radius: 10px;
    position: relative;

    /* .gap {
        gap: 20px;
    } */

    .product-img {
        width: 100px;
        height: 100px;
    }

    .product-name {
        width: 140px;
        @include d() {
            width: 100%;
        }
        @include m() {
            width: 100%;
        }
    }

    .product-price {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .quantity {
        position: relative;
        display: inline-block;
        input {
            text-align: center;
            width: 100px;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .md-remove {
            position: absolute;
            top: 50%;
            left: 0%;
            transform: translate(0%, -50%);
            color: $font_color;
            border-right: 1px solid black;
            padding: 5px;
        }
        .md-add {
            position: absolute;
            top: 50%;
            right: 0%;
            transform: translate(0%, -50%);
            color: $font_color;
            border-left: 1px solid black;
            padding: 5px;
        }
    }

    .md-close {
        position: absolute;
        top: 50%;
        right: 3%;
        transform: translate(0%, -50%);
        @include m() {
            top: 0%;
            right: 1%;
            transform: translate(0%, 0%);
        }
    }
}
</style>
