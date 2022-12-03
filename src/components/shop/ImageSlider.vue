<template lang="">
    <div class="image-slider">
        <div class="view-box">
            <!-- :style="{ left: `-${this.curIndex * 100}%` }" -->
            <div ref="mainImage" class="main-image">
                <img
                    v-for="(imgPath, index) in imgs"
                    :src="imgPath"
                    :key="index"
                />
            </div>
            <div class="buttons">
                <Icon
                    type="ios-arrow-dropleft"
                    size="50"
                    @click="moveImage('left')"
                />
                <Icon
                    type="ios-arrow-dropright"
                    size="50"
                    @click="moveImage('right')"
                />
            </div>
        </div>
        <div class="sub-images">
            <img
                v-for="(imgPath, index) in imgs"
                :src="imgPath"
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
.image-slider {
    width: 500px;
    .view-box {
        width: 100%;
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
        .main-image {
            display: flex;
            position: relative;
            left: 0%;
            transition: left 0.3s linear;
            img {
                width: 100%;
                height: 500px;
                flex-shrink: 0;
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
        }
        &:hover .buttons {
            opacity: 1;
        }
    }
    .sub-images {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: space-between;
        img {
            width: 100px;
            height: 100%;
            cursor: pointer;
        }
    }
}
</style>
