<template>
    <div class="card">
        <!-- <a href="#"><img :src="img" alt=""></a> -->
        <router-link :to="{ name: 'singleProduct', params: { id: product.id } }">
            <img :src="product.img" alt="">
        </router-link>
        <div class="content">
            <div class="content-text">
                <h2>
                    <router-link :to="{ name: 'singleProduct', params: { id: product.id } }">{{ product.name }}
                    </router-link>

                </h2>
                <span>{{ product.price }}$</span>
            </div>
            <div class="category-cart">
                <span>Category : {{ product.category.name }}</span>
                <i @click="addToCart" class="fas fa-shopping-cart"></i>
            </div>
            <div class="brands"> Brands :
                {{ getBrandsNames() }}
            </div>
        </div>
    </div>




</template>
<script>
import cartStore from '../stores/cart.js'
export default {
    name: 'ProductItem',
    // props: ['id','name', 'price', 'category', 'img', 'brands'],
    props: ['product'],
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
                quantity: 1,
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
@media (max-width:767px) {
    .card {
        width: 100%;
    }
}

.card .content {
    padding: 8px;
    color: #000;

}

.card .content .content-text {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card .content h2 {
    margin: 0;
    font-size: 15px;
}

.card .content span {
    color: #888;
}

.card .content .content-text span {
    color: #444;
    font-weight: 600;
}

.brands {
    font-size: 13px;

}

.brands span {
    /* background-color: aqua; */
    color: #888;
    margin-right: 3px;
    /* padding: 5px;
    border-radius: 8px; */
}

.category-cart {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0;
}

.category-cart i {
    color: var(--main-color);
    cursor: pointer;
}
</style>