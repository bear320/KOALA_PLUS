<template>
    <section>
        <div class="login">
            <div class="login_block">
                <h1>管理登錄頁面</h1>
                <form @submit.prevent="login">
                    <div>
                        <label>帳號</label>
                        <input type="text" v-model="login_account" required />
                    </div>
                    <div>
                        <label>密碼</label>
                        <input
                            type="password"
                            v-model="login_password"
                            required
                        />
                    </div>
                    <div>
                        <button class="btn-paramy" type="submit" @click="login">
                            登錄
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
export default {
    data() {
        return {
            login_account: "",
            login_password: "",
            emp_id: 0,
        };
    },
    methods: {
         login() {
            let thisvue = this;
            if (thisvue.login_account == "" || thisvue.login_password == "") {
                // thisvue.errorMsg = "請輸入帳號和密碼";
                // thisvue.errorFlag = true;
            } else {
                const apiURL = new URL(`${BASE_URL}/getAdminLogin.php`);
                fetch(apiURL, {
                    method: "post",
                    credentials: "include",
                    body: new URLSearchParams({
                        emp_account: this.login_account,
                        emp_psw: this.login_password,
                    }),
                })
                .then((res) => res.json())
                .then((json) => {
                    this.emp_id=json.adminInfo.emp_id;
                    console.log(this.emp_id);
                    this.$router.push({ path: "/bs-index" });
                })
                .then(()=>{
                    
                    this.updatedLastItme();
                });
            }
        },
            
        updatedLastItme(){
            const apiURL = new URL(`${BASE_URL}/postAdminLoginTime.php`);
            const last_login = {
                emp_id: this.emp_id,
            };
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(last_login),
            })
            .then((res) => res.json())
        }
    },
};
</script>

<style lang="scss" scoped>
a {
    display: block;
}

.tidy_list {
    position: relative;
}

.tidy_list_block {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
}

.login {
    position: relative;
    width: 100vw;
    height: 100vh;
}

.login_block {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.login {
    position: relative;
    width: 100vw;
    height: 100vh;
}

.login_block {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -40%);
}

.login_block > h1 {
    margin-bottom: 15%;
}

.login_block > form > div {
    margin-top: 15%;
    margin-bottom: 15%;
}

.login_block > form > div > input {
    margin-left: 10%;
    border-color: cadetblue;
}

.login_block > form > div > button {
    padding: 3% 5%;
}
</style>