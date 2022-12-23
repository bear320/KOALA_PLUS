<template>
    <div class="upload-wrapper">
        <input
            type="file"
            accept="image/*"
            multiple="multiple"
            id="uploadImages"
            style="display: none"
            @change="showImages"
        />
        <template v-if="previewList.length">
            <div v-for="item in previewList" :key="item.id" class="upImage">
                <div class="bgBlock">
                    <Icon
                        type="ios-trash-outline"
                        @click="deleteImage(item)"
                    ></Icon>
                </div>
                <img :src="item" />
            </div>
        </template>
        <label for="uploadImages" v-show="uploadShow">
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
            uploadShow: true,
        };
    },
    methods: {
        showImages(e) {
            // 限制上傳圖片數量
            let uploadImages = document.getElementById("uploadImages");
            if (
                uploadImages.files.length > 4 ||
                this.imageList.length + uploadImages.files.length > 4
            ) {
                alert("超過上傳數量限制！");
                return;
            }

            // 預覽上傳圖片
            let input = e.target;
            let count = input.files.length;
            let index = 0;
            if (input.files) {
                while (count--) {
                    var reader = new FileReader();
                    console.log(input.files[index]);
                    //
                    this.imageList.push(input.files[index]);
                    reader.onload = (event) => {
                        this.previewList.push(event.target.result);
                    };
                    reader.readAsDataURL(input.files[index]);
                    index++;
                }
            }
        },
        deleteImage(file) {
            this.previewList.splice(this.previewList.indexOf(file), 1);
            this.imageList.splice(this.previewList.indexOf(file), 1);
            this.countImages();
        },
        countImages() {
            if (this.imageList.length > 4 || this.imageList.length == 4) {
                this.uploadShow = false;
            } else {
                this.uploadShow = true;
            }
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
