<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>無尾熊管理</h1>
            <img src="@/assets/images/backstageindex/koalaIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>編輯無尾熊</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        action=""
        enctype="multipart/form-data"
    >
        <div class="line">
            <div class="cell">
                <label for="koala-id">編號：</label>
                <input
                    type="text"
                    name="koala-id"
                    id="koala-id"
                    v-model="source.koala_id"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="koala-name">名字：</label>
                <input
                    type="text"
                    name="koala-name"
                    id="koala-name"
                    placeholder="請輸入名字"
                    required
                    v-model="source.koala_name"
                />
            </div>
            <div class="cell">
                <label for="koala-sex">性別：</label>
                <select
                    type="text"
                    name="koala-sex"
                    id="koala-sex"
                    v-model="source.koala_sex"
                    required
                >
                    <option value="Male">公</option>
                    <option value="Female">母</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala-dob">出生日期：</label>
                <input
                    type="date"
                    name="koala-dob"
                    id="koala-dob"
                    v-model="source.koala_dob"
                    required
                />
            </div>
            <div class="cell">
                <label for="koala-dob">年齡：</label>
                <input
                    type="text"
                    name="koala-dob"
                    id="koala-dob"
                    v-model="source.koala_age"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="koala-listed">上 / 下架：</label>
                <select
                    type="text"
                    name="koala-listed"
                    id="koala-listed"
                    v-model="source.koala_listed"
                    required
                >
                    <option value="1">上架</option>
                    <option value="0">下架</option>
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
                    v-model="source.koala_info"
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
                <!-- <ImageUpload></ImageUpload> -->
                <ImageEdit></ImageEdit>
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
import ImageEdit from "@/components/backStage/ImageEdit.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        // ImageUpload,
        ImageEdit,
    },
    data() {
        return {
            source: [],
        };
    },
    methods: {
        getKoalaEditInfo() {
            const koalaName = this.$route.params.koala_name;
            const apiURL = new URL(
                `${BASE_URL}/getKoalaEditInfo.php?koalaName=${koalaName}`
            );
            // const apiURL = new URL(
            //     `http://localhost:8888/cgd103_g1/public/api/getKoalaEditInfo.php?koalaName=${koalaName}`
            // );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.koalaInfo;
                });
        },
    },
    created() {
        this.getKoalaEditInfo();
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
