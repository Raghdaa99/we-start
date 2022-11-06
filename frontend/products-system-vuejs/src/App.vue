<script>
import { RouterLink, RouterView } from "vue-router";
import cartStore from './stores/cart.js';

export default{
    data() {
        return {
            carts: [],
        }
    },
    mounted() {
        const cart = cartStore();
        this.carts = cart.getItems;
    },
}
</script>

<template>

    <header>
        <nav>
            <div class="logo">
                <router-link to="/"><span>E</span>-Commerce</router-link>
            </div>
            <ul class="menu">
                <li>
                    <router-link to="/">Home</router-link>
                </li>
                <li>
                    <router-link to="/products">Products</router-link>
                </li>
                <li>
                    <router-link to="/about">About</router-link>
                </li>
                <li>
                    <router-link to="/contact">Contact</router-link>
                </li>
            </ul>

            <div class="cart-search">
                <input type="text" value="" placeholder="Search...">
                <router-link to="/cart" class="shopping-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="count-cart">
                        <i>{{ carts.length }}</i>
                    </span>
                </router-link>
            </div>
        </nav>
    </header>

    <main>
        <RouterView />
    </main>

    <div class="footer">
        <div class="container">
            <div class="box">
                <h3>E-Commerce</h3>
                <ul class="social">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <p class="text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus nulla rem, dignissimos iste
                    aspernatur
                </p>
            </div>
            <div class="box">
                <ul class="links">
                    <li><a href="#">Home Services</a></li>
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="box">
                <div class="line">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <div class="info">Palestine , Gaza , Jabalia</div>
                </div>
                <div class="line">
                    <i class="far fa-clock fa-fw"></i>
                    <div class="info">Business Hours: From 10:00am To 3:00pm</div>
                </div>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">
                        <span>+5295265999</span>
                        <span>+2588255565</span>
                    </div>
                </div>
            </div>
        </div>
        <p class="copyright">&copy; 2022 <span>Raghdaa</span> All Right Reserved</p>
    </div>

</template>

<style scoped>
.menu li a.router-link-exact-active {
    color: var(--main-color);
}

.menu li a.router-link-exact-active:hover {
    background-color: transparent;
}



.footer {
    background-color: #191919;
    padding: 70px 0 0;
    margin-top: 50px;
}

@media (max-width: 767px) {
    .footer {
        text-align: center;
    }
}

.footer .container {
    display: flex;
    justify-content: space-between;
}

.footer .box {
    width: 32%;
}

@media (max-width: 767px) {
    .footer .container {
        flex-direction: column;
    }

    .footer .box {
        width: 100%;
    }
}

.footer .box h3 {
    color: white;
    font-size: 50px;
    margin: 0 0 20px;
}

.footer .box .social {
    display: flex;
}

@media (max-width: 767px) {
    .footer .box .social {
        justify-content: center;
    }
}

.footer .box .social li {
    margin-right: 10px;
}

.footer .box .social li a {
    background-color: #313131;
    color: #b9b9b9;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    font-size: 20px;
    transition: .3s;
}

.footer .box .social .facebook:hover {
    background-color: #1877f2;
}

.footer .box .social .twitter:hover {
    background-color: #1da1f2;
}

.footer .box .social .youtube:hover {
    background-color: #ff0000;
}

.footer .box .text {
    line-height: 2;
    color: #b9b9b9;
}

.footer .box .links li {
    padding: 15px 0;
    transition: .3s;
}

.footer .box .links li:not(:last-child) {
    border-bottom: 1px solid #444;
}

.footer .box .links li:hover {
    padding-left: 10px;
}

.footer .box .links li:hover a {
    color: white;
}

.footer .box .links li a {
    color: #b9b9b9;
    transition: .3s;
}


.footer .box .line {
    display: flex;
    align-items: center;
    color: #b9b9b9;
    margin-bottom: 30px;
}

@media (max-width: 767px) {
    .footer .box .line {
        flex-direction: column;
    }
}

.footer .box .line i {
    font-size: 25px;
    color: #1da1f2;
    margin-right: 10px;
}

@media (max-width: 767px) {
    .footer .box .line i {
        margin-right: 0;
        margin-bottom: 15px;
    }
}

.footer .box .line .info {
    line-height: 1.7;
    flex: 1;
}

.footer .box .line .info span {
    display: block;
}

.footer .copyright {
    padding: 25px 0;
    text-align: center;
    color: white;
    margin: 50px 0 0;
    border-top: 1px solid #444;
}

/* End Footer */
</style>
