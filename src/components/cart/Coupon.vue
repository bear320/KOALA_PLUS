<template lang="">
    <div class="coupon-wrapper">
        <span
            class="coupon-item"
            v-for="coupon in couponArr"
            :key="coupon.coupon_id"
            @click="chooseCoupon(coupon)"
        >
            <p class="coupon-title">COUPON</p>
            <p class="coupon-discount">{{ coupon.coupon_discount * 100 }}折</p>
            <p class="coupon-deadline">{{ coupon.coupon_exp_date }}</p>
            <p class="coupon-code">{{ coupon.coupon_code }}</p>
        </span>
        <div class="btn-close" @click="close">
            <Icon class="md-close" type="md-close" color="#333" />
        </div>
    </div>
</template>
<script>
export default {
    props: ["couponArr"],
    methods: {
        close() {
            this.$emit("close");
        },
        chooseCoupon(coupon) {
            this.$store.state.discount = coupon;
            this.$emit("updateCoupon", coupon);
        },
    },
};
</script>
<style lang="scss" scoped>
.coupon-wrapper {
    margin: 0 auto;
    width: 100%;
    height: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #cccccc90;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);

    display: flex;
    flex-direction: column;

    overflow-y: scroll;
    overflow-x: hidden;

    @include d() {
        width: 50%;
        height: 500px;
    }
    @include m() {
        width: 100%;
        height: 500px;
    }

    .coupon-item {
        display: inline-block;
        background: url(@/assets/images/coupon.png) no-repeat center/contain;
        width: 400px;
        height: 200px;
        margin: 0 auto;
        margin-top: 20px;
        margin-bottom: 20px;
        position: relative;
        cursor: pointer;

        flex-shrink: 0;
        @include media(450) {
            width: 350px;
        }
        .coupon-title {
            font-size: 30px;
            color: $bg-color;
            position: absolute;
            top: 23%;
            left: 12%;
            font-weight: 700;
            @include media(450) {
                font-size: 30px;
                left: 10%;
            }
        }
        .coupon-discount {
            font-size: 30px;
            color: $bg-color;
            position: absolute;

            top: 45%;
            left: 22%;
            @include media(450) {
            }
        }
        .coupon-deadline {
            font-size: $p;
            color: $bg-color;
            position: absolute;

            bottom: 20%;
            right: 34%;
            @include media(450) {
                bottom: 22%;
                right: 32%;
            }
        }
        .coupon-code {
            font-size: $p;
            color: #333;
            position: absolute;
            top: 43%;
            right: 5%;
            transform: rotate(-90deg);
            letter-spacing: 1.4px;
            @include media(450) {
                right: 3%;
            }
        }
    }
    .btn-close {
        width: 30px;
        height: 30px;
        background-color: #fff;
        border-radius: 50%;
        border: 1px solid black;
        position: absolute;
        top: 0%;
        right: 0%;
        cursor: pointer;
        .md-close {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }
}
</style>
