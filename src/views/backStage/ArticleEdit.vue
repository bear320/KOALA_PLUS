<template>
    <Header />
    <article class="bs-nav-spcae wrapper">
        <h1>公告管理</h1>
        <h2>新增文章</h2>
        <label for="upload">
            <input
                type="radio"
                name="todo"
                id="upload"
                checked
            />文章立即上傳更新
        </label>
        <label for="save">
            <input type="radio" name="todo" id="save" />文章僅先暫存為草稿
        </label>
        <div>
            <p>標題:</p>
            <input type="text" />
        </div>
        <div class="display">
            <div>
                <p>分類:</p>
                <select name="category" id="articlesCategory">
                    <option value="news">最新消息</option>
                    <option value="parkinfo">園區資訊</option>
                    <option value="moneyinfo">資金運用</option>
                </select>
            </div>
            <div>
                <p>圖片:</p>
                <input type="file" id="upload" />
            </div>
        </div>
        <div>
            <p>內文:</p>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="btn-paramy">
            <img src="@/assets/images/icon/confirm.svg" alt="" />確認
        </button>
    </article>
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
html article {
    text-align: left;

    h1 {
        display: inline-block;
        width: 25%;
        background-image: url(@/assets/images/backstageindex/articleIcon.png);
        @include bgSetting(contain, right);
    }
    h2 {
        color: $green;
        @include borderLeft(30px);
    }
    label {
        font-size: $h4;
        display: block;
        margin: 15px 0;
    }
    div {
        margin: 10px;
    }
    p {
        font-size: $h4;
    }
    .display {
        display: flex;
    }
    button {
        @include btnSize(30px);
        float: right;

        img {
            margin-right: 10px;
            vertical-align: middle;
        }
    }
}
</style>
