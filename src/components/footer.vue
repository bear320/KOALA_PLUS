<template>
    <footer id="footer">
        <div class="wrapper">
            <div class="top">
                <ul class="info">
                    <li>聯絡電話：+1 202 555 0156</li>
                    <li>連絡信箱：koalaplus@koalaplus.com</li>
                    <li>
                        園區地址：7 Green Swamp Road, Nyora, New South Wales,
                        2646 Australia
                    </li>
                    <li>營業時間：週二至週日 08:00 - 18:00</li>
                </ul>
                <div class="top-right">
                    <div class="logo">
                        <router-link :to="{ path: '/home' }">
                            <img
                                src="../assets/images/logo_white.svg"
                                alt="KOALA+"
                        /></router-link>
                    </div>
                    <ul class="ft-link">
                        <li>
                            <router-link :to="{ path: '/home' }">
                                <Icon type="logo-facebook" />
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/home' }">
                                <Icon type="logo-youtube" />
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/home' }">
                                <Icon type="logo-instagram" />
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/home' }">
                                <Icon type="logo-twitter" />
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bt">
                <p>
                    本網站為緯育TibaMe_前端設計工程師班學員專題成果作品，本平台僅供學習、展示之用。
                </p>
                <p>
                    若有侵權疑慮，您可以私訊「TibaMe-前端設計工程師養成班」，後續會由專人協助處理。
                </p>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    porps: {},
    data() {
        return {
            items: [
                { name: "聯絡電話：+1 202 555 0156", source: "koala-phone" },
                {
                    name: "連絡信箱：koalaplus@koalaplus.com",
                    source: "koala-email",
                },
                {
                    name: "園區地址：7 Green Swamp Road, Nyora, New South Wales, 2646 Australia",
                    source: "koala-address",
                },
            ],
            toggle: true,
            i: 0,
        };
    },
};
</script>

<style lang="scss" scoped>
footer {
    width: 100%;
    padding: 50px 0;
    color: #fff;
    background-color: $darkgreen;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
    @include m() {
        padding: 25px 0;
    }
    .wrapper {
        @include m() {
            max-width: calc(100% - 80px);
        }
        .top {
            padding: 30px;
            border-bottom: 1px solid #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 30px;
            @include m() {
                flex-direction: column-reverse;
                row-gap: 30px;
            }
            .info {
                line-height: 2;
                text-align: left;
            }
            .top-right {
                .logo {
                    width: 260px;
                    margin: auto;
                    img {
                        width: 80%;
                        vertical-align: top;
                    }
                }
                .ft-link {
                    display: flex;
                    justify-content: center;
                    column-gap: 20px;
                    li {
                        display: flex;
                        justify-content: space-around;
                        align-items: center;
                        i {
                            font-size: 30px;
                            color: #fff;
                            &:hover {
                                cursor: pointer;
                            }
                        }
                    }
                }
            }
        }
        .bt {
            margin: 0 auto;
            padding: 30px;
            line-height: 2;
        }
    }
}
</style>
