<template lang="">
    <div class="guide-card">
        <img :src="src" alt="" />
        <div class="container">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <p>{{ title }}</p>
                    <hr />
                </div>
                <div class="items price">
                    <p v-html="script" class="new"></p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "GuideInfo",
    props: {
        src: String,
        title: String,
        script: String,
        source: Array,
    },
    data() {
        return {};
    },
    computed: {},
};
</script>
<style scoped>
/* $hoverEasing: cubic-bezier(0.23, 1, 0.32, 1);
$returnEasing: cubic-bezier(0.445, 0.05, 0.55, 0.95); */
.guide-card {
    position: relative;
    margin: 100px auto;
    width: 1078px;
    height: 517px;
    border: 5px;
    border-radius: 10px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    border-radius: 16px;
    transition-duration: 300ms;
    transition-property: transform, box-shadow;
    transition-timing-function: ease-out;
    transform: rotate3d(0);
}

.guide-card:hover {
    transition-duration: 150ms;
    box-shadow: 0 5px 20px 5px #00000044;
}
.guide-card img {
    width: 100%;
    height: 100%;
    border-radius: 16px;
    margin: auto;
    object-fit: cover;
    object-position: center center;
}

.container {
    width: 1078px;
    height: 517px;
    position: absolute;
    border: 10px solid white;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    -webkit-box-shadow: 0 0 5px #000;
    box-shadow: 0 0 5px #000;
    border-radius: 16px;
}

.container img {
    position: absolute;
}

.overlay {
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 2fr 2fr 1fr;
    background: rgba(77, 77, 77, 0.9);
    color: #fef5df;
    opacity: 0;
    transition: all 0.5s;
    font-family: "Playfair Display", serif;
    border-radius: 16px;
}

.items {
    padding-left: 20px;
    letter-spacing: 3px;
}

.head {
    font-size: 30px;
    line-height: 40px;
    transform: translateY(40px);
    transition: all 0.7s;
}

.head hr {
    display: block;
    width: 0;
    border: none;
    border-bottom: solid 2px #fef5df;
    position: absolute;
    bottom: 0;
    left: 20px;
    transition: all 0.5s;
}

.price {
    width: 600px;
    margin: auto;
    font-size: 22px;
    line-height: 30px;
    font-weight: bold;
    letter-spacing: 5px;
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.7s;
}

.price .old {
    text-decoration: line-through;
    color: #b3b3b3;
}

.cart {
    font-size: 12px;
    opacity: 0;
    letter-spacing: 1px;
    font-family: "Lato", sans-serif;
    transform: translateY(40px);
    transition: all 0.7s;
}

.cart i {
    font-size: 16px;
}

.cart span {
    margin-left: 10px;
}

.container:hover .overlay {
    opacity: 1;
}

.container:hover .overlay .head {
    transform: translateY(0px);
}

.container:hover .overlay hr {
    width: 75px;
    transition-delay: 0.4s;
}

.container:hover .overlay .price {
    transform: translateY(0px);
    transition-delay: 0.3s;
    opacity: 1;
}

.container:hover .overlay .cart {
    transform: translateY(0px);
    transition-delay: 0.6s;
    opacity: 1;
}
</style>
