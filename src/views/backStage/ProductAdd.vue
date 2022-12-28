<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>新增商品</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        enctype="multipart/form-data"
        ref="prod-form"
    >
        <div class="line">
            <div class="cell">
                <label for="prod_name">商品名稱：</label>
                <input type="text" name="prod_name" id="prod_name" required />
            </div>
            <div class="cell">
                <label for="prod-category">商品分類</label>
                <select
                    type="text"
                    name="prod_category"
                    id="prod_category"
                    required
                >
                    <option value="daily">生活小物</option>
                    <option value="doll">玩具/絨毛娃娃</option>
                    <option value="apparel">服飾</option>
                </select>
            </div>
            <div class="cell">
                <label for="prod_price">單價：</label>
                <input type="text" name="prod_price" id="prod_price" required />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="prod_listed">上 / 下架：</label>
                <select
                    type="text"
                    name="prod_listed"
                    id="prod_listed"
                    required
                >
                    <option value="1">上架</option>
                    <option value="0">下架</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="prod_info">描述：</label>
                <textarea
                    name="prod_info"
                    id="prod_info"
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
                <button class="btn-paramy" @click.prevent="send">
                    <img src="@/assets/images/icon/confirm.svg" alt="" />確認
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import ImageUpload from "@/components/backStage/ImageUpload.vue";
import { returnStatement } from "@babel/types";
import { BASE_URL } from "@/assets/js/common.js";

export default {
    components: {
        Header,
        ImageUpload,
    },
    data() {
        return {};
    },
    methods: {
        send() {
            if (!this.$refs["prod-form"].checkValidity()) return;
            const formData = new FormData(this.$refs["prod-form"]);
            console.log(formData.getAll("image[]"));
            fetch(`${BASE_URL}/postInsertProduct.php`, {
                method: "post",
                body: formData,
            })
                .then((res) => res.json())
                .then((json) => {
                    // if (json.status === 0) {
                    console.log("新增成功");
                    // 新增成功後，表單欄位
                    this.$refs["prod-form"].reset();
                    // 呼叫ImageUpload裡的Clear重置狀態
                    this.$refs.imageUpload.Clear();
                    // } else {
                    // console.log("新增失敗");
                    // }
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
