<template lang="">
    <li class="mem_order content">
        <div class="mem_basic">
            <p>姓氏：Zeng</p>
            <p>名字：Charmy</p>
            <p>會員ID：P00001</p>
        </div>

        訂單資訊
        <table class="table">
            <thead>
                <tr>
                    <th>品名</th>
                    <th>價格</th>
                    <th>到期日</th>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </thead>
        </table>
    </li>
</template>
<script>
export default {};
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
        }
    }
}
</style>
