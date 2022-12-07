<template lang="">
    <div class="coupon-wrapper">
        <div
            class="coupon-item"
            v-for="coupon in couponArr"
            :key="coupon.id"
            @click="chooseCoupon(coupon)"
        >
            <Row align="middle">
                <Col span="6">
                    <div class="coupon-name">{{ coupon.name }}</div>
                </Col>
                <Col span="6">
                    <div class="coupon-code">{{ coupon.code }}</div>
                </Col>
                <Col span="6">
                    <div class="coupon-discount">{{ coupon.discount }}</div>
                </Col>
                <Col span="6">
                    <div class="coupon-deadline">{{ coupon.deadline }}</div>
                </Col>
            </Row>
        </div>
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
    background-color: #35b;
    padding: 30px;
    // overflow-y: scroll;
    .coupon-item {
        background-color: #fa0;
        padding: 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }
    .btn-close {
        width: 30px;
        height: 30px;
        background-color: #fff;
        border-radius: 50%;
        border: 1px solid black;
        position: absolute;
        top: -3%;
        right: -3%;
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
