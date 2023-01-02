<template lang="">
    <div class="book-form" v-if="showForm">
        <form
            id="search-form"
            action="submit"
            method="post"
            data-form-storage="true"
            @submit.prevent="next"
            ref="form"
            enctype="multipart/form-data"
        >
            <h2>預約資訊</h2>
            <!-- <button id="close" @click.self="toggleModal">X</button> -->
            <button id="close" @click="closeList">X</button>

            <div class="form-group">
                <label for="mobile">手機號碼</label>
                <input
                    type="tel"
                    name="mobile"
                    id="mobile"
                    placeholder="請輸入您的手機號碼查詢"
                    v-model="searchText"
                    required
                    minlength="10"
                    maxlength="10"
                    pattern="^09\d{8}$"
                />
            </div>

            <button
                type="submit"
                class="btn btn-primary"
                @submit.prevent="next"
            >
                確認查詢
            </button>

            <div class="orderList" v-show="isOrder">
                <div class="order-info">
                    預約編號：No.{{ temp.rsv_id }}
                    <br />
                    預約日期：{{ temp.rsv_date }}
                    <br />
                    姓名：{{ temp.rsv_name }}
                    <br />
                    人數：{{ temp.rsv_ppl }}
                    <br />
                    Email：{{ temp.rsv_email }}
                    <br />
                    電話：{{ temp.rsv_mobile }}
                </div>

                <button @click="closeList" class="btn-primary ok-btn">
                    確認
                </button>
            </div>

            <div class="orderList" v-show="noOrder">
                <div class="order-info">查詢不到這筆預約唷！</div>
                <button @click="closeList" class="btn-primary ok-btn">
                    確認
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
    props: ["msg"],
    data() {
        return {
            temp: {},
            searchText: "",
            showForm: true,
            isOrder: false,
            noOrder: false,
        };
    },
    computed: {
        isAllFilled() {
            return this.searchText;
        },
    },
    created() {},
    methods: {
        closeIt() {
            this.showForm = false;
            // console.log(this.msg);
            // console.log(this.orderDate);
        },
        next() {
            // console.log(this.searchText);
            if (!this.$refs.form.checkValidity()) {
                // alert("手機號碼不正確");
                return;
            }

            // const productId = this.$route.params.id;
            const payload = {
                rsv_id: this.temp.rsv_id,
                rsv_date: this.temp.rsv_date,
                rsv_ppl: this.temp.rsv_ppl,
                rsv_name: this.temp.rsv_name,
                rsv_mobile: this.searchText,
                rsv_email: this.temp.rsv_email,
                rsv_status: this.temp.rsv_status,
                rsv_ps: this.temp.rsv_ps,
            };
            const apiURL = new URL(`${BASE_URL}/getResvInfo.php`);
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams({
                    rsv_mobile: this.searchText,
                }),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log("AA", this.searchText);
                    console.log("BB", json);

                    if (Object.keys(json).length > 0) {
                        this.temp = json;
                        this.isOrder = true;
                        console.log(Object.keys(this.temp).length);
                    } else {
                        this.noOrder = true;
                    }
                });
        },
        closeList() {
            // this.showForm = false;
            this.$emit("closeList");
        },
    },
};
</script>
<style lang="scss" scoped>
.book-form {
    width: 700px;
    height: 400px;
    border: 1px solid #96bbbd;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    background-color: #d0e8ea;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
    display: fixed;
}
h2 {
    margin-top: 40px;
}

#close {
    position: absolute;
    right: 1.5%;
    top: 1.5%;
    border: 0;
    font-size: 28px;
    font-weight: 500;
    color: #337a7d;
    background-color: transparent;
    cursor: pointer;
    z-index: 3;
    text-align: center;
    width: 32px;
}
#close:hover {
    color: #07617d;
    shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
}

.form-group {
    text-align: left;
    font-size: 20px;
    font-weight: 500;
    width: 500px;
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
}
.form-group .form-control {
    width: 500px;
    height: 40px;
    font-size: 15px;
    margin: 0 auto 10px;
    border-radius: 10px;
    border: 1px solid #bcbcbc;
    padding-left: 10px;
}
.orderList {
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #d0e8ea;
    transform: translate(-50%, -50%);
    text-align: left;
    font-size: 20px;
    font-weight: 500;
    width: 600px;
    height: 100%;
}
.orderList .ok-btn {
    position: absolute;
    transform: translate(-50%, -50%);
    bottom: 5%;
    left: 50%;
    color: #337a7d;
    padding: 0 10px;
    border-radius: 10px;
    border: #337a7d 1px solid;
    cursor: pointer;
}

.order-info {
    width: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f8f8f8;
    padding: 20px;
    line-height: 30px;
    letter-spacing: 1.4px;
    border-radius: 10px;
    box-shadow: 0px 15px 10px -15px #111;
}

.btn {
    @extend %btn;
    background-color: $btn-light-color;
    margin: 50px;
    padding: 5px 10px;

    &:hover {
        background-color: $btn-color;
        color: white;
    }
}

@media screen and (max-width: 768px) {
    h2 {
        margin-top: 30px;
    }
    .book-form {
        width: 90%;
        height: 35%;
    }
    .form-group {
        text-align: left;
        font-size: 16px;
        width: 80%;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 6px;
    }
    .form-group .form-control {
        width: 100%;
        height: 35px;
        font-size: 15px;
        margin: 0 auto 5px;
        border-radius: 10px;
    }
    .orderList {
        position: absolute;
        top: 50%;
        left: 50%;
        background-color: #d0e8ea;
        transform: translate(-50%, -50%);
        text-align: left;
        font-size: 16px;
        font-weight: 500;
        width: 90%;
        height: 100%;
    }
    .order-info {
        width: 85%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f8f8f8;
        padding: 20px;
        line-height: 25px;
        letter-spacing: 0.6px;
        border-radius: 10px;
        box-shadow: 0px 15px 10px -15px #111;
    }

    .btn {
        margin: 10px;
        width: 100px;
        height: 40px;
        border-radius: 10px;
        background-color: #337a7d;
        color: white;
        cursor: pointer;
    }
}
</style>
