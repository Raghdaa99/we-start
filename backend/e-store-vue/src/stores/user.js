import {defineStore} from "pinia";

export const useStore = defineStore({
    id: 'store',
    state: () => ({
        user: {
            data: {},
        },
        cartItems: []
    }),
    getters : {
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
        setUser(data) {
            this.user.data = data.user
            this.user.token = data.token
        },
        logout(){
            this.user.data = {};
            this.user.token = null;
            sessionStorage.removeItem('TOKEN');
        },
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

    },
    persist: true,
})
