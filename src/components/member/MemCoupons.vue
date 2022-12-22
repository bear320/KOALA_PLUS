<template lang="">
    <li class="mem_coupons content">
        <div class="mem_basic">
            <p>姓名：{{ userid }}</p>
            <p>會員ID：{{ username }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 {{ couponsList.length }} 張優惠券</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>優惠券名稱</th>
                            <th
                                class="coupon_code"
                                @click="iconchange('cName')"
                                name="mem_coupons_orderby"
                            >
                                優惠券代碼
                                <Icon
                                    type="ios-arrow-down"
                                    size="20"
                                    :class="{ inverse: isReverse }"
                                />
                            </th>
                            <th
                                class="coupon_get_date"
                                @click="iconchange('gDate')"
                            >
                                優惠券獲得日期
                                <Icon
                                    type="ios-arrow-down"
                                    size="20"
                                    :class="{ inverse: isReverse }"
                                />
                                <!-- color="#337a7d" -->
                            </th>
                            <th
                                class="coupon_exp_date"
                                @click="iconchange('eDate')"
                            >
                                優惠券到期日<Icon
                                    type="ios-arrow-down"
                                    size="20"
                                    :class="{ inverse: isReverse }"
                                />
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in couponsList"
                            :key="item.coupon_code"
                        >
                            <td>{{ item.coupon_name }}</td>
                            <td class="coupon_code">{{ item.coupon_code }}</td>
                            <td class="coupon_get_date">
                                {{ item.coupon_get_date }}
                            </td>
                            <td>{{ item.coupon_exp_date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    data() {
        return {
            couponsList: [],
            userid: "",
            username: "",
            isReverse: false,
        };
    },
    methods: {
        iconchange(type) {
            this.isReverse = !this.isReverse;
            console.log(type, this.isReverse);
            //另一個判斷方法：
            // let iconorderby= (type == "cName")?;;
            // if (type == "cName") {
            //     iconorderby = this.isReverse ? 1 : 2;
            // } else if (type == "gDate") {
            //     iconorderby = this.isReverse ? 3 : 4;
            // } else if (type == "eDate") {
            //     iconorderby = this.isReverse ? 5 : 6;
            // }
            let iconorderby = 0;
            switch (type) {
                case "cName":
                    iconorderby = this.isReverse ? 1 : 2;
                    break;
                case "gDate":
                    iconorderby = this.isReverse ? 3 : 4;
                    break;
                case "eDate":
                    iconorderby = this.isReverse ? 5 : 6;
                    break;
                default:
                    iconorderby = 0;
                    break;
            }
            console.log(iconorderby);
            const postMemSearch = {
                search_orderby: iconorderby,
            };
            console.log(postMemSearch);
            fetch(
                "http://localhost/cgd103_g1/public/api/postmemCoupons.php?type=front",
                {
                    method: "POST",
                    credentials: "include",
                    body: new URLSearchParams(postMemSearch),
                }
            )
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.memindexs = json;
                    if (json.status) {
                        this.couponsList = json.list;
                        // console.log(this.couponsList.length);
                        return true;
                    }
                    // alert("獲取數據失敗");
                    location.href = "/login";
                });
        },
    },
    created() {
        let getCookie = document.cookie;
        if (getCookie) {
            fetch("http://localhost/cgd103_g1/public/api/postmemCoupons.php", {
                credentials: "include",
            })
                .then((res) => res.json())
                .then((json) => {
                    // console.log(json);
                    if (json.status) {
                        this.couponsList = json.list;
                        this.userid = json.userid;
                        this.username = json.username;
                        // console.log(this.couponsList.length);
                        return true;
                    }
                    alert("獲取數據失敗");
                });
        } else {
            // alert("登入失效");
            //跳轉 login url
        }
    },
};
</script>
<style lang="scss" scoped>
.tabs {
    .wrapper {
        .mem_coupons {
            .mem_basic {
                //會員基本資料
                display: flex;
                p {
                    min-width: 100px;
                    padding: 10px;
                }
            }
        }
    }
}
table {
    border-spacing: 0;
    width: 100%;
    tr {
        text-align: center;
        line-height: 30px;
        height: 30px;
        th {
            padding: 10px;
        }
        .coupon_code,
        .coupon_get_date {
            @include m() {
                display: none;
            }
        }
    }
}
.inverse {
    transform: rotate(180deg);
}
</style>
