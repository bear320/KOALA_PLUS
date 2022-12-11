<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>資助認養管理</h1>
            <img src="@/assets/images/backstageindex/supportIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>資助認養詳情</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        action=""
        enctype="multipart/form-data"
    >
        <div class="line">
            <div class="cell">
                <label for="sup-id">編號：</label>
                <input
                    type="text"
                    name="sup-id"
                    id="sup-id"
                    required
                    disabled
                    v-model="temp.id"
                />
            </div>
            <div class="cell">
                <label for="sup-date">日期：</label>
                <input
                    type="text"
                    name="sup-date"
                    id="sup-date"
                    v-model="temp.date"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="sup-donator">捐贈者：</label>
                <input
                    type="text"
                    name="sup-donator"
                    id="sup-donator"
                    v-model="temp.donator"
                    disabled
                    required
                />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="sup-plan">方案：</label>
                <select
                    type="text"
                    name="sup-plan"
                    id="sup-plan"
                    v-model="temp.plan"
                    disabled
                    required
                >
                    <option value="0">認養</option>
                    <option value="1">資助</option>
                </select>
            </div>
            <div class="cell">
                <label for="sup-koala">無尾熊：</label>
                <input
                    type="text"
                    name="sup-koala"
                    id="sup-koala"
                    v-model="temp.koala"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="sup-price">金額：</label>
                <input
                    type="text"
                    name="sup-price"
                    id="sup-price"
                    v-model="temp.price"
                    disabled
                    required
                />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="sup-desc">訂單備註：</label>
                <textarea
                    name="sup-desc"
                    id="sup-desc"
                    cols="30"
                    rows="10"
                    placeholder="請輸入訂單備註"
                    v-model="temp.desc"
                    required
                ></textarea>
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
            donateOrders: [
                {
                    donator: "Joyce Byers",
                    id: "S00001",
                    date: "2022-12-01",
                    plan: 0,
                    koala: "Gabriel",
                    price: 1000,
                    desc: "Joyce Byers 在 2022-12-01 時，領養了無尾熊 Gabriel。",
                },
                {
                    donator: "Jim Hopper",
                    id: "S00002",
                    date: "2022-12-02",
                    plan: 0,
                    koala: "Camille",
                    price: 1000,
                    desc: "",
                },
                {
                    donator: "Dustin Henderson",
                    id: "S00003",
                    date: "2022-12-03",
                    plan: 1,
                    koala: "",
                    price: 300,
                    desc: "",
                },
                {
                    donator: "Lucas Sinclair",
                    id: "S00004",
                    date: "2022-12-04",
                    plan: 1,
                    koala: "",
                    price: 300,
                    desc: "",
                },
                {
                    donator: "Nancy Wheeler",
                    id: "S00005",
                    date: "2022-12-05",
                    plan: 0,
                    koala: "Lucien",
                    price: 1000,
                    desc: "",
                },
                {
                    donator: "Steve Harrington",
                    id: "S00006",
                    date: "2022-12-06",
                    plan: 0,
                    koala: "Emily",
                    price: 1000,
                    desc: "",
                },
            ],
            temp: [],
        };
    },
    created() {
        [this.temp] = [
            ...this.donateOrders.filter((item) => {
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
