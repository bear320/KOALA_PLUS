<template>
    <!-- <Header /> -->
    <!-- <section>
        <router-link to="/home">前台</router-link>
        <router-link to="/bs-login">後台</router-link>
        <router-link to="/about">關於</router-link>
        <router-link to="/about-koala">無尾熊百科</router-link>
        <router-link to="/support">資助認養</router-link>
        <router-link to="/cart1">購物車1</router-link>
        <router-link to="/cart2">購物車2</router-link> -->
    <!-- <router-link to="/koala-info">無尾熊詳情頁</router-link> -->
    <!-- <router-link to="/koala-park">園區資訊</router-link>
        <router-link to="/login">登入註冊</router-link>
        <router-link to="/member">會員專區</router-link>
        <router-link to="/my-koala">我的無尾熊</router-link> -->
    <!-- <router-link to="/product">產品詳情</router-link> -->
    <!-- <router-link to="/shop">周邊商城</router-link>
    </section> -->
    <div class="wrapper">
        <section class="parallax-container">
            <div class="parallax">
                <div class="title">
                    <h1>KOALA+</h1>
                    <div>
                        <div class="line"></div>
                        <router-link to="/home">前台</router-link>
                        <div class="line"></div>
                    </div>
                    <div>
                        <div class="line"></div>
                        <router-link to="/bs-login">後台</router-link>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
// import Header from "@/components/header.vue";
export default {
    components: {
        // Header,
    },
};
</script>

<style lang="scss" scoped>
a {
    display: block;
    color: #ffffff;
}
.div {
    @include size(100%, 100%);
}
@import url("https://fonts.googleapis.com/css?family=Permanent+Marker|Shadows+Into+Light+Two");

.wrapper {
    .parallax-container {
        display: flex;
        align-items: stretch;
        min-height: 100vh;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        .parallax {
            flex: 1 1 auto;
            background-image: url("https://cdn2.wanderlust.co.uk/media/1050/koala-wild.jpg?anchor=center&mode=crop&width=2000&height=1000&format=auto&quality=80&rnd=132230536720000000");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 120%;
            height: 120%;
            top: -10%;
            left: -10%;
            right: -10%;
            bottom: -10%;
            color: #dcdcdc;
            text-align: center;
            .title {
                color: #dcdcdc;
                h1 {
                    font-size: 6rem;
                    line-height: 6.75rem;
                    // font-family: "Permanent Marker", cursive;
                    letter-spacing: 3px;
                    margin: 0;
                    color: #dcdcdc;
                }
                .line {
                    border-style: solid;
                    border-width: 0.05rem;
                    margin: 0.5rem 0;
                }
                a {
                    // font-family: "Shadows Into Light Two", cursive;
                    font-weight: bold;
                    letter-spacing: 1px;
                    color: #dcdcdc;
                }
            }
        }
    }
    // .text-container {
    //     padding: 10vh 10vw;
    //     text-align: center;
    //     .text-block {
    //         h5 {
    //             font-size: 2.5rem;
    //             margin: 0;
    //         }
    //     }
    // }
}
</style>
