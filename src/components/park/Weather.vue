<template lang="">
    <div class="container">
        <div class="inner-container">test</div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            weather: {},
        };
    },
    methods: {
        getWeatherData() {
            fetch(
                "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-005?Authorization=CWB-7DF0CD1C-E933-4927-95D1-99C3EC894A8C&format=JSON&sort=time"
            )
                .then((res) => res.json())
                .then((json) => {
                    console.log(json);
                    this.weatherData = json;
                });
        },
    },
    created() {
        this.getWeatherData();
    },
};
</script>
<style lang="scss" scoped>
.container {
    width: 100%;
    display: flex;
    justify-content: center;
}

.inner-container {
    width: 50%;
    background-color: blue;
}
</style>
