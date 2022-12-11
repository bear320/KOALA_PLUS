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
                <label for="koala-name">名字：</label>
                <input
                    type="text"
                    name="koala-name"
                    id="koala-name"
                    placeholder="請輸入名字"
                    required
                    v-model="temp.name"
                />
            </div>
            <div class="cell">
                <label for="koala-sex">性別：</label>
                <select
                    type="text"
                    name="koala-sex"
                    id="koala-sex"
                    v-model="temp.sex"
                    required
                >
                    <option value="Male">公</option>
                    <option value="Female">母</option>
                </select>
            </div>
            <div class="cell">
                <label for="koala-id">編號：</label>
                <input
                    type="text"
                    name="koala-id"
                    id="koala-id"
                    v-model="temp.id"
                    disabled
                    required
                />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="koala-dob">出生日期：</label>
                <input
                    type="date"
                    name="koala-dob"
                    id="koala-dob"
                    v-model="temp.dob"
                    required
                />
            </div>
            <div class="cell">
                <label for="koala-listed">上 / 下架：</label>
                <select
                    type="text"
                    name="koala-listed"
                    id="koala-listed"
                    v-model="temp.listed"
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
                    v-model="temp.desc"
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
            koalas: [
                {
                    name: "Emily",
                    id: "K001",
                    dob: "2020-03-22",
                    sex: "Female",
                    listed: 1,
                    desc: "I'm Emily.",
                },
                {
                    name: "Gabriel",
                    id: "K002",
                    dob: "2019-05-20",
                    sex: "Male",
                    listed: 1,
                    desc: "I'm Gabriel.",
                },
                {
                    name: "Lucien",
                    id: "K003",
                    dob: "2019-10-15",
                    sex: "Male",
                    listed: 1,
                    desc: "I'm Lucien.",
                },
                {
                    name: "Camille",
                    id: "K004",
                    dob: "2018-04-08",
                    sex: "Female",
                    listed: 1,
                    desc: "I'm Camille.",
                },
                {
                    name: "Mindy",
                    id: "K005",
                    dob: "2017-07-10",
                    sex: "Female",
                    listed: 1,
                    desc: "I'm Mindy.",
                },
                {
                    name: "Antoine",
                    id: "K006",
                    dob: "2015-01-16",
                    sex: "Male",
                    listed: 0,
                    desc: "I'm Antoine.",
                },
            ],
            temp: [],
        };
    },
    created() {
        [this.temp] = [
            ...this.koalas.filter((item) => {
                return item.id === this.$route.params.id;
            }),
        ];
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
