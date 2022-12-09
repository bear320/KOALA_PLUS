<template>
    <div class="demo-upload-list" v-for="item in uploadList" :key="item.id">
        <template v-if="item.status === 'finished'">
            <Image :src="item.url" fit="cover" width="100%" height="100%" />
            <div class="demo-upload-list-cover">
                <Icon
                    type="ios-eye-outline"
                    @click="handleView(item.name)"
                ></Icon>
                <Icon
                    type="ios-trash-outline"
                    @click="handleRemove(item)"
                ></Icon>
            </div>
        </template>
        <template v-else>
            <Progress
                v-if="item.showProgress"
                :percent="item.percentage"
                hide-info
            ></Progress>
        </template>
    </div>
    <Upload
        ref="upload"
        :show-upload-list="false"
        :default-file-list="defaultList"
        :on-success="handleSuccess"
        :format="['jpg', 'jpeg', 'png']"
        :max-size="2048"
        :on-format-error="handleFormatError"
        :on-exceeded-size="handleMaxSize"
        :before-upload="handleBeforeUpload"
        multiple
        type="drag"
        action="//jsonplaceholder.typicode.com/posts/"
        style="display: inline-block; width: 148px"
    >
        <div
            style="
                width: 148px;
                height: 148px;
                line-height: 148px;
                border-radius: 10px;
            "
        >
            <Icon type="ios-camera" size="20"></Icon>
        </div>
    </Upload>
    <ImagePreview
        v-model="visible"
        :preview-list="['https://file.iviewui.com/images/' + imgName]"
    />
</template>

<script>
export default {
    data() {
        return {
            defaultList: [
                {
                    name: "image-demo-1.jpg",
                    url: "https://file.iviewui.com/images/image-demo-1.jpg",
                },
                {
                    name: "image-demo-2.jpg",
                    url: "https://file.iviewui.com/images/image-demo-2.jpg",
                },
            ],
            imgName: "",
            visible: false,
            uploadList: [],
        };
    },
    methods: {
        handleView(name) {
            this.imgName = name;
            this.visible = true;
        },
        handleRemove(file) {
            const fileList = this.$refs.upload.fileList;
            this.$refs.upload.fileList.splice(fileList.indexOf(file), 1);
        },
        handleSuccess(res, file) {
            // file.url = "https://file.iviewui.com/images/image-demo-3.jpg";
            // file.name = "image-demo-3.jpg";
        },
        handleFormatError(file) {
            this.$Notice.warning({
                title: "圖片格式錯誤",
                desc:
                    "圖片 " +
                    file.name +
                    " 格式錯誤, 請選擇 jpg 或 png 格式之圖片！",
            });
        },
        handleMaxSize(file) {
            this.$Notice.warning({
                title: "上傳圖片超過大小限制",
                desc:
                    "圖片 " + file.name + " 檔案過大，上傳圖片不得大於 2MB 。",
            });
        },
        handleBeforeUpload() {
            const check = this.uploadList.length < 5;
            if (!check) {
                this.$Notice.warning({
                    title: "最多只能上傳 4 張圖片",
                });
            }
            return check;
        },
        upload() {},
    },
    mounted() {
        this.uploadList = this.$refs.upload.fileList;
    },
};
</script>

<style lang="scss" scoped>
$size: 150px;
$b-radius: 10px;

.demo-upload-list {
    display: inline-block;
    width: $size;
    height: $size;
    text-align: center;
    line-height: 60px;
    border: 1px solid transparent;
    border-radius: $b-radius;
    overflow: hidden;
    background: #fff;
    position: relative;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    margin-right: 25px;

    img {
        width: 100%;
        height: 100%;
    }
}

.demo-upload-list-cover {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);

    i {
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        margin: 0 2px;
    }
}

.demo-upload-list:hover .demo-upload-list-cover {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<style lang="scss">
.ivu-upload {
    .ivu-upload-drag {
        border-radius: 10px;
        &:hover {
            border: 1px dashed $green !important;
        }
    }
}
</style>
