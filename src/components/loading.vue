<template>
    <div id="loading" v-if="!isloaded">
        <img src="@/assets/images/loading.gif" alt="" />
    </div>
</template>
<script>
export default {
    data() {
        return {
            isloaded: false,
        };
    },
    mounted() {
        document.onreadystatechange = () => {
            if (document.readyState == "complete") {
                this.isloaded = true;
            }
        };
    },
};
</script>
<style lang="scss" scoped>
#loading {
    display: flex;
    justify-content: center;
    height: 80vh;
    top: 0;
    left: 0;
    position: fixed;
    width: 100vw;
    height: 100vh;
    background-color: #fbfef9;
    z-index: 999;
    img {
        width: 300px;
        height: 300px;
        margin: auto;
    }
}
</style>
