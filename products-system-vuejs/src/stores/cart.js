import { defineStore } from 'pinia';

const cartStore = defineStore({
    id: 'cart',
    state: () => ({
        cartItems: []
    }),
    getters: {
        getItems: (state) => state.cartItems,
        getTotal() {
            let total = 0;
            this.cartItems.forEach(cart => {
                total += cart.quantity * cart.product_price;
            });
            return total;
        }
    },
    actions: {
        addItem(cart) {
            const i = this.cartItems.findIndex(el => el.product_id === cart.product_id);
            if (i > -1) {
                this.cartItems[i].quantity += cart.quantity;
            } else {
                this.cartItems.push(cart);
            }
        },
        deleteItem(cart) {
            const index = this.cartItems.findIndex(el => el.product_id === cart.product_id);
            this.cartItems.splice(index, 1);
        },
        updateQuantity(cart, plus = false) {
            const index = this.cartItems.findIndex(el => el.product_id === cart.product_id);
            plus === true ? this.cartItems[index].quantity++ : this.cartItems[index].quantity--;

        }
    }
})
export default cartStore

