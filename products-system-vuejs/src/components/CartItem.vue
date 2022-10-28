<template>

    <td>
        <div class="product-name">
            <img :src="cart.product_img" alt="">
            <span>{{ cart.product_name }}</span>
        </div>
    </td>
    <td>${{ cart.product_price }}</td>


    <td>
        <div class="form-group-number">
            <button class="minus" @click="minus"><span>-</span></button>
            <span>{{ quantity }}</span>
            <button class="plus" @click="plus"><span>+</span></button>
        </div>
    </td>
    <td>${{ cart.product_price * quantity }}</td>
    <td>
        <button @click="deleteItem"><i class="fas fa-trash"></i></button>
    </td>


</template>

<script>
import cartStore from '../stores/cart.js'

export default {
    name: 'CartItem',
    props: ['cart'],
    data() {
        return {
            quantity: this.cart.quantity
        }
    },
    methods: {
        minus() {
            if (this.quantity > 1) {
                this.quantity--;
                const cartStor = cartStore();
                cartStor.updateQuantity(this.cart, false);
            }

        },
        plus() {
            this.quantity++;
            const cartStor = cartStore();
            cartStor.updateQuantity(this.cart, true);
        },
        deleteItem() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const cartStor = cartStore();
                    cartStor.deleteItem(this.cart);
                    Swal.fire(
                        'Deleted!',
                        'Product has been deleted.',
                        'success'
                    )
                }
            })

        }
    }
}
</script>

<style >
td {
    padding: 5px;
    text-align: center;
    border-bottom: 2px solid #dfdfdf;
}

.product-name {
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-name img {
    width: 120px;
    height: 120px;
    margin-right: 10px;
}

tr td:last-child button {
    background-color: transparent;
    border: none;
    color: indianred;
    font-size: 20px;
    cursor: pointer;
}

.form-group-number {
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-group-number button {
    height: 40px;
    width: 40px;
    border: none;
    background-color: rgb(64, 63, 63);
    color: #fff;
    font-size: 20px;
    cursor: pointer;

}

.form-group-number span:nth-child(2) {
    background-color: #dfdfdf;
    width: 130px;
    height: 40px;
    text-align: center;
    font-size: 18px;
}
</style>