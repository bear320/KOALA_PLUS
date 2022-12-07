import { createStore } from "vuex";

export default createStore({
    state: {
        cart: [],
    },
    getters: {
        // 獲取購物車數量
        cartNumber(state) {
            return state.cart.length;
        },
    },
    mutations: {
        //取得購物車內容
        getCart(state, payload) {
            state.cart = payload;
        },
        // 加入購物車
        addToCart(state, payload) {
            state.cart.push(payload);
            const jsonCart = JSON.stringify(state.cart);
            localStorage.setItem("cart", jsonCart);
        },
        updateItemQuantity(state, payload) {
            state.cart[payload.index].quantity = payload.quantity;
            const jsonCart = JSON.stringify(state.cart);
            localStorage.setItem("cart", jsonCart);
        },
        deleteCartItem(state, payload) {
            let itemIndex = state.cart.findIndex((item) => {
                return item.id === payload;
            });
            state.cart.splice(itemIndex, 1);
            const jsonCart = JSON.stringify(state.cart);
            localStorage.setItem("cart", jsonCart);
        },
    },
    actions: {},
    modules: {},
});
