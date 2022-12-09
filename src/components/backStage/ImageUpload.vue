<template>
    <div class="upload-wrapper">
        <div class="upload" v-for="item in 4" :key="item.id">
            <input
                type="file"
                name="uploadImage"
                :id="item"
                style="display: none"
            />
            <label :for="item" @change="showImage">
                <img src="@/assets/images/uploadImage.svg" class="upImages" />
            </label>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // images: [],
        };
    },
    methods: {
        showImage(e) {
            this.file = e.target.files[0];
            if (!this.file) {
                return;
            }
            let reader = new FileReader();
            reader.onload = function () {
                this.item.src = read.result;
            };
            reader.readAsDataURL(file);
        },
    },
};
</script>

<style lang="scss" scoped>
.upload-wrapper {
    display: flex;
    column-gap: 20px;
    .upload {
        width: fit-content;
        img {
            width: 150px;
            height: 150px;
        }
    }
}
</style>
