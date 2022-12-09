<template>
    <Header />
    <section class="bs-nav-space wrapper title-n-action">
        <div class="title">
            <h1>權限管理</h1>
            <img src="@/assets/images/backstageindex/adminIcon.png" alt="" />
        </div>
        <div class="action">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
            <select name="" id="">
                <option value="all">所有人員</option>
                <option value="news">登入時間排序</option>
            </select>
        </div>
    </section>
    <section class="wrapper table">
        <div class="bs-title">
            <h3 class="idname-top">管理員ID</h3>
            <h3 class="article">管理員姓氏</h3>
            <h3 class="pic">管理員名字</h3>
            <h3 class="date">最後登入日期</h3>
            <h3 class="tag">權限允許狀態</h3>
        </div>
        <!-- 第一行 -->
        <div class="content-top">
                <div class="idname-t">00000</div>
                <div class="fristname-t">超級管理員</div>
                <div class="lastname-t">＃總經理</div>
                <div class="date-t">2022/12/15</div>
                <div class="tagsw-1">
                    <p class="tag">無法變更權限</p>
                </div>    
        </div>
        <!-- 內容 -->
        <div class="bs-list" v-for="koala in koalas" :key="koala.id">
            <div>{{ koala.idname }}</div>
            <div>{{ koala.fristname }}</div>
            <div>{{ koala.lastname }}</div>
            <div>{{ koala.date }}</div>
            
            <div class="tagsw">
                <div class="tagsw-tag">{{ koala.tag }}</div>
                <div>
                    <Switch
                        size="large"
                        true-color="#337a7d"
                        v-model="koala.listed" :before-change="handleBeforeChange"
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
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
export default {
    components: {
        Header,
    },
    data() {
        return {
            koalas: [
                {
                    idname: "P00001",
                    fristname: "熊",
                    lastname: "熊",
                    date: "2022/12/25",
                    tag: "一般權限",
                },
                {
                    idname: "P00002",
                    fristname: "陳",
                    lastname: "小白",
                    date: "2022/12/25",
                    tag: "一般權限",
                },
                {
                    idname: "P00003",
                    fristname: "劉",
                    lastname: "小黑",
                    date: "2022/12/25",
                    tag: "一般權限",
                },
                {
                    idname: "P00004",
                    fristname: "張",
                    lastname: "小華",
                    date: "2022/12/25",
                    tag: "一般權限",
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
    
};

</script>

<style lang="scss" scoped>
.title-n-action {
    margin-bottom: 20px;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
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
        display: flex;
        align-items: center;
        column-gap: 15px;
        img {
            vertical-align: top;
        }
    }
}
.table {
    .bs-title {
        width: 100%;
        border-radius: 10px;
        background-color: $darkgreen;
        color: white;
        display: flex;
        justify-items: center;
        align-items: center;
        h3 {
            display: block;
            width: calc(100% / 5);
        }
    }
    .bs-list {
        display: flex;
        justify-items: center;
        align-items: center;
        margin: 20px 0;
        padding-bottom: 20px;
        border-bottom: solid 1px $lightgreen;
        .tagsw{
            display: flex;
            justify-content: center;
            .tagsw-tag{
                width: 80px;
            }
        }
        div{
            display: block;
            width: calc(100% / 5);
            font-size: 15px;
            a {
                display: block;
                width: fit-content;
                height: fit-content;
                margin: 0 auto;
                img {
                    margin: 10px;
                    vertical-align: top;
                }
            }
        }
    }
}
.content-top {
            display: grid;
            grid-template-columns: repeat(5,1fr);
            margin: 10px 0;
            
            align-items: center;
            padding: 20px 0;
            border-bottom: solid 1px $lightgreen;
            font-size: 15px;
            .tagsw-1{
                display: flex;
                justify-content: center;
            }

        }
            
            
</style>
