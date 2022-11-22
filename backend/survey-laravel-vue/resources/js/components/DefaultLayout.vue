<template>
    <div>

        <header>
            <nav>
                <div class="logo">
                    <a href="#"><span>Surveys</span></a>
                </div>
                <ul class="menu">
                    <li>
                        <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'Surveys' }">Surveys</router-link>
                    </li>

                </ul>

                <div class="Logout">
                    <a @click="logout">
                        <i class="fas fa-sign-out"></i> Logout
                    </a>

                </div>
            </nav>
        </header>

        <main>

            <RouterView/>
        </main>
    </div>
</template>

<script>
import { useStore } from '../stores';
import {useRouter} from 'vue-router';

import {computed} from '@vue/reactivity';
import axiosClient from "../axios";

export default {
    setup() {
        const userStore = useStore();
        const router = useRouter();

        function logout() {
            axiosClient.post('/logout').then((res) => {
                userStore.logout();
                router.push({
                    name: 'Login'
                })
            })
        }

        return {
            user: computed(() => userStore.user.data),
            logout
        }
    }
}
</script>

<style scoped>
header {
    background-color: #333;
    padding: 10px 0;
    width: 100%;
}


header nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    position: relative;
    color: #fff;
}

@media (max-width: 767px) {
    header nav {
        justify-content: center;
    }
}

header nav .logo {
    margin-left: 20px;
}

header nav .logo a {
    color: #fff;
    font-weight: bold;
    font-size: 26px;
    display: flex;
    justify-content: center;
    align-items: center;
}

header nav .logo a span {
    color: var(--main-color);
}

nav ul {
    display: flex;
    margin-right: 20px;
}

nav ul li {
    padding: 0 15px;
}

nav ul li a {
    color: #fff;
}

.menu li a.router-link-exact-active {
    color: var(--main-color);
    background-color: #fff;
    padding: 5px 10px;
    border-radius: 20px;
    font-weight: bold;
}

/*
.menu li a.router-link-exact-active:hover {
  background-color: transparent;
} */

.Logout {
    margin-right: 30px;

}

.Logout a {
    color: #fff;
    cursor: pointer;
}
</style>
