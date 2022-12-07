<template>
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
        <h1>Quiz</h1>

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
    <!-- 測驗＋背景圖 -->
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
        <div class="test-block">
            <div class="test">
                <form class="card card-ab">
                    <div v-if="questionIndex < questions.length">
                        <h4 class="question">{{ question.question }}</h4>
                        <div
                            v-for="c of question.choices"
                            :key="c"
                            class="choice btn-lowest"
                        >
                            <input
                                type="radio"
                                name="choice"
                                v-model="answer"
                                :value="c"
                            />
                            {{ c }}
                        </div>
                    </div>
                    <div v-else>
                        <div class="btn-paramy" @click="restart">重做</div>
                    </div>
                    <div class="btn-paramy btn-ab" @click="submit">送出</div>
                </form>
                <div v-if="questionIndex === 5 && score === 5">aaaaa</div>
                <p>得分 : {{ score }} 分</p>
            </div>
        </div>
    </div>

    <Footer />
</template>

<script>
import Header from "@/components/header.vue";
import Footer from "@/components/footer.vue";

const questions = [
    {
        question: "無尾熊的尾巴有什麼作用?",
        choices: [
            "1.沒用，好看而已",
            "2.當坐墊用，讓無尾熊能長時間坐在樹上",
            "3.美觀漂亮",
        ],
        rightAnswer: "2.當坐墊用，讓無尾熊能長時間坐在樹上",
    },
    {
        question: "無尾熊的主食為?",
        choices: ["1.牛肉", "2.咖啡豆", "3.尤加利葉"],
        rightAnswer: "3.尤加利葉",
    },
    {
        question: "無尾熊一天能睡多久?",
        choices: ["1.18-20小時", "2.2-3小時", "3.無尾熊不睡覺的"],
        rightAnswer: "1.18-20小時",
    },
    {
        question: "Koala來自於澳洲原始住民，意思是什麼？",
        choices: [
            "1.Gula是原住民語中「爬樹」的意思",
            "2.Gula是原住民語中「可愛」的意思",
            "3.Gula是原住民語中「不喝水」的意思",
        ],
        rightAnswer: "3.Gula 無尾熊 是澳洲原住民語中「不喝水」的意思",
    },
    {
        question: "無尾熊是熊科動物嗎？",
        choices: ["1.是", "2.不知道", "3.不是，而是袋類動物"],
        rightAnswer: "3.不是，而是袋類動物",
    },
];

export default {
    components: {
        Header,
        Footer,
    },
    name: "AboutKoala",
    data() {
        return {
            questions,
            score: 0,
            questionIndex: 0,
            question: questions[0],
            answer: "",
        };
    },

    methods: {
        submit() {
            const { answer, question, questions, questionIndex } = this;
            const options = question.choices;
            if (options.indexOf(answer) === -1) return;
            if (answer === question.rightAnswer) {
                this.score++;
            }
            if (questionIndex < questions.length) {
                this.questionIndex++;
                this.question = { ...questions[this.questionIndex] };
            }
        },
        restart() {
            this.question = questions[0];
            this.answer = "";
            this.questionIndex = 0;
            this.score = 0;
        },
    },
};
</script>
<style lang="scss" scoped>
.banner {
    @include bgSetting(center, 90%);
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
    padding: 10px;
    .btn-ab {
        @include btnSize(150px);
        @include m() {
            width: 80%;
            margin: auto;
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
    margin-top: -300px;
    @include m() {
        margin: 0px;
    }
    p {
        margin: 30px;
    }
}
.choice {
    margin: 10px;
}
.bg {
    width: 100%;
    display: flex;
    justify-content: space-between;
    @include m() {
        height: 200px;
    }

    .ab-tree2 img {
        -moz-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        transform: scaleX(-1);
    }
}
.bg img {
    @include m() {
        width: 100%;
        height: 200px;
    }
}
body h1 {
    font-family: "Inkfree";
    font-size: 30vh;
    color: $lightgreen;
}
</style>
