<template>
    <Header />
    <article class="bs-nav-space wrapper">
        <h1>公告管理</h1>
        <h2>編輯文章</h2>
        <form action="" enctype="multipart/form-data" method="post">
            <label>
                <input
                    type="radio"
                    name="status"
                    v-model="edit.news_status"
                    :true-value="1"
                    checked
                    required
                />文章立即上傳更新
            </label>
            <label>
                <input
                    type="radio"
                    name="status"
                    v-model="edit.news_status"
                    :true-value="0"
                />文章僅先暫存為草稿
            </label>
            <div>
                <p>標題:</p>
                <input type="text" v-model="edit.news_title" required />
            </div>
            <div class="display">
                <div>
                    <p>分類:</p>
                    <select
                        name="category"
                        id="artclesCategory"
                        v-model="edit.news_category"
                    >
                        <option value="#最新消息">#最新消息</option>
                        <option value="#園區資訊">#園區資訊</option>
                        <option value="#資金運用">#資金運用</option>
                    </select>
                </div>
                <div>
                    <p>圖片:</p>
                    <input type="file" id="upload" />
                </div>
            </div>
            <div>
                <p>內文:</p>
                <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                    v-model="edit.news_content"
                    required
                ></textarea>
            </div>
        </form>
        <button class="btn-paramy" id="btnInsert" @click.prevent="next">
            <img src="@/assets/images/icon/confirm.svg" alt="" />確認
        </button>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
export default {
    components: {
        Header,
    },
    data() {
        return {
            edit: [],
        };
    },
    methods: {
        getArticleInfo() {
            const apiURL = new URL(
                `${BASE_URL}/getArticlePage.php?newsId=${this.$route.params.news_id}`
            );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.edit = json;
                });
        },
    },
    create() {
        this.getArticleInfo();
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
