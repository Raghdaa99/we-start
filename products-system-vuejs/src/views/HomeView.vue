<template>

  <div class="landing">
    <div class="container">
      <div class="content-text" data-aos="zoom-in" data-aos-duration="2000">
        <h3>BEST ITEM THIS SEASON</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio,
          rem! sit amet consectetur adipisicing
          rem! sit amet consectetur adipisicing
          elit. </p>
        <button>PURCHACE NOW</button>
      </div>
    </div>

  </div>

  <div class="shop-with">
    <h2>Why Shop With Us ?</h2>
    <div class="container">
      <div class="box">
        <i class="fa-solid fa-truck-fast"></i>
        <h3>Fast Delivery</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
      </div>
      <div class="box">
        <i class="fa-sharp fa-solid fa-credit-card"></i>
        <h3>Free Shiping</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
      </div>
      <div class="box">
        <i class="fa-solid fa-award"></i>
        <h3>Best Quality</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
      </div>
    </div>
  </div>

  <div class="arrive">
    <div class="container">
      <div class="image">
        <img src="../assets/arrival-bg.png" alt="">
      </div>
      <div class="text">
        <h2>New Arrivals</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quibusdam nesciunt quae optio numquam
          officiis repudiandae non incidunt ex quas, aliquam laudantium dolores recusandae labore, fugiat, consequatur
          tempora id eveniet nobis porro suscipit sit saepe fugit libero! Consequatur iure aliquam alias atque,
          assumenda, illum et dolorum ipsam exercitationem quam ut!</p>
        <button>Shop Now</button>
      </div>
    </div>
  </div>
  <div class="featured-products">
    
    <div class="container">
      <div class="section-title">
      <h2 class="main-title">Features</h2>
      <h3 class="second-title">- Features Products</h3>
    </div>
      <div class="content">
        <div class="products-items">
          <div class="wrapper">

            <ProductItem v-for="(product, index) in products" :product="product">
            </ProductItem>
          </div>
        </div>

        <a>View More <i class="fas fa-arrow-right"></i></a>
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
      products: products.slice(0, 6)
    }
  },
}


AOS.init();

</script>

<style scoped>
.landing {
  background-image: url(../assets/slider-bg.jpg);
  background-size: cover;
  /* background-position: center; */
  height: 100vh;
  position: relative;
  width: 100%;
 
}

.landing .content-text {
  position: absolute;
  top: 70px;
  /* left: 0; */
  max-width: 400px;
}
@media (max-width: 767px) {
    .landing .content-text {
        max-width: 100%;
    }

    /* .intro .text .content {
        max-width: 100%;
    } */
}
.content-text h3 {
  color: var(--main-color);
  font-size: 40PX;
  font-weight: 800;
  border-bottom: 3px solid #444;
  width: fit-content;
  padding: 10px;
  margin: 0;
}

.content-text p {
  color: #555;
}

button {
  padding: 20px;
  background-color: var(--main-color);
  border: none;
  border-radius: 15px;
  cursor: pointer;
  color: #fff;
  font-weight: bold;
  transition: .3s;
}

button:hover {
  border: 2px solid var(--main-color);
  color: var(--main-color);
  background-color: #fff;
}

.shop-with {
  padding: 30px 0;

}

.shop-with .container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 25px;
}

.shop-with h2 {
  margin: 30px auto;
  width: fit-content;
  font-size: 30px;
}

.shop-with .box {
  padding: 30px;
  text-align: center;
  border: 3px solid #777;
  border-radius: 15px;
  background-color: rgb(246, 240, 240);
}

.box i {
  font-size: 35px;
}

.box h3 {
  margin: 20px 0 10px;
}

.arrive {

  margin-top: 30px;
  background-color: #d4ced0;

}

.arrive .container {
  display: flex;
  justify-content: center;
  align-items: center;

}

.arrive .image {
  width: 50%;
  height: 100%;
}

.arrive .text {
  width: 50%;
  padding: 50px 0;
}

@media(max-width: 767px) {
  .arrive .container {
  flex-direction: column;

}

.arrive .image {
  display: none;
}

.arrive .text {
  width: 100%;
}

}

.arrive .text h2 {
  font-size: 40px;
}

.arrive .image img {
  max-width: 100%;
  height: 100%;
}




.featured-products {
  padding: 20px 10px;
}

.featured-products .content {
  margin: 30px;
}

.section-title {
  position: relative;
  max-width: 300px;
  margin: 20px auto;
  text-align: center;
}

.main-title {
  color: #777;
  font-size: 100px;
  margin: 5px 20px 0;
  opacity: .3;
  text-transform: uppercase;
  letter-spacing: .5rem;
  width: 100%;
}

.second-title {
  position: absolute;
  top: 30%;
  left: 30px;
  font-size: 20px;
  text-transform: uppercase;
}
@media (max-width: 767px){
  .section-title {
    font-size: 15px;
  }
  .main-title{
    font-size: 50px;
  }
}
.wrapper {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
}

.content a {
  color: var(--main-color);
  font-weight: bold;
  cursor: pointer;
  margin-top: 20px;
  margin: 0 auto;
  display: block;
  width: fit-content;
}
</style>

