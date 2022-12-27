<template>
    <!-- <Header /> -->
    <section>
        <div class="content_active">
            <div class="content_active_sign_up">
                <h1>新增管理員</h1>
                <form
                    @submit.prevent="sign_up"
                    id="sign_up_form"
                    method="post"
                    enctype="multipart/form-data"
                >
                    <div>
                        <p>帳號</p>
                        <input
                            id="emp_account"
                            type="text"
                            placeholder="你的信箱或帳號"
                            v-model="sign_up_account"
                            required
                        />
                    </div>
                    <div>
                        <p class="content_active_sign_up_moveTxt_1">密碼</p>
                        <i class="icon_password"></i>
                        <input
                            type="text"
                            v-if="pwdType_one"
                            v-model="sign_up_password"
                        />
                        <input
                            type="password"
                            placeholder="Confirm Password"
                            v-model="sign_up_password"
                            required
                            v-else
                        />
                        <img
                            :src="seen_one ? seenImg : unseenImg"
                            @click="changeType_1"
                            v-on:mouseover="hoverEye_1"
                            v-on:mouseout="outEye_1"
                            class="sign_up_icon_eye"
                        />
                    </div>
                    <div>
                        <button
                            class="btn_sign_up"
                            type="submit"
                            @click="sign_up"
                        >
                            加入管理員
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            login_account: "",
            login_password: "",
            sign_up_account: "",
            sign_up_password: "",
            seen_one: "",
            seen_two: "",
            seen_three: "",
            unseenImg: require("../../assets/images/login/eye_close.png"),
            seenImg: require("../../assets/images/login/eye_open.png"),
            pwdType_one: false,
            pwdType_two: false,
            pwdType_three: false,
        };
    },
    methods: {
        // ======================================== 看得到密碼 click事件 ======================================== //
        changeType_1: function () {
            this.seen_one = !this.seen_one;
            this.pwdType_one = !this.pwdType_one;
        },

        hoverEye_1: function () {
            this.seen_one = !this.seen_one;
        },

        outEye_1: function () {
            this.seen_one = !this.seen_one;
        },

        changeType_2: function () {
            this.seen_two = !this.seen_two;
            this.pwdType_two = !this.pwdType_two;
        },

        hoverEye_2: function () {
            this.seen_two = !this.seen_two;
        },

        outEye_2: function () {
            this.seen_two = !this.seen_two;
        },

        changeType_3: function () {
            this.seen_three = !this.seen_three;
            this.pwdType_three = !this.pwdType_three;
        },

        hoverEye_3: function () {
            this.seen_three = !this.seen_three;
        },

        outEye_3: function () {
            this.seen_three = !this.seen_three;
        },

        // ======================================== 註冊會員加進資料庫 ======================================== //
        sign_up() {
            // const apiURL = new URL(`${BASE_URL}/getAdminAdd.php`);
            let url = `${BASE_URL}/getAdminAdd.php`;
            const signUpContent = {
                account: this.sign_up_account,
                password: this.sign_up_password,
            };

            fetch(url, {
                method: "POST",
                body: new URLSearchParams(signUpContent),
            })
                .then((res) => res.json())
                .then((result) => {
                    alert(result.msg);
                    location.reload();
                });
        },
    },
};
</script>

<style lang="scss" scoped>
.content_active {
    position: relative;
    // width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.content_active_sign_up {
    // position: absolute;
    // top: 50%;
    // left: 50%
    // width: fit-content;
    // margin: auto;
    // transform: translate(-50%,-50%);
}

.content_active_sign_up > form > div > input {
    text-align: left;
    padding: 5px ;
    margin: 3%;
    // margin-top: 0%;
    width: 0px;
    flex-grow: 8;
    color: #757575;
    border-radius:5px ;
}

// #emp_account {
//     margin-right: 5%;
// }

.content_active_sign_up > h2 {
    font-size: 24px;
    margin-top: 12%;
    font-weight: 400;
    color: #757575;
}

.content_active_sign_up > form > div > p {
    display: inline-block;
    width: 0;
    // padding-top: 1.5%;
    flex-grow: 2;
}

.content_active_sign_up > form > div {
    display: flex;
    justify-content: center;
    margin-top: 7%;
    align-items: center;
    position: relative;
}

.btn_sign_up {
    background-color: #579194;
    border: none;
    padding: 10px;
    width: 200px;
    border-radius: 3px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #eee;
    margin-top: 7.5%;
    cursor: pointer;
}

// ======================================== 眼睛 ======================================== //
.sign_up_icon_eye {
    width: 18px;
    height: 18px;
    // margin-left: 1.5%;
    // margin-top: 1.5%;
    top: 0;
    bottom: 0;
    margin: auto;
    right: -10%;

    position:absolute;
}

.login_icon_eye {
    width: 18px;
    height: 18px;
    // margin-left: 1.5%;
    // margin-top: 3.5%;
    top: 0;
    bottom: 0;
    margin: auto;
    right: -8%;
    position:absolute;
}
</style>
