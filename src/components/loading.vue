<template>
    <div id="loading">
        <img src="@/assets/images/loading.gif" alt="" />
    </div>
</template>
<script>
// export default {
// data() {
//     return {
//         isloaded: false,
//     };
// },
// mounted() {
//     document.onreadystatechange = () => {
//         if (document.readyState == "complete") {
//             this.isloaded = true;
//         }
//     };
//     setTimeout(() => {
//         this.isloaded = false;
//     }, 500);
// },
// };
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
    animation-name: ooxx;
    animation-duration: 3s;
    animation-iteration-count: 1;
}

@keyframes ooxx {
    0% {
        opacity: 1;
    }
    20% {
        opacity: 0;
    }
    80% {
        left: 0px;
        opacity: 0;
    }
    100% {
        left: 2000px;
        opacity: 0;
    }
}

img {
    width: 300px;
    height: 300px;
    margin: auto;
}
</style>
