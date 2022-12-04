<template>
    <div class="koala-card">
        <div class="img">
            <!-- <img src="../../assets/images/support/koala1.jpg" /> -->
            <img :src="require(`@/assets/images/support/${kCover}`)" />
        </div>
        <div class="wave end"></div>
        <div class="wave middle"></div>
        <div class="wave front"></div>
        <div class="content">
            <h3>{{ kName }}</h3>
            <h4>成年</h4>
            <div class="tag-wrapper">
                <p class="tag">#{{ kSex }}</p>
                <p class="tag">#4歲</p>
            </div>
            <router-link :to="`/support/${kName}`" class="btn-secondary">
                資助 / 認養
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ["kName", "kSex", "kDOB", "kCover"],
};
</script>

<style lang="scss" scoped>
$card-w: 270px;
$card-b-radius: 10px;
$img-h: 300px;

.koala-card {
    width: $card-w;
    margin: 0 15px;
    border-radius: $card-b-radius;
    box-shadow: 0 2px 30px rgba(black, 0.2);
    overflow: hidden;
    position: relative;

    .img {
        height: $img-h;
        position: relative;

        img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            object-fit: contain;
        }
    }

    .wave {
        background: $btn-color;
        opacity: 0.8;
        position: absolute;
        left: 50%;
        width: 500px;
        height: 500px;
        margin-left: -250px;
        margin-top: -50px;
        transform-origin: 50% 48%;
        border-radius: 43%;
        animation: drift 5000ms infinite linear;
    }

    .wave.middle {
        background: $section-green;
        opacity: 0.8;
        animation: drift 9000ms infinite linear;
    }

    .wave.front {
        background: white;
        opacity: 1;
        animation: drift 7000ms infinite linear;
    }

    .content {
        width: 100%;
        box-sizing: border-box;
        padding: 0 30px;
        margin-top: 0;
        position: relative;

        h4 {
            color: lighten($font_color, 30%);
        }

        .tag-wrapper {
            display: flex;
            justify-content: center;
            color: lighten($font_color, 30%);

            .tag {
                width: 30%;
            }
        }

        .btn-secondary {
            $btn-h: 50px;
            display: block;
            margin: 20px auto;
            @include size(100%, $btn-h);
            line-height: $btn-h;
            &:hover {
                text-decoration: none;
            }
        }
    }
}

@keyframes drift {
    from {
        transform: rotate(0deg);
    }

    from {
        transform: rotate(360deg);
    }
}
</style>
