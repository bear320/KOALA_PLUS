<template lang="">
    <div class="book-form">
        <form
            id="bookingForm"
            data-form-storage="true"
            enctype="multipart/form-data"
            method="post"
        >
            <h2>預約資訊</h2>
            <!-- <button id="close" @click.self="toggleModal">X</button> -->
            <button id="close" @click="closeIt">X</button>
            <div class="form-group">
                <label for="rsv_name">姓名</label>
                <input
                    type="text"
                    class="form-control"
                    id="rsv_name"
                    name="rsv_name"
                    placeholder="booking name"
                    v-model.trim="name"
                />
            </div>
            <div class="form-group">
                <label for="rsv_mobile">手機</label>
                <input
                    type="mobile"
                    class="form-control"
                    id="rsv_mobile"
                    name="rsv_mobile"
                    placeholder="mobile"
                    v-model="mobile"
                />
            </div>
            <div class="form-group">
                <label for="rsv_email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="rsv_email"
                    name="rsv_email"
                    placeholder="name@example.com"
                    v-model="email"
                />
            </div>
            <div class="form-group">
                <label for="rsv_ppl">預約導覽人數</label>
                <select
                    class="form-control"
                    id="rsv_ppl"
                    name="rsv_ppl"
                    v-model="people"
                >
                    <option disabled value="">選擇人數</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="rsv_date">
                <label for="start">預約日期:</label>
                <input
                    type="date"
                    id="rsv_date"
                    class="form-control"
                    name="rsv_date"
                    v-model="orderDate"
                    min="2022-01-01"
                    max="2023-12-31"
                />
                <label for="">您選擇的預約日期： {{ orderDate }}</label>
            </div>

            <button
                type="submit"
                id="btnInsert"
                class="btn btn-primary"
                @click.prevent="next"
            >
                確認預約
            </button>

            <div class="orderList" v-show="isOrder">
                <div class="order-info">
                    預約編號：No.{{ orderDate }}
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
    </div>
</template>
<script>
export default {
    props: ["msg", "callback"],
    data() {
        return {
            email: "",
            name: "",
            mobile: "",
            people: "",
            orderDate: this.msg,
            isShow: false,
            isOrder: false,
        };
    },
    computed: {
        //     modalStyle() {
        //         return {
        //             display: this.isShow ? "" : "none",
        //         };
        //     },
    },
    methods: {
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
            console.log("next");
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

            fetch("http://localhost/cgd103_g1/public/api/resv_insert.php", {
                method: "POST",
                body: new URLSearchParams(payload),
            })
                .then((res) => res.text())
                .then((result) => {
                    console.log("QQ", result);
                    alert(result);
                    this.callback();
                });
        },
    },
};
</script>
<style scoped>
.book-form {
    width: 700px;
    height: 660px;
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
    font-size: 20px;
    font-weight: 500;
    color: #f8f8f8;
    border: #f8f8f8 2px solid;
    border-radius: 50%;
    cursor: pointer;
    z-index: 3;
    text-align: center;
    width: 32px;
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
        height: 78%;
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
}
</style>
