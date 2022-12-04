<template lang="">
    <li class="mem_order content">
        <div class="mem_basic">
            <p>姓氏：Zeng</p>
            <p>名字：Charmy</p>
            <p>會員ID：P00001</p>
        </div>
        <!-- 訂單資訊下方內容 -->
        <div class="mem_main">
            <div class="mem_order_table">
                <p>訂單編號: KOA12345678</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>產品名稱</th>
                            <th class="prod_id">商品編號</th>
                            <th class="prod_category">商品類別</th>
                            <th>數量</th>
                            <th>小計(暫單價)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in orderList"
                            :key="item.prod_id"
                        >
                            <td>{{ item.prod_name }}</td>
                            <td class="prod_id">{{ item.prod_id }}</td>
                            <td class="prod_category">
                                {{ item.prod_category }}
                            </td>
                            <td>{{ item.ord_qty }}</td>
                            <td>{{ item.prod_price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mem_state">
                <button class="btn-lowest">取消訂單</button>
                <p>總額: $800</p>
                <div>訂單狀態：{{ ord_sts }}</div>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    data() {
        return {
            orderList: [
                {
                    prod_name: "無尾熊乾髮帽",
                    prod_id: "1022",
                    prod_category: "玩具/絨毛娃娃",
                    ord_qty: 1,
                    prod_price: 200,
                    ord_sts: "處理中",
                },
                {
                    prod_name: "無尾熊乾髮帽2",
                    prod_id: "1023",
                    prod_category: "玩具/絨毛娃娃",
                    ord_qty: 1,
                    prod_price: 200,
                    ord_sts: "處理中",
                },
            ],
        };
    },
};
</script>
<style lang="scss" scoped>
.tabs {
    .wrapper {
        //訂單訊息內容 li
        .mem_order {
            .mem_basic {
                //會員基本資料
                display: flex;
                p {
                    min-width: 100px;
                    padding: 10px;
                }
            }
            .mem_main {
                // background-color: beige;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                border-bottom: 1px solid #337a7d;
                .mem_order_table {
                    width: 80%;
                }
                .mem_state {
                    // background-color: burlywood;
                    width: 20%;
                    button {
                        padding-right: 10px;
                        padding-left: 10px;
                    }
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
@media screen and (max-width: 1200px) {
    table {
        // width: 100%;
        tr {
            th {
            }
            .prod_id {
                display: none;
            }
        }
    }
}
@media screen and (max-width: 768px) {
    table {
        // width: 100%;
        tr {
            th {
            }
            .prod_category {
                display: none;
            }
        }
    }
}
</style>
