<template>
    <header>
        <nav class="container">
            <div class="logo">
                <img src="../img/logo.svg" alt="KOALA+" />
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    porps: {},
    data() {
        return {};
    },
};
</script>

<style lang="scss">
header {
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    nav {
        @include size(100%, 60px);

        .logo {
            @include size(12%, auto);
            margin-left: 5%;

            img {
                @include size(100%, 100%);
            }
        }
    }
}
</style>
