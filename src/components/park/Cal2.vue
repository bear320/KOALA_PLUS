<template lang="">
    <!-- {{ today }}
    第一天星期{{ emptyDay }} 現在{{ thisMonth + 1 }}月 -->
    <div class="calender-wrapper" id="calender" ref="calender">
        <h2>{{ thisMonth + 1 }}月</h2>

        <table align="center">
            <div class="button-wrapper">
                <button class="btn-lowest" @click="preMonth()">上個月</button>
                <button class="btn-lowest" @click="nextMonth()">下個月</button>
            </div>
            <tr>
                <th>週日</th>
                <th>週一</th>
                <th>週二</th>
                <th>週三</th>
                <th>週四</th>
                <th>週五</th>
                <th>週六</th>
            </tr>
            <tr class="trr">
                <td
                    class="tdd"
                    v-for="d in emptyDay"
                    style="background: #f8f8f8"
                ></td>
                <td
                    class="tdd"
                    v-for="(day, index) in allDay"
                    @click="chooseDate(thisYear, thisMonth + 1, day)"
                    :style="{
                        backgroundColor: notBookDate?.[
                            `${this.thisYear}-${this.thisMonth + 1}-${day}`
                        ]
                            ? '#9abdbf'
                            : 'rgb(190, 214, 213, .3)',
                        cursor: notBookDate?.[
                            `${this.thisYear}-${this.thisMonth + 1}-${day}`
                        ]
                            ? 'default'
                            : 'pointer',
                    }"
                >
                    {{ day }}

                    <p
                        v-if="
                            notBookDate?.[
                                `${this.thisYear}-${this.thisMonth + 1}-${day}`
                            ]
                        "
                        :style="bookStyle"
                    >
                        {{
                            notBookDate[
                                `${this.thisYear}-${this.thisMonth + 1}-${day}`
                            ].state
                        }}
                        <br />
                        <p v-if="notBookDate[
                                `${this.thisYear}-${this.thisMonth + 1}-${day}`
                            ].state==='已預約'">🐨</p>
                        <p v-else-if="notBookDate[
                                `${this.thisYear}-${this.thisMonth + 1}-${day}`
                            ].state==='休館'">📅</p>

                        
                        <!-- {{
                            notBookDate[
                                `${this.thisYear}-${this.thisMonth + 1}-${day}`
                            ].emoji
                        }} -->
                    </p>
                </td>
                <td
                    class="tdd"
                    v-for="d in lastEmptyDay"
                    style="background: #f8f8f8"
                ></td>
            </tr>
        </table>
        <booking-form
            :msg="rsvDate"
            :callback="getResvDetail"
            v-if="showForm"
            @closeForm="closeTable"
        ></booking-form>
        <div class="notice">
            <ul>
                預約導覽注意事項：
                <li>
                    ◇
                    為維護參觀品質並遵守場地容留限制，團體導覽人數每日最多20人。
                </li>
                <li>
                    ◇
                    可供團體預約時段為開放日當日下午13：30-17：00。每次原則30-50分鐘，若遇假日則以月曆顯示開放日期為主。
                </li>
                <li>
                    ◇
                    一般導覽包含園區及無尾熊救護介紹，若預約有特殊行程或安排，請提前與基地申請。
                </li>
                <li>
                    ◇
                    預約完成後，請於預約時間前10分鐘到達服務台；若無法依約定時間準時到達者，請務必事先來電告知。
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import BookingForm from "@/components/park/BookingForm.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    name: "Calendar3",
    data() {
        return {
            today: new Date(),
            thisMonth: 0,
            thisYear: 2022,
            emptyDay: 0,
            allDay: 31,
            showForm: false,
            bookStyle: {
                fontSize: "20px",
                fontWeight: "600",
                color: "white",
            },
            notBookDate: {},
                
                // "2022-12-2": {
                //     state: "已預約",
                //   /*   emoji: "🐨", */
                // },
                // "2022-12-8": { state: "休館", /* emoji: "📅"  */},
                // "2022-12-15": {
                //     state: "已預約",
                //     /* emoji: "🐨", */
                // },
                // "2022-12-20": { state: "休館", /* emoji: "📅" */ },
            // },
            rsvDate: "",
            lastEmptyDay: 0,
     
        };
    },
    computed:{
        QQ(){
            return true
        }
    },
    components: {
        BookingForm,
    },
    created() {
        this.getEmptyDay(new Date().getFullYear(), new Date().getMonth());
        this.getAllDay(new Date().getFullYear(), new Date().getMonth());
        this.thisMonth = new Date().getMonth();
        this.thisYear = new Date().getFullYear();
        this.thisDate = new Date().getDate();
        this.getLastEmptyDay(new Date().getFullYear(), new Date().getMonth());
        this.getResvDetail();
    },
    watch: {
    notBookDate: {
        handler: function() {
            this.getResvDetail();
        },
        deep: true
    }
},

    methods: {
        getResvDetail() {
            // const productId = this.$route.params.id;
            console.log('QQ');
            const apiURL = new URL(`${BASE_URL}/getReservation.php`);
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.notBookDate = json.notBookDate;
                    console.log(this.notBookDate);
                })
               
        },
        getEmptyDay(yy, m, d = 1) {
            let firstDate = new Date(yy, m, d);
            this.emptyDay = firstDate.getDay(); // 空4天
        },
        // getEmptyDay() {
        //     let firstDate = new Date(
        //         this.today.getFullYear(),
        //         this.today.getMonth()
        //     );
        //     let firstDay = firstDate.getDay();
        //     return firstDay;
        // },
        getLastEmptyDay(yy, m, d = 1) {
            const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            let days = monthDays[m];
            let firstDate = new Date(yy, m, d);

            if (m == 1) {
                if (yy % 400 == 0) {
                    days = 29;
                } else if (yy % 100 == 0) {
                    days = 28;
                } else if (yy % 4 == 0) {
                    days = 29;
                }
            }
            this.allDay = days;

            console.log(firstDate);
            console.log(days);
            console.log((firstDate.getDay() + days) % 7);
            this.lastEmptyDay = 7 - [(firstDate.getDay() + days) % 7];
            if (this.lastEmptyDay > 6) {
                this.lastEmptyDay = 0;
            }
        },

        getAllDay(yy, m) {
            const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            let days = monthDays[m];

            if (m == 1) {
                if (yy % 400 == 0) {
                    days = 29;
                } else if (yy % 100 == 0) {
                    days = 28;
                } else if (yy % 4 == 0) {
                    days = 29;
                }
            }
            this.allDay = days;
        },
        preMonth() {
            if (this.thisMonth == 0) {
                this.thisMonth = 11;
                this.thisYear = this.thisYear - 1;
            } else {
                this.thisMonth = this.thisMonth - 1;
            }
            this.getEmptyDay(this.thisYear, this.thisMonth);
            this.getAllDay(this.thisYear, this.thisMonth);
            this.getLastEmptyDay(this.thisYear, this.thisMonth);
        },
        nextMonth() {
            if (this.thisMonth == 11) {
                this.thisMonth = 0;
                this.thisYear = this.thisYear + 1;
            } else {
                this.thisMonth = this.thisMonth + 1;
            }
            this.getEmptyDay(this.thisYear, this.thisMonth);
            this.getAllDay(this.thisYear, this.thisMonth);
            this.getLastEmptyDay(this.thisYear, this.thisMonth);
        },

        chooseDate(yy, mm, dd) {
            if (this.notBookDate[`${yy}-${mm}-${dd}`]) return;
            let newMM = mm.toString();
            if (newMM.length < 2) {
                newMM = "0" + newMM;
            }
            let newDD = dd.toString();
            if (newDD.length < 2) {
                newDD = "0" + newDD;
            }

            this.rsvDate = `${yy}-${newMM}-${newDD}`;
            this.showForm = true;
        },
        closeTable() {
            this.showForm = false;
        },
    },
};
</script>
<style lang="scss" scoped>
.calender-wrapper {
    position: relative;
    margin-bottom: 30px;
}
h2 {
    font-size: 40px;
    text-align: center;
    font-weight: 600;
}
.button-wrapper {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-bottom: 10px;
}

button {
    list-style: none;
    cursor: pointer;
    height: 30px;
    text-align: center;
    line-height: 30px;
}
.btn-lowest {
    padding: 0 20px;
    margin: 10 10px;
}
table {
    width: 80%;
    margin-bottom: 100px;
    margin: auto;
}
th,
td {
    text-align: center;
}
th {
    height: 40px;
}

tr {
    font-size: 18px;
    font-weight: bold;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

td {
    cursor: pointer;
    background-color: #d8d8d8;
    border: 1px solid;
    border-color: #888;
    height: 120px;
    display: grid;
    grid-template-rows: repeat(3, 1fr);
    p {
        grid-row: 2/3;
        align-self: center;
    }
}

.notice {
    padding-top: 10px;
    width: 80%;
    margin: auto;
    text-align: left;
}
ul,
li {
    margin: 0;
    padding: 0;
    font-size: 18px;
}
.notice ul {
    width: 100%;
    margin: auto;
    list-style: none;
    font-weight: 600;
}
.notice li {
    list-style: none;
    font-weight: 400;
}
@media screen and (max-width: 1200px) {
    table {
        width: 75%;
    }
    .notice {
        width: 75%;
    }
}

@media screen and (max-width: 1024px) {
    table {
        width: 85%;
    }
    .notice {
        width: 85%;
    }
}

@media screen and (max-width: 768px) {
    h2 {
        font-size: 24px;
    }
    table {
        width: 100%;
    }
    th {
        height: 30px;
    }
    td {
        height: 80px;
    }
    .notice {
        width: 100%;
    }
    p {
        font-size: 16px !important;
    }
}
</style>
