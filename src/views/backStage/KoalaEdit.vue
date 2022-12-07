<template>
    <Header />
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
                    name: "Emily",
                    id: "K001",
                    dob: "2020-03-22",
                    sex: "母",
                    listed: true,
                },
                {
                    name: "Gabriel",
                    id: "K002",
                    dob: "2019-05-20",
                    sex: "公",
                    listed: true,
                },
                {
                    name: "Lucien",
                    id: "K003",
                    dob: "2019-10-15",
                    sex: "公",
                    listed: true,
                },
                {
                    name: "Camille",
                    id: "K004",
                    dob: "2018-04-08",
                    sex: "母",
                    listed: true,
                },
                {
                    name: "Mindy",
                    id: "K005",
                    dob: "2017-07-10",
                    sex: "母",
                    listed: true,
                },
                {
                    name: "Antoine",
                    id: "K006",
                    dob: "2015-01-16",
                    sex: "公",
                    listed: false,
                },
            ],
            temp: [],
        };
    },
    created() {
        [this.temp] = [
            ...this.koalaInfo.filter((item) => {
                return item.name === this.$route.params.name;
            }),
        ];
    },
};
</script>

<style lang="scss" scoped></style>
