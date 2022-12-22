<template lang="">
    <div class="container">
        <div class="inner-container">test</div>
    </div>
</template>
<script>
// import axios from "axios";
export default {
    data() {
        return {
            weather: {},
        };
    },
    methods: {
        getWeatherData() {},
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
