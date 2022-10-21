<template>

  <div class="landing">
    <div class="container">
      <div class="content-text" data-aos="zoom-in" data-aos-duration="2000">
        <h3>BEST ITEM THIS SEASON</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, rem! sit amet consectetur adipisicing
          elit. </p>
        <button>PURCHACE NOW</button>
      </div>
    </div>

  </div>

  <div class="featured-products">
    <div class="section-title">
      <h2 class="main-title">Features</h2>
      <h3 class="second-title">- Features Products</h3>
    </div>
    <!-- <div class="container"> -->
      <div class="content">
        <div class="products-items">
          <div class="wrapper">
            <ProductItem v-for="(product, index) in products" :key="index" :name="product.name"
              :price="product.price" :category="product.category.name" :img="product.img" :brands="product.brands">
            </ProductItem>
          </div>
        </div>
      </div>
    
  </div>
</template>

<script>
import ProductItem from '../components/ProductItem.vue';
import products from '../products.json';
import AOS from 'aos';
export default {
  components: {
    ProductItem,
  },
  data() {
    return {
      products
    }
  },
}


AOS.init();

</script>

<style scoped>
.landing {
  background-image: url(../assets/banner1.jpg);
  background-size: cover;
  background-position: center;
  height: 520px;
}

.landing .content-text {
  position: absolute;
  margin-top: 50px;
  width: 400px;
}

.content-text h3 {
  color: #777;
  font-size: 30PX;
  font-weight: 800;
  border-bottom: 3px solid #444;
  width: fit-content;
  padding: 10px;
}

.content-text p {
  color: #777;
}

.content-text button {
  padding: 10px 20px;
  background-color: #0070BF;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  color: #fff;
  font-weight: bold;

}

.content-text button:hover {
  opacity: .7;
  transition: .3s;
}

.featured-products {
  padding: 20px 10px;
}
.featured-products .content{ 
 margin: 30px;
}
.section-title {
  position: relative;

}

.main-title {
  color: #777;
  font-size: 100px;
  margin: 5px 20px 0;
  opacity: .3;
  text-transform: uppercase;
  letter-spacing: .5rem;
}

.second-title {
  position: absolute;
  top: 30%;
  left: 30px;
  font-size: 20px;
  text-transform: uppercase;
}
</style>

