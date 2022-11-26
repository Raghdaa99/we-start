<template>
    <h2>Login Page</h2>
    <p v-if="errorMsg" class="error-msg"> {{ errorMsg }}</p>
    <form @submit="login">
        <input type="email" placeholder="Email Address" id="email" name="email" v-model="user.email">
        <input type="password" placeholder="Password" id="password" name="password" v-model="user.password">

        <button type="submit"> Login Now</button>
        <div class="input-checkbox">
            <label>Remember me</label>
            <input type="checkbox" name="remember" id="remember" v-model="user.remember" />
        </div>
        <router-link :to="{ name: 'Register' }"> Register For Free</router-link>

    </form>

</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import axiosClient from "../axios";
import {useStore} from "../stores";

const userStore = useStore();
const router = useRouter();


const user = {
    email: '',
    password: '',
    remember: false
}
let errorMsg = ref('');

function login(ev) {
    ev.preventDefault();
    axiosClient.post('/login', user).then((res) => {
        userStore.setUser(res.data);
        router.push({
            name: 'Dashboard'
        })
    }).catch(function (err) {
        errorMsg.value = err.error;
        console.log(err.error);

        // toastr.error(error.response.data.message);
    });

    // axiosClient.post('/register', user).then(function (response) {
    //     userStore.setUser(response.data);
    //     console.log(response.data);
    // });
}
</script>

<style scoped>
.error-msg {
    color: indianred;
}

form {
    width: 400px;
}

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

.input-checkbox {
    display: flex;
    justify-content: flex-end;
}

.input-checkbox input {
    width: fit-content;
}
</style>
