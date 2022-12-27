<template lang="">
    <div class="book-form">
        <form
            ref="form"
            id="bookingForm"
            data-form-storage="true"
            action="submit"
            enctype="multipart/form-data"
            method="post"
            @submit.prevent="sendEmail"
        >
            <h2>預約資訊</h2>
            <!-- <button id="close" @click.self="toggleModal">X</button> -->
            <Icon type="md-close-circle" id="close" @click="closeIt"/>
            <!-- <button id="close" @click="closeIt">X</button> -->
            <div class="form-group">
                <label for="rsv_name">姓名</label>
                <input
                    type="text"
                    class="form-control"
                    id="rsv_name"
                    name="user_name"
                    placeholder="預約人姓名"
                    v-model.trim="name"
                    required="required"
                />
            </div>
            <div class="form-group">
                <label for="rsv_mobile">手機</label>
                <input
                    type="tel"
                    class="form-control"
                    id="rsv_mobile"
                    name="mobile"
                    placeholder="請輸入10位手機號碼，如0912345678"
                    v-model="mobile"
                    required="required"
                    maxlength="10"
                    pattern="09\d{8}"
                />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="rsv_email"
                    name="user_email"
                    placeholder="name@example.com"
                    v-model="email"
                    required="required"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                />
            </div>
            <div class="form-group">
                <label for="rsv_ppl">預約導覽人數</label>
                <select
                    class="form-control"
                    id="rsv_ppl"
                    name="people"
                    v-model="people"
                    required
                >
                    <option disabled value="">選擇人數</option>
                    <option v-for="i in 20" :key="i" :value="i">{{ i }}</option>
                </select>
            </div>
            <div class="form-group rsv_date">
                <label for="start">預約日期:</label>
                <input
                    type="date"
                    id="rsv_date"
                    class="form-control"
                    name="time"
                    v-model="orderDate"
                    min="2022-01-01"
                    max="2024-12-31"
                />
                <label for="chooseDay"
                    >您選擇的預約日期： {{ orderDate }}</label
                >
                <div
                    class="weather"
                    v-for="(item, index) in tempWx"
                    v-show="`${orderDate + ' ' + '18:00:00'}` == item.time"
                   
                >   
                <div v-if="item.test >15" style="color: #07617D;">當日最低溫度：{{item.test }} °C ⛅&#8195 當日氣候：{{item.elValue}}</div>

                <div v-if="10<item.test <15" style="color: #8692FF;">當日最低溫度：{{item.test }} °C🍃 &#8195 當日氣候：{{item.elValue}}</div>

                <div v-if="item.test <10" style="color: #FF7B7B;">當日最低溫度：{{ item.test }} °C⛄ &#8195 當日氣候：{{item.elValue}}</div>
                </div> 

                
                <!--  @mouseover="formHover = true"
                    @mouseleave="formHover = false"
                    :style="{
                        color: formHover ? '' : '#FAB666',
                    }" -->
                <!-- {{ tempWx[0] }} -->
            </div>
            <!-- @click="next" -->
            <button
                type="submit"
                value="Send"
                class="btn btn-primary"
                @click="next"
            >
                確認預約
            </button>

            <div class="orderList" v-show="isOrder">
                <div class="order-info">
                    "您的預約明細已寄至信箱！"
                    <br />
                    預約日期：{{ orderDate }}
                    <br />
                    姓名：{{ name }}
                    <br />
                    人數：{{ people }}
                    <br />
                    Email：{{ email }}
                    <br />
                    電話：{{ mobile }}
                </div>
                <div class="btn-secondary confrimbtn" @click="closeIt">
                    確定預約
                </div>
            </div>
        </form>
        <!-- <form ref="form" @submit.prevent="sendEmail">
            <label>Name</label>
            <input type="text" name="user_name" />
            <label>Email</label>
            <input type="email" name="user_email" />
            <label>Message</label>
            <textarea name="message"></textarea>
            <input type="submit" value="Send" />
        </form> -->
    </div>
</template>
<script>
import { BASE_URL } from "@/assets/js/common.js";
import emailjs from "emailjs-com";
export default {
    components: {
        emailjs,
    },
    props: ["msg", "callback"],
    data() {
        return {
            itemColor: "",
            email: "",
            name: "",
            mobile: "",
            people: "",
            orderDate: this.msg,
            isShow: false,
            isOrder: false,
            tempWx: {},
            formHover: false,
        };
    },
    computed: {
        //     modalStyle() {
        //         return {
        //             display: this.isShow ? "" : "none",
        //         };
        //     },
        isAllFilled() {
            return this.email && this.name && this.mobile;
        },
    },
    created() {
        this.getWeatherData();
    },
    methods: {
        sendEmail() {
            // emailjs
            //     .send(
            //         "service_i2cup6l",
            //         "template_muwk0v8",
            //         {
            //             user_email: this.email,
            //             user_name: this.name,
            //             start: this.start,
            //             time: this.time,
            //         },
            //         "s-jQKrTjLZGe8RcQR"
            //     )
            //     .then(
            //         (result) => {
            //             console.log("SUCCESS!", result.text);
            //         },
            //         (error) => {
            //             console.log("FAILED...", error.text);
            //         }
            //     );
        },
        // toggleModal() {
        //     console.log("click");
        //     this.isShow = !this.isShow;
        // },
        closeIt() {
            this.$emit("closeForm");
            console.log(this.msg);
            console.log(this.orderDate);
        },
        next() {
            if (!this.$refs.form.checkValidity()) return;
            this.isOrder = true;
            const payload = {
                rsv_date: this.orderDate,
                rsv_ppl: this.people,
                rsv_name: this.name,
                rsv_mobile: this.mobile,
                rsv_email: this.email,
                rsv_status: "已預約",
                rsv_ps: "",
            };
            const apiURL = new URL(`${BASE_URL}/resv_insert.php`);
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(payload),
            })
                .then((res) => res.text())
                .then((result) => {
                    result = JSON.parse(result);
                    // alert(result);
                    this.callback();
                });
            emailjs
                .send(
                    "service_i2cup6l",
                    "template_muwk0v8",
                    {
                        user_email: this.email,
                        user_name: this.name,
                        time: this.orderDate,
                        people: this.people,
                        mobile: this.mobile,
                    },
                    "s-jQKrTjLZGe8RcQR"
                )
                .then(
                    (result) => {
                        console.log("SUCCESS!", result.text);
                    },
                    (error) => {
                        console.log("FAILED...", error.text);
                    }
                );
        },
        getWeatherData() {
            fetch(
                "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-007?Authorization=CWB-7DF0CD1C-E933-4927-95D1-99C3EC894A8C&format=JSON&locationName=%E4%B8%AD%E5%A3%A2%E5%8D%80&elementName=MinT,Wx&sort=time"
            )
                .then((res) => res.json())
                .then((json) => {
                    // console.log(json.records.locations);
                    let [QQ] = json.records.locations;
                    // console.log(QQ.location);
                    let [ZZ] = QQ.location;
                    // console.log(ZZ.weatherElement);
                    let test = ZZ.weatherElement;
                    let wx = ZZ.weatherElement;
                    let tempWx = wx[0].time.map((item, index) => {
                        return {
                            time: item.startTime,
                            elValue: item.elementValue[0].value,
                            test: wx[1].time[index].elementValue[0].value,
                            // .slice(0, 10),
                        };
                    });
                    console.log("tt", tempWx);
                    this.tempWx = tempWx;

                    console.log("TIME", tempWx[0].time);

                    // this.weather = this.tempWx;
                });
        },
    },
};
</script>


<style lang="scss" scoped>

.book-form {
    width: 700px;
    height: 700px;
    border: 1px solid #96bbbd;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    background-color: #d0e8ea;
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    display: fixed;


}
h2 {
    margin-top: 40px;
}

#close {
    position: absolute;
    right: 1.5%;
    top: 1.5%;
    border: 0;
    background-color: transparent;
    font-size: 30px;
    font-weight: 500;
    color: #337a7d;
    /* border: #f8f8f8 2px solid; */
    border-radius: 50%;
    cursor: pointer;
    z-index: 3;
    text-align: center;
    width: inherit;

    &:hover{
        color: #FFFEE2;
    }
  
}



.form-group {
    text-align: left;
    font-size: 20px;
    font-weight: 500;
    width: 500px;
    margin: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
}
.form-group .form-control {
    width: 500px;
    height: 40px;
    font-size: 15px;
    margin: 0 auto 10px;
    border-radius: 10px;
    border: 1px solid #bcbcbc;
    padding-left: 10px;
}
.orderList {
    position: absolute;
    top: 50%;
    left: 50%;
    background-color: #d0e8ea;
    transform: translate(-50%, -50%);
    text-align: left;
    font-size: 20px;
    font-weight: 500;
    width: 600px;
    height: 100%;
}

.order-info {
    width: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f8f8f8;
    padding: 20px;
    line-height: 30px;
    letter-spacing: 1.4px;
    border-radius: 10px;
    box-shadow: 0px 15px 10px -15px #111;
}

.btn {
    margin: 10px;
    width: 100px;
    height: 40px;
    border-radius: 10px;
    background-color: #337a7d;
    color: white;
    cursor: pointer;
}
.confrimbtn {
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 5px 10px;
}
@media screen and (max-width: 768px) {
    h2 {
        margin-top: 30px;
    }
    .book-form {
        width: 90%;
        height: 50%;
    }
    .form-group {
        text-align: left;
        font-size: 16px;
        width: 80%;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 6px;
    }
    .form-group .form-control {
        width: 100%;
        height: 35px;
        font-size: 15px;
        margin: 0 auto 5px;
        border-radius: 10px;
    }
    .orderList {
        position: absolute;
        top: 50%;
        left: 50%;
        background-color: #d0e8ea;
        transform: translate(-50%, -50%);
        text-align: left;
        font-size: 16px;
        font-weight: 500;
        width: 90%;
        height: 100%;
    }
    .order-info {
        width: 85%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f8f8f8;
        padding: 20px;
        line-height: 25px;
        letter-spacing: 0.6px;
        border-radius: 10px;
        box-shadow: 0px 15px 10px -15px #111;
    }

    .btn {
        margin: 10px;
        width: 100px;
        height: 40px;
        border-radius: 10px;
        background-color: #337a7d;
        color: white;
        cursor: pointer;
    }
    @media screen and (max-width: 768px){
        .book-form{
            height:68%;
        }

    }
    .weather {
        font-size: 13px;
    }
}
</style>
