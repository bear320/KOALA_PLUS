import { createStore } from "vuex";
import { BASE_URL } from "@/assets/js/common.js";

export default createStore({
    state: {
        cart: [],
        discount: {},
        // mem_id: 1001
        user: null,
    },
    getters: {
        productTotal(state) {
            return state.cart.reduce(
                (sum, item) => (sum += item.prod_price * item.cart_qty),
                0
            );
        },
        totalDiscount(state, getters) {
            return Object.keys(state.discount).length > 0
                ? getters.productTotal -
                      getters.productTotal * state.discount.coupon_discount
                : 0;
        },
        payTotal(_, getters) {
            return getters.productTotal - getters.totalDiscount;
        },
        getCoin(_, getters) {
            return getters.productTotal / 10;
        },
    },
    mutations: {
        // 更新使用者的購物車狀態
        updateMemCart(state, payload) {
            state.cart = payload;
        },

        // 更新使用者
        updateMemInfo(state, payload) {
            state.user = {
                mem_id: payload?.mem_id,
                mem_mob: payload?.mem_mob,
                mem_add: payload?.mem_add,
            };
        },

        // 登出使用者
        logoutMember(state) {
            state.user = null;
            state.cart = [];
            state.discount = {};
        },
    },
    actions: {
        /* 會員 */
        async memLogin(context, payload) {
            try {
                const res = await fetch(`${BASE_URL}/getConfirmMember.php`, {
                    method: "post",
                    credentials: "include",
                    body: new URLSearchParams(payload),
                });

                const result = await res.json();
                if (result.code == 1) {
                    context.commit("updateMemInfo", result.memInfo);
                } else {
                    throw new Error("帳號或密碼錯誤");
                }
            } catch (error) {
                console.log(error);
            }
        },

        async getMem(context) {
            const res = await fetch(`${BASE_URL}/getMember.php?type=front`, {
                credentials: "include",
            });

            const result = await res.json();
            if (result.status == 10010) return;
            context.commit("updateMemInfo", result.list);
            context.dispatch("getMemCart");
        },

        // 取得使用者的購物車資訊
        async getMemCart(context) {
            const res = await fetch(
                `${BASE_URL}/getMemberCart.php?memId=${context.state.user?.mem_id}`
            );
            const cartList = await res.json();
            context.commit("updateMemCart", cartList);
        },
        // 加入購物車
        async addToCart(context, payload) {
            const res = await fetch(`${BASE_URL}/postAddCart.php`, {
                method: "POST",
                body: new URLSearchParams(payload),
            });
            context.dispatch("getMemCart");
        },

        // 刪除購物車項目
        async deleteCartItem(context, payload) {
            const res = await fetch(`${BASE_URL}/postMemberCartItem.php`, {
                method: "POST",
                body: new URLSearchParams(payload),
            });
            context.dispatch("getMemCart");
        },
    },
    modules: {},
});
