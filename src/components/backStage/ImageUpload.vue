<template>
    <div class="upload-wrapper">
        <input
            v-for="(item, index) in 4"
            :key="item"
            type="file"
            accept="image/*"
            :id="`uploadImages${index}`"
            style="display: none"
            name="image[]"
            ref="imgInput"
            @change="showImages(index)"
        />

        <template v-if="previewList.length">
            <div
                v-for="(item, index) in previewList"
                :key="item.id"
                class="upImage"
            >
                <div class="bgBlock">
                    <Icon
                        type="ios-trash-outline"
                        @click="deleteImage(item, index)"
                    ></Icon>
                </div>
                <img :src="item" />
            </div>
        </template>
        <label :for="`uploadImages${emptyIndex}`" v-show="!imgAllFilled">
            <img
                src="@/assets/images/addImage.svg"
                alt="上傳圖片"
                class="uploadLabel"
            />
        </label>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageList: [],
            previewList: [],
            showLabel: [false, false, false, false],
        };
    },
    computed: {
        // 檢查圖片位址為空的位址
        emptyIndex() {
            return this.showLabel.findIndex((item) => item === false);
        },
        // 當圖片上傳至四張時就不會顯示上傳的Label
        imgAllFilled() {
            return this.showLabel.every((item) => item === true);
        },
    },

    methods: {
        Clear() {
            this.$refs.imgInput.forEach((element) => {
                element.value = "";
            });
            this.imageList = [];
            this.previewList = [];
            this.showLabel = [false, false, false, false];
        },
        showImages(i) {
            // 預覽上傳圖片
            let input = this.$refs.imgInput[i];
            let index = 0;
            if (input.files) {
                var reader = new FileReader();
                // 檢查imageList是否有重複檔名的圖片
                let isRepeat = this.imageList.some(
                    (item) => item.name === input.files[index].name
                );
                // 有的話直接返回
                if (isRepeat) return;
                this.imageList.push(input.files[index]);
                reader.onload = (event) => {
                    this.previewList.push(event.target.result);
                };
                reader.readAsDataURL(input.files[index]);
            }
            this.showLabel[i] = true;
        },
        deleteImage(file, i) {
            console.log(this.imageList);
            this.showLabel[i] = false;
            this.$refs.imgInput[i].value = "";
            this.previewList.splice(this.previewList.indexOf(file), 1);
            this.imageList.splice(this.previewList.indexOf(file), 1);
        },
    },
    created() {
        window.addEventListener("change", this.countImages);
    },
};
</script>

<style lang="scss" scoped>
.upload-wrapper {
    user-select: none;
    display: flex;
    column-gap: 20px;
    .upImage {
        width: fit-content;
        position: relative;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        &:hover .bgBlock {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bgBlock {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            i {
                color: #fff;
                font-size: 24px;
                cursor: pointer;
            }
        }
        img {
            width: 150px;
            height: 150px;
            border: 1px solid $btn-light-color;
            border-radius: 10px;
            object-fit: cover;
            vertical-align: top;
        }
    }
}
label {
    img {
        width: 150px;
        height: 150px;
        vertical-align: top;
    }
}
</style>
