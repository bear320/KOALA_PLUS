<template>
    <Header />
    <section class="bs-nav-space wrapper">
        <div class="title">
            <h1>無尾熊管理</h1>
            <img src="@/assets/images/backstageindex/koalaIcon.png" alt="" />
        </div>
        <div class="action">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
                <button></button>
            </div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    components: {
        Header,
    },
};
</script>

<style lang="scss" scoped>
input[type="search"],
input[type="email"],
input[type="submit"],
input[type="button"],
input[type="number"],
select,
button {
    /* 移除預設樣式 */
    appearance: none;
    /* For Safari and Chrome */
    -webkit-appearance: none;
    /* For Firefox */
    -moz-appearance: none;
}

section {
    text-align: left;
    .title {
        display: flex;
        column-gap: 20px;
        h1 {
            display: block;
            width: fit-content;
        }
        img {
            height: 67.5px;
        }
    }
    .action {
        .search {
            display: flex;
            align-items: center;

            input {
                width: 150px;
                height: 50px;
                padding-left: 10px;
                background-color: #fff;
                font-size: 1rem;
                color: lighten($darkgreen, 20%);
                border-radius: 10px 0 0 10px;
                border: 1.5px solid lighten($darkgreen, 20%);
                border-right: none;
                outline: none;
            }
            button {
                width: 50px;
                height: 50px;
                text-align: center;
                background: url(@/assets/images/backStageIcon/search-icon.svg)
                    no-repeat center #fff;
                font-size: 1rem;
                color: lighten($darkgreen, 20%);
                border-radius: 0 10px 10px 0;
                border: 1.5px solid lighten($darkgreen, 20%);
                border-left: none;
                &:hover {
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
