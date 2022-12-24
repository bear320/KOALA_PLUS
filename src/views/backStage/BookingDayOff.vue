<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>園區導覽管理</h1>
            <img src="@/assets/images/backstageindex/articleIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>新增休館日期</h2>
        </div>
    </section>
    <form class="wrapper function-wrapper" enctype="multipart/form-data">
        <div class="line">
            <div class="cell">
                <label for="rsv_date">休館日期：</label>
                <input
                    type="date"
                    name="rsv_date"
                    id="rsv_date"
                    v-model="orderDate"
                    required
                />
            </div>
        </div>

        <div class="line">
            <div class="cell">
                <label for="rsv_status">預約狀態：</label>
                <select
                    type="text"
                    name="rsv_status"
                    id="rsv_status"
                    v-model="status"
                    disabled
                >
                    <option selected value="休館">休館</option>
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
                    v-model="ps"
                    required
                ></textarea>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <button class="btn-paramy" id="btnInsert" @click.prevent="next">
                    <img
                        src="@/assets/images/icon/confirm.svg"
                        alt=""
                    />新增休館日
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
            people: 0,
            orderDate: "",
            status: "休館",
            ps: "",
        };
    },
    methods: {
        next() {
            console.log("next");
            const payload = {
                rsv_date: this.orderDate,
                rsv_ppl: 0,
                rsv_name: "koala+",
                rsv_mobile: null,
                rsv_email: null,
                rsv_status: "休館",
                rsv_ps: "",
            };
            const apiURL = new URL(`${BASE_URL}/resv_insert.php`);
            // fetch("http://localhost/cgd103_g1/public/api/resv_insert.php",
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(payload),
            })
                .then((res) => res.text())
                .then((result) => {
                    console.log(result);
                    result = JSON.parse(result);
                    // this.callback();
                    alert(result);
                    window.close();
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
