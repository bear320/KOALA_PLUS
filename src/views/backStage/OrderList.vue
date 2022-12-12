<template>
    <Header />
    <article class="nav-space wrapper">
        <h1>訂單管理</h1>
        <div class="todo">
            <div class="search">
                <input type="search" name="" id="" placeholder="搜尋" />
            </div>
        </div>
        <section>
<!-- 會員編號、訂單號碼 -->

        <div class="accordion" v-for="article in articles" :key="article">
            <label for="tab1" >
                <div class="line1" >
                    <p>▼會員編號：{{ article.idname}}</p>
                    <p>訂購日期：{{ article.date}}</p>
                    <p>訂單編號：{{ article.number}}</p>
                </div>
            </label>
            <div class="box">
                <input type="radio" name="tab" id="tab1">
                <div class="con">
                    <div class="con-1">
                        <p>圖片</p>
                        <p>產品名稱</p>
                        <p>品號</p>
                        <p>單價</p>
                        <p>數量</p>
                        <p>小計</p>
                    </div>
        <!-- 訂單內容 -->
                    <div class="con-2" v-for="product in products" :key="product">
                        <p class="pic">
                            <img :src="product.png" alt="" />
                        </p>
                        <p class="product">
                            {{ product.product }}
                        </p>
                        <p class="pnum">
                            {{ product.pnum }}
                        </p>
                        <p class="price">
                            ${{ product.price }}NTD
                        </p>
                        <p class="quantity">
                            {{ product.quantity }}
                        </p>
                        <p class="sumtotal">
                            {{ product.sumtotal }}
                        </p>
                    </div>

        <!-- 訂單資訊 -->
                    <div class="con-3">
                        <div class="left">
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
                        <div class="right">
                            <p>折扣：{{ article.discount }}</p>
                            <p>總價：{{ article.sumtotal }}</p>
                        </div>
                    
                        
                    </div>
                </div>
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
                date: "2020-11-11",
                number:"000000001",

                add:"桃園市中壢區復興路46號9樓",
                btdate:"2022-01-08",
                sumtotal: "2000",
                discount:"50"
                },
                {
                idname: "P00001",
                date: "2020-11-11",
                number:"000000001",

                add:"桃園市中壢區復興路46號9樓",
                btdate:"2022-01-08",
                sumtotal: "2000",
                discount:"50"
                },
                
            ],
            products: [
                {
                    img :require("@/assets/images/shop/product_img.png"),
                    product:"無尾熊居家室內拖鞋",
                    pnum: "123",
                    price:"500",
                    quantity:"2",
                    sumtotal: "1000",
                },
               
            ]
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

.accordion{
    margin-top: 50px;
    width: 1200px;
    label{
        width: 100%;
        display: block;
        border: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 3px 3px 3px 3px  rgb(190, 190, 190);
        padding: 10px 50px;
        cursor: pointer;
        -webkit-user-select:none;
        -moz-user-select:none;
        -o-user-select:none;
        user-select:none;
        text-align: center;

        .line1{
            display: flex;
            p{
            width: calc(100% / 3);
            }
        }
    }
}

input[type=radio]:checked + .con{
    background-color: #fff;
    box-shadow:  3px 3px 8px 3px   rgb(163, 163, 163);
    height: 400px;
    
}
input[type=radio]{
    display: none;
}
.con{
    height: 0px;
    overflow: hidden;
    transition: 0.5s;
    margin-top: 10px;
    border-radius:10px ;
    

    .con-1{
        height: 30px;
        display:flex;
        margin: 10px 50px;
        text-align: center;
        border-bottom: .5px solid gray;

        p{
           width: calc(100% / 6);
           margin-bottom: 10px;
        }
    }
    .con-2{
        height: 150px;
        display:flex;
        margin: 10px 50px;
        text-align: center;
        align-items: center;
        border-bottom: .5px solid gray;
        p{
           width: calc(100% / 6);
           padding: 10px 0px ;
        }
    }
    .con-3{
        height: 150px;
        display: flex;
        justify-content: space-between;
        margin: 10px 50px;
        p , div{
                margin: 10px;
            }
        .right{
            margin-right: 50px;
        }
    }
}
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
