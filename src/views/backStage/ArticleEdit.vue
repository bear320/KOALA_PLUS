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
                    value="1"
                    checked
                    required
                />文章立即上傳更新
            </label>
            <label>
                <input
                    type="radio"
                    name="status"
                    v-model="edit.news_status"
                    value="0"
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
                        <option value="最新消息">最新消息</option>
                        <option value="園區資訊">園區資訊</option>
                        <option value="資金運用">資金運用</option>
                    </select>
                </div>
                <div>
                    <p>圖片:</p>
                    <input type="file" accept="image" />
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
        <button class="btn-paramy" @click.prevent="editArticle">
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
            // const apiURL = new URL(
            //     `http://localhost/cgd103_g1/public/api/getArticlePage.php?newsId=${this.$route.params.news_id}`
            // );
            fetch(apiURL)
                .then((res) => res.json())
                .then((json) => {
                    this.edit = json;
                });
        },
        editArticle() {
            const apiURL = new URL(`${BASE_URL}/editArticle.php`);
            // const apiURL = new URL(
            //     `http://localhost/cgd103_g1/public/api/editArticle.php`
            // );
            const articleUpdate = {
                news_id: Number(this.edit.news_id),
                news_img: this.edit.news_img,
                news_title: this.edit.news_title,
                news_content: this.edit.news_content,
                news_date: this.edit.news_date,
                news_category: this.edit.news_category,
                news_status: this.edit.news_status,
            };
            console.log(articleUpdate);

            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(articleUpdate),
            })
                .then((res) => res.json())
                .then((status) => {
                    alert(status.msg);
                    if (confirm("是否關閉此分頁？")) {
                        window.close();
                    }
                });
        },
    },
    created() {
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
    input[type="text"] {
        width: 40%;
        cursor: text;
    }
    textarea {
        cursor: text;
    }
    input[type="file"]::file-selector-button {
        border: 1px solid $btn-color;
        color: $btn-color;
        margin: 5px;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: $bg-color;
        transition: 0.5s;
        cursor: pointer;

        &:hover {
            background-color: $btn-light-color;
        }
    }
}
</style>
