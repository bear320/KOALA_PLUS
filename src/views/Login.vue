<template>
    <Header></Header>
    <section class="main_block nav_space wrapper">
        <div class="cotn_principal">
            <div class="cont_centrar">
                <div class="cont_login">
                    <div class="cont_info_log_sign_up">
                        <div class="col_md_sign_up">
                            <div class="cont_ba_opcitiy cont_ba_opcitiy_left">
                                <p>尚未擁有會員？</p>
                                <button class="main_block_btn_sign_up" @click="cambiar_sign_up()">註冊會員</button>
                            </div>
                        </div>
                        <div class="col_md_login">
                            <div class="cont_ba_opcitiy cont_ba_opcitiy_right">
                                <p>已經擁有會員？</p>
                                <button class="main_block_btn_login" @click="cambiar_login()">登入會員</button><br />
                                <button class="main_block_btn_login" @click="cambiar_forget_password()">忘記密碼</button>
                            </div>
                        </div>
                    </div>
                    <div class="cont_forms">
                        <div class="cont_form_sign_up">
                            <a href="#" @click="ocultar_login_sign_up()">X</a>
                            <h2>建立帳號</h2>
                            <div><p>姓氏</p><input type="text" placeholder="Last Name"/></div>
                            <div><p>名字</p><input type="text" placeholder="First Name"/></div>
                            <div><p>帳號</p><input type="text" placeholder="Your Account"/></div>
                            <div>
                                <p>信箱</p><input type="text" placeholder="Email" />   <!-- type="email" 比較好，可是會跑版 -->
                                <button class="btn_email_confirm">信箱認證</button>
                            </div>
                            <div><p>密碼</p><input type="password" placeholder="Confirm Password"/><br /></div>
                            <div><p>密碼認證</p><input class="confirm_password" type="password" placeholder="Confirm Password"/><br /></div>
                            <div><button class="btn_sign_up" @click="cambiar_sign_up()">註冊會員</button></div>
                            <div><img src="../assets/images/login/login_koala.png" alt=""/></div>
                        </div>
                        <div class="cont_form_login">
                            <a href="#" @click="ocultar_login_sign_up()">X</a>
                            <h2>會員登入</h2>
                            <p>帳號</p><input type="text" placeholder="Account"/><br />
                            <p>信箱</p><input type="text" placeholder="Email" /><br />
                            <p>密碼</p><input type="password" placeholder="Password" /><br />
                            <button class="btn_login" @click="cambiar_login()">登錄會員</button><br />
                            <button class="btn_login" @click="cambiar_forget_password()">忘記密碼</button>
                            <div><img src="../assets/images/login/login_koala.png" alt=""/></div>
                        </div>
                        <div class="cont_form_forget_password">
                            <a href="#" @click="ocultar_login_sign_up()">X</a>
                            <h2>忘記密碼</h2>
                            <p>帳號</p><input type="text" placeholder="Account"/><br />
                            <p>信箱</p><input type="text" placeholder="Email" /><br />
                            <button class="btn_login" @click="cambiar_forget_password()">驗證信箱</button>
                            <div><img src="../assets/images/login/login_koala.png" alt=""/></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/header.vue";
export default {
    components: {
        Header,
    },
    methods: {
        cambiar_login() {
            document.querySelector(".cont_forms").className = "cont_forms cont_forms_active_login";
            document.querySelector(".cont_form_login").style.display = "block";
            document.querySelector(".cont_form_sign_up").style.opacity = "0";
            document.querySelector(".cont_form_forget_password").style.opacity = "0";

            setTimeout(function () {
                document.querySelector(".cont_form_login").style.opacity = "1";
            }, 400);

            setTimeout(function () {
                document.querySelector(".cont_form_sign_up").style.display = "none";
                document.querySelector(".cont_form_forget_password").style.display = "none";
            }, 200);
        },

        cambiar_sign_up(at) {
            document.querySelector(".cont_forms").className = "cont_forms cont_forms_active_sign_up";
            document.querySelector(".cont_form_sign_up").style.display = "block";
            document.querySelector(".cont_form_login").style.opacity = "0";
            document.querySelector(".cont_form_forget_password").style.opacity = "0";

            setTimeout(function () {
                document.querySelector(".cont_form_sign_up").style.opacity = "1";
            }, 100);

            setTimeout(function () {
                document.querySelector(".cont_form_login").style.display = "none";
                document.querySelector(".cont_form_forget_password").style.display = "none";
            }, 400);
        },

        cambiar_forget_password(at) {
            document.querySelector(".cont_forms").className = "cont_forms cont_forms_active_forget_password";
            document.querySelector(".cont_form_forget_password").style.display = "block";
            document.querySelector(".cont_form_login").style.opacity = "0";
            document.querySelector(".cont_form_sign_up").style.opacity = "0";

            setTimeout(function () {
                document.querySelector(".cont_form_forget_password").style.opacity = "1";
            }, 400);

            setTimeout(function () {
                document.querySelector(".cont_form_sign_up").style.display = "none";
                document.querySelector(".cont_form_login").style.display = "none";
            }, 200);
        },

        ocultar_login_sign_up() {
            document.querySelector(".cont_forms").className = "cont_forms";
            document.querySelector(".cont_form_sign_up").style.opacity = "0";
            document.querySelector(".cont_form_login").style.opacity = "0";

            setTimeout(function () {
                document.querySelector(".cont_form_sign_up").style.display = "none";
                document.querySelector(".cont_form_login").style.display = "none";
                document.querySelector(".cont_form_forget_password").style.display = "none";
            }, 500);
        },
    },
};
</script>

<style lang="scss" scoped>
.cotn_principal {
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

.cont_centrar {
    display: flex;
    align-self: center;
    width: 100%;
    justify-content: center;
}

/* 改整體高度 */
.cont_login {
    position: relative;
    width: 768px;
}

/* 還沒按下去的背景 height註解掉就會沒東西 */
.cont_forms {
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

.cont_forms_active_login {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 384px;
    height: 85vh;
    top: -285px;
    left: 384px;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    z-index: 2;
    border-radius: 10px;
}

.cont_forms_active_sign_up {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 384px;
    height: 85vh;
    top: -285px;
    left: 0px;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    border-radius: 10px;
}

.cont_forms_active_forget_password {
    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
    width: 384px;
    height: 85vh;
    top: -285px;
    left: 384px;
    // -webkit-transition: all 0.5s;
    // -moz-transition: all 0.5s;
    // -ms-transition: all 0.5s;
    // -o-transition: all 0.5s;
    transition: all 0.5s;
    border-radius: 10px;
}

/* 兩個灰色框寬度 */
.cont_info_log_sign_up {
    position: absolute;
    width: 100%;
    /* height: 280px; */
    top: -150px;
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

.col_md_login {
    position: relative;
    float: left;
    width: 50%;
}

.col_md_login > p {
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

.col_md_sign_up {
    position: relative;
    float: left;
    width: 50%;
}

.cont_ba_opcitiy_left > p {
    font-weight: 400;
    margin-top: 25%;
    color: #2e383f;
}

.cont_ba_opcitiy_right > p {
    font-weight: 400;
    margin-top: 20%;
    color: #2e383f;
}
/* ---------------------------------- background text ------------------------------------ */
.cont_ba_opcitiy {
    position: relative;
    background-color: #96bbbd;
    width: 384px;
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
    margin-top: 30px;
    cursor: pointer;
}
.cont_forms_active_sign_up {
    z-index: 2;
    overflow-y: scroll;
}

// @-webkit-keyframes animar_fondo {
//     from {
//         -webkit-transform: scale(1) translate(0px);
//         -moz-transform: scale(1) translate(0px);
//         -ms-transform: scale(1) translate(0px);
//         -o-transform: scale(1) translate(0px);
//         transform: scale(1) translate(0px);
//     }
//     to {
//         -webkit-transform: scale(1.5) translate(50px);
//         -moz-transform: scale(1.5) translate(50px);
//         -ms-transform: scale(1.5) translate(50px);
//         -o-transform: scale(1.5) translate(50px);
//         transform: scale(1.5) translate(50px);
//     }
// }
// @-o-keyframes identifier {
//     from {
//         -webkit-transform: scale(1);
//         -moz-transform: scale(1);
//         -ms-transform: scale(1);
//         -o-transform: scale(1);
//         transform: scale(1);
//     }
//     to {
//         -webkit-transform: scale(1.5);
//         -moz-transform: scale(1.5);
//         -ms-transform: scale(1.5);
//         -o-transform: scale(1.5);
//         transform: scale(1.5);
//     }
// }
// @-moz-keyframes identifier {
//     from {
//         -webkit-transform: scale(1);
//         -moz-transform: scale(1);
//         -ms-transform: scale(1);
//         -o-transform: scale(1);
//         transform: scale(1);
//     }
//     to {
//         -webkit-transform: scale(1.5);
//         -moz-transform: scale(1.5);
//         -ms-transform: scale(1.5);
//         -o-transform: scale(1.5);
//         transform: scale(1.5);
//     }
// }
// @keyframes identifier {
//     from {
//         -webkit-transform: scale(1);
//         -moz-transform: scale(1);
//         -ms-transform: scale(1);
//         -o-transform: scale(1);
//         transform: scale(1);
//     }
//     to {
//         -webkit-transform: scale(1.5);
//         -moz-transform: scale(1.5);
//         -ms-transform: scale(1.5);
//         -o-transform: scale(1.5);
//         transform: scale(1.5);
//     }
// }

/* LOGIN 裡面的 CONTENT */
.cont_form_login {
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

.cont_form_forget_password {
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

.cont_forms_active_forget_password {
    z-index: 2;
}

/* SIGN UP 裡面的 CONTENT */
.cont_form_sign_up {
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

.cont_form_sign_up > input {
    text-align: left;
    padding: 10px 5px;
    margin-left: 10px;
    margin-top: 20px;
    width: 230px;
    border: none;
    color: #757575;
}

.cont_form_sign_up > h2 {
    font-size: 24px;
    margin-top: 12%;
    font-weight: 400;
    color: #757575;
}

.cont_form_sign_up > p {
    display: inline-block;
}

.cont_form_sign_up > div {
    margin-top: 10%;
}

.cont_form_sign_up > div > img {
    width: 30%;
}

.cont_form_login > input {
    padding: 15px 5px;
    margin-left: 10px;
    margin-top: 20px;
    width: 230px;
    border: none;
    text-align: left;
    color: #757575;
}

.btn_email_confirm {
    background-color: #579194;
    border: none;
    padding: 10px;
    width: 125px;
    border-radius: 3px;
    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
    color: #eee;
    margin-top: 15px;
    cursor: pointer;
}

.cont_form_sign_up > .confirm_password {
    margin-right: 9.5%;
}

.cont_form_login > h2 {
    font-size: 24px;
    margin-top: 12%;
    // margin-bottom: 5%;
    font-weight: 400;
    color: #757575;
}

.cont_form_login > p {
    display: inline-block;
}

.cont_form_login > button {
    margin-top: 7.5%;
}

.cont_form_login > div {
    margin-top: 7.5%;
}

.cont_form_login > div > img {
    width: 30%;
}

.cont_form_login > a,
.cont_form_sign_up > a,
.cont_form_forget_password > a {
    color: #757575;
    position: relative;
    float: right;
    margin: 10px;
    margin-left: 30px;
}

.cont_form_forget_password > input {
    text-align: left;
    padding: 15px 5px;
    margin-left: 2%;
    margin-top: 5%;
    width: 230px;
    border: none;
    color: #757575;
}

.cont_form_forget_password > h2 {
    font-size: 24px;
    margin-top: 25%;
    margin-bottom: 5%;
    font-weight: 400;
    color: #757575;
}

.cont_form_forget_password > p {
    display: inline-block;
}

.cont_form_forget_password > div {
    margin-top: 10%;
}

.cont_form_forget_password > button {
    margin-top: 7.5%;
}

.cont_form_forget_password > div > img {
    width: 30%;
}










 // ==================== 手機切版 ==================== //
 @media screen and (max-width: 1200px) {}
</style>
