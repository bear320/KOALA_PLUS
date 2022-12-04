<template lang="">
    <li class="mem_adopt content">
        <div class="mem_basic">
            <p>姓氏：{{ mem_last_name }}</p>
            <p>名字：{{ mem_first_name }}</p>
            <p>會員ID：{{ mem_id }}</p>
        </div>
        <div class="mem_main">
            <div class="mem_coupons_table">
                <p>合計 4 筆認養紀錄</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>無尾熊名字</th>
                            <th class="koala_id">無尾熊編號</th>
                            <th class="sup_date">資助認養時間</th>
                            <th>資助認養金額</th>
                            <th>下載領養證明</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in couponsList"
                            :key="item.koala_id"
                        >
                            <td>{{ item.koala_name }}</td>
                            <td class="koala_id">{{ item.koala_id }}</td>
                            <td class="sup_date">{{ item.sup_date }}</td>
                            <td>{{ item.sup_price }}</td>
                            <td>
                                <Icon
                                    type="md-download"
                                    size="20"
                                    color="#337a7d"
                                />
                            </td>
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
            mem_last_name: "Zeng",
            mem_first_name: "Charmy",
            mem_id: "P00001",
            couponsList: [
                {
                    koala_name: "Susan",
                    koala_id: "#KOALA0001",
                    sup_date: "2022/12/01",
                    sup_price: "$1000",
                },
                {
                    koala_name: "Alen",
                    koala_id: "#KOALA0002",
                    sup_date: "2022/12/21",
                    sup_price: "$1000",
                },
                {
                    koala_name: "Duffy",
                    koala_id: "#KOALA0003",
                    sup_date: "2022/11/19",
                    sup_price: "$300",
                },
                {
                    koala_name: "jenny",
                    koala_id: "#KOALA0004",
                    sup_date: "2022/11/15",
                    sup_price: "$300",
                },
            ],
        };
    },
};
</script>
<style lang="scss" scoped>
.tabs {
    .wrapper {
        .mem_adopt {
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

        th {
            padding: 10px;
        }
        .koala_id {
            @include m() {
                display: none;
            }
        }
    }
}
</style>
