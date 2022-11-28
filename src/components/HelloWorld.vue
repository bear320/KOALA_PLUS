<template>
    <div class="hello">
        <h1 class="t1">測試</h1>
        <h1 class="t2">測試</h1>
    </div>
</template>

<script>
export default {
    name: "HelloWorld",
    props: {
        msg: String,
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.t1 {
    // font-family: "font-B";
    font-family: "font-EL";
}
.t2 {
    font-family: "font-R";
}
h3 {
    margin: 40px 0 0;
}
ul {
    list-style-type: none;
    padding: 0;
}
li {
    display: inline-block;
    margin: 0 10px;
}
a {
    color: #42b983;
}
</style>
