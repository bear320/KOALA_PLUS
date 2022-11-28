<template>
    <div class="home">
        <!-- <img alt="Vue logo" src="../assets/logo.png"> -->
        <HelloWorld msg="Welcome to Your Vue.js App" />
    </div>
    <Space direction="vertical">
        <Space wrap>
            <Button>Default</Button>
            <Button type="primary">Primary</Button>
            <Button type="dashed">Dashed</Button>
            <Button type="text">Text</Button>
        </Space>
        <Space wrap>
            <Button type="info">Info</Button>
            <Button type="success">Success</Button>
            <Button type="warning">Warning</Button>
            <Button type="error">Error</Button>
        </Space>
    </Space>
</template>

<script>
// @ is an alias to /src
<<<<<<< HEAD
/* import HelloWorld from "@/components/HelloWorld.vue"; */

export default {
    /* name: "HomeView",
    components: {
        HelloWorld,
    }, */
=======
import HelloWorld from "@/components/HelloWorld.vue";

export default {
    name: "HomeView",
    components: {
        HelloWorld,
    },
>>>>>>> 55fb02b90c1a6e4bf06610dafd250766f63d92d7
};
</script>
