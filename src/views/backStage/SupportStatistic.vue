<template>
    <Header />
    <section class="bs-nav-space wrapper title-wrapper">
        <div class="title">
            <h1>資助認養管理</h1>
            <img
                src="@/assets/images/backstageindex/supportIcon.png"
                alt="【圖示】資助認養"
            />
        </div>
        <div class="sub-title">
            <h2>數據統計 - 資助所有無尾熊</h2>
            <div class="chart-wrapper">
                <Line v-if="loaded" :data="dataSupAll" :options="options" />
            </div>
        </div>
        <div class="sub-title">
            <h2>數據統計 - 認養單隻無尾熊</h2>
            <Tabs class="tab-wrapper">
                <TabPane class="tab" label="總覽" name="All">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['All']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Zeus" name="Zeus">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Zeus']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Hera" name="Hera">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Hera']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Poseidon" name="Poseidon">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Poseidon']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Ares" name="Ares">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Ares']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Aphrodite" name="Aphrodite">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Aphrodite']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Apollo" name="Apollo">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Apollo']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Athena" name="Athena">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Athena']"
                        :options="options"
                    />
                </TabPane>
                <TabPane class="tab" label="Hermes" name="Hermes">
                    <Line
                        v-if="loaded"
                        :data="dataAdopt[0]['Hermes']"
                        :options="options"
                    />
                </TabPane>
            </Tabs>
        </div>
    </section>
</template>

<script>
import Header from "@/components/backStage/Header.vue";
import { BASE_URL } from "@/assets/js/common.js";
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
    Filler,
} from "chart.js";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler
);

export default {
    components: {
        Header,
        Line,
        Filler,
    },
    data() {
        return {
            loaded: false,
            dataSupAll: {
                labels: ["上上月", "上月", "本月"],
                datasets: [
                    {
                        label: "資助所有無尾熊",
                        data: [],
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

            dataAdopt: [
                {
                    All: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#f94144",
                                backgroundColor: "#f94144",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#f8961e",
                                backgroundColor: "#f8961e",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#f9c74f",
                                backgroundColor: "#f9c74f",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#90be6d",
                                backgroundColor: "#90be6d",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#43aa8b",
                                backgroundColor: "#43aa8b",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#4d908e",
                                backgroundColor: "#4d908e",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#577590",
                                backgroundColor: "#577590",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                            {
                                label: "",
                                data: [],
                                borderColor: "#277da1",
                                backgroundColor: "#277da1",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                            },
                        ],
                    },
                    Zeus: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Hera: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Poseidon: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Ares: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Aphrodite: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Apollo: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Athena: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                    Hermes: {
                        labels: ["上上月", "上月", "本月"],
                        datasets: [
                            {
                                label: "",
                                data: [],
                                borderColor: "#33717d",
                                backgroundColor: "#9abdbf75",
                                pointStyle: "circle",
                                pointRadius: 10,
                                pointHoverRadius: 15,
                                tension: 0.4,
                                cubicInterpolationMode: "monotone",
                                fill: true,
                            },
                        ],
                    },
                },
            ],
            options: {
                responsive: true,
            },
        };
    },
    async mounted() {
        this.loaded = false;

        try {
            await fetch(`${BASE_URL}/getSupStat.php`)
                .then((res) => res.json())
                .then((json) => {
                    /* this.dataSupAll.datasets[0].data = [
                        json[0]["koala_sum_the_month_before_last"],
                        json[0]["koala_sum_last_month"],
                        json[0]["koala_sum_this_month"],
                    ]; */
                    this.dataSupAll["datasets"] = json.map((array, index) => {
                        return {
                            label: "資助所有無尾熊",
                            data: array,
                            borderColor: "#33717d",
                            backgroundColor: "#9abdbf",
                            pointStyle: "circle",
                            pointRadius: 10,
                            pointHoverRadius: 15,
                            cubicInterpolationMode: "monotone",
                            tension: 0.4,
                        };
                    });
                });

            await fetch(`${BASE_URL}/getAdoptStat.php`)
                .then((res) => res.json())
                .then((json) => {
                    // All
                    // 第二個陣列0前宣告
                    // 判斷是不是陣列
                    this.dataAdopt[0].All["datasets"][0]["label"] =
                        json.adoptNameStat[0].koala_name;
                    this.dataAdopt[0].All["datasets"][0]["data"] =
                        json.adoptStat[0];
                    this.dataAdopt[0].All["datasets"][1]["label"] =
                        json.adoptNameStat[1].koala_name;
                    this.dataAdopt[0].All["datasets"][1]["data"] =
                        json.adoptStat[1];
                    this.dataAdopt[0].All["datasets"][2]["label"] =
                        json.adoptNameStat[2].koala_name;
                    this.dataAdopt[0].All["datasets"][2]["data"] =
                        json.adoptStat[2];
                    this.dataAdopt[0].All["datasets"][3]["label"] =
                        json.adoptNameStat[3].koala_name;
                    this.dataAdopt[0].All["datasets"][3]["data"] =
                        json.adoptStat[3];
                    this.dataAdopt[0].All["datasets"][4]["label"] =
                        json.adoptNameStat[4].koala_name;
                    this.dataAdopt[0].All["datasets"][4]["data"] =
                        json.adoptStat[4];
                    this.dataAdopt[0].All["datasets"][5]["label"] =
                        json.adoptNameStat[5].koala_name;
                    this.dataAdopt[0].All["datasets"][5]["data"] =
                        json.adoptStat[5];
                    this.dataAdopt[0].All["datasets"][6]["label"] =
                        json.adoptNameStat[6].koala_name;
                    this.dataAdopt[0].All["datasets"][6]["data"] =
                        json.adoptStat[6];
                    this.dataAdopt[0].All["datasets"][7]["label"] =
                        json.adoptNameStat[7].koala_name;
                    this.dataAdopt[0].All["datasets"][7]["data"] =
                        json.adoptStat[7];
                    // Zeus
                    this.dataAdopt[0].Zeus["datasets"][0]["label"] =
                        json.adoptNameStat[0].koala_name;
                    this.dataAdopt[0].Zeus["datasets"][0]["data"] =
                        json.adoptStat[0];
                    // Hera
                    this.dataAdopt[0].Hera["datasets"][0]["label"] =
                        json.adoptNameStat[1].koala_name;
                    this.dataAdopt[0].Hera["datasets"][0]["data"] =
                        json.adoptStat[1];
                    // Poseidon
                    this.dataAdopt[0].Poseidon["datasets"][0]["label"] =
                        json.adoptNameStat[2].koala_name;
                    this.dataAdopt[0].Poseidon["datasets"][0]["data"] =
                        json.adoptStat[2];
                    // Ares
                    this.dataAdopt[0].Ares["datasets"][0]["label"] =
                        json.adoptNameStat[3].koala_name;
                    this.dataAdopt[0].Ares["datasets"][0]["data"] =
                        json.adoptStat[3];
                    // Aphrodite
                    this.dataAdopt[0].Aphrodite["datasets"][0]["label"] =
                        json.adoptNameStat[4].koala_name;
                    this.dataAdopt[0].Aphrodite["datasets"][0]["data"] =
                        json.adoptStat[4];
                    // Apollo
                    this.dataAdopt[0].Apollo["datasets"][0]["label"] =
                        json.adoptNameStat[5].koala_name;
                    this.dataAdopt[0].Apollo["datasets"][0]["data"] =
                        json.adoptStat[5];
                    // Athena
                    this.dataAdopt[0].Athena["datasets"][0]["label"] =
                        json.adoptNameStat[6].koala_name;
                    this.dataAdopt[0].Athena["datasets"][0]["data"] =
                        json.adoptStat[6];
                    // Hermes
                    this.dataAdopt[0].Hermes["datasets"][0]["label"] =
                        json.adoptNameStat[7].koala_name;
                    this.dataAdopt[0].Hermes["datasets"][0]["data"] =
                        json.adoptStat[7];
                });

            this.loaded = true;
        } catch (e) {
            // console.error(e);
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
        .tab-wrapper {
            .tab {
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
    }
    .sub-title {
        margin-bottom: 50px;
    }
}
</style>
<style lang="scss">
.ivu-tabs-nav {
    .ivu-tabs-ink-bar {
        display: none;
    }
    .ivu-tabs-tab {
        color: $btn-color;
        &:hover {
            color: $btn-color;
            font-weight: 700;
        }
    }
    .ivu-tabs-tab.ivu-tabs-tab-active.ivu-tabs-tab-focused {
        color: $btn-color;
        font-weight: 700;
    }
}
.ivu-tabs-bar {
    margin-bottom: 5px;
    border: none;
}
</style>
