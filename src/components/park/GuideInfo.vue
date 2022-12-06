<template lang="">
    <div class="guide-card">
        <img :src="src" alt="" />
        <div class="container">
            <div class="overlay">
                <div class="items"></div>
                <div class="items head">
                    <h3>{{ title }}</h3>
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
};
</script>
<style lang="scss" scoped>
$hoverEasing: cubic-bezier(0.23, 1, 0.32, 1);
$returnEasing: cubic-bezier(0.445, 0.05, 0.55, 0.95);
.guide-card {
    position: relative;
    margin: 100px auto;
    width: 1100px;
    height: 530px;
    border: 10px;
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
.guide-card img {
    width: 100%;
    height: 100%;
    border-radius: 24px;
    margin: auto;
    object-fit: cover;
    object-position: center center;
}

.container {
    width: 1100px;
    height: 530px;
    position: absolute;
    border: 10px solid white;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    box-shadow: 0px 6.48045px 6.48045px rgba(0, 0, 0, 0.25);
    border-radius: 24px;
}

.overlay {
    width: 1078px;
    height: 510px;
    display: grid;
    margin: auto;
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
    letter-spacing: 3px;
    width: 80%;
    margin: auto;
}

.items p {
    font-size: 18px;
    line-height: 25px;
}

.head {
    font-size: 30px;
    line-height: 40px;
    transform: translateY(40px);
    transition: all 0.7s;
}

.price {
    font-size: 22px;
    line-height: 10px;
    font-weight: bold;
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.7s;
}

.price .old {
    text-decoration: line-through;
    color: #b3b3b3;
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
@media screen and (max-width: 1200px) {
    .guide-card {
        width: 1000px;
    }
    .guide-card img {
        width: 960px;
    }
    .container {
        width: 960px;
    }
    .overlay {
        width: 960px;
    }
}

@media screen and (max-width: 1024px) {
    .guide-card {
        width: 90%;
    }
    .guide-card img {
        width: 90%;
    }
    .container {
        width: 90%;
    }
    .overlay {
        width: 100%;
    }
}

@media screen and (max-width: 768px) {
    .guide-card {
        width: 90%;
    }
    .guide-card img {
        width: 90%;
    }
    .container {
        width: 90%;
    }
    .overlay {
        width: 100%;
    }
    .items p {
        font-size: 16px;
        line-height: 20px;
    }
}
</style>
