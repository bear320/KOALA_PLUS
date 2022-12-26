<template>
    <!-- <Loading /> -->
    <Header />
    <article class="nav-space">
        <div
            class="banner"
            :style="{
                backgroundImage:
                    'url(' + require('@/assets/images/banner2.jpg') + ')',
            }"
        ></div>
    </article>

    <div class="content">
        <h1>About Koala</h1>

        <Collapse v-model="value">
            <Panel name="1">
                無尾熊的尾巴有什麼作用？
                <template #content
                    >無尾熊其實是有尾巴的，但是短小而笨拙，像一個「私家座墊」，讓牠們能長時間舒適地坐在樹上睡覺。</template
                >
            </Panel>
            <Panel name="2">
                無尾熊的主食為？
                <template #content
                    >無尾熊非常挑食，在六百多種尤加利樹中，只喜歡其中的幾十種。成熟的無尾熊喜歡待在高大的尤加利樹上，每天需攝食超過900公克的尤加利樹葉。由於葉中含豐富的水分，無尾熊日常所需的水分幾乎都從採食尤加利樹葉與嫩芽中獲得，很少飲水。尤加利樹葉中也具有大量的纖維，所以通常需要三天左右的時間才能將其消化完全。除了上述的兩種成分外，尤加利樹葉的營養成分其實是很低的，只有在嫩葉的基部具有較高含量的糖分，這大概也就是無尾熊特別喜愛攝食嫩葉的原因。</template
                >
            </Panel>
            <Panel name="3">
                無尾熊一天能睡多久？
                <template #content
                    >無尾熊每天花在睡眠及休息的時間約18～20小時，約佔80%的時間。</template
                >
            </Panel>
            <Panel name="4">
                Koala 一詞原本來自於什麼呢？
                <template #content
                    >Gula 無尾熊
                    是澳洲原住民語中「不喝水」的意思，無尾熊從樹葉中補充到足夠水分，幾乎不需要喝水，但是牠們有需要時也會到河邊喝水。</template
                >
            </Panel>
            <Panel name="5">
                無尾熊是熊科動物嗎？
                <template #content
                    >雖然名為無尾「熊」，但不是熊科動物，而是袋類動物。雌性無尾熊與袋鼠一樣腹部有育兒袋，不過袋口是向下的。</template
                >
            </Panel>
        </Collapse>
    </div>

    <!-- 樹-->
    <div class="bg-text">
        <div class="bg">
            <div class="ab-tree1">
                <img
                    src="../assets/images/aboutkoala/background-tree.png"
                    alt=""
                />
            </div>
            <div class="ab-tree2">
                <img
                    src="../assets/images/aboutkoala/background-tree.png"
                    alt=""
                />
            </div>
        </div>
    </div>
    <!-- 測驗標題-->
    <div class="test-block">
        <div class="test">
            <h1>Quiz</h1>
            <!-- 測驗-->
            <form class="card card-ab">
                <div v-if="questionIndex < questions.length">
                    <h4 class="question">{{ question.question }}</h4>

                    <label :for="c" v-for="c in question.choices" :key="c">
                        <div class="choice btn-lowest">
                            <input
                                type="radio"
                                :id="c"
                                name="choice"
                                v-model="answer"
                                :value="c"
                            />
                            {{ c }}
                        </div>
                    </label>
                </div>
                <div v-else>
                    <div class="btn-paramy btn-ab" @click="restart">重做</div>
                </div>
                <div
                    class="btn-paramy btn-ab"
                    v-show="questionIndex !== 5"
                    @click="submit"
                >
                    <span v-if="questionIndex < 4">下一題</span>
                    <span v-else>送出</span>
                </div>
            </form>
            <div class="discount" v-if="questionIndex === 5 && score === 5">
                恭喜您獲得優惠卷： {{ coupon_code }} {{ coupon_name }}
                <!-- {{  CouponId === "4001" == "01" }} -->
                <p v-if="CouponId === '4001'">95折價券</p>
                <p v-else-if="CouponId === '4002'">9折價券</p>
                <p v-else-if="CouponId === '4003'">85折價券</p>
            </div>
            <div class="score">
                <span v-if="questionIndex < 5"></span>
                <span v-else>得分 : {{ score }} 分</span>
            </div>
        </div>
    </div>
    <div>
        <div class="mask" v-if="showModal" @click="showModal = true"></div>
        <div class="pop" v-if="showModal">
            <h3>回答小測驗 登入後贏得優惠券</h3>
            <p>＊登入後作答 才能獲得優惠卷！</p>
            <button class="btn btn1 btn-paramy" @click="showModal = false">
                開始
            </button>
        </div>
    </div>

    <Footer />
</template>

<script>
import { BASE_URL } from "@/assets/js/common.js";
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";
import Loading from "@/components/loading.vue";
import { handleError } from "@vue/runtime-core";

const questions = [
    {
        question: "Ｑ1：無尾熊的尾巴有什麼作用?",
        choices: [
            "A.沒用，好看而已",
            "B.當坐墊用，讓無尾熊能長時間坐在樹上",
            "C.美觀漂亮",
        ],
        rightAnswer: "B.當坐墊用，讓無尾熊能長時間坐在樹上",
    },
    {
        question: "Ｑ2：無尾熊的主食為?",
        choices: ["A.牛肉", "B.咖啡豆", "C.尤加利葉"],
        rightAnswer: "C.尤加利葉",
    },
    {
        question: "Ｑ3：無尾熊一天能睡多久?",
        choices: ["A.18-20小時", "2.2-3小時", "3.無尾熊不睡覺的"],
        rightAnswer: "A.18-20小時",
    },
    {
        question: "Ｑ4：Koala來自於澳洲原始住民，意思是什麼？",
        choices: [
            "A.Gula是原住民語中「爬樹」的意思",
            "B.Gula是原住民語中「可愛」的意思",
            "C.Gula是原住民語中「不喝水」的意思",
        ],
        rightAnswer: "C.Gula是原住民語中「不喝水」的意思",
    },
    {
        question: "Ｑ5：無尾熊是熊科動物嗎？",
        choices: ["A.是", "B.不知道", "C.不是，而是袋類動物"],
        rightAnswer: "C.不是，而是袋類動物",
    },
];

export default {
    components: {
        Header,
        Footer,
        Loading,
        handleError,
    },
    name: "AboutKoala",
    data() {
        return {
            payload: {},
            questions,
            score: 0,
            questionIndex: 0,
            question: questions[0],
            answer: "",
            CouponId: ["4001", "4002", "4003"],
            showModal: true,
            CouponCode: "",
        };
    },

    methods: {
        submit() {
            const { answer, question, questions, questionIndex } = this;
            const options = question.choices;
            if (options.indexOf(answer) === -1) return;
            if (answer === question.rightAnswer) {
                this.score++;
                // console.log(this.score);
            }
            if (questionIndex < questions.length) {
                this.questionIndex++;
                this.question = { ...questions[this.questionIndex] };
            }

            if (this.score > 4) {
                let ranNum = Math.floor(Math.random(this.CouponId.length) * 3);
                // console.log("隨機號碼", ranNum);
                // console.log("獲得的優惠ID", this.CouponId[ranNum]);
                this.CouponId = this.CouponId[ranNum];
                if (this.CouponId === "4001") {
                    this.CouponCode = "koala95";
                } else if (this.CouponId === "4002") {
                    this.CouponCode = "koala90";
                } else if (this.CouponId === "4003") {
                    this.CouponCode = "koala85";
                }
                /* this.payload.memid = 1006;
                this.payload.CouponCode = this.CouponCode;
                this.payload.CouponId = this.CouponId[ranNum]; */
                // console.log("COCO", this.CouponCode);

                this.insertCoupon();
                // 把優惠卷id傳給php

                // ('85折優惠券', 'koala85', '60', '0.85'),
                /* {
                    coupon_id:4001
                    coupon_name:85折優惠券
                    coupon_code:koala85
                    coupon_valid:60
                    coupon_discount:0.85
                } */
            }
        },
        restart() {
            this.question = questions[0];
            this.answer = "";
            this.questionIndex = 0;
            this.score = 0;
        },
        insertCoupon() {
            console.log(this.CouponId);
            console.log(this.CouponCode);
            const payload = {
                memid: 1006,
                CouponId: this.CouponId,
                CouponCode: this.CouponCode,
            };
            const apiURL = new URL(`${BASE_URL}/insertCoupon.php`);
            fetch(apiURL, {
                method: "POST",
                body: new URLSearchParams(payload),
            })
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                });
        },
    },
};
</script>
<style lang="scss" scoped>
.banner {
    @include d() {
        background-repeat: no-repeat;
        background-size: center;
        background-position: 90%;
    }

    @include m() {
        background-size: 100%;
        background-position: top;
    }
}
.content {
    padding: 60px;
    @include m() {
        padding: 10px;
    }
}
.bg-text {
    @include m() {
        display: flex;
        flex-direction: column-reverse;
    }
}
.btn-pamary {
    .btn-ab {
        @include m() {
            width: 80%;
        }
    }
}
.card-ab {
    margin: auto;
    padding: 50px;
    width: 500px;
    @include m() {
        width: 80%;
        margin: auto;
    }
}
.question {
    margin: 10px;
}
.test {
    margin-bottom: 50px;
    margin-top: -300px;
    @include m() {
        margin: 0px;
        margin-bottom: 50px;
    }
    p {
        margin: 30px;
    }
}
.choice {
    margin: 10px;
    text-align: start;
    padding-left: 10px;
}
.bg {
    width: 100%;
    display: flex;
    justify-content: space-between;

    .bg img {
        @include m() {
            width: 100%;
            height: 200px;
        }
    }
    .ab-tree1 img {
        @include m() {
            height: 200px;
        }
    }
    .ab-tree2 img {
        -moz-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        transform: scaleX(-1);
        @include m() {
            height: 200px;
        }
    }
}
.btn-ab {
    width: 80px;
    margin: auto;
    margin-top: 10px;
}
body h1 {
    font-family: "Inkfree";
    font-size: 30vh;
    color: $lightgreen;
    @include m() {
        font-size: 50px;
    }
}
.discount {
    margin-top: 20px;
}
.mask {
    background-color: #000;
    opacity: 0.3;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.pop {
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: #fbfef9;
    border-radius: 5px;
    position: fixed;
    top: 100px;
    left: 300px;
    width: calc(100% - 600px);
    height: calc(100% - 400px);
    z-index: 2;
    img {
        width: 50%;
        margin: auto;
        -webkit-filter: drop-shadow(12px 12px 7px rgba(0, 0, 0, 0.7));
        filter: drop-shadow(12px 12px 7px rgba(0, 0, 0, 0.7));
    }
    p {
        margin-top: 50px;
    }
    h3 {
        margin-top: 50px;
        font-size: 48px;
    }
}
// .btn {
//     padding: 4px 20px;
//     bottom: 0;
//     margin-bottom: 50px;
// }
.btn1 {
    width: 250px;
    margin: auto;
    margin-bottom: 20px;
}
</style>
