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
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>電話</td>
                        <input
                            type="text"
                            id="mem_mob"
                            myfield="mem_mob"
                            v-model="memindexs.mem_mob"
                            ref="mem_mob"
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
            </div>
            <!-- 會員中心右邊內容 關於帳號密碼-->
            <div class="tabcontent_txt_group">
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
                        <input
                            type="text"
                            id="mem_psw"
                            myfield="mem_psw"
                            ref="mem_psw"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>密碼</td>
                        <input
                            type="text"
                            id="mem_password1"
                            myfield="mem_password1"
                            ref="mem_password1"
                        />
                    </tr>
                    <tr class="tabcontent_txt">
                        <td>重新輸入</td>
                        <input
                            type="text"
                            id="mem_password_again"
                            myfield="mem_password1"
                            ref="mem_password2"
                        />
                    </tr>
                </table>
                <button class="btn-paramy" @click="editMempsw">修改密碼</button>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    data() {
        return {
            memindexs: [],
        };
    },
    methods: {
        editMemInfo() {
            console.log("editMemInfo");

            const postMemMainData = {
                mem_name: this.$refs.mem_name.value,
                mem_account: this.$refs.mem_account.value,
                mem_mob: this.$refs.mem_mob.value,
                mem_add: this.$refs.mem_add.value,
            };
            console.log(postMemMainData);

            fetch(
                "http://localhost/cgd103_g1/public/api/editMember.php?mem_id=1001&type=1",
                {
                    method: "POST",
                    body: new URLSearchParams(postMemMainData),
                }
            )
                .then((res) => res.json())
                .then((result) => {
                    console.log(result);
                });
        },
        editMempsw() {
            console.log("editMempsw");
            //要自行用VUE判斷 新密碼再次輸入要相同。
            const postMemMainData = {
                mem_oldpsw: this.$refs.mem_psw.value,
                mem_newpsw: this.$refs.mem_password1.value,
            };
            console.log(postMemMainData);

            fetch(
                "http://localhost/cgd103_g1/public/api/editMember.php?mem_id=1001&type=2",
                {
                    method: "POST",
                    body: new URLSearchParams(postMemMainData),
                }
            )
                .then((res) => res.json())
                .then((result) => {
                    console.log(result);
                });
        },
    },
    created() {
        fetch("http://localhost/cgd103_g1/public/api/getMember.php?mem_id=1001")
            .then((res) => res.json())
            .then((json) => {
                console.log(json);
                this.memindexs = json;
            });
    },
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
                    }
                }
            }
        }
    }
}
</style>
