<template lang="">
    <div class="image-slider">
        <div class="view-box">
            <!-- :style="{ left: `-${this.curIndex * 100}%` }" -->
            <div ref="mainImage" class="main-image">
                <img
                    v-for="(imgPath, index) in imgs"
                    :src="`../images/shop/${imgPath}`"
                    :key="index"
                />
            </div>
            <div class="buttons">
                <Icon
                    type="ios-arrow-dropleft-circle"
                    @click="moveImage('left')"
                />
                <Icon
                    type="ios-arrow-dropright-circle"
                    @click="moveImage('right')"
                />
            </div>
        </div>
        <div class="sub-images">
            <img
                v-for="(imgPath, index) in imgs"
                :src="`../images/shop/${imgPath}`"
                :key="index"
                @click="changeImage(index)"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        imgs: Array,
    },
    data() {
        return {
            curIndex: 0,
        };
    },
    methods: {
        moveImage(btn) {
            if (btn === "right") {
                this.curIndex < this.imgs.length - 1
                    ? (this.curIndex += 1)
                    : (this.curIndex = 0);
            }
            if (btn === "left") {
                this.curIndex < 1
                    ? (this.curIndex = this.imgs.length - 1)
                    : (this.curIndex -= 1);
            }
            this.$refs.mainImage.style.left = `-${this.curIndex * 100}%`;
        },
        changeImage(imageIndex) {
            this.curIndex = imageIndex;
            this.$refs.mainImage.style.left = `-${this.curIndex * 100}%`;
        },
    },
};
</script>

<style lang="scss" scoped>
$b-radius: 10px;
$size-l: 450px;
$size-m: 400px;
$size-s: 295px;

.image-slider {
    margin: 0 auto;
    width: $size-l;
    @include m() {
        width: $size-m;
    }
    @include media(500) {
        width: $size-s;
    }
    .view-box {
        width: 100%;
        border-radius: $b-radius;
        outline: 1px solid lighten($darkgreen, 50%);
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
        @include m() {
            margin-bottom: 20px;
        }
        @include media(500) {
            margin-bottom: 10px;
        }
        .main-image {
            display: flex;
            position: relative;
            left: 0%;
            transition: left 0.3s linear;
            img {
                width: 100%;
                aspect-ratio: 1 / 1;
                flex-shrink: 0;
                background-color: #fff;
            }
        }
        .buttons {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            opacity: 0;
            transition: opacity 0.3s ease;
            i {
                font-size: 50px;
                color: #fff;
                position: relative;
                @include m() {
                    font-size: 40px;
                }
                @include media(500) {
                    font-size: 30px;
                }
                &:hover {
                    color: $green;
                    &::after {
                        background-color: #fff;
                    }
                }
                &::after {
                    content: "";
                    position: absolute;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background-color: $green;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: -1;
                    @include m() {
                        width: 30px;
                        height: 30px;
                    }
                    @include media(500) {
                        width: 20px;
                        height: 20px;
                    }
                }
            }
        }
        &:hover .buttons {
            opacity: 1;
        }
    }
    .sub-images {
        width: 100%;
        display: flex;
        justify-content: flex-start;
        column-gap: calc(10% / 3);
        img {
            width: 22.5%;
            aspect-ratio: 1 / 1;
            border-radius: $b-radius;
            outline: 1px solid lighten($darkgreen, 50%);
            cursor: pointer;
            background-color: #fff;
        }
    }
}
</style>
