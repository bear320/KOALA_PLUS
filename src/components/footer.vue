<template>
    <footer id="footer">
        <div class="wrapper">
            <div class="top">
                <ul class="list">
                    <li v-for="item in items" :key="item">
                        <div :to="{ path: item['sourc'] }">
                            {{ item["name"] }}
                        </div>
                    </li>
                </ul>
                <div class="center">
                    <li>
                        <p>▼ 園區時間 ：9AM – 11AM & 2PM – 7PM全年無休</p>
                    </li>
                </div>
                <div class="right">
                    <div class="logo">
                        <router-link :to="{ path: '/home' }"
                            ><img src="../assets/images/logo.svg" alt="KOALA+"
                        /></router-link>
                    </div>
                    <div class="ft-link">
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
                    </div>
                </div>
            </div>
            <div class="bt">
                <p>
                    本網站為緯育TibaMe_前端設計工程師班學員專題成果作品，本平台僅供學習、展示之用。
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
                { name: "▼ 聯絡電話: +1 202 555 0156", sourc: "koala-phone" },
                {
                    name: "▼ Email:koalaplus@koalaplus.com",
                    sourc: "koala-email",
                },
                {
                    name: "▼ 園區地址: 7 Green Swamp Road, Nyora, New South Wales, 2646 Australia",
                    sourc: "koala-address",
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
    height: 500px;
    z-index: 999;
    // position: fixed;
    background-color: #2e382e;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;

    .wrapper {
        width: 1200px;
        .top {
            display: flex;

            .list {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                font-weight: bold;
                color: white;
                height: 100%;
                text-align: start;
                li {
                    padding: 5px;
                    width: 90%;
                }
            }
        }
    }
}

.center {
    font-weight: bold;
    color: white;
    height: 100%;
    padding: 5px;
    list-style: none;
}
.logo {
    width: 70%;
    margin: auto;
    img {
        width: 80%;
        filter: brightness(800);
    }
}
.right {
    display: flex;
    flex-direction: column;
    .ft-link {
        display: flex;
        margin: auto;

        li {
            @include size(40px, 40px);
            list-style: none;
            margin: 0px 20px;
            .ivu-icon {
                transform: scale(2);
                color: white;
                &:hover {
                    color: $green;
                }
            }
        }
    }
}
.bt {
    border-top: 1px solid white;
    margin: 0px 200px;
    padding: 30px;
    color: white;
    display: flex;
    justify-content: center;
}

@media screen and (max-width: 1200px) {
    .all {
        width: 688px;
        .list {
            display: flex;
            align-items: center;
            li {
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }
    }

    .top {
        display: flex;
        flex-direction: column-reverse;
    }
    .bt {
        margin: 0px;
        padding: 30px;
    }
}
</style>
