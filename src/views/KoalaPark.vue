<template lang="">
    <Header></Header>
    <div class="video-container">
        <iframe
            src="https://www.youtube.com/embed/L2fRuAoxepc?controls=0&amp;start=178&autoplay=1&mute=1&playsinline=1&loop=1&playlist=L2fRuAoxepc"
        ></iframe>
    </div>

    <div class="info-section">
        <img
            src="../assets/images/park/drawing1.png"
            class="koala-icon"
            alt="koala-icon"
        />

        <booking-button @gotodie="scrollToBlock"></booking-button>

        <img
            src="../assets/images/park/drawing7.png"
            class="leaf-icon-right"
            alt="leaf-icon-right"
        />

        <guide-info v-for="d in source" v-bind="d" />

        <img
            src="../assets/images/park/drawing7.png"
            class="leaf-icon-left"
            alt="leaf-icon-left"
        />
    </div>
    <div class="sub-banner">
        <img src="../assets/images/park/banner-img.png" alt="" />
    </div>
    <div class="wrapper">
        <div id="calendar">
            <cal2></cal2>
        </div>
    </div>
</template>

<script>
import Header from "@/components/header.vue";
import BookingButton from "@/components/park/BookingButton.vue";
import GuideInfo from "@/components/park/GuideInfo.vue";
import Cal2 from "@/components/park/Cal2.vue";
export default {
    name: "About",
    components: {
        Header,
        BookingButton,
        GuideInfo,
        Cal2,
    },

    methods: {},
    data() {
        return {
            source: [],
            // title: 1234,
        };
    },
    created() {
        this.source = [
            {
                id: 1,
                src: require(`@/assets/images/park/parkspot01.jpg`),
                title: "醫療救援與照護",
                script: "每年，KOALA+都會拯救150多隻在澳州獲救的生病、受傷的無尾熊。<br>接受通報後，專門保護員會先抵達現場，進行全面評估後，若是較受傷情況較嚴峻的無尾熊就會運送至我們的無尾熊醫院接受專門獸醫的治療。",
            },
            {
                id: 2,
                src: require(`@/assets/images/park/parkspot02.png`),
                title: "半圍欄眷養",
                script: "無尾熊進入園區後將由獸醫人員進行評估和治療，照護期間，考拉每天都會受到監控並接受專門的飼育員照護。無尾熊也會視其康復時間長短來安置，狀況較好的無尾熊會轉移到半圍欄中。<br><br>我們打造與無尾熊原生棲息相似的空間，讓它們可以在野放前學習攀爬和恢復肌肉力量，提早適應野生棲息地。",
            },
            {
                id: 3,
                src: require(`@/assets/images/park/parkspot03.jpg`),
                title: "園區導覽喚醒公眾意識",
                script: "除了澳洲大火的破壞，無尾熊棲息地80%是受到人為破壞，KOALA+向教育機構、團體和個人提供教育資源，開放園區導覽，並透過媒體宣傳，傳達無尾熊保護相關知識，藉此喚起公眾意識。  <br><br> 讓全球公民對無尾熊產生自豪感和歸屬感更多人參與保護、愛護無尾熊的行列。」",
            },
        ];
    },
    methods: {
        scrollToBlock() {
            window.scrollTo({
                top: document.getElementById("calendar").offsetTop,
                left: 0,
                behavior: "smooth",
            });
        },
    },
};
</script>
<style lang="scss" scoped>
.video-container {
    width: 1200px;
    height: 100vh;
    margin: auto;
    overflow: hidden;
}

iframe {
    position: relative;
    top: 50%;
    left: 50%;
    width: 100vw;
    height: 100vh;
    transform: translate(-50%, -50%);
    pointer-events: none;
}

#text {
    position: absolute;
    color: #ffffff;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.info-section {
    position: relative;
    overflow: hidden;
}
.booking-button {
    margin-top: 80px;
}

/* icons */
.koala-icon {
    width: 500px;
    position: absolute;
    left: -40px;
    top: 30px;
    z-index: 3;
    overflow: hidden;
}

.leaf-icon-right {
    width: 500px;
    position: absolute;
    transform: rotate(-30deg);
    right: -30px;
    top: 400px;
    z-index: 3;
    overflow: hidden;
}

.leaf-icon-left {
    width: 500px;
    position: absolute;
    transform: rotate(60deg);
    left: -30px;
    top: 1000px;
    z-index: 3;
    overflow: hidden;
}

.sub-banner {
    width: 100%;
    height: 50vh;
    margin-bottom: 60px;
}
.sub-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center center;
}

@media (min-aspect-ratio: 16/9) {
    .video-container iframe {
        height: 56.25vw;
    }
}
@media (max-aspect-ratio: 16/9) {
    .video-container iframe {
        width: 177.78vh;
    }
}
</style>
