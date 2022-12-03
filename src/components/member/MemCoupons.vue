<template lang="">
    <li class="mem_coupons content">
        <div class="mem_basic">
            <p>姓氏：Zeng</p>
            <p>名字：Charmy</p>
            <p>會員ID：P00001</p>
        </div>
        優惠券
        <!-- <table>
            <thead>
                <th>Country</th>
                <th>Capital</th>
                <th>Population</th>
                <th>Year</th>
            </thead>
            <tbody>
                <tr>
                    <td>China</td>
                    <td>Beijing</td>
                    <td>21,542,000</td>
                    <td>2010</td>
                </tr>
            </tbody>
        </table> -->
    </li>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
.tabs_content li:nth-child(3).content {
    background-color: #aaf;
}

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
</style>
