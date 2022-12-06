<template>
    <Header />
    <article class="nav-space wrapper">
        <h1>訂單管理</h1>
        <div class="todo">
            <div class="search">
                <input class="search-bar" type="text" name="search" id="search" placeholder="搜尋">
            </div>
       
        </div>
        <section>



<!-- 會員編號、訂單號碼 -->
            <div class="content" v-for="article in articles" :key="article">
                <div class="num">
                    <div class="id">
                       
                        <p> <Icon type="md-contact" />{{ article.id }}</p>
                    </div>
                    <div class="listnum">
                        <p>訂單編號： {{ article.listnum }}</p>
                    </div>
                </div>

<!-- 訂單內容 -->

                <div class="details card">
                    <div class="top" v-for="article in articles" :key="article">
                        <div class="titleall">
                            <p class="title">{{ article.title }}</p>
                            <p class="pnumtitle">{{ article.pnumtitle }}</p>
                            <p class="pricetitle">{{ article.pricetitle }}</p>
                            <p class="quantitytitle">{{ article.quantitytitle }}</p>
                            <p class="total">{{ article.total }}</p>
                        </div>
                        <div class="d-card">
                            <div class="pro">
                                <div class="pic"><img :src="article.img" alt="" /></div>
                                <p class="product">
                                    {{ article.product }}
                                </p>
                                <div class="pnum">
                                    <p> {{ article.pnum }}</p>
                                </div>
                                <div class="price">
                                    <p> ${{ article.price }}NTD</p>
                                </div>
                                <div class="quantity">
                                    <p> {{ article.quantity }}</p>
                                </div>
                                <div class="sumtotal">
                                    <p> {{ article.sumtotal }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="info">
                                <p class="add">寄送地址：{{ article.add }}</p>
                                <p class="btdate">訂單成立時間：{{ article.btdate }}</p>
                                <div class="state">
                                    訂單狀態：
                                    <select name="category" id="articlesCategory">
                                    <option value="訂單準備中">訂單準備中</option>
                                    <option value="訂單已出貨">訂單已出貨</option>
                                    <option value="訂單已完成">訂單已完成</option>
                                    <option value="訂單未完成">訂單未完成</option>
                                    </select>
                                </div>
                                
                        </div>
                        <div class="discountall">
                            <p class="discount">折扣：{{ article.discount }}NTD</p>
                            <p class="sumtotal">總價：＄{{ article.sumtotal }} NTD</p>
                        </div>
                    </div>
                    
            </div>
        </div>
            <!-- 內容 -->
           
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
                id: "P00001",
                listnum: "K0000001",
                img :require("@/assets/images/about/3.jpg"),
                product:"無尾熊居家室內拖鞋",
                pnum: "123",
                price:"500",
                quantity:"2",
                sumtotal: "1000",
                title:"產品名稱",
                pnumtitle:"品號",
                pricetitle:"單價",
                quantitytitle:"數量",
                total:"小計",
                add:"桃園市中壢區復興路46號9樓",
                btdate:"2022-01-08",
                sumtotal: "2000",
                discount:"50"
            },
            {
                id: "P00002",
                listnum: "K0000002",
                img :require("@/assets/images/about/3.jpg"),
                product:"無尾熊居家室內拖鞋",
                pnum: "123",
                price:"500",
                quantity:"2",
                sumtotal: "1000",
                add:"桃園市中壢區復興路46號9樓",
                btdate:"2022-01-08",
                sumtotal: "2000",
                discount:"50"

            },
             
            ],
        };
    },
    methods: {
    },
    components: {
        Header,
    },
};

</script>

<style lang="scss" scoped>
.search{
    margin-top: 50px;
}
h1{
        margin-top: 50px;

}
html article {
    text-align: left;

    h1 {
        display: inline-block;
        width: 25%;
        background-image: url(@/assets/images/backstageindex/orderIcon.png);
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
                width: 100px;
                height: 100px;
                border-radius: 10px;
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

        .content {
            margin: 0px 50px;
            align-items: center;
        }
    }
}
.num{
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
  
}
.card{
    border-radius: 10px;
}
.d-card{
    background-color: #fff;
    border-bottom: 1px solid #eee;
    margin: 0px 50px;
}
.pro{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.titleall{
    display: flex;
    font-weight: 700;
    margin-top: 20px;
    padding: 20px;
    .title{
        margin-left: 300px;
        width: 30%;
    }
    .pnumtitle{
        width: 25%;

    }
    .pricetitle{
        width: 25%;

    }
    .quantitytitle{
        width: 20%;

    }
    .total{
        width: 15%;

    }

}
.bottom{
    display: flex;
    justify-content: space-between;
    margin: 50px 50px;
}
.bottom{
    padding-bottom: 50px;
}
</style>
