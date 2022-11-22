<template>

    <h2>Register Page</h2>
    <form @submit="register">
        <input type="text" placeholder="Full Name" id="name" name="name" v-model="user.name">
        <input type="email" placeholder="Email Address" id="email" name="email" v-model="user.email">
        <input type="password" placeholder="Password" id="password" name="password" v-model="user.password">
        <input type="password" placeholder="Password Confirmation" id="password_confirmation"
               name="password_confirmation" v-model="user.password_confirmation">
        <button type="submit"> Sign UP Now</button>
        <router-link :to="{ name:'Login' }"> You already Have Account! Login</router-link>
    </form>

</template>

<script setup>
import { useStore } from '../stores';
import {useRouter} from 'vue-router';
import axiosClient from "../axios";

const userStore = useStore();
const router = useRouter();


const user = {
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
}

function register(ev) {
    ev.preventDefault();
    axiosClient.post('/register', user).then(function (response) {
        userStore.setUser(response.data);
        console.log(response.data);
    });
    // userStore.register(user).then((res) => {
    //     router.push({
    //         name: 'Dashboard'
    //     })
    // });
}
</script>

<style scoped>
input,
button {
    /* display: block; */
    margin-top: 10px;
    padding: 15px;
    border: 2px solid #dfdfdf;
    border-radius: 10px;
    width: 100%;
}

button {
    cursor: pointer;
    background-color: blueviolet;
    color: #fff;
    width: 100%;
    text-align: center;
}
</style>
