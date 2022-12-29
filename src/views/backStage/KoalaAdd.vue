<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>無尾熊管理</h1>
            <img
                src="@/assets/images/backstageindex/koalaIcon.png"
                alt="【圖示】無尾熊"
            />
        </div>
        <div class="sub-title">
            <h2>新增無尾熊</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        enctype="multipart/form-data"
        ref="koala-form"
    >
        <div class="line">
            <div class="cell">
                <label for="koala_name">名字：</label>
                <input
                    type="text"
                    name="koala_name"
                    id="koala_name"
                    placeholder="請輸入名字"
                    required
                />
            </div>
            <div class="cell">
                <label for="koala_sex">性別：</label>
                <select type="text" name="koala_sex" id="koala_sex" required>
                    <option value="Male">公</option>
                    <option value="Female">母</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala_dob">出生日期：</label>
                <input type="date" name="koala_dob" id="koala_dob" required />
            </div>
            <div class="cell">
                <label for="koala_listed">上 / 下架：</label>
                <select
                    type="text"
                    name="koala_listed"
                    id="koala_listed"
                    required
                >
                    <option value="1">上架</option>
                    <option value="0">下架</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala_info">描述：</label>
                <textarea
                    name="koala_info"
                    id="koala_info"
                    cols="30"
                    rows="10"
                    placeholder="請輸入描述內容"
                    required
                ></textarea>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <h4>
                    新增圖片：
                    <span>* 請至少上傳一張圖片，數量上限為四張</span>
                </h4>
                <ImageUpload ref="imageUpload"></ImageUpload>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy" @click.prevent="postNewKoala">
                    <img
                        src="@/assets/images/icon/confirm.svg"
                        alt="【圖示】確認"
                    />確認
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
import ImageUpload from "@/components/backStage/ImageUpload.vue";

export default {
    components: {
        Header,
        ImageUpload,
    },
    data() {
        return {};
    },
    methods: {
        postNewKoala() {
            if (!this.$refs["koala-form"].checkValidity()) {
                this.open(false);
                return;
            }
            const formData = new FormData(this.$refs["koala-form"]);
            console.log(formData.getAll("image[]"));
            const apiURL = new URL(`${BASE_URL}/postNewKoala.php`);
            fetch(apiURL, {
                method: "POST",
                body: formData,
            })
                .then((res) => res.json())
                .then((json) => {
                    if (json.status === 0) {
                        console.log("新增成功");
                        // 新增成功後，表單欄位
                        this.$refs["koala-form"].reset();
                        // 呼叫 ImageUpload 裡的 Clear 重置狀態
                        this.$refs.imageUpload.Clear();
                        this.confirmModal();
                    } else {
                        console.log("新增失敗");
                    }
                    // alert(status.msg);
                });
        },
        open(nodesc) {
            this.$Notice.open({
                title: "無尾熊資訊填寫不完整",
                desc: nodesc
                    ? ""
                    : "無尾熊資訊填寫不完整，請確認各欄位是否皆已填寫！",
            });
        },
        confirmModal() {
            this.$Modal.confirm({
                title: "無尾熊新增成功",
                content: "<p>無尾熊新增成功，是否關閉此分頁？</p>",
                okText: "是",
                cancelText: "否",
                onOk: () => {
                    this.$Modal.remove();
                    window.close();
                },
            });
        },
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
                line-height: 40px;
                padding: 5px 10px;
                background-color: #fff;
                outline: none;
                border: 1px solid $btn-light-color;
                border-radius: 10px;
                color: $btn-color;
                &:focus {
                    border: solid 1px $btn-color;
                }
                &:disabled {
                    cursor: not-allowed;
                    background-color: darken(#fff, 2%);
                }
            }
            textarea {
                padding: 10px;
            }
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
                span {
                    color: lighten($font-color, 30%);
                    font-size: 1rem;
                    margin-left: 10px;
                    text-decoration: underline;
                }
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
