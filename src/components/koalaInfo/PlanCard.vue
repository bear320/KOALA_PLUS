<template>
    <div class="plan-card">
        <div class="plan-name">
            <h3>{{ pName }}</h3>
        </div>
        <div class="content">
            <h4>方案費用：NT$ {{ pPrice }}</h4>
            <ul>
                <h4>方案內容：</h4>
                <li>領養 / 資助證明 * 1</li>
                <li>
                    <img src="../../assets/images/support/coin.svg" alt="" />
                    {{ pPoint }}
                    點
                </li>
                <li>{{ pGift1 }} * 1</li>
                <li>{{ pGift2 }} * 1</li>
            </ul>
            <h4>{{ pDesc }}</h4>
            <button class="btn-secondary" @click="showIndex(index)">
                {{ pBtn }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "pName",
        "pPrice",
        "pPoint",
        "pGift1",
        "pGift2",
        "pDesc",
        "pBtn",
        "index",
    ],
    data() {
        return {};
    },
    methods: {
        showIndex(i) {
            alert(i);
        },
    },
};
</script>

<style lang="scss" scoped>
$b-radius: 10px;

.plan-card {
    width: 295px;
    box-shadow: 0 2px 30px rgba(black, 0.2);
    .plan-name {
        box-sizing: border-box;
        padding: 15px 20px;
        background-color: $green;
        color: #fff;
        border-radius: $b-radius $b-radius 0 0;
        border: 1.5px solid $darkgreen;
        border-bottom: none;
        h3 {
            @include m() {
                font-size: 24px;
            }
        }
    }
    .content {
        text-align: left;
        box-sizing: border-box;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 0 0 $b-radius $b-radius;
        border: 1.5px solid $darkgreen;
        h4 {
            margin-bottom: 10px;
        }
        ul {
            list-style-position: inside;
            li {
                list-style-type: disc;
                font: 18px font-R;
                line-height: 1.5;
                margin-bottom: 10px;
                @include m() {
                    font-size: 15px;
                }
                img {
                    width: 27px;
                    height: 27px;
                    vertical-align: top;
                    @include m() {
                        width: 22.5px;
                        height: 22.5px;
                    }
                }
            }
            li + li {
                margin-top: 10px;
            }
        }
        h4:last-child {
            text-align: justify;
        }
        button {
            margin: 10px 0;
            width: 100%;
            font: 24px font-R;
            line-height: 2;
            border-width: 1.5px;
        }
    }
}
</style>
