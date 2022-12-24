<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>園區導覽管理</h1>
            <img src="@/assets/images/backstageindex/articleIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>修改預約</h2>
        </div>
    </section>
    <template>
        <Button @click="modal1 = true">Custom header and footer</Button>
        <Modal v-model="modal1" width="360">
            <template #header>
                <p style="color: #33717d; text-align: center">
                    <Icon type="md-checkmark-circle" style="color: #33717d" />
                    <span style="margin-left: 3px">修改成功</span>
                </p>
            </template>
            <div style="text-align: center">
                <p>此筆園區導覽預約訂單已經修改成功！</p>
            </div>
            <template #footer>
                <Button
                    type="sucessed"
                    size="middle"
                    width:150px
                    long
                    :loading="modal_loading"
                    @click="del"
                    >確定</Button
                >
            </template>
        </Modal>
    </template>
    <form
        class="wrapper function-wrapper"
        action=""
        enctype="multipart/form-data"
        method="post"
        data-form-storage="true"
        id="bookingEditForm"
    >
        <div class="line">
            <div class="cell">
                <label for="rsv_date">預約日期：</label>
                <input
                    type="date"
                    name="rsv_date"
                    id="rsv_date"
                    v-model="temp.rsv_date"
                    required
                />
            </div>

            <div class="cell">
                <label for="rsv_ppl">人數：</label>
                <select
                    type="number"
                    name="rsv_ppl"
                    id="rsv_ppl"
                    v-model="temp.rsv_ppl"
                    required
                >
                    <option disabled value="">選擇人數</option>
                    <option v-for="i in 20" :key="i" :value="i">{{ i }}</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="rsv_mobile">電話：</label>
                <input
                    type="phone"
                    name="rsv_mobile"
                    id="rsv_mobile"
                    v-model="temp.rsv_mobile"
                    required
                />
            </div>
            <div class="cell">
                <label for="rsv_id">編號：</label>
                <input
                    type="text"
                    name="rsv_id"
                    id="rsv_id"
                    disabled
                    v-model="temp.rsv_id"
                    required
                />
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="rsv_email">Email：</label>
                <input
                    type="email"
                    name="rsv_email"
                    id="rsv_email"
                    v-model="temp.rsv_email"
                    required
                />
            </div>

            <div class="cell">
                <label for="rsv_status">預約狀態：</label>
                <select
                    type="text"
                    name="rsv_status"
                    id="rsv_status"
                    v-model="temp.rsv_status"
                    required
                >
                    <option value="休館">休館</option>
                    <option value="已預約">已預約</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="rsv_ps">備註：</label>
                <textarea
                    name="rsv_ps"
                    id="rsv_ps"
                    cols="10"
                    rows="5"
                    placeholder="請輸入備註內容"
                    v-model="temp.rsv_ps"
                    required
                ></textarea>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy" id="btnInsert" @click.prevent="next">
                    <img src="@/assets/images/icon/confirm.svg" alt="" />確認
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
    props: ["msg", "callback"],
    data() {
        return {
            temp: {},
            modal1: false,
        };
    },
    created() {
        console.log(this.$route.params.id);
        const apiURL = new URL(
            `${BASE_URL}/getResvPage.php?bookId=${this.$route.params.id}`
        );
        // fetch(
        //     `http://localhost/cgd103_g1/public/api/getResvPage.php?bookId=${this.$route.params.id}`
        // )
        fetch(apiURL)
            .then((res) => res.json())
            .then((json) => {
                this.temp = json[0];
                console.log(this.temp);
            });
    },
    methods: {
        next() {
            const payload = {
                rsv_id: this.temp.rsv_id,
                rsv_date: this.temp.rsv_date,
                rsv_ppl: this.temp.rsv_ppl,
                rsv_name: this.temp.rsv_name,
                rsv_mobile: this.temp.rsv_mobile,
                rsv_email: this.temp.rsv_email,
                rsv_status: this.temp.rsv_status,
                rsv_ps: this.temp.rsv_ps,
            };
            // console.log(payload);

            // fetch("http://localhost/cgd103_g1/public/api/resvPage_insert.php",
            const apiURL = new URL(`${BASE_URL}/resvPage_insert.php`);
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(payload),
            })
                .then((res) => res.text())
                .then((result) => {
                    result = JSON.parse(result);
                    console.log(result);
                    // this.callback();
                    // alert(result);
                    this.modal1 = true;
                });
        },
        del() {
            setTimeout(() => {
                this.modal_loading = false;
                this.modal1 = false;
                this.$Message.success("Successfully delete");
                window.close();
            }, 450);
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
    .line:nth-child(4) {
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
