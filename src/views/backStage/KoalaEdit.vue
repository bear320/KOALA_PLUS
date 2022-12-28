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
            <h2>編輯無尾熊</h2>
        </div>
    </section>
    <form
        class="wrapper function-wrapper"
        enctype="multipart/form-data"
        ref="koala_form"
    >
        <div class="line">
            <div class="cell">
                <label for="koala_id">編號：</label>
                <input
                    type="text"
                    name="koala_id"
                    id="koala_id"
                    v-model="source.koala_id"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="koala_name">名字：</label>
                <input
                    type="text"
                    name="koala_name"
                    id="koala_name"
                    placeholder="請輸入名字"
                    required
                    v-model="source.koala_name"
                />
            </div>
            <div class="cell">
                <label for="koala_sex">性別：</label>
                <select
                    type="text"
                    name="koala_sex"
                    id="koala_sex"
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
                <label for="koala_dob">出生日期：</label>
                <input
                    type="date"
                    name="koala_dob"
                    id="koala_dob"
                    v-model="source.koala_dob"
                    required
                />
            </div>
            <div class="cell">
                <label for="koala_age">年齡：</label>
                <input
                    type="text"
                    name="koala_age"
                    id="koala_age"
                    v-model="source.koala_age"
                    disabled
                    required
                />
            </div>
            <div class="cell">
                <label for="koala_listed">上 / 下架：</label>
                <select
                    type="text"
                    name="koala_listed"
                    id="koala_listed"
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
                <label for="koala_info">描述：</label>
                <textarea
                    name="koala_info"
                    id="koala_info"
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
                <KoalaImageEdit
                    ref="imageUpload"
                    :imgs="imgsPath"
                    :koala_name="this.$route.params.koala_name"
                    @update="updateImgs"
                ></KoalaImageEdit>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy" @click.prevent="postKoalaUpdate">
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
import KoalaImageEdit from "@/components/backStage/KoalaImageEdit.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        KoalaImageEdit,
    },
    data() {
        return {
            // source: [],
            source: {},
            imgsPath: [],
        };
    },
    methods: {
        // getKoalaEditInfo() {
        //     const koalaName = this.$route.params.koala_name;
        //     // const apiURL = new URL(
        //     //     `${BASE_URL}/getKoalaEditInfo.php?koalaName=${koalaName}`
        //     // );
        //     const apiURL = new URL(
        //         `${BASE_URL}/getKoalaInfo.php?koalaName=${koalaName}`
        //     );
        //     // const apiURL = new URL(
        //     //     `http://localhost:8888/cgd103_g1/public/api/getKoalaEditInfo.php?koalaName=${koalaName}`
        //     // );
        //     fetch(apiURL)
        //         .then((res) => res.json())
        //         .then((json) => {
        //             this.source = json.koalaInfo;
        //         });
        // },
        postKoalaUpdate() {
            const apiURL = new URL(`${BASE_URL}/postKoalaUpdate.php`);
            const koalaUpdate = {
                koala_id: Number(this.source.koala_id),
                koala_name: this.source.koala_name,
                koala_sex: this.source.koala_sex,
                koala_dob: this.source.koala_dob,
                koala_listed: Number(this.source.koala_listed),
                koala_info: this.source.koala_info,
            };
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(koalaUpdate),
            })
                .then((res) => res.json())
                .then((status) => {
                    // alert(status.msg);
                    this.confirmModal();
                });
        },
        updateImgs(payload) {
            console.log(payload);
            this.imgsPath = payload.map((img, index) => {
                return {
                    pathID: index,
                    path: `../images/koalas/${img}`,
                };
            });
        },
        confirmModal() {
            this.$Modal.confirm({
                title: "無尾熊資訊已修改",
                content: "<p>無尾熊資訊已修改，是否關閉此分頁？</p>",
                okText: "是",
                cancelText: "否",
                onOk: () => {
                    this.$Modal.remove();
                    window.close();
                },
            });
        },
    },
    async created() {
        // this.getKoalaEditInfo();
        const res = await fetch(
            `${BASE_URL}/getKoalaInfo.php?koalaName=${this.$route.params.koala_name}`
        );

        const result = await res.json();
        this.source = result.koalaInfo;
        this.imgsPath = this.source.koala_images
            .filter((item) => {
                return item !== "";
            })
            .map((img, index) => {
                return {
                    pathID: index,
                    path: `../images/koalas/${img}`,
                };
            });
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
