import './bootstrap';
import {createPinia} from 'pinia';

import {createApp} from "vue";
import App from './App.vue';
import router from "./router";
import Swal from "sweetalert2";

window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
})

window.Toast = Toast;

const app = createApp(App);


app.use(router).use(createPinia()).mount('#app');
