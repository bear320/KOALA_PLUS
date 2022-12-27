<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>資助認養管理</h1>
            <img
                src="@/assets/images/backstageindex/supportIcon.png"
                alt="【圖示】資助認養"
            />
        </div>
        <div class="sub-title">
            <h2>資助認養詳情</h2>
        </div>
    </section>
    <form class="wrapper function-wrapper" enctype="multipart/form-data">
        <div class="line">
            <div class="cell">
                <label for="sup-id">編號：</label>
                <input
                    type="text"
                    name="sup-id"
                    id="sup-id"
                    required
                    disabled
                    v-model="source.sup_id"
                />
            </div>
            <div class="cell">
                <label for="sup-date">日期：</label>
                <input
                    type="text"
                    name="sup-date"
                    id="sup-date"
                    v-model="source.sup_date"
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
                    v-model="source.mem_name"
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
                    v-model="source.sup_plan"
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
                    v-model="source.koala_name"
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
                    v-model="source.sup_price"
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
                    v-model="source.sup_note"
                ></textarea>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy" @click.prevent="postSupportUpdate">
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
import ImageUpload from "@/components/backStage/ImageUpload.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
        ImageUpload,
    },
    data() {
        return {
            source: [],
        };
    },
    methods: {
        getSupportInfo() {
            const supportId = this.$route.params.sup_id;
            const apiURL = new URL(
                `${BASE_URL}/getSupportInfo.php?supportId=${supportId}`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.source = json.supportInfo;
                });
        },
        postSupportUpdate() {
            const apiURL = new URL(`${BASE_URL}/postSupportUpdate.php`);
            const supportUpdate = {
                sup_id: Number(this.source.sup_id),
                sup_note: this.source.sup_note,
            };

            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(supportUpdate),
            })
                .then((res) => res.json())
                .then((status) => {
                    // alert(status.msg);
                    this.confirmModal();
                });
        },
        confirmModal() {
            this.$Modal.confirm({
                title: "訂單備註已修改",
                content: "<p>訂單備註已修改，是否關閉此分頁？</p>",
                okText: "是",
                cancelText: "否",
                onOk: () => {
                    this.$Modal.remove();
                    window.close();
                },
            });
        },
    },
    created() {
        this.getSupportInfo();
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
<style lang="scss">
.ivu-modal-confirm-head {
    .ivu-icon {
        color: $green;
    }
}
.ivu-btn-text {
    &:hover {
        color: $green;
    }
}
.ivu-btn-primary {
    background-color: $green;
    border-color: $green;
    &:hover {
        background-color: $green;
        border-color: $green;
    }
}
</style>
