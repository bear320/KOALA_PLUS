<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>無尾熊管理</h1>
            <img src="@/assets/images/backstageindex/koalaIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>新增無尾熊</h2>
        </div>
    </section>
    <form class="wrapper function-wrapper">
        <div class="line">
            <div class="cell">
                <label for="koala-name">無尾熊名字：</label>
                <input
                    type="text"
                    name="koala-name"
                    id="koala-name"
                    placeholder="請輸入名字"
                    required
                />
            </div>
            <div class="cell">
                <label for="koala-sex">性別：</label>
                <select type="text" name="koala-sex" id="koala-sex" required>
                    <option value="" selected>性別</option>
                    <option value="male">公</option>
                    <option value="female">母</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala-dob">出生日期：</label>
                <input type="date" name="koala-dob" id="koala-dob" required />
            </div>
            <div class="cell">
                <label for="koala-listed">上 / 下架：</label>
                <select
                    type="text"
                    name="koala-listed"
                    id="koala-listed"
                    required
                >
                    <option value="" selected>上 / 下架</option>
                    <option value="true">上架</option>
                    <option value="false">下架</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala-desc">描述：</label>
                <textarea
                    name="koala-desc"
                    id="koala-desc"
                    cols="30"
                    rows="10"
                    placeholder="請輸入描述內容"
                    required
                ></textarea>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <h4>新增圖片：</h4>
                <!-- <UploadImage></UploadImage> -->
                <ImageUpload></ImageUpload>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy">
                    <img src="@/assets/images/icon/confirm.svg" alt="" />確認
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
// import UploadImage from "@/components/backStage/UploadImage.vue";
import ImageUpload from "@/components/backStage/ImageUpload.vue";

export default {
    components: {
        Header,
        // UploadImage,
        ImageUpload,
    },
};
</script>

<style lang="scss" scoped>
.title-wrapper {
    margin-bottom: 20px;
    text-align: left;
    .title {
        display: flex;
        column-gap: 20px;
        h1 {
            display: block;
            width: fit-content;
        }
        img {
            height: 67.5px;
        }
    }
    .sub-title {
        margin-bottom: 20px;
        h2 {
            color: $green;
            @include borderLeft(30px);
        }
    }
}
.function-wrapper {
    text-align: left;
    .line {
        display: flex;
        column-gap: calc(10% / 3);
        .cell {
            width: 22.5%;
            font-size: 18px;
            font-family: font-R;
            label {
                width: 100%;
                display: inline;
            }
            input,
            select {
                width: 100%;
                display: inline;
                height: 40px;
            }
            select,
            input[type="date"] {
                background-color: #fff;
                border: 1px solid $btn-light-color;
                border-radius: 10px;
                color: $btn-color;
                padding: 3px 5px;
                &:focus {
                    border: solid 1px $btn-color;
                }
            }
            input[type="date"]::-webkit-datetime-edit-text {
                padding: 0 1rem;
            }
            // input[type="date"]::-webkit-calendar-picker-indicator {
            //     color: $btn-color;
            // }
            label + input,
            label + select,
            label + textarea {
                margin-top: 10px;
            }
        }
    }
    .line:nth-child(3) {
        .cell {
            width: 100%;
            textarea {
                resize: none;
            }
        }
    }
    .line:nth-child(4) {
        .cell {
            width: 100%;
            h4 {
                margin-bottom: 10px;
            }
        }
    }
    .line:last-child {
        margin-bottom: 30px;
        .cell {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            button {
                @include btnSize(30px);
                display: flex;
                align-items: center;
                img {
                    margin-right: 10px;
                    vertical-align: middle;
                }
            }
        }
    }
    .line + .line {
        margin-top: 30px;
    }
}
</style>
