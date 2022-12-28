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
            emp_id:0,
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
                    .then((json) => console.log(json))
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

<!-- <template>
    <div class="login">
        <form class="login_block" @submit="Submit" ref="clear">
            <div><input class="username" v-model="usernameLogin" type="username" placeholder="Username" required /></div>
            <div><input class="password" v-model="passwordLogin" type="password" placeholder="Password" required /></div>
            <div><input type="submit" value="Login" class="btn btn-primary" /></div>
        </form>
    </div>
    <section>
        <div>
            <h1>後臺管理者登錄頁面</h1>
            <form @submit.prevent="login">
                <label>帳號</label>
                <input type="text" v-model="userName" required><br>
                <label>密碼</label>
                <input type="password" v-model="password" required><br>
                <button type="submit">Log In</button>
            </form>
        </div>
    </section>



    <section class="tidy_list">
        <div class="tidy_list_block">
            <router-link to="/bs-index">後台首頁</router-link>
            <router-link to="/bs-admin-list">權限管理</router-link>
            <router-link to="/bs-admin-add">新增管理員</router-link>
            <router-link to="/bs-article-list">公告管理</router-link>
            <router-link to="/bs-article-edit">新增／編輯公告</router-link>
            <router-link to="/bs-booking-list-two">導覽預約管理</router-link>
            <router-link to="/bs-booking-dayoff">新增休館日期</router-link>
            <router-link to="/bs-booking-edit">修改預約</router-link>
            <router-link to="/bs-koala-list">無尾熊管理</router-link>
            <router-link to="/bs-koala-add">新增無尾熊</router-link>
            <router-link to="/bs-koala-edit">編輯無尾熊</router-link>
            <router-link to="/bs-member-list">會員管理</router-link>
            <router-link to="/bs-member-blacklist">會員黑名單</router-link>
            <router-link to="/bs-order-list">訂單管理</router-link>
            <router-link to="/bs-product-list">周邊商品管理</router-link>
            <router-link to="/bs-product-edit">新增／編輯周邊商品</router-link>
            <router-link to="/bs-coupon-list">優惠券管理</router-link>
            <router-link to="/bs-support-list">資助認養管理</router-link>
            <router-link to="/bs-support-info">資助認養詳情</router-link>
            <router-link to="/bs-support-statistic">資助認養數據</router-link>
        </div>
    </section>
</template>

<script>
  export default {
    data () {
      return {
        userName: '',
        password: '',
      }
    },
    methods: {
    //   login(){
    //     let author = true;
    //     if( author )
    //         this.$router.push('/');
    //     else
    //         alert('login failed')
    //   }
    } 
  }
</script>

<style lang="scss" scoped>

// a {
//     display: block;
// }

// .tidy_list{
//     position: relative;
// }

// .tidy_list_block {
//     position: absolute;
//     top: 0;
//     bottom: 0;
//     right: 0;
// }

// .login {
//     position: relative;
//     width: 100vw;
//     height: 100vh;
// }

// .login_block {
//     position: absolute;
//     top:50%;
//     left: 50%;
//     transform: translate(-50%, -50%);
// }

</style> -->

<!-- <template>
    <h1>後台登入頁</h1>
    <section class="tidy_list">
        <div class="tidy_list_block"></div>
        <router-link to="/bs-index">後台首頁</router-link>
        <router-link to="/bs-admin-list">權限管理</router-link>
        <router-link to="/bs-admin-add">新增管理員</router-link>
        <router-link to="/bs-article-list">公告管理</router-link>
        <router-link to="/bs-article-edit">新增／編輯公告</router-link>
        <router-link to="/bs-booking-list-two">導覽預約管理</router-link>
        <router-link to="/bs-booking-dayoff">新增休館日期</router-link>
        <router-link to="/bs-booking-edit">修改預約</router-link>
        <router-link to="/bs-koala-list">無尾熊管理</router-link>
        <router-link to="/bs-koala-add">新增無尾熊</router-link>
        <router-link to="/bs-koala-edit">編輯無尾熊</router-link>
        <router-link to="/bs-member-list">會員管理</router-link>
        <router-link to="/bs-member-blacklist">會員黑名單</router-link>
        <router-link to="/bs-order-list">訂單管理</router-link>
        <router-link to="/bs-product-list">周邊商品管理</router-link>
        <router-link to="/bs-product-edit">新增／編輯周邊商品</router-link>
        <router-link to="/bs-coupon-list">優惠券管理</router-link>
        <router-link to="/bs-support-list">資助認養管理</router-link>
        <router-link to="/bs-support-info">資助認養詳情</router-link>
        <router-link to="/bs-support-statistic">資助認養數據</router-link>
    </section>
</template>

<script>
// @ is an alias to /src
/* import HelloWorld from "@/components/HelloWorld.vue"; */

export default {
    /* name: "HomeView",
    components: {
        HelloWorld,
    }, */
};
</script>

<style lang="scss" scoped>
a {
    display: block;
}
</style> -->
