<template lang="">
    <li class="mem_coupons content">
        <div class="mem_basic">
            <p>姓名：{{ memindexs.mem_name }}</p>
            <p>會員ID：{{ memindexs.mem_id }}</p>
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
                            <td class="coupon_date">{{ item.coupon_date }}</td>
                            <td>{{ item.coupon_deadline }}</td>
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
            memindexs: [],

            couponsList: [
                {
                    coupon_name: "周邊商城6折優惠券",
                    coupon_id: "#SHOP060001",
                    coupon_date: "2022/12/01",
                    coupon_deadline: "2023/12/01",
                },
                {
                    coupon_name: "周邊商城85折優惠券",
                    coupon_id: "#SHOP850001",
                    coupon_date: "2022/12/21",
                    coupon_deadline: "2023/01/20",
                },
                {
                    coupon_name: "周邊商城90折優惠券",
                    coupon_id: "#SHOP900001",
                    coupon_date: "2022/11/19",
                    coupon_deadline: "2022/12/18",
                },
                {
                    coupon_name: "周邊商城95折優惠券",
                    coupon_id: "#SHOP950001",
                    coupon_date: "2022/11/15",
                    coupon_deadline: "2022/12/14",
                },
            ],
        };
    },
    created() {
        fetch("http://localhost/cgd103_g1/public/api/getMember.php?mem_id=1001")
            // .then((res) => res.json())
            .then((json) => {
                // console.log(json);
                this.memindexs = json;
            });
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
