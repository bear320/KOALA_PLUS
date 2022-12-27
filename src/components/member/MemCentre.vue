<template lang="">
    <li class="mem_centre content">
        <div class="mem_basic">
            <p>會員ID：{{ memindexs.mem_id }}</p>
        </div>
        <!-- 會員中心下方內容 -->
        <div class="mem_main">
            <!-- 會員中心左邊內容  關於會員帳密內容-->

            <div class="tabcontent_txt_group">
                <div class="subtitle">
                    <Icon type="ios-create-outline" size="20" color="#337a7d" />
                    <span>編輯會員資料</span>
                </div>
                <table class="tabcontent_group">
                    <tr class="tabcontent_txt">
                        <td>姓名</td>
                        <input
                            type="text"
                            id="mem_name"
                            myfield="mem_name"
                            v-model="memindexs.mem_name"
                            ref="mem_name"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>信箱</td>
                        <input
                            type="text"
                            id="mem_account"
                            myfield="mem_account"
                            v-model="memindexs.mem_account"
                            ref="mem_account"
                            @keyup="reg_emailType"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>電話</td>
                        <input
                            type="tel"
                            id="mem_mob"
                            myfield="mem_mob"
                            v-model="memindexs.mem_mob"
                            ref="mem_mob"
                            @keyup="reg_phoneType2"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>地址</td>
                        <input
                            type="text"
                            id="mem_add"
                            myfield="mem_add"
                            v-model="memindexs.mem_add"
                            ref="mem_add"
                        />
                    </tr>
                </table>
                <button class="btn-paramy" @click="editMemInfo">
                    編輯會員資料
                </button>
                <div class="signOutbutton">
                    <button class="btn-secondary" @click="signOut">
                        登出會員
                    </button>
                </div>
            </div>
            <!-- 會員中心右邊內容 關於帳號密碼-->
            <form class="tabcontent_txt_group">
                <div class="subtitle">
                    <Icon type="ios-create" size="20" color="#337a7d" />
                    <span>重設會員密碼</span>
                    <p>
                        為了您的帳戶安全，密碼的長度必須至少為八個字符，並且包含字母和數字字符的任意組合。
                        密碼區分大小寫。 新密碼不能與舊密碼相同。
                    </p>
                </div>
                <table class="tabcontent_group">
                    <tr class="tabcontent_txt">
                        <td>原密碼</td>
                        <i class="icon_password"></i>
                        <input
                            type="text"
                            id="mem_psw"
                            myfield="mem_psw"
                            ref="mem_psw"
                            v-if="pwdType_one"
                            v-model="passwordcheck"
                            @keyup.enter="memPageDown"
                            autocomplete="off"
                        />
                        <input
                            type="password"
                            id="mem_psw"
                            myfield="mem_psw"
                            ref="mem_psw"
                            v-model="passwordcheck"
                            @keyup.enter="memPageDown"
                            required
                            v-else
                            autocomplete="off"
                        />
                        <img
                            :src="seen_one ? seenImg : unseenImg"
                            @click="changeType_1"
                            v-on:mouseover="hoverEye_1"
                            v-on:mouseout="outEye_1"
                            class="login_icon_eye"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>密碼</td>
                        <i class="icon_password"></i>
                        <input
                            type="text"
                            id="mem_password1"
                            myfield="mem_password1"
                            ref="mem_password1"
                            v-if="pwdType_two"
                            v-model="newpassword"
                            autocomplete="off"
                        />
                        <input
                            type="password"
                            id="mem_password1"
                            myfield="mem_password1"
                            ref="mem_password1"
                            v-model="newpassword"
                            @keyup.enter="memPageDown"
                            required
                            v-else
                            autocomplete="off"
                        />
                        <img
                            :src="seen_two ? seenImg : unseenImg"
                            @click="changeType_2"
                            v-on:mouseover="hoverEye_2"
                            v-on:mouseout="outEye_2"
                            class="login_icon_eye"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>重新輸入</td>
                        <i class="icon_password"></i>
                        <input
                            type="text"
                            id="mem_password_again"
                            myfield="mem_password1"
                            ref="mem_passwordconfirm"
                            v-if="pwdType_three"
                            v-model="newpasswordconfirm"
                            autocomplete="off"
                        />
                        <input
                            type="password"
                            id="mem_password_again"
                            myfield="mem_password1"
                            ref="mem_passwordconfirm"
                            v-model="newpasswordconfirm"
                            @keyup.enter="memPageDown"
                            required
                            v-else
                            autocomplete="off"
                        />
                        <img
                            :src="seen_three ? seenImg : unseenImg"
                            @click="changeType_3"
                            v-on:mouseover="hoverEye_3"
                            v-on:mouseout="outEye_3"
                            class="login_icon_eye"
                        />
                    </tr>
                </table>
                <button class="btn-paramy" @click="editMempsw">修改密碼</button>
            </form>
        </div>
    </li>
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";

export default {
    data() {
        return {
            memindexs: [],
            passwordcheck: "",
            newpassword: "",
            newpasswordconfirm: "",
            unseenImg: require("@/assets/images/login/eye_close.png"),
            seenImg: require("@/assets/images/login/eye_open.png"),
            seen_one: "",
            pwdType_one: false,
            seen_two: "",
            pwdType_two: false,
            seen_three: "",
            pwdType_three: false,
        };
    },
    methods: {
        getmemCentre() {
            let getCookie = document.cookie;
            const apiURL = new URL(`${BASE_URL}/getMember.php?type=front`);
            if (getCookie) {
                // const createdurl = "http://localhost/cgd103_g1/public/api/getMember.php?mem_id=1002";
                // "http://localhost/cgd103_g1/public/api/getMember.php?type=front",
                fetch(apiURL, {
                    // method: "POST",
                    // mode: "cors", //same-origin,no-cors,*cors
                    credentials: "include",
                    //請求選項的方法 獲取請求設置:會在跨源請求中發送 cookie ，
                    //*credentials方法一：omit 瀏覽器不請求cookie
                    //*credentials方法一：same-origin 使瀏覽器發送包含在同源(同域)的憑據(cookie)請求
                    //*credentials方法三：include 瀏覽器會在跨源請求中發送 cookie

                    // redirect: "follow", //*follow,manual,error
                    // referrer: "no-referrer", //*client,no-referrer
                    // headers: {
                    //     "Access-Control-Allow-Origin": "http://localhost:8080",
                    //     "Content-Type": "application/json",
                    // },
                })
                    .then((res) => res.json())
                    .then((json) => {
                        // console.log(json);
                        // if (json.status == 10010) {
                        //     alert("帳號已登出");
                        //     location.href = "/login";
                        // }
                        if (json.status) {
                            this.memindexs = json.list;
                            return true;
                        }
                        // alert("獲取數據失敗");
                    });
            } else {
                alert("登入失效");
                //跳轉 login url

                location.href = "/login";
            }
        },
        editMemInfo() {
            const postMemMainData = {
                mem_name: this.$refs.mem_name.value,
                mem_account: this.$refs.mem_account.value,
                mem_mob: this.$refs.mem_mob.value,
                mem_add: this.$refs.mem_add.value,
            };
            // console.log(postMemMainData);

            let getCookie = document.cookie;
            const apiURL = new URL(`${BASE_URL}/editMember.php?type=1`);
            if (getCookie) {
                fetch(apiURL, {
                    method: "POST",
                    credentials: "include",
                    body: new URLSearchParams(postMemMainData),
                })
                    .then((res) => res.json())
                    .then((status) => {
                        alert(status.msg);
                        status.$Notice.open({
                            title: "Notification title",
                            desc: nodesc
                                ? ""
                                : "Here is the notification description. Here is the notification description. ",
                        });
                    });
                if (this.passwordcheck != "") {
                    // alert("有輸入內容");
                    if (this.newpassword == this.newpasswordconfirm) {
                        // alert("相同");
                    } else {
                        alert("密碼不相同");
                        this.$Notice.open({
                            title: "Notification title",
                            desc: nodesc
                                ? ""
                                : "Here is the notification description. Here is the notification description. ",
                        });
                    }
                } else {
                    // alert("密碼不可為空白");
                }
            } else {
                alert("登入失效");
            }
        },
        editMempsw() {
            // console.log("editMempsw");
            //要自行用VUE判斷 新密碼再次輸入要相同。
            const postMemMainData = {
                mem_oldpsw: this.$refs.mem_psw.value,
                mem_newpsw: this.$refs.mem_password1.value,
            };
            // console.log(postMemMainData);

            let getCookie = document.cookie;
            if (getCookie) {
                fetch(`${BASE_URL}/editMember.php?type=2`, {
                    method: "POST",
                    credentials: "include",
                    body: new URLSearchParams(postMemMainData),
                })
                    .then((res) => res.json())
                    .then((status) => {
                        console.log(status);
                        alert(status.msg);
                    });
                if (this.passwordcheck != "") {
                    alert("有輸入內容");
                    console.log(this.newpassword);
                    console.log(this.newpasswordconfirm);
                    if (this.newpassword == this.newpasswordconfirm) {
                        alert("相同");
                    } else {
                        alert("密碼不相同");
                    }
                } else {
                    // alert("密碼不可為空白");
                }
            } else {
                // alert("登入失效");
            }
        },
        signOut() {
            this.$Modal.confirm({
                title: "會員登出提醒",
                content: "<p>確定要登出嗎?</p>",
                loading: true,
                onOk: () => {
                    setTimeout(() => {
                        this.$Modal.remove();
                        this.$Message.info(
                            "Asynchronously close the dialog box"
                        );
                        // location.href = "/login";
                    }, 2000);
                },
            });
            const postsingOut = this.$refs.postsingOut;
            fetch(`${BASE_URL}/postMemberLogout.php`, {
                method: "POST",
                credentials: "include",
                body: new URLSearchParams(postsingOut),
            })
                .then((res) => res.json())
                .then((status) => {
                    console.log(status);
                    // alert(status.msg);
                });
        },
        // 密碼是否顯示的控制
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
        // 首次輸入新密碼
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
        // 再次輸入新密碼
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
        // =============
        mod_open(nodesc) {
            this.$Notice.open({
                title: "提醒電話號碼格式錯誤",
                desc: nodesc ? "" : "請確認電話號碼格式是否正確且完整填寫！",
            });
        },
        email_open(nodesc) {
            this.$Notice.open({
                title: "提醒email格式錯誤",
                desc: nodesc ? "" : "請確認email格式是否正確且完整填寫！",
            });
        },
        // =============
        // ================正則

        reg_phoneType2() {
            let mem_mod_val = this.$refs.mem_mob.value;
            const validate = /^09[0-9]{8}$/;
            let res = validate.test(mem_mod_val);
            // console.log(res);
            if (res) {
            } else {
                // alert("手機格式錯誤");
                this.mod_open(false);
            }
        },
        reg_emailType() {
            let mem_account_val = this.$refs.mem_account.value;
            const validate = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            let res = validate.test(mem_account_val);
            console.log(res);
            if (res) {
            } else {
                // alert("手機格式錯誤");
                this.email_open(false);
            }
        },
    },
    created() {
        this.getmemCentre();
    },
    computed() {},
};
</script>
<style lang="scss" scoped>
// .member 會員的會員中心

.tabs {
    .wrapper {
        .tabs_content {
            //會員中心內容 li
            .content {
                .mem_basic {
                    //會員基本資料
                    display: flex;
                    p {
                        min-width: 100px;
                        padding: 10px;
                    }
                }
                .mem_main {
                    display: flex;
                    // flex-wrap: wrap;
                    justify-content: space-evenly;

                    @include m() {
                        display: block;
                    }
                    .tabcontent_txt_group {
                        margin: 10px;
                        border-radius: 10px;
                        .subtitle {
                            margin-top: 10px;
                            // background-color: rgb(71, 55, 28);
                            min-height: 40px;
                            @include m() {
                                min-height: 50px;
                            }
                            Icon {
                                color: #337a7d;
                            }
                            span {
                                margin: 10px;
                            }
                            p {
                                line-height: 1.3;
                                padding: 10px 5px;
                                width: 260px;
                                text-align: justify;
                                margin: 5px auto;
                                min-height: 130px;
                            }
                        }
                        button {
                            padding: 0 20px;
                            height: 30px;
                            line-height: 30px;
                        }
                        .signOutbutton {
                            margin: auto;
                            padding: 20px 0;
                        }
                        .tabcontent_group {
                            display: flex;
                            flex-direction: column;
                            tr {
                                display: flex;
                                justify-content: center;
                                padding-top: 10px;
                                padding-bottom: 10px;
                                td:nth-child(1) {
                                    padding: 10px;
                                    width: 80px;
                                    text-align: left;
                                    @include m() {
                                        width: 60px;
                                    }
                                }
                            }
                            @include m() {
                                max-width: 280px;
                            }
                        }
                        .login_icon_eye {
                            width: 20px;
                            height: 20px;
                            align-self: center;
                        }
                    }
                }
            }
        }
    }
}
</style>
