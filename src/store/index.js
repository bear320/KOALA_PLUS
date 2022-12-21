import { createStore } from "vuex";

export default createStore({
    state: {
        cart: [],
        discount: {},
        // mem_id: 1001
        user: { mem_id: 1001 },
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
    },
    actions: {
        // 取得使用者的購物車資訊
        async getMemCart(context) {
            const res = await fetch(
                `http://localhost/cgd103_g1/public/api/getMemberCart.php?memId=${context.state.user.mem_id}`
            );
            const cartList = await res.json();
            context.commit("updateMemCart", cartList);
        },
        // 加入購物車
        async addToCart(context, payload) {
            const res = await fetch(
                "http://localhost/cgd103_g1/public/api/postAddCart.php",
                {
                    method: "POST",
                    body: new URLSearchParams(payload),
                }
            );
            context.dispatch("getMemCart");
        },

        // 刪除購物車項目
        async deleteCartItem(context, payload) {
            const res = await fetch(
                "http://localhost/cgd103_g1/public/api/postMemberCartItem.php",
                {
                    method: "POST",
                    body: new URLSearchParams(payload),
                }
            );
            context.dispatch("getMemCart");
        },
    },
    modules: {},
});
