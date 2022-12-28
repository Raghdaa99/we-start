import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { createI18n } from 'vue-i18n'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { useStore } from './stores/user';
import App from './App.vue'
import router from './router'

import './assets/css/main.css'
import './assets/css/style.css'
import '@fortawesome/fontawesome-free/css/all.css'

import axios from 'axios'
import toastr from 'toastr'
import 'toastr/build/toastr.min.css'

window.axios = axios;
window.toastr = toastr;


axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1';
axios.interceptors.request.use(function (config) {
    config.headers.Authorization  = `Bearer ${useStore().user.token}`
    return config;
  })



const app = createApp(App)
const pinia = createPinia()

app.use(pinia)
app.use(router)
pinia.use(piniaPluginPersistedstate)
app.mount('#app')
