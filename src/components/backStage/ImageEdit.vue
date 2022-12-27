<template>
    <div class="upload-wrapper">
        <form enctype="multipart/form-data" ref="prod-form">
            <input
                type="file"
                accept="image/*"
                id="uploadImages"
                style="display: none"
                name="image"
                ref="imgInput"
                @change="showImages(index)"
            />
        </form>

        <div v-for="(item, index) in imgs" :key="item.pathID" class="upImage">
            <div class="bgBlock">
                <Icon
                    type="ios-trash-outline"
                    @click="deleteImage(item, index)"
                ></Icon>
            </div>
            <img :src="item.path" />
        </div>
        <label for="uploadImages" v-show="!imgAllFilled">
            <img
                src="@/assets/images/addImage.svg"
                alt="上傳圖片"
                class="uploadLabel"
            />
        </label>
    </div>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
    props: ["imgs"],
    data() {
        return {
            imageList: [],
            previewList: this.imgs,
            showLabel: [],
            editItem: [],
        };
    },

    computed: {
        // 檢查圖片位址為空的位址
        emptyIndex() {
            return this.imgs.length;
        },
        // 當圖片上傳至四張時就不會顯示上傳的Label
        imgAllFilled() {
            return this.imgs.length >= 4;
        },
    },

    methods: {
        Clear() {
            this.$refs.imgInput.forEach((element) => {
                element.value = "";
            });
            this.imageList = [];
        },
        showImages(i) {
            // 預覽上傳圖片
            let input = this.$refs.imgInput;
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
                    this.imgs.push({
                        pathID: this.editItem[0],
                        path: event.target.result,
                    });
                    this.editItem.shift();
                };
                reader.readAsDataURL(input.files[index]);
            }
            this.showLabel[i] = true;

            const fd = new FormData(this.$refs["prod-form"]);
            fd.append("type", "insert");
            fd.append("index", `${this.emptyIndex + 1}`);
            console.log(fd.getAll("image"));
            fetch(`${BASE_URL}/postUpdateProdImg.php`, {
                method: "post",
                body: fd,
            })
                .then((res) => res.json())
                .then((json) => console.log(json));
        },

        deleteImage(file, i) {
            this.showLabel[i] = false;

            this.$refs.imgInput.value = "";
            this.imageList.splice(this.imageList.indexOf(file), 1);
            this.imgs.splice(this.imgs.indexOf(file), 1);
            fetch(`${BASE_URL}/postUpdateProdImg.php`, {
                method: "post",
                body: new URLSearchParams({
                    type: "del",
                    index: i + 1,
                }),
            })
                .then((res) => res.json())
                .then((json) => {
                    this.$emit(
                        "update",
                        json.filter((item) => {
                            return item !== "";
                        })
                    );
                });
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
