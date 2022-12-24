<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>園區導覽管理</h1>
            <img src="@/assets/images/backstageindex/articleIcon.png" alt="" />
            <h2>預約總覽</h2>
        </div>
        <div class="action">
            <router-link to="/bs-booking-dayoff" target="_blank">
                <img src="@/assets/images/icon/FilePlus.svg" alt=""
            /></router-link>
            <div class="search">
                <input
                    type="date"
                    name="search_rsv_date"
                    id="search_rsv_date"
                    placeholder="搜尋"
                    ref="search_rsv_date"
                    @change="search_func"
                />
            </div>
            <select v-model="selectName" @change="search_func" name="" id="">
                <option value="" disabled selected>訂單排序</option>
                <option v-for="list in lists" :value="list.val" :key="list">
                    {{ list.item }}
                </option>
                <!-- <option value="">已預約訂單</option>
                <option value="">休館日訂單</option> -->
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3
                class="bookNum"
                @click="numchange('cName')"
                name="rsv_id_orderby"
            >
                編號<Icon
                    type="ios-arrow-up"
                    size="20"
                    :class="{ inverse: idReverse }"
                />
            </h3>
            <h3 class="bookName">預約者</h3>
            <h3
                class="bookDate"
                @click="datechange('cName')"
                name="rsv_date_orderby"
            >
                日期<Icon
                    type="ios-arrow-up"
                    size="20"
                    :class="{ inverse: dateReverse }"
                />
            </h3>
            <h3 class="bookPpl">人數</h3>
            <h3 class="bookConnect">Email / 電話</h3>
            <h3 class="bookStatus">狀態</h3>
            <h3 class="bookEdit">編輯</h3>
        </div>
        <div
            class="bs-list"
            v-for="(list, index) in filterList"
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
            // totalPage: ,
            currentPage: this.$route.query.page ? this.$route.query.page : 1,
            selectName: "",
            lists: [
                { val: "rsv_date", item: "日期(正序)" },
                { val: "rsv_date DESC", item: "日期(反序)" },
                { val: "rsv_id", item: "預約編號(正序)" },
                { val: "rsv_id DESC", item: "預約編號(反序)" },
            ],
            idReverse: false,
            dateReverse: false,
        };
    },
    watch: {
        // $route: function () {
        //     console.log(this.$route.query);
        //     console.log(this.currentPage);
        //     if (!Object.keys(this.$route.query).length) {
        //         console.log("空物件");
        //         this.currentPage = 1;
        //         this.getResvDetail();
        //     }
        //     this.getResvDetail();
        // },
    },
    methods: {
        numchange() {
            this.idReverse = !this.idReverse;
            console.log(this.idReverse);

            let postDateSearch = "";
            this.idReverse
                ? (postDateSearch = {
                      search_order_field: "rsv_id DESC",
                      // search_order_by: "rsv_id",
                  })
                : (postDateSearch = {
                      search_order_field: "rsv_id ASC",
                      // search_order_by: "rsv_id",
                  });

            /* const postDateSearch = {
                search_order_field: "rsv_id DESC",
                // search_order_by: "rsv_id",
            }; */

            // console.log("QQ");
            const apiURL = new URL(`${BASE_URL}/getResvDay2.php`);
            // fetch("http://localhost/cgd103_g1/public/api/getResvDay2.php?",
            fetch(apiURL, {
                method: "POST",
                // credentials: "include",
                body: new URLSearchParams(postDateSearch),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.booklist = json;
                });
            console.log(this.lists[2]);
        },
        datechange() {
            this.dateReverse = !this.dateReverse;
            console.log(this.dateReverse);
            let postDateSearch = "";
            this.dateReverse
                ? (postDateSearch = {
                      search_order_field: "rsv_date DESC",
                      // search_order_by: "rsv_id",
                  })
                : (postDateSearch = {
                      search_order_field: "rsv_date ASC",

                      // search_order_by: "rsv_id",
                  });

            /* const postDateSearch = {
                search_order_field: "rsv_id DESC",
                // search_order_by: "rsv_id",
            }; */

            // console.log("QQ");
            const apiURL = new URL(`${BASE_URL}/getResvDay2.php`);
            // fetch("http://localhost/cgd103_g1/public/api/getResvDay2.php",
            fetch(apiURL, {
                method: "POST",
                // credentials: "include",
                body: new URLSearchParams(postDateSearch),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.booklist = json;
                });
        },
        getResvDetail() {
            // const productId = this.$route.params.id;
            // const apiURL = new URL(
            //     `http://localhost/cgd103_g1/public/api/getReservation.php?limit=9&page=${this.currentPage}`
            // );
            // fetch(apiURL)
            //     .then((res) => res.json())
            //     .then((json) => {
            //         this.booklist = json.bookList;
            //         this.totalPage = Math.ceil(json.rsvCount / 10);
            //     });
        },
        deleteList(index) {
            // console.log(this.booklist[index].rsv_id);
            // const apiURL = new URL(
            //     `http://localhost/cgd103_g1/public/api/deleteRsv.php`
            // );
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
                    alert(result);
                    location.reload();
                });
        },
        search_func() {
            const postDateSearch = {
                search_rsv_date: this.$refs.search_rsv_date.value,
                search_order_field: this.selectName,
                search_order_by: "",
            };
            console.log(postDateSearch);
            console.log(1111, this.selectName);
            console.log("QQ");
            const apiURL = new URL(`${BASE_URL}/getResvDay2.php`);

            // fetch("http://localhost/cgd103_g1/public/api/getResvDay2.php?",
            fetch(apiURL, {
                method: "POST",
                // credentials: "include",
                body: new URLSearchParams(postDateSearch),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.booklist = json;
                });
        },
        prePage() {
            if (this.currentPage == 1) {
                // console.log(this.currentPage);
                // console.log(this.totalPage);
                return;
            } else {
                this.currentPage--;
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
            }
        },
        changePage(page) {
            this.currentPage = page;
        },
    },
    created() {
        this.getResvDetail();
        const apiURL = new URL(`${BASE_URL}/getResvDay2.php`);

        // fetch("http://localhost/cgd103_g1/public/api/getResvDay2.php"
        // )
        fetch(apiURL)
            .then((res) => res.json())
            .then((json) => {
                console.log(json);
                this.booklist = json;
            });
    },
    computed: {
        totalPage() {
            return Math.ceil(this.booklist.length / 10);
        },
        filterList() {
            return this.booklist.slice(
                (this.currentPage - 1) * 10,
                this.currentPage * 10
            );
        },
    },
};
</script>

<style lang="scss" scoped>
.title-n-action {
    margin-bottom: 20px;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;

    .title {
        width: 400px;
        display: flex;

        column-gap: 20px;
        flex-wrap: wrap;
        h1 {
            display: block;
        }

        h2 {
            color: $green;
            &::before {
                content: "";
                border-left: solid 5px $green;
                // position: absolute;
                padding-right: 10px;
                margin-left: 3px;
                height: 100%;
            }
        }
        img {
            margin-left: 5px;
            height: 67.5px;
        }
    }
    .action {
        display: flex;
        align-items: center;
        column-gap: 15px;
        .search {
            input {
                width: 200px;
                box-sizing: border-box;
                padding: 4px 10px;
                line-height: 2;
                border: 1px solid $green;
                border-radius: 5px;
                background-color: transparent;
                color: $green;
            }
        }
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
        h2 {
            padding-left: 500px;
        }
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
    a {
        display: inline-block;
        padding: 10px 18px;
        color: $darkgreen;
        //
        width: 40px;
        height: 40px;
        line-height: 40px;
        padding: 0;
        text-align: center;
        &:hover {
            color: $darkgreen;
        }
        &:focus {
            color: #fff;
        }
    }
    a.is-active {
        background-color: $darkgreen;
        border-radius: 100%;
        color: #fff;
    }
}
.inverse {
    transform: rotate(180deg);
}
</style>
