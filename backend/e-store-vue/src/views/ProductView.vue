<script setup>
import { ref, onMounted} from 'vue'; 
import {useStore} from "../stores/user";
import { useRoute } from 'vue-router';

let product = ref({});
let route = useRoute();
const userStore = useStore();
const active_el = ref(0);
const main_img = ref("");

onMounted(e =>{
    getProduct()
})

const getProduct = ()=>{
    axios.get(`product/${route.params.slug}`)
    .then((res)=>{
        console.log(res.data.data);
        product.value = res.data.data;

    })
    .catch();
}
const activate = (i, path) => {
  active_el.value = i;
  main_img.value = path;
};

const cart = ref({
  product_id: null,
  quantity: 1,
  color: null,
  size: null,
});

const minus = () => {
    if (cart.value.quantity > 1) {
        cart.value.quantity--;
    }

}
const plus = () => {
    if(product.value.quantity > cart.value.quantity ){
        cart.value.quantity++;
    }
}

const addToCart = () =>{
// userStore.addToCart(product.id,cart.value.quantity);
toastr.success("Product added to cart")
}

</script>

<template>
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Product</p>
    </div>
    <!-- ./breadcrumb -->
<!-- {{ product }} -->
    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <img :src="main_img ? main_img : product.image" :alt="product.name" class="w-full main-image">
            <div class="grid grid-cols-5 gap-4 mt-4 gallery">
                <!-- <img :src="product.image" alt="product2"
                    class="w-full cursor-pointer"
                    :class="{ 'border-primary': active_el == -1 }" @click="activate(-1, product.image)" /> -->
                    <img
                    v-for="(img, i) in product.gallery"
                    :key="i"
                    :src="img.path"
                    :alt="product.name"
                    class="w-full cursor-pointer border"
                    :class="{ 'border-primary': active_el == i }"
                    @click="activate(i, img.path)"
                    />
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ product.name }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                    <span><i class="fa-solid fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Availability: </span>
            <span v-if="product.quantity > 0" class="text-green-600">In Stock</span>
     
            <span v-else class="text-red-600">Out Of Stock</span>
        
                </p>
                
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600">{{  product.category ? product.category.name : ""}}</span>
                </p>
                
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                        <template v-if="product.coupons">
                            <p class="text-xl text-primary font-semibold">
                                ${{ product.final_price }}
                            </p>
                            <p class="text-sm text-gray-400 line-through">${{ product.price }}</p>
                        </template>
                        <template v-else>
                            <p class="text-xl text-primary font-semibold">${{ product.price }}</p>
                        </template>
            </div>

            <p class="mt-4 text-gray-600">{{ product.short }}</p>

            <div class="pt-4" v-if="product.variations && product.variations.sizes.length > 0">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Size</h3>
                <div class="flex items-center gap-2">
                    <div class="size-selector" v-for="size in product.variations.sizes" :key="size.id">
                        <input type="radio" name="size" :id="'size-' + size.id" class="hidden" :value="size.id" v-model="cart.size" />
                        <label :for="'size-' + size.id"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">{{
                            size.value }}</label>
                    </div>
                
                </div>
            </div>

            <div class="pt-4"  v-if="product.variations && product.variations.colors.length > 0">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
                <div class="flex items-center gap-2">
                    <div class="color-selector" v-for="color in product.variations.colors" :key="color.id">
                        <input type="radio" name="color" :id="'color-' + color.id" class="hidden" :value="color.id" v-model="cart.color" />
                        <label :for="'color-' + color.id" class="border border-gray-200 rounded-sm h-6 w-6 cursor-pointer shadow-sm block"
                            :style="'background-color: ' + color.value"></label>
                    </div>
                   

                </div>
            </div>

            <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div @click="minus" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">{{ cart.quantity }}</div>
                    <div @click="plus" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <button @click="addToCart"
                    class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                    <i class="fa-solid fa-bag-shopping"></i> Add to cart
                </button>
                <a href="#"
                    class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                    <i class="fa-solid fa-heart"></i> Wishlist
                </a>
            </div>

            <div class="flex gap-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product details</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus deleniti natus
                    dolore cum maiores suscipit optio itaque voluptatibus veritatis tempora iste facilis non aut
                    sapiente dolor quisquam, ex ab.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, quae accusantium voluptatem
                    blanditiis sapiente voluptatum. Autem ab, dolorum assumenda earum veniam eius illo fugiat possimus
                    illum dolor totam, ducimus excepturi.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quia modi ut expedita! Iure molestiae
                    labore cumque nobis quasi fuga, quibusdam rem? Temporibus consectetur corrupti rerum veritatis
                    numquam labore amet.</p>
            </div>

            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Color</th>
                    <th class="py-2 px-4 border border-gray-300 ">Blank, Brown, Red</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Material</th>
                    <th class="py-2 px-4 border border-gray-300 ">Latex</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                    <th class="py-2 px-4 border border-gray-300 ">55kg</th>
                </tr>
            </table>
        </div>
    </div>
    <!-- ./description -->

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Related products</h2>
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                            Chair</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product4.jpg" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                            King Size</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product2.jpg" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Couple Sofa</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
            <div class="bg-white shadow rounded overflow-hidden group">
                <div class="relative">
                    <img src="../assets/images/products/product3.jpg" alt="product 1" class="w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="view product">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        <a href="#"
                            class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                            title="add to wishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="pt-4 pb-3 px-4">
                    <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Mattrass X</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">$45.00</p>
                        <p class="text-sm text-gray-400 line-through">$55.90</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <a href="#"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                    to cart</a>
            </div>
        </div>
    </div>
    <!-- ./related product -->
</template>

<style scoped>
.main-image {
  height: 300px;
  object-fit: contain;
}
.gallery img {
  height: 80px;
  padding: 5px;
  object-fit: contain;
}
</style>