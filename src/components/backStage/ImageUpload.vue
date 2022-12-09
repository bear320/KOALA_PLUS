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
            <div
                v-for="(item, index) in previewList"
                :key="index"
                class="prevImg"
            >
                <img :src="item" class="img-fluid" />
            </div>
        </template>
        <label for="uploadImages">
            <img
                src="@/assets/images/uploadImage.svg"
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
            previewList: [],
            image_list: [],
        };
    },
    methods: {
        showImages: function (event) {
            var input = event.target;
            var count = input.files.length;
            var index = 0;
            if (input.files) {
                while (count--) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.previewList.push(e.target.result);
                    };
                    this.image_list.push(input.files[index]);
                    reader.readAsDataURL(input.files[index]);
                    index++;
                }
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.upload-wrapper {
    display: flex;
    column-gap: 20px;
    .prevImg {
        width: fit-content;
        img {
            width: 150px;
            height: 150px;
            background-color: #fff;
            border: 1px solid $btn-light-color;
            border-radius: 10px;
        }
    }
}
label {
    img {
        width: 150px;
        height: 150px;
    }
}
</style>
