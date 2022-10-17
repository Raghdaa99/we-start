const { createApp } = Vue;
let products = [
    { name: "Product Name 1", price: 20 },
    { name: "Product Name 2", price: 22 },
    { name: "Product Name 3", price: 25 },
    { name: "Product Name 4", price: 30 },
]
let product = {
    template: `
    <div class="box">
        <h3> {{ name }}</h3>
        <p>{{ price }}$ - {{ price * quantity }}$</p>
        <input type="number" v-model="quantity" >
        <button @click="addToCart(index,quantity)">Add to Cart</button>
    </div>
`,
    data() {
        return {
            quantity: 1,
        }
    },
    methods: {
        addToCart(index, quantity) {
            this.$emit('add', index, quantity)
        }
    },
    props: ['index', 'name', 'price'],
}


const app = createApp({
    components: {
        product
    },
    data() {
        return {
            products: products,
            carts: []
        }
    },
    methods: {
        addNewItem(index, quantity) {
            console.log(index);
            let cart = {
                index: index,
                name: products[index].name,
                price: products[index].price,
                quantity: quantity,
            }
            const i = this.carts.findIndex(el => el.index === cart.index);
            if (i > -1) {
                this.carts[i].quantity += quantity;
            } else {
                this.carts.push(cart);
            }

        },
        deleteItem(index) {
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
                    this.carts.splice(index, 1);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
        
    },computed: {
        getTotal() {
           let total = 0;
            this.carts.forEach(element => {
                total += element.quantity * element.price;
            });
            return total;
        }
    },
})

app.mount('#app');