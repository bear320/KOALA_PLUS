<template lang="">
    <li class="mem_coupons content">
        <div class="mem_basic">
            <p>姓氏：Zeng</p>
            <p>名字：Charmy</p>
            <p>會員ID：P00001</p>
        </div>
        <div class="mem_main">
            <div class="mem_order_table">
                <p>合計 4 張優惠券</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>優惠券名稱</th>
                            <th class="prod_id">優惠券代碼</th>
                            <th class="prod_category">優惠券獲得日期</th>
                            <th>優惠券到期日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ prod_name }}</td>
                            <td class="prod_id">{{ prod_id }}</td>
                            <td class="prod_category">{{ prod_category }}</td>
                            <td>{{ ord_qty }}</td>
                        </tr>
                        <tr>
                            <td>{{ prod_name }}</td>
                            <td class="prod_id">{{ prod_id }}</td>
                            <td class="prod_category">{{ prod_category }}</td>
                            <td>{{ ord_qty }}</td>
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
            prod_name: "周邊商城85折優惠券",
            prod_id: "#SHOP850001",
            prod_category: "2023/01/01",
            ord_qty: "2023/01/01",
        };
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
        th {
            padding: 10px;
        }
    }
}
</style>
