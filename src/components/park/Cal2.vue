<template lang="">
    <!-- {{ today }}
    第一天星期{{ emptyDay }} 現在{{ thisMonth + 1 }}月 -->
    <div class="calender-wrapper" id="calender" ref="calender">
        <h2>{{ thisMonth + 1 }}月</h2>

        <table align="center">
            <div class="button-wrapper">
                <button class="btn-lowest" @click="preMonth()">PreMonth</button>
                <button class="btn-lowest" @click="nextMonth()">
                    NextMonth
                </button>
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
                <td class="tdd" v-for="d in emptyDay"></td>
                <td
                    class="tdd"
                    v-for="(day, index) in allDay"
                    @click="chooseDate"
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
                    </p>
                </td>
            </tr>
        </table>
        <booking-form v-show="showForm" @closeForm="closeTable"></booking-form>
    </div>
</template>
<script>
import BookingForm from "@/components/park/BookingForm.vue";
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
                backgroundColor: "#979292",
            },
            notBookDate: {
                "2022-12-2": { state: "已預約" },
                "2022-12-8": { state: "休館" },
                "2022-12-15": { state: "已預約" },
                "2022-12-20": { state: "休館" },
            },
        };
    },
    components: {
        BookingForm,
    },
    created() {
        this.getEmptyDay(new Date().getFullYear(), new Date().getMonth());
        this.getAllDay(new Date().getFullYear(), new Date().getMonth());
        this.thisMonth = new Date().getMonth();
        this.thisYear = new Date().getFullYear();
        // this.thisDate = new Date().getDate();
    },

    methods: {
        test(X) {
            let ccc = false;
            this.notBookDate.find((e) => {
                console.log(e);
                if (`${this.thisYear}-${this.thisMonth + 1}-${X}` === e) {
                    ccc = true;
                }
            });
            return ccc;
            // e === `${this.thisYear}-${this.thisMonth + 1}-${X}`
            // return (
            //     `${this.thisYear}-${this.thisMonth + 1}-${X}` ===
            //     this.notBookDate[0]
            // );
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
        },
        clickDay(yy, mm, dd) {
            console.log(`${yy}-${mm}-${dd}`);
        },
        chooseDate() {
            console.log("showform");
            this.showForm = true;
        },
        closeTable() {
            this.showForm = false;
        },
    },
};
</script>
<style scoped>
.calender-wrapper {
    position: relative;
}
h2 {
    font-size: 40px;
    text-align: center;
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
    /* height: 30px; */

    text-align: center;
    line-height: 30px;
}
.btn-lowest {
    padding: 0 10px;
    margin: 10 10px;
}
table {
    width: 960px;
    height: 600px;
    margin-bottom: 100px;
    margin: auto;
}
th,
td {
    height: 90px;
    text-align: center;
}
th {
    height: 40px;
}

tr {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

td {
    cursor: pointer;
    background-color: #d8d8d8;
    border: 1px solid #000;
}
</style>
