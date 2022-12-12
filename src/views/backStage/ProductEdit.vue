<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>商品管理</h1>
            <img src="@/assets/images/backstageindex/productIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>編輯商品</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        action=""
        enctype="multipart/form-data"
    >
        <div class="line">
            <div class="cell">
                <label for="prod-name">商品名稱：</label>
                <input type="text" name="prod-name" id="prod-name" required />
            </div>
            <div class="cell">
                <label for="prod-category">商品分類</label>
                <select
                    type="text"
                    name="prod-category"
                    id="prod-category"
                    required
                >
                    <option value="daily">生活小物</option>
                    <option value="doll">玩具/絨毛娃娃</option>
                    <option value="apparel">服飾</option>
                </select>
            </div>
            <div class="cell">
                <label for="prod-price">單價：</label>
                <input type="text" name="prod-price" id="prod-price" required />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="prod-listed">上 / 下架：</label>
                <select
                    type="text"
                    name="prod-listed"
                    id="prod-listed"
                    required
                >
                    <option value="1">上架</option>
                    <option value="0">下架</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="prod-desc">描述：</label>
                <textarea
                    name="prod-desc"
                    id="prod-desc"
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
import ImageUpload from "@/components/backStage/ImageUpload.vue";

export default {
    components: {
        Header,
        ImageUpload,
    },
    data() {
        return {
            temp: [],
        };
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
