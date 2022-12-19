<template lang="">
    <li class="mem_coupons content">
        <div class="mem_basic">
            <p>姓名：{{ userid }}</p>
            <p>會員ID：{{ username }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 4 張優惠券</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>優惠券名稱</th>
                            <th class="coupon_id">優惠券代碼</th>
                            <th class="coupon_date">
                                優惠券獲得日期
                                <div class="iconlayout" @click="iconchange">
                                    <Icon type="ios-arrow-down" size="20" />
                                    <Icon type="ios-arrow-up" size="20" />
                                </div>

                                <!-- color="#337a7d" -->
                            </th>
                            <th>
                                優惠券到期日<Icon
                                    type="ios-arrow-down"
                                    size="20"
                                />
                                <Icon type="ios-arrow-up" size="20" />
                                <!-- color="#337a7d" -->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in couponsList"
                            :key="item.coupon_id"
                        >
                            <td>{{ item.coupon_name }}</td>
                            <td class="coupon_id">{{ item.coupon_id }}</td>
                            <td class="coupon_date">
                                {{ item.coupon_exp_date }}
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
        };
    },
    created() {
        let getCookie = document.cookie;
        if (getCookie) {
            fetch("http://localhost/cgd103_g1/public/api/postmemCoupons.php", {
                credentials: "include",
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    if (json.status) {
                        this.couponsList = json.list;
                        this.userid = json.userid;
                        this.username = json.username;
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
        .coupon_id,
        .coupon_date {
            @include m() {
                display: none;
            }
        }
    }
}
</style>
