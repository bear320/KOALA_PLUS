<template>
    <Header></Header>
    <section class="main_block nav_space wrapper">
        <div class="main_content">
            <div class="main_content_center">
                <div class="content_login">
                    <!-- ======================================== 註冊會員、登入會員、忘記密碼的block ======================================== -->
                    <div class="content_login_sign_up">
                        <div class="content_sign_up_block">
                            <div class="content_opcitiy content_opcitiy_left">
                                <p>尚未擁有會員？</p>
                                <button
                                    class="main_block_btn_sign_up"
                                    @click="sign_up"
                                >
                                    註冊會員
                                </button>
                            </div>
                        </div>
                        <div class="content_login_block">
                            <div class="content_opcitiy content_opcitiy_right">
                                <p>已經擁有會員？</p>
                                <button
                                    class="main_block_btn_login"
                                    @click="login"
                                >
                                    登入會員</button
                                ><br />
                                <button
                                    class="main_block_btn_login"
                                    @click="forget_password"
                                >
                                    忘記密碼
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content_active">
                        <!-- ======================================== 註冊會員表單 ======================================== -->
                        <div class="content_active_sign_up">
                            <a href="#" @click="login_sign_up">X</a>
                            <h2>建立帳號</h2>
                            <form
                                @submit.prevent="sign_up"
                                id="sign_up_form"
                                method="post"
                                enctype="multipart/form-data"
                            >
                                <div>
                                    <p>姓名</p>
                                    <input
                                        name="mem_name"
                                        class="content_active_sign_up_move1"
                                        type="text"
                                        placeholder="你的名字"
                                        v-model="sign_up_userName"
                                        required
                                    />
                                </div>
                                <div>
                                    <p>帳號/信箱</p>
                                    <input
                                        name="mem_account"
                                        id="mem_account"
                                        type="email"
                                        placeholder="你的信箱或帳號"
                                        v-model="sign_up_account"
                                        required
                                    />
                                    <span id="idMsg">{{ idMsg }}</span>
                                </div>
                                <div>
                                    <div
                                        class="btn_email_confirm"
                                        @click="check_account"
                                    >
                                        信箱認證
                                    </div>
                                </div>
                                <div>
                                    <p class="content_active_sign_up_moveTxt_1">
                                        密碼
                                    </p>
                                    <i class="icon_password"></i>
                                    <input
                                        name="mem_psw"
                                        class="content_active_sign_up_move2"
                                        type="text"
                                        v-if="pwdType_one"
                                        v-model="sign_up_password"
                                    />
                                    <input
                                        name="mem_psw"
                                        class="content_active_sign_up_move2"
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
                                    <p class="content_active_sign_up_moveTxt_2">
                                        密碼認證
                                    </p>
                                    <i class="icon_password"></i>
                                    <input
                                        class="content_active_sign_up_move3"
                                        type="text"
                                        v-if="pwdType_two"
                                        v-model="sign_up_password_comfirm"
                                    />
                                    <input
                                        class="confirm_password content_active_sign_up_move3"
                                        type="password"
                                        placeholder="Confirm Password"
                                        v-model="sign_up_password_comfirm"
                                        required
                                        v-else
                                    />
                                    <img
                                        :src="seen_two ? seenImg : unseenImg"
                                        @click="changeType_2"
                                        v-on:mouseover="hoverEye_2"
                                        v-on:mouseout="outEye_2"
                                        class="sign_up_icon_eye"
                                    />
                                </div>
                                <div>
                                    <button
                                        class="btn_sign_up"
                                        type="submit"
                                        @click="sign_up2"
                                    >
                                        註冊會員
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- ======================================== 登入會員表單 ======================================== -->
                        <div class="content_active_login">
                            <a href="#" @click="login_sign_up">X</a>
                            <h2>會員登入</h2>
                            <form @submit.prevent="login">
                                <div>
                                    <p>帳號/信箱</p>
                                    <input
                                        type="text"
                                        placeholder="Account"
                                        v-model="login_account"
                                        required
                                    />
                                </div>
                                <div>
                                    <p class="content_active_login_moveTxt">
                                        密碼
                                    </p>
                                    <i class="icon_password"></i>
                                    <input
                                        class="content_active_login_move4"
                                        type="text"
                                        v-if="pwdType_three"
                                        v-model="login_password"
                                        required
                                    />
                                    <input
                                        class="content_active_login_move4"
                                        type="password"
                                        placeholder="Password"
                                        v-model="login_password"
                                        required
                                        v-else
                                    />
                                    <img
                                        :src="seen_three ? seenImg : unseenImg"
                                        @click="changeType_3"
                                        v-on:mouseover="hoverEye_3"
                                        v-on:mouseout="outEye_3"
                                        class="login_icon_eye"
                                    />
                                </div>
                                <label
                                    class="errorMsg"
                                    v-if="errorFlag"
                                    v-cloak
                                    >{{ errorMsg }}</label
                                ><br />
                                <button
                                    class="btn_login"
                                    type="submit"
                                    @click="login"
                                    value="Login"
                                >
                                    登錄會員</button
                                ><br />
                            </form>
                            <button class="btn_login" @click="forget_password">
                                忘記密碼
                            </button>
                            <div>
                                <img
                                    src="../assets/images/login/login_koala.png"
                                    alt=""
                                />
                            </div>
                        </div>
                        <!-- ======================================== 忘記密碼表單 ======================================== -->
                        <div class="content_active_forget_password">
                            <a href="#" @click="login_sign_up">X</a>
                            <h2>忘記密碼</h2>
                            <form
                                @submit.prevent="forget_password"
                                @submit="sendEmail"
                            >
                                <div>
                                    <p>帳號/信箱</p>
                                    <input
                                        id="forget_password_account"
                                        type="text"
                                        placeholder="Account"
                                        name="user_email"
                                        v-model="forget_password_account"
                                        required
                                    />
                                </div>
                                <div name="mem_psw" id="show_forget_password">
                                    {{ mem_psw }}
                                </div>
                                <input
                                    id="forget_password_none"
                                    type="text"
                                    name="mem_psw"
                                    v-model="mem_psw"
                                />
                                <button
                                    class="btn_login"
                                    type="submit"
                                    @click="sendEmail"
                                >
                                    驗證信箱
                                </button>
                            </form>
                            <div>
                                <img
                                    src="../assets/images/login/login_koala.png"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
import emailjs from "emailjs-com";
export default {
    components: {
        Header,
        emailjs,
    },
    data() {
        return {
            /*  login_account: "charmy111@gmail.com",
            login_password: "charmy111", */
            login_account: "",
            login_password: "",
            errorFlag: false,
            errorMsg: "",
            idMsg: "",
            forget_password_account: "",

            get_forget_password: "",

            seen_one: "",
            seen_two: "",
            seen_three: "",
            unseenImg: require("../assets/images/login/eye_close.png"),
            seenImg: require("../assets/images/login/eye_open.png"),
            pwdType_one: false,
            pwdType_two: false,
            pwdType_three: false,
            sign_up_userName: "",
            sign_up_account: "",
            sign_up_password: "",
            sign_up_password_comfirm: "",

            mem_psw: "",
        };
    },
    methods: {
        // ======================================== 關閉彈窗 click事件 ======================================== //
        login_sign_up() {
            document.querySelector(".content_active").className =
                "content_active";
            document.querySelector(".content_active_sign_up").style.opacity =
                "0";
            document.querySelector(".content_active_login").style.opacity = "0";

            setTimeout(function () {
                document.querySelector(
                    ".content_active_sign_up"
                ).style.display = "none";
                document.querySelector(".content_active_login").style.display =
                    "none";
                document.querySelector(
                    ".content_active_forget_password"
                ).style.display = "none";
            }, 500);
        },

        // ======================================== Login click事件 ======================================== //
        async login() {
            document.querySelector(".content_active").className =
                "content_active content_active_active_login";
            document.querySelector(".content_active_login").style.display =
                "block";
            document.querySelector(".content_active_sign_up").style.opacity =
                "0";
            document.querySelector(
                ".content_active_forget_password"
            ).style.opacity = "0";

            setTimeout(function () {
                document.querySelector(".content_active_login").style.opacity =
                    "1";
            }, 400);

            setTimeout(function () {
                document.querySelector(
                    ".content_active_sign_up"
                ).style.display = "none";
                document.querySelector(
                    ".content_active_forget_password"
                ).style.display = "none";
            }, 200);

            // ======================================== 登入驗證 ======================================== //
            let thisvue = this;
            if (thisvue.login_account == "" || thisvue.login_password == "") {
                // thisvue.errorMsg = "請輸入帳號和密碼";
                // thisvue.errorFlag = true;
            } else {
                /* fetch(
                    "http://localhost/cgd103_g1/public/api/getConfirmMember.php",
                    {
                        method: "post",
                        credentials: "include",
                        body: new URLSearchParams({
                            mem_account: this.login_account,
                            mem_psw: this.login_password,
                        }),
                    }
                )
                    .then((res) => res.json())
                    .then((json) => {
                        console.log(json);
                        this.$store.state.user = { mem_id: 1001 };
                        if (this.login_password == json.mem_account) {
                            console.log("成功");
                        } else if (!json.code) {
                            console.log("失敗");
                        }
                        this.$router.push({ path: "/home" });
                    }); */
                await this.$store.dispatch("memLogin", {
                    mem_account: this.login_account,
                    mem_psw: this.login_password,
                });

                if (this.$store.state.user) {
                    this.$router.push({ path: "/home" });
                }
            }
        },

        // ======================================== sign_up click事件 ======================================== //
        sign_up() {
            document.querySelector(".content_active").className =
                "content_active content_active_active_sign_up";
            document.querySelector(".content_active_sign_up").style.display =
                "block";
            document.querySelector(".content_active_login").style.opacity = "0";
            document.querySelector(
                ".content_active_forget_password"
            ).style.opacity = "0";

            setTimeout(function () {
                document.querySelector(
                    ".content_active_sign_up"
                ).style.opacity = "1";
            }, 400);

            setTimeout(function () {
                document.querySelector(".content_active_login").style.display =
                    "none";
                document.querySelector(
                    ".content_active_forget_password"
                ).style.display = "none";
            }, 200);
        },

        // ======================================== 註冊會員加進資料庫 ======================================== //
        sign_up2() {
            let url = "http://localhost/cgd103_g1/public/api/getSignUp.php";
            const signUpContent = {
                userName: this.sign_up_userName,
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

        // ======================================== Email 後臺比對 ======================================== //
        check_account() {
            //產生XMLHttpRequest物件
            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                // console.log("=====",xhr.status);
                document.getElementById("idMsg").innerText = xhr.responseText;
            };
            let url =
                "http://localhost/cgd103_g1/public/api/getConfirmEmail.php?mem_account=" +
                document.getElementById("mem_account").value;
            xhr.open("get", url, true);
            xhr.send(null);
        },

        // ======================================== forget_password click事件 ======================================== //
        forget_password() {
            document.querySelector(".content_active").className =
                "content_active content_active_active_forget_password";
            document.querySelector(
                ".content_active_forget_password"
            ).style.display = "block";
            document.querySelector(".content_active_login").style.opacity = "0";
            document.querySelector(".content_active_sign_up").style.opacity =
                "0";

            setTimeout(function () {
                document.querySelector(
                    ".content_active_forget_password"
                ).style.opacity = "1";
            }, 400);

            setTimeout(function () {
                document.querySelector(
                    ".content_active_sign_up"
                ).style.display = "none";
                document.querySelector(".content_active_login").style.display =
                    "none";
            }, 200);
        },

        // ======================================== 寄 Email  ======================================== //
        sendEmail() {
            // ======================================== 把忘記的密碼撈出來  ======================================== //
            let QQ = this; //這裡的QQ指向的Vue實體
            var xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    //modify here
                    showMember(xhr.responseText);
                } else {
                    alert(xhr.status);
                }
            };

            var url =
                "http://localhost/cgd103_g1/public/api/getMemberPassword.php?mem_account=" +
                document.getElementById("forget_password_account").value;
            xhr.open("get", url, true);
            xhr.send(null);

            function showMember(json) {
                var xhr = new XMLHttpRequest();

                var url =
                    "http://localhost/cgd103_g1/public/api/getMemberPassword.php?mem_account=" +
                    document.getElementById("forget_password_account").value;
                xhr.open("get", url, true);
                xhr.send(null);
                let member = JSON.parse(json);
                let html;

                // 這裡的QQ指的是Vue實體
                QQ.mem_psw = member.mem_psw;

                // html = `<p>${member.mem_psw}</p>`;

                // document.getElementById("show_forget_password").innerHTML = html;
            }

            // ======================================== 忘記密碼的 EmailJs  ======================================== //
            emailjs
                .send(
                    "service_Charmy",
                    "template_21xikzb",
                    {
                        user_email: this.forget_password_account,
                        mem_psw: this.mem_psw,
                    },
                    "X1x5cmen7BlWhZ2yb"
                )
                .then(
                    (result) => {
                        console.log("SUCCESS!", result.text);
                    },
                    (error) => {
                        console.log("FAILED...", error.text);
                    }
                );
        },

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
    },
    mounted() {
        this.login();

        // document.getElementById("show_forget_password").innerHTML = html;
    },
};
</script>

<style lang="scss" scoped>
.memTable th {
    background-color: pink;
}

.memTable td {
    border-bottom: 1px dotted deeppink;
}

#show_forget_password {
    display: none;
}

#forget_password_none {
    display: none;
}

.main_content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 100%;
    display: flex;
    height: 100%;
}

.main_content_center {
    display: flex;
    align-self: center;
    width: 100%;
    justify-content: center;
    position: relative;
}

.content_login {
    position: relative;
    width: 1200px;
}

.content_active {
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0px;
    right: 0;
    bottom: 0;
    width: 768px;
    background-color: #eee;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}

.content_active_active_login {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 600px;
    height: 85vh;
    top: -40vh;
    left: 600px;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    z-index: 2;
    border-radius: 10px;
}

.content_active_active_sign_up {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 600px;
    height: 85vh;
    top: -40vh;
    left: 0%;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    border-radius: 10px;
    z-index: 2;
}

.content_active_active_forget_password {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 600px;
    height: 85vh;
    top: -40vh;
    left: 600px;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    border-radius: 10px;
}

.content_login_sign_up {
    position: absolute;
    width: 100%;
    top: -10em;
    z-index: 1;
}

.main_block_btn_sign_up {
    background-color: #eee;
    border: none;
    padding: 10px;
    width: 200px;
    border-radius: 3px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #579194;
    margin-top: 30px;
    cursor: pointer;
}

.content_login_block {
    position: relative;
    float: left;
    width: 50%;
}

.content_login_block > p {
    font-weight: 400;
    margin-top: 15px;
    width: 80%;
    color: #37474f;
}

.main_block_btn_login {
    background-color: #eee;
    border: none;
    padding: 10px;
    width: 200px;
    border-radius: 3px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #579194;
    margin-top: 30px;
    cursor: pointer;
}

.btn_login {
    background-color: #579194;
    border: none;
    padding: 10px;
    width: 200px;
    border-radius: 3px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #eee;
    margin-top: 3%;
    cursor: pointer;
}

.content_sign_up_block {
    position: relative;
    float: left;
    width: 50%;
}

.content_opcitiy_left > p {
    font-weight: 400;
    margin-top: 15%;
    color: #2e383f;
}

.content_opcitiy_right > p {
    font-weight: 400;
    margin-top: 10%;
    color: #2e383f;
}

.content_opcitiy {
    position: relative;
    background-color: #96bbbd;
    width: 600px;
    height: 350px;
    border-radius: 3px;
    margin: auto;
    /* margin-top: 60px; */
    padding: 15px 0px;
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

.content_active_login {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    opacity: 0;
    display: none;
    width: 100%;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}

.content_active_forget_password {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    opacity: 0;
    display: none;
    width: 100%;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}

.content_active_active_forget_password {
    z-index: 2;
}

/* SIGN UP 裡面的 CONTENT */
.content_active_sign_up {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 100%;
    float: left;
    opacity: 0;
    display: none;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
}

.content_active_sign_up > form > div > input {
    text-align: left;
    padding: 10px 5px;
    margin-left: 5%;
    margin-top: 0%;
    width: 230px;
    border: none;
    color: #757575;
}

.content_active_sign_up > h2 {
    font-size: 24px;
    margin-top: 12%;
    font-weight: 400;
    color: #757575;
}

.content_active_sign_up > form > div > p {
    display: inline-block;
    padding-top: 1.5%;
}

.content_active_sign_up > form > div {
    display: flex;
    justify-content: center;
    margin-top: 7%;
}

.content_active_login > form > div {
    display: flex;
    justify-content: center;
    margin-top: 3%;
}

.content_active_login > div {
    display: flex;
    justify-content: center;
    margin-top: 3%;
}

.content_active_login > form > div > input {
    padding: 15px 5px;
    margin-left: 5%;
    margin-top: 1%;
    margin-bottom: 3%;
    width: 230px;
    border: none;
    text-align: left;
    color: #757575;
}

.btn_email_confirm {
    background-color: #579194;
    border: none;
    padding: 10px;
    width: 100px;
    border-radius: 10px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #eee;
    margin-top: -5%;
    margin-left: 37.5%;
    cursor: pointer;
}

.content_active_sign_up > form > .confirm_password {
    margin-right: 9.5%;
}

.content_active_login > h2 {
    font-size: 24px;
    margin-top: 12%;
    margin-bottom: 5%;
    font-weight: 400;
    color: #757575;
}

.content_active_login > form > div > p {
    display: inline-block;
    padding-top: 3.5%;
}

.content_active_login > form > button {
    margin-top: 5%;
}

.content_active_login > button {
    margin-top: 5%;
}

.content_active_login > div > img {
    margin-top: 7.5%;
    width: 40%;
}

.content_active_login > a,
.content_active_sign_up > a,
.content_active_forget_password > a {
    color: #757575;
    position: relative;
    float: right;
    margin: 10px;
    margin-left: 30px;
}

.content_active_forget_password > form > div {
    display: flex;
    justify-content: center;
    margin-top: 3%;
}

.content_active_forget_password > div {
    display: flex;
    justify-content: center;
    margin-top: 3%;
}

.content_active_forget_password > form > div > input {
    text-align: left;
    padding: 15px 5px;
    margin-left: 5%;
    margin-top: 1%;
    margin-bottom: 3%;
    width: 230px;
    border: none;
    color: #757575;
}

.content_active_forget_password > h2 {
    font-size: 24px;
    margin-top: 15%;
    margin-bottom: 5%;
    font-weight: 400;
    color: #757575;
}

.content_active_forget_password > form > div > p {
    display: inline-block;
    padding-top: 3.5%;
}

.content_active_forget_password > form > button {
    margin-top: 7.5%;
}

.content_active_forget_password > div > img {
    margin-top: 12.5%;
    width: 50%;
}

// ======================================== 改 input 位置 ======================================== //
.content_active_sign_up > form > div > .content_active_sign_up_move1 {
    margin-left: 11%;
}

.content_active_sign_up > form > div > .content_active_sign_up_move2 {
    margin-left: 10.5%;
}

.content_active_sign_up > form > div > .content_active_sign_up_move3 {
    margin-left: 6%;
}

.content_active_login > form > div > .content_active_login_move4 {
    margin-left: 11%;
}

.content_active_sign_up_moveTxt_1 {
    padding-left: 4.5%;
}

.content_active_sign_up_moveTxt_2 {
    padding-left: 5%;
}

.content_active_login_moveTxt {
    padding-left: 5%;
}

// ======================================== 眼睛 ======================================== //
.sign_up_icon_eye {
    width: 20px;
    height: 20px;
    margin-left: 1.5%;
    margin-top: 1.5%;
}

.login_icon_eye {
    width: 20px;
    height: 20px;
    margin-left: 1.5%;
    margin-top: 3.5%;
}

// ======================================== 手機切版 ======================================== //
@media screen and (max-width: 1200px) {
    .content_sign_up_block {
        width: 100%;
    }

    .content_login_block {
        width: 100%;
    }

    .content_login_sign_up {
        top: -22em;
    }

    .content_active_active_sign_up {
        margin: auto;
        top: 3vh;
    }

    .content_active_active_login {
        margin: auto;
        top: 3vh;
        left: 0;
    }

    .content_active_active_forget_password {
        margin: auto;
        top: 3vh;
        left: 0;
    }
}

@media screen and (max-width: 768px) {
    .content_sign_up_block {
        width: 100%;
    }

    .content_login_block {
        width: 100%;
    }

    .content_opcitiy {
        width: 75%;
        height: 30vh;
    }

    .content_opcitiy_left > p {
        margin-top: 20%;
    }

    .content_opcitiy_right > p {
        margin-top: 0%;
    }

    .main_block_btn_sign_up {
        width: 50%;
    }

    .main_block_btn_login {
        width: 50%;
    }

    .content_active_active_sign_up {
        width: 80%;
    }

    .content_active_active_login {
        width: 80%;
    }

    .content_active_active_forget_password {
        width: 80%;
    }

    .content_active_sign_up > form > div {
        margin-top: 10%;
    }

    .content_active_login > form > div {
        margin-top: 5%;
    }

    .content_active_login > div {
        margin-top: 5%;
    }

    .content_active_forget_password > form > div {
        margin-top: 15%;
    }

    .content_active_forget_password > div {
        margin-top: 5%;
    }

    .content_active_login > form > button {
        margin-top: 8%;
    }

    .content_active_login > button {
        margin-top: 12%;
    }

    .content_active_forget_password > form > button {
        margin-top: 15%;
    }

    .content_active_sign_up > h2 {
        margin-top: 14%;
    }

    .content_active_login > h2 {
        margin-top: 14%;
    }

    .content_active_forget_password > h2 {
        margin-top: 14%;
    }
    .content_active_login > div > img {
        margin-top: 5%;
        width: 35%;
    }

    .content_active_sign_up > form > div > .content_active_sign_up_move3 {
        margin-left: 4%;
    }

    .sign_up_icon_eye {
        width: 20px;
        height: 20px;
        margin-left: 1.5%;
        margin-top: 2.5%;
    }

    .login_icon_eye {
        width: 20px;
        height: 20px;
        margin-left: 1.5%;
        margin-top: 4.5%;
    }
}
</style>
