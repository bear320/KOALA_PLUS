<template>
    <section class="modal">
        <div class="successModal">
            <div class="modal-wrapper">
                <div class="successAnimation">
                    <svg
                        class="checkmark success"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 52 52"
                    >
                        <circle
                            class="checkmark_circle_success"
                            cx="26"
                            cy="26"
                            r="25"
                            fill="none"
                        />
                        <path
                            class="checkmark_check"
                            fill="none"
                            d="M14.1 27.2l7.1 7.2 16.7-16.8"
                            stroke-linecap="round"
                        />
                    </svg>
                </div>
                <div class="text">
                    <h2>付款成功</h2>
                </div>
                <div class="btn">
                    <router-link to="/home" class="/btn-paramy">
                        <h4>前往首頁</h4>
                    </router-link>
                    <router-link to="/member" class="/btn-paramy">
                        <h4>查看訂單</h4>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
$modal-size: 275px;
$loader-size: 100px;
$success-size: 80px;

.modal {
    width: 100%;
    height: 100%;
    background-color: #0005;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.2);

    .successModal {
        .modal-wrapper {
            width: $modal-size;
            height: $modal-size;
            border-radius: 10px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 20px;

            .successAnimation {
                .checkmark_circle_success {
                    stroke-dasharray: 166;
                    stroke-dashoffset: 166;
                    stroke-width: 5px;
                    stroke-miterlimit: 10;
                    stroke: $green;
                    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1)
                        forwards;
                }
                .checkmark {
                    width: $success-size;
                    height: $success-size;
                    border-radius: 50%;
                    display: block;
                    stroke-width: 5px;
                    stroke: #fff;
                    stroke-miterlimit: 10;
                    margin: 10% auto;
                }
                .checkmark.success {
                    box-shadow: inset 0px 0px 0px $green;
                    animation: fillsuccess 0.4s ease-in-out 0.4s forwards,
                        scale 0.3s ease-in-out 0.9s both;
                }
                .checkmark_check {
                    transform-origin: 50% 50%;
                    stroke-dasharray: 48;
                    stroke-dashoffset: 48;
                    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.9s
                        forwards;
                }
                .progress {
                    transform: rotate(-90deg);
                    stroke: black;
                }
                .progress circle {
                    stroke-dasharray: 130;
                    stroke-dashoffset: 130;
                    animation: dash 1.5s infinite;
                }
                @keyframes dash {
                    50% {
                        stroke-dashoffset: 0;
                    }
                    100% {
                        stroke-dashoffset: -130;
                    }
                }
                .progress {
                    position: absolute;
                    top: 5%;
                    left: 5%;
                }
                .progress.progress--thin {
                    left: auto;
                    right: 5%;
                }
                @keyframes stroke {
                    100% {
                        stroke-dashoffset: 0;
                    }
                }
                @keyframes scale {
                    0%,
                    100% {
                        transform: none;
                    }
                    50% {
                        transform: scale3d(1.1, 1.1, 1);
                    }
                }
                @keyframes fillsuccess {
                    100% {
                        box-shadow: inset 0px 0px 0px 75px $green;
                    }
                }
            }
            .btn {
                display: flex;
                justify-content: center;
                align-items: center;
                column-gap: 10px;
                a {
                    h4 {
                        padding: 5px 15px;
                        border-radius: 10px;
                        border: 1px solid $green;
                    }
                    // &:nth-child(2) {
                    //     h4 {
                    //         color: #fff;
                    //         background-color: $green;
                    //     }
                    // }
                }
            }
        }
    }
}
</style>
