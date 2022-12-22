<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>資助認養管理</h1>
            <img src="@/assets/images/backstageindex/supportIcon.png" alt="" />
        </div>
        <div class="sub-title">
            <h2>數據統計 - 資助所有無尾熊</h2>
            <div class="chart-wrapper">
                <Line v-if="loaded" :data="dataSupAll" :options="options" />
            </div>
        </div>
        <div class="sub-title">
            <h2>數據統計 - 認養單隻無尾熊</h2>
            <div class="chart-wrapper"></div>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { Line } from "vue-chartjs";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);

export default {
    components: {
        Header,
        Line,
    },
    data() {
        return {
            loaded: false,
            source: [],
            dataSupAll: {
                labels: ["上上月", "上月", "本月"],
                datasets: [
                    {
                        label: "資助所有無尾熊",
                        data: [null, null, null],
                        borderColor: "#33717d",
                        backgroundColor: "#9abdbf",
                        pointStyle: "circle",
                        pointRadius: 10,
                        pointHoverRadius: 15,
                        cubicInterpolationMode: "monotone",
                        tension: 0.4,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    // 圖表標題
                    // title: {
                    //     display: true,
                    //     text: "Demo Line Chart",
                    // },
                },
            },
            chartdata: [],
        };
    },
    // methods: {
    //     getSupStat() {
    //         const apiURL = new URL(
    //             `http://localhost:8888/cgd103_g1/public/api/getSupStat.php`
    //         );
    //         fetch(apiURL)
    //             .then((res) => res.json())
    //             .then((json) => {
    //                 this.source = json;
    //                 // 資助所有無尾熊資料陣列
    //                 this.data.datasets[0].data = [
    //                     json[0]["koala_sum_the_month_before_last"],
    //                     json[0]["koala_sum_last_month"],
    //                     json[0]["koala_sum_this_month"],
    //                 ];
    //             })
    //             .catch((error) => {
    //                 // alert(error);
    //             });
    //     },
    // },
    // created() {
    //     this.getSupStat();
    // },
    async mounted() {
        this.loaded = false;

        try {
            await fetch(
                `http://localhost:8888/cgd103_g1/public/api/getSupStat.php`
            )
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.dataSupAll.datasets[0].data = [
                        json[0]["koala_sum_the_month_before_last"],
                        json[0]["koala_sum_last_month"],
                        json[0]["koala_sum_this_month"],
                    ];
                });

            this.loaded = true;
        } catch (e) {
            console.error(e);
        }
    },
};
</script>

<style lang="scss" scoped>
.title-wrapper {
    margin-bottom: 20px;
    text-align: left;
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
    .sub-title {
        margin-bottom: 20px;
        h2 {
            color: $green;
            @include borderLeft(30px);
        }
        .chart-wrapper {
            margin-top: 20px;
            width: 100%;
            height: 500px;
            background-color: #fff;
            border: 1px solid $btn-light-color;
            border-radius: 10px;
            box-shadow: 0px 2px 2px 2px rgba(149, 149, 149, 0.2);
            box-sizing: border-box;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
    .sub-title + .sub-title {
        margin-top: 50px;
    }
}
</style>
