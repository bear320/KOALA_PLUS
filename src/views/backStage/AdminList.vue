<template>
    <Header />
    <article class="nav-space wrapper">
        <h1>權限管理</h1>
        <div class="todo">
            <div class="search">
                <input class="search-bar" type="text" name="search" id="search" placeholder="搜尋">
            </div>
            <select name="category" id="articlesCategory">
                <option value="all">所有人員</option>
                <option value="news">登入時間排序</option>
            </select>
        </div>
        <section>
            <!-- 標頭 -->
            <h2>管理員總覽</h2>
            <div class="bstitle">
                <h3 class="idname-top">管理員ID</h3>
                <h3 class="article">管理員姓氏</h3>
                <h3 class="pic">管理員名字</h3>
                <h3 class="date">最後登入日期</h3>
                <h3 class="tag">權限允許狀態</h3>
            </div>
            <div class="content-top">
                <p class="idname-t">00000</p>
                <p class="fristname-t">超級管理員</p>
                <p class="lastname-t">＃總經理</p>
                <p class="date-t">2022/12/15</p>
                <p class="tag">無法變更權限</p>
                <div class="state-t"><Switch loading :model-value="true" true-color="#337a7d" /></div>
                
            </div>
            <!-- 內容 -->
            <div class="content" v-for="article in articles" :key="article">
                <p class="idname">
                    {{ article.idname }}
                </p>
                <div class="fristname">
                    <p>{{ article.fristname }}</p>
                </div>
                <div class="lastname">
                    <p>{{ article.lastname }}</p>
                </div>
                <div class="date">
                    <p>{{ article.date }}</p>
                </div>
                <p class="tag">
                    {{ article.tag }}
                </p>
                <div class="state">
                    <Switch size="large" true-color="#337a7d" :before-change="handleBeforeChange"
                    >
                        <template #open>
                            <span>ON</span>
                        </template>
                        <template #close>
                            <span>OFF</span>
                        </template>
                    </Switch>
                </div>
            </div>
        </section>
    </article>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    data() {
        return {
            articles: [
                {
                    idname: "P00001",
                    fristname: "熊",
                    lastname: "熊",
                    date: "2022/12/25",
                    tag:"一般權限",


                },
                {
                    idname: "P00002",
                    fristname: "陳",
                    lastname: "小白",
                    date: "2022/12/25",
                    tag:"一般權限",
                },
                {
                    idname: "P00003",
                    fristname: "劉",
                    lastname: "小黑",
                    date: "2022/12/25",
                    tag:"一般權限",
                },
                {
                    idname: "P00004",
                    fristname: "張",
                    lastname: "小華",
                    date: "2022/12/25",
                    tag:"一般權限",
                },
            ],
        };
    },
    methods: {
        handleBeforeChange() {
            return new Promise((resolve) => {
                this.$Modal.confirm({
                    title: "確定切換權限嗎？",
                    content: "您確定切換權限嗎？",
                    onOk: () => {
                        resolve();
                    },
                });
            });
        },
    },
    
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
    .todo {
        float: right;
        display: flex;
    }
    h2 {
        color: $green;
        @include borderLeft(30px);
    }
    section {
        h3 {
            margin-bottom: 0;
            padding-left: 10px;
        }

        .pic,
        .date {

            img {
                width: 120px;
                height: 120px;
            }
        }

        .tag,
        .operator {
            display: flex;

            img {
                margin: 10px;

                &:hover {
                    stroke: $green;
                }
            }
        }
        .bstitle {
            display: flex;
            justify-content: center;
            width: 100%;
            background-color: $darkgreen;
            color: white;
            border-radius: 10px;
            h3{
                width: 20%;
            }
        }
        .content-top{
            display: flex;
            margin: 0px 50px;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 10px;
            border-bottom: solid 1px $lightgreen;
            .idname-t{
                width: 25%;
            }
            .fristname-t{
                width: 30%;
            }
            .lastname-t{
                width: 30%;
            }
            .date-t{
                width: 20%;
            }
            .tag-t{
                width: 15%;
            }
            .state-t{
                width: 10%;
            }

        }

        .content {
            margin: 0px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 10px;
            border-bottom: solid 1px $lightgreen;
        }
    }
}
.idname{
    width: 25%;
}
.fristname{
    width: 30%;
}
.lastname{
    width: 30%;
}
.date{
    width: 20%;
}
.tag{
    width: 15%;
}
.state{
    width: 10%;
}
.search{
    border-color:  $darkgreen;
}
// 
</style>
