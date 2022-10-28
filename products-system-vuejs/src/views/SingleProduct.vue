<template>

    <div class="product">
        <div class="container">
            <div class="image">
                <img :src="product.img" alt="">
            </div>
            <div class="info">
                <div class="rate-reviews">
                    <div class="rate">
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="filled fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>Write Review</p>
                </div>

                <h2>{{ product.name }}</h2>
                <p class="brands"> Brands :
                    {{ getBrandsNames() }}
                </p>
                <h3>${{ product.price }}</h3>
                <div class="desc">
                    <h3>Description</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolore unde exercitationem
                        aliquam suscipit maiores.
                    </p>
                </div>

                <div class="form">
                    <div class="input-form">
                        <label for="quantity"> Enter quantity</label>
                        <input type="number" name="quantity" min="1" id="quantity" v-model="quantity">
                    </div>
                    <div class="actions">
                        <button @click="addToCart">Add To Cart
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        <a>
                            <i class="fas fa-heart"></i>
                        </a>
                        <a>
                            <i class="fas fa-share-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import products from '../products.json';
import cartStore from '../stores/cart.js'

export default {
    data() {
        return {
            product: products.find((prod) => prod.id == this.$route.params.id),
            quantity: 1
        }
    },
    methods: {
        getBrandsNames() {
            let brandsnames = [];
            this.product.brands.forEach(brand => {
                brandsnames.push(brand.name);
            });

            return brandsnames.join(', ');
        },
        addToCart() {
            const item = {
                product_id: this.product.id,
                product_name: this.product.name,
                product_img: this.product.img,
                product_price: this.product.price,
                quantity: this.quantity,
            }
            const carts = cartStore();
            carts.addItem(item);
            Swal.fire({
                title: "Good job!",
                text: "Add To Cart!",
                icon: "success",
            });
        }
    }
}
</script>

<style scoped>
.product {
    margin: 100px 0;
}

.product .container {
    display: flex;
    gap: 30px;
}

.product .image {
    width: 50%;
    overflow: hidden;
}

.product .image img {
    width: 100%;
    height: 100%;
    border-radius: 10px;

}

.product .info {
    margin-right: 50px;
    width: 35%;
}

@media (max-width: 767px) {
    .product .container {
        flex-direction: column;
    }

    .product .image {
        width: 100%;

    }

    .product .info {
        width: 100%;
    }
}

.product .info h2 {
    margin: 0;
    font-family: "Archivo Narrow", sans-serif;
    font-size: 30px;
    font-weight: 700;
    color: #313131;
    text-transform: uppercase;

}

.product .info p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

.product .info h3 {
    margin: 0;
    font-size: 25px;
    color: #555;
    font-weight: 400;
    text-transform: uppercase;
}

.rate-reviews {
    display: flex;
    justify-content: space-between;
}

.rate-reviews p {
    cursor: pointer;
    font-weight: bold;
}

.info .rate {
    color: #EDB867;
    margin-bottom: 20px;
}

.info .desc {
    margin-top: 10px;
    border-top: 2px solid #dddada;
}

.info .desc p {
    line-height: 1.5rem;
    color: #333;
    font-size: 15px;
}

.info .form {
    margin-top: 20px;
    border-top: 2px solid #dddada;
    padding: 20px 0;
}

.input-form label {
    margin-right: 10px;
}

.input-form input {
    border-radius: 20px;
    padding: 8px;
    background-color: #dfdfdf;
    border: none;
}

.actions {
    margin-top: 30px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.actions button {
    padding: 15px 25px;
    border-radius: 20px;
    border: none;
    font-size: 20px;
    background-color: var(--main-color);
    color: #fff;
    cursor: pointer;
    transition: .3s;
}

.actions button:hover {
    background-color: #fff;
    color: var(--main-color);
    border: 2px solid var(--main-color);

}

.actions a {
    margin-left: 12px;
    font-size: 20px;
    background-color: #dfdfdf;
    padding: 10px 15px;
    border-radius: 50%;
    cursor: pointer;
    color: #555;
    transition: .3s;
}

.actions a:hover {
    background-color: #fff;
    color: var(--main-color);
    border: 2px solid var(--main-color);
}
</style>