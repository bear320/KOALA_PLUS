<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>園區導覽管理</h1>
            <img src="@/assets/images/backstageindex/articleIcon.png" alt="" />
            <h2>預約總覽</h2>
        </div>
        <div class="action">
            <!-- 改連結 -->
            <router-link to="/bs-booking-dayoff" target="_blank">
                <img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></router-link>
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="" selected>排列方式</option>
                <option value="">已預約訂單</option>
                <option value="">休館日訂單</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="bookNum">編號</h3>
            <h3 class="bookName">預約者</h3>
            <h3 class="bookDate">日期</h3>
            <h3 class="bookPpl">人數</h3>
            <h3 class="bookConnect">Email / 電話</h3>
            <h3 class="bookStatus">狀態</h3>
            <h3 class="bookEdit">編輯</h3>
        </div>
        <div
            class="bs-list"
            v-for="(list, index) in booklist"
            :key="list.rsv_id"
            :style="{
                backgroundColor:
                    list.rsv_name === `koala+`
                        ? 'rgba(154, 195, 199, 0.2)'
                        : '#D8D8D8',
            }"
        >
            <p>{{ list.rsv_id }}</p>
            <p>{{ list.rsv_name }}</p>
            <!-- <p>
                <router-link
                    :to="`/bs-support-info/${list.number}`"
                    target="_blank" 
                >
                    {{ list.number }}
                </router-link>
            </p> -->
            <p>{{ list.rsv_date }}</p>
            <p>{{ list.rsv_ppl }}</p>
            <p>{{ list.rsv_email }}<br />{{ list.rsv_mobile }}</p>
            <p>{{ list.rsv_status }}</p>
            <p>
                <router-link
                    :to="`/bs-booking-edit/${list.rsv_id}`"
                    target="_blank"
                >
                    <img src="@/assets/images/icon/edit.svg" alt="" />
                </router-link>
                <span @click="deleteList(index)">
                    <img src="@/assets/images/icon/delete.svg" alt=""
                /></span>
            </p>
        </div>
    </section>
    <div class="pagination">
        <ul>
            <a @click="prePage"><li>&lt;</li></a>
            <a
                v-for="i in totalPage"
                :class="{ 'is-active': currentPage == i }"
                :key="i"
                href="#"
                @click="changePage(i)"
                ><li>{{ i }}</li></a
            >
            <!--   <a href="#"><li>2</li></a>
            <a href="#"><li>3</li></a>
            <a href="#"><li>4</li></a>
            <a href="#"><li>5</li></a>
            <a href="#"><li>6</li></a> -->
            <a @click="nextPage"><li>></li></a>
        </ul>
    </div>
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
            booklist: [],
            totalPage: 0,
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
        };
    },
    watch: {
        $route: function () {
            console.log(this.$route.query);
            console.log(this.currentPage);
            if (!Object.keys(this.$route.query).length) {
                console.log("空物件");
                this.currentPage = 1;
                this.getResvDetail();
            }
            this.getResvDetail();
        },
    },
    methods: {
        getResvDetail() {
            // const productId = this.$route.params.id;
            const apiURL = new URL(
                `${BASE_URL}/getReservation.php?limit=9&page=${this.currentPage}`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.booklist = json.bookList;
                    this.totalPage = Math.ceil(json.rsvCount / 10);
                });
        },
        deleteList(index) {
            console.log(this.booklist[index].rsv_id);
            const apiURL = new URL(`${BASE_URL}/deleteRsv.php`);
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams({
                    rsv_id: this.booklist[index].rsv_id,
                }),
            })
                .then((res) => res.json())
                .then((result) => {
                    console.log(result);
                    // console.log(this.booklist);
                    // this.callback();
                    // alert(result);
                    this.async();
                    // location.reload();
                });
        },
        async() {
            this.$Modal.confirm({
                title: "Title",
                content: "<p>The dialog box will be closed after 2 seconds</p>",
                loading: true,
                onOk: () => {
                    setTimeout(() => {
                        this.$Modal.remove();
                        this.$Message.info(
                            "Asynchronously close the dialog box"
                        );
                    }, 2000);
                },
            });
        },
        prePage() {
            if (this.currentPage == 1) {
                // console.log(this.currentPage);
                // console.log(this.totalPage);
                return;
            } else {
                this.currentPage--;
                this.$router.push({
                    path: "/bs-booking-list-two",
                    query: {
                        limit: `10`,
                        page: this.currentPage,
                    },
                });
            }
        },
        nextPage() {
            console.log("QQ");

            if (this.currentPage === this.totalPage) {
                // console.log(this.currentPage);
                // console.log(this.totalPage);
                return;
            } else {
                this.currentPage++;
                this.$router.push({
                    path: "/bs-booking-list-two",
                    query: {
                        limit: `10`,
                        page: this.currentPage,
                    },
                });
            }
        },
        changePage(page) {
            this.currentPage = page;
            this.$router.push({
                path: "/bs-booking-list-two",
                query: {
                    limit: `10`,
                    page: this.currentPage,
                },
            });
        },
    },
    created() {
        this.getResvDetail();
    },
};
</script>

<style lang="scss" scoped>
.title-n-action {
    margin-bottom: 20px;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    .title {
        width: 400px;
        display: flex;
        column-gap: 20px;
        flex-wrap: wrap;
        h1 {
            display: block;
        }
        h2 {
            padding-left: 500px;
            color: $green;
            @include borderLeft(30px);
        }
        img {
            margin-left: 5px;
            height: 67.5px;
        }
    }
    .action {
        display: flex;
        column-gap: 15px;
    }
}
.table {
    .bs-title {
        width: 100%;
        border-radius: 10px;
        background-color: $darkgreen;
        color: white;
        display: flex;
        justify-items: center;
        align-items: center;
        h3 {
            display: block;
            width: calc(100% / 7);
        }
    }

    .bs-list {
        display: flex;
        justify-items: center;
        align-items: center;
        margin: 10px 0;
        padding: 10px 0;
        border-bottom: solid 1px $lightgreen;
        border-radius: 5px;

        p {
            display: block;
            width: calc(100% / 7);
            a {
                display: block;
                width: fit-content;
                height: fit-content;
                margin: 0 auto;
                img {
                    margin: 10px;
                    vertical-align: top;
                }
            }
            &:last-child {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 15px;
                a,
                span {
                    margin: 0;
                    img {
                        vertical-align: top;
                        margin: 0;
                    }
                }
            }
        }
    }
}
a {
    text-decoration: none;
}

p,
li,
a {
    font-size: 14px;
}

/* GRID */

.twelve {
    width: 100%;
}
.eleven {
    width: 91.53%;
}
.ten {
    width: 83.06%;
}
.nine {
    width: 74.6%;
}
.eight {
    width: 66.13%;
}
.seven {
    width: 57.66%;
}
.six {
    width: 49.2%;
}
.five {
    width: 40.73%;
}
.four {
    width: 32.26%;
}
.three {
    width: 23.8%;
}
.two {
    width: 15.33%;
}
.one {
    width: 6.866%;
}

/* COLUMNS */

.col {
    display: block;
    float: left;
    margin: 1% 0 1% 1.6%;
}

.col:first-of-type {
    margin-left: 0;
}

.container {
    width: 100%;
    max-width: 940px;
    margin: 0 auto;
    position: relative;
    text-align: center;
}

/* CLEARFIX */

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}

/* GENERAL STYLES */

.pagination {
    padding: 30px 0;
}

.pagination ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
}

.pagination a {
    display: inline-block;
    padding: 10px 18px;
    color: #222;
}

/* ONE */

.p1 a {
    width: 40px;
    height: 40px;
    line-height: 40px;
    padding: 0;
    text-align: center;
}

.p1 a.is-active {
    background-color: #2ecc71;
    border-radius: 100%;
    color: #fff;
}
</style>
