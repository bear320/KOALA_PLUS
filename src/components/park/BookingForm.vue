<template lang="">
    <div class="book-form">
        <form id="booking-form" action="" data-form-storage="true">
            <h2>預約資訊</h2>
            <!-- <button id="close" @click.self="toggleModal">X</button> -->
            <button id="close" @click="closeIt">X</button>
            <div class="form-group">
                <label for="book-name">name</label>
                <input
                    type="text"
                    class="form-control"
                    id="book-name"
                    name="book-name"
                    placeholder="booking name"
                    v-model.trim="name"
                />
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input
                    type="mobile"
                    class="form-control"
                    id="mobile"
                    name="mobile"
                    placeholder="mobile"
                    v-model="mobile"
                />
            </div>
            <div class="form-group">
                <label for="book-email">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    id="book-email"
                    name="email"
                    placeholder="name@example.com"
                    v-model="email"
                />
            </div>
            <div class="form-group">
                <label for="people">How many people</label>
                <select
                    class="form-control"
                    id="book-people"
                    name="book-people"
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
            <div class="form-group">
                <label for="start">預約日期:</label>
                <input
                    type="date"
                    id="book-date"
                    class="form-control"
                    name="book-date"
                    v-model="date"
                    min="2022-01-01"
                    max="2022-12-31"
                />
                {{ date }}
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: "",
            name: "",
            mobile: 0,
            people: "",
            date: "",
            isShow: false,
        };
    },
    computed: {
        modalStyle() {
            return {
                display: this.isShow ? "" : "none",
            };
        },
    },
    methods: {
        toggleModal() {
            console.log("click");
            this.isShow = !this.isShow;
        },
        closeIt() {
            this.$emit("closeForm");
            console.log(454455);
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

#close {
    position: absolute;
    right: 0;
    top: 0;
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
</style>
