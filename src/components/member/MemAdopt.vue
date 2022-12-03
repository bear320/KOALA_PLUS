<template lang="">
    <li class="mem_adopt content">
        <div class="mem_basic">
            <p>姓氏：{{ mem_last_name }}</p>
            <p>名字：{{ mem_first_name }}</p>
            <p>會員ID：{{ mem_id }}</p>
        </div>
        認養紀錄
    </li>
</template>
<script>
export default {
    data() {
        return {
            mem_last_name: "Zeng",
            mem_first_name: "Charmy",
            mem_id: "P00001",
        };
    },
};
</script>
<style lang="scss" scoped>
.tabs_content li:nth-child(4).content {
    background-color: #faf;
}
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
</style>
