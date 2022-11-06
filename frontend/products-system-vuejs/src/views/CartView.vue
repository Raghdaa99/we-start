<template>
    <div class="shopping-cart">
        <div class="container">
            <h2>Shopping Cart</h2>
            <div class="cart-wrapper" style="overflow-x:auto;">
                <table>
                    <thead>
                        <th>All Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </thead>
                    <tbody v-if="carts.length > 0">
                        <tr v-for="cart in carts">
                            <CartItem :cart="cart"></CartItem>
                        </tr>

                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="5">
                                <img src="../assets/cart_empty.png" alt="" srcset="" />
                                <h3>Oops...</h3>
                                <p>Your Cart is Empty</p>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="total-price">
                <div class="total-text">
                    <span>TOTAL PRICE:</span>
                    <span>{{ getTotal }}$</span>
                </div>
                <button>Process To Checkout</button>
            </div>
        </div>
    </div>
</template>

<script>
import cartStore from '../stores/cart.js'
import CartItem from '../components/CartItem.vue'
export default {
    components: {
        CartItem
    },
    data() {
        return {
            CartItem,
            carts: [],
            total: 0
        }
    },
    mounted() {
        const cart = cartStore();
        this.carts = cart.getItems;
        this.total = cart.getTotal;
        // console.log(cart.getItems);

    }, computed: {
        getTotal() {
            const cart = cartStore();
            return cart.getTotal;
        }
    },
}
</script>

<style >
.shopping-cart h2 {
    width: fit-content;
    margin: 20px auto;

}

.shopping-cart .cart-wrapper table {
    width: 100%;
    box-shadow: 2px 2px 10px #dfdfdf;

}

.cart-wrapper table th,
.cart-wrapper table td {
    padding: 5px;
    text-align: center;
    border-bottom: 2px solid #dfdfdf;
}

.cart-wrapper table th {
    font-size: 20px;
    font-weight: bold;
    color: #666;
    background-color: #dfdfdf;
}


.total-price {
    margin-top: 50px;
    padding: 20px 40px;
    border: 2px solid #dfdfdf;
    width: fit-content;
    border-radius: 20px;
    color: #333;
    font-size: 18px;
    box-shadow: 2px 2px 15px #dfdfdf;
}

.total-price .total-text {
    display: flex;
    justify-content: space-between;
}

.total-price button {
    padding: 15px 20px;
    background-color: var(--main-color);
    border: none;
    border-radius: 15px;
    cursor: pointer;
    color: #fff;
    font-weight: bold;
    transition: .3s;
    margin-top: 13px;
}

.total-price button:hover {
    border: 2px solid var(--main-color);
    color: var(--main-color);
    background-color: #fff;
}
</style>