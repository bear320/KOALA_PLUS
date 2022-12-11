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
    <form
        class="wrapper function-wrapper"
        action=""
        enctype="multipart/form-data"
    >
        <div class="line">
            <div class="cell">
                <label for="rsv_date">休館日期：</label>
                <input type="date" name="rsv_date" id="rsv_date" required />
            </div>

            <div class="cell">
                <label for="rsv_ppl">人數：</label>
                <select type="number" name="rsv_date" id="rsv_date" required>
                    <option disabled value="">選擇人數</option>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="cell">
                <label for="rsv_id">編號：</label>
                <input
                    type="text"
                    name="rsv_id"
                    id="rsv_id"
                    disabled
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
                    v-model="temp.sex"
                    required
                >
                    <option value="0">休館</option>
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
