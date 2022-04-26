// vuex store
import axios from "axios/index";

export default {
    modules: {},
    state() {
        return {
            products: [],
            cart: [],
            order: {},
        };
    },
    mutations: {
        updateProducts(state, products) {
            state.products = products;
        },
        addToCart(state, product) {
            // get current id of item in cart
            let productIdInCartIndex = state.cart.findIndex(
                (item) => item.slug === product.slug
            );
            // check if product if exists in cart and add quantity
            if (productIdInCartIndex !== -1) {
                state.cart[productIdInCartIndex].quantity++;
                return;
            }
            product.quantity = 1;

            state.cart.push(product);
        },

        removeFromCart(state, store) {
            state.cart.splice(store, 1);
        },
        updateOrder(state, order) {
            state.order = order;
        },
        updateCart(state, cart) {
            state.cart = cart;
        },
    },
    actions: {
        getProducts({commit}) {
            //fetch the product from the api api/products
            //TODO: update catch error with something better for customer
            axios
                .get("/api/products")
                .then((response) => {
                    commit("updateProducts", response.data);
                })
                .catch((error) => console.log(error));
        },
        // clear/empty out the cart
        clearCart({commit}) {
            commit("updateCart", []);
        },
    },
};
